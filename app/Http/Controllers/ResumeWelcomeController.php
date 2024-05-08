<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interest;
use App\Models\Language;
use App\Models\Profile;
use Illuminate\Http\Request;

class ResumeWelcomeController extends Controller
{
    public function index()
    {
        $profile = Profile::all()->first();
        $experience = Experience::all();
        $education = Education::all();
        return view('welcome.resume')->with([
            'profile' => $profile,
            'experience' => $experience,
            'education' => $education,
        ]);
        // return view('welcome.resume');
    }
}
