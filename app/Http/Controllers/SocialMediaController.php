<?php

namespace App\Http\Controllers;


use App\Models\Profile;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::all();
        $profile = Profile::all()->first();
        return view('menu.socialmedia.index')->with(['socialMedia' => $socialMedia,
                                                    'profile' => $profile]);
    }

    public function edit($id)
    {
        $socialMedia = SocialMedia::where('id', $id)->first();
        return response()->json(['socialMedia' => $socialMedia]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'link' => 'required',
            'type' => 'required',

        ], [
            'link.required' => 'Social media link is required.',
            'type.required' => 'Social media type is required.',

        ]);

        $socialMedia = SocialMedia::create([
            'social_link' => $request->link,
            'social_media' => $request->type,

        ]);

        return response()->json([
            'success' => '<strong>' . $request->type . '</strong> has been created successfully!',
            'socialMedia' => $socialMedia
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit-link' => 'required',
            'edit-type' => 'required',
        ],[
            'edit-link.required' => 'The Social Media link field is required.'
        ]);

        $socialMedia = SocialMedia::findOrFail($id);

        $socialMedia->update([
            'social_link' => $request->input('edit-link'),
            'social_media' => $request->input('edit-type')
        ]);

        return response()->json([
            'success' => '<strong>'.$request->input('edit-type').'</strong> has been updated successfully!',
            'socialMedia' => $socialMedia
        ]);
    }

    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return response()->json(['success' => '<strong>' . $socialMedia->name . '</strong> has been deleted successfully!']);
    }
}
