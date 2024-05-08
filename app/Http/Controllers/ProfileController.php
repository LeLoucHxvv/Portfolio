<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::all()->first();
        return view('menu.profile.index')->with([
            'profile' =>  $profile,
        ]);
    }

    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('menu.Profile.edit')
            ->with([
                'profile' => $profile,
            ]);
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'bday' => 'required',
    //         'website' => 'required',
    //         'mobile' => 'required|min:11',
    //         'location' => 'required',
    //         'email' => 'required',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|',
    //     ], [
    //         'name.required' => 'The Name field is required.'
    //     ]);

    //     if ($validated) {

    //         $profile = Profile::findOrFail($id);

    //         $oldImg = $request->input('old');

    //         $now = new \DateTime('NOW');
    //         $date = $now->format('m-d-Y_H.i.s.u');
    //         if ($request->hasFile('img')) {
    //             $profile_Img_WithExt = $request->file('img')->getClientOriginalName();
    //             $profile_Img_filename = str_replace(' ', '_', pathinfo($profile_Img_WithExt, PATHINFO_FILENAME));
    //             $profile_Img_extension = $request->file('img')->getClientOriginalExtension();
    //             $profile_img = $profile_Img_filename . '-' . $date . '.' . $profile_Img_extension;
    //             $path_profile_img = $request->file('img')->storeAs('public/folder', $profile_img);
    //         } else {
    //             $profile_img = $oldImg ?? 'No Data';
    //         }

    //         $profile->update([
    //             'name' => $request->name,
    //             'bday' => $request->bday,
    //             'website' => $request->website,
    //             'mobile_number' => $request->mobile,
    //             'Location' => $request->location,
    //             'email' => $request->email,
    //             'img' => $profile_img
    //         ]);

    //         if ($profile) {
    //             return redirect()->route('my-profile.index')->with('success', 'Successfully Updated !');
    //         }
    //     }
    // }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'bday' => 'required',
            'age' => 'required',
            'website' => 'required',
            'mobile' => 'required|min:11',
            'location' => 'required',
            'email' => 'required',
            'freelance' => 'required|in:Available,Not Available',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|',
        ], [
            'name.required' => 'The Name field is required.'
        ]);

        if ($validated) {
            $profile = Profile::findOrFail($id);

            // Check if there is an old image associated with the profile
            $old_img = $profile->img;

            // Update profile fields
            $profile->update([
                'name' => $request->name,
                'bday' => $request->bday,
                'age' => $request->age,
                'website' => $request->website,
                'mobile_number' => $request->mobile,
                'Location' => $request->location,
                'email' => $request->email,
                'freelance' => $request->freelance,
            ]);

            // Check if a new image is uploaded
            if ($request->hasFile('img')) {
                // Delete the old image from storage
                if ($old_img) {
                    Storage::delete('public/folder/' . $old_img);
                }

                // Store the new image
                $now = new \DateTime('NOW');
                $date = $now->format('m-d-Y_H.i.s.u');
                $profile_Img_WithExt = $request->file('img')->getClientOriginalName();
                $profile_Img_filename = str_replace(' ', '_', pathinfo($profile_Img_WithExt, PATHINFO_FILENAME));
                $profile_Img_extension = $request->file('img')->getClientOriginalExtension();
                $profile_img = $profile_Img_filename . '-' . $date . '.' . $profile_Img_extension;
                $path_profile_img = $request->file('img')->storeAs('public/folder', $profile_img);

                // Update the profile with the new image
                $profile->update([
                    'img' => $profile_img
                ]);
            } else {
                // If no new image uploaded, retain the old image
                $profile->update([
                    'img' => $old_img
                ]);
            }

            return redirect()->route('my-profile.index')->with('success', 'Successfully Updated !');
        }
    }
}
