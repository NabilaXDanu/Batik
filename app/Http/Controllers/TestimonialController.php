<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display active testimonials.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('welcome', compact('testimonials'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'location' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('testimonials', 'public');
        }

        // Create testimonial
        Testimonial::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'photo' => $photoPath,
            'is_active' => true, // Requires admin approval
        ]);

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Testimonial submitted successfully! It will be reviewed soon.');
    }
}
