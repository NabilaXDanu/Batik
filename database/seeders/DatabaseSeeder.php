<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::firstWhere('name', 'Putra') ?? User::factory()->create(['name' => 'Putra']);
        Order::factory()->count(10)->create([
            'user_id' => $user->id,
            'total_amount' => fn() => rand(100000, 1000000),
            'status' => fn() => ['pending', 'processing', 'completed'][rand(0, 2)],
            'created_at' => now()->subDays(rand(1, 30)),
        ]);
    }
}
