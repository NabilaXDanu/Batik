<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->options(Product::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $product = Product::find($state);
                        if ($product) {
                            $set('price', $product->price);
                        }
                    }),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->reactive()
                    ->afterStateUpdated(function ($state, $get, callable $set) {
                        $product = Product::find($get('product_id'));
                        if ($product && $state > $product->stock) {
                            $set('quantity', $product->stock);
                            \Filament\Notifications\Notification::make()
                                ->title('Insufficient stock')
                                ->body("Only {$product->stock} units available for {$product->name}.")
                                ->warning()
                                ->send();
                        }
                    }),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->disabled(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('product.name')
            ->columns([
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->before(function (array $data) {
                        $product = Product::find($data['product_id']);
                        if ($product->stock < $data['quantity']) {
                            \Filament\Notifications\Notification::make()
                                ->title('Insufficient stock')
                                ->body("Only {$product->stock} units available for {$product->name}.")
                                ->warning()
                                ->send();
                            throw new \Exception('Insufficient stock');
                        }
                    })
                    ->after(function (Model $record) {
                        DB::transaction(function () use ($record) {
                            $product = Product::find($record->product_id);
                            $product->decrement('stock', $record->quantity); // Change to increment if stock should increase

                            $order = $record->order;
                            $totalAmount = $order->items->sum(function ($item) {
                                return $item->price * $item->quantity;
                            });
                            $order->update(['total_amount' => $totalAmount]);
                        });
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->before(function (array $data, Model $record) {
                        $product = Product::find($data['product_id']);
                        $quantityDifference = $data['quantity'] - $record->quantity;
                        if ($quantityDifference > 0 && $product->stock < $quantityDifference) {
                            \Filament\Notifications\Notification::make()
                                ->title('Insufficient stock')
                                ->body("Only {$product->stock} additional units available for {$product->name}.")
                                ->warning()
                                ->send();
                            throw new \Exception('Insufficient stock');
                        }
                    })
                    ->after(function (Model $record, array $data) {
                        DB::transaction(function () use ($record, $data) {
                            $product = Product::find($record->product_id);
                            $quantityDifference = $data['quantity'] - $record->getOriginal('quantity');
                            if ($quantityDifference != 0) {
                                $product->decrement('stock', $quantityDifference); // Change to increment if needed
                            }

                            $order = $record->order;
                            $totalAmount = $order->items->sum(function ($item) {
                                return $item->price * $item->quantity;
                            });
                            $order->update(['total_amount' => $totalAmount]);
                        });
                    }),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Model $record) {
                        DB::transaction(function () use ($record) {
                            $product = Product::find($record->product_id);
                            $product->increment('stock', $record->quantity); // Restores stock

                            $order = $record->order;
                            $totalAmount = $order->items->sum(function ($item) {
                                return $item->price * $item->quantity;
                            });
                            $order->update(['total_amount' => $totalAmount]);
                        });
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function ($records) {
                            DB::transaction(function () use ($records) {
                                foreach ($records as $record) {
                                    $product = Product::find($record->product_id);
                                    $product->increment('stock', $record->quantity); // Restores stock
                                }

                                $order = $records->first()->order;
                                $totalAmount = $order->items->sum(function ($item) {
                                    return $item->price * $item->quantity;
                                });
                                $order->update(['total_amount' => $totalAmount]);
                            });
                        }),
                ]),
            ]);
    }
}