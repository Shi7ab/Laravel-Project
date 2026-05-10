<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Profile;
use Http\Requests\validation;

class ProfileController extends Controller
{
    //
        public function store(Request $request, Validation $validationRules) {
            $profile = new Profile();
            $validatedData = $request->validate($validationRules::profiles());
            if ($request->hasFile('image')) {
                $profile->image = $request->file('image')->store('profile_images', 'public'); // Store the image and save the path
            }
             // Assuming you have an image upload mechanism in place
            $profile->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
            $profile->save();

            return redirect()->back()->with('success', 'Profile created successfully');
        }

        public function show() {
            return view('posts.profile'); // Make sure you have this view created
        }

        public function update(Request $request, Validation $validationRules) {
             $validatedData = $request->validate($validationRules::profiles());
             if ($request->hasFile('image')) {
                $validatedData['image'] = $request->file('image')->store('profile_images', 'public'); // Store the image and save the path
            }

            $profile = Profile::updateOrCreate(
                ['user_id' => auth()->id()], // Find the profile by user_id
                $validatedData // Update with validated data
            );

            return redirect()->back()->with('success', 'Profile updated successfully');
        }
}
