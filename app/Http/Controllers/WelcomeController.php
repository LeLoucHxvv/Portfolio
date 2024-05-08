<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::all()->first();
        $education = Education::all();
        $experience = Experience::all();
        $socialMedia = SocialMedia::all();
        $blog = Blog::first();
        $skill = Skill::all();
        $portfolio = Portfolio::all();
        $job = Experience::pluck('job')->implode(', ');

        return view('welcome')->with([
            'profile' => $profile,
            'education' => $education,
            'experience' => $experience,
            'socialMedia' => $socialMedia,
            'blog' => $blog,
            'skill' => $skill,
            'portfolio' => $portfolio,
            'job' => $job,
        ]);
    }


    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'subject' => 'required',
    //         'message' => 'required',
    //     ]);

    //     if ($validated) {
    //         $welcome = Welcome::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'subject' => $request->subject,
    //             'message' => $request->message,
    //         ]);

    //         if ($welcome) {
    //             return redirect()->route('welcome')->with('success', 'The gender called has been successfully added');
    //         }
    //     }
    // }

    public function download($filename)
    {
        $filePath = 'public/' . $filename;

        if (!Storage::exists($filePath)) {
            abort(404);
        }
        return response()->download(storage_path('app/' . $filePath));
    }
}
