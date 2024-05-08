<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\Profile;
use Illuminate\Http\Request;


class AboutmeController extends Controller
{
    public function index()
    {
        // $aboutMes = AboutMe::all()->first();
        // return view('menu.aboutme.index')->with('aboutmes', $aboutMes);
        return view('menu.aboutme.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'website' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'location' => 'required',

        ]);

        // dd($validated);

        if ($validated) {
            $profile= Profile::create([
                'name' => $request->name,
                'website' => $request->website,
                'mobile_number' => $request->mobile,
                'email' => $request->email,
                'Location' => $request->location,

            ]);
            if($profile){
                return redirect()->route('aboutme')->with('success','The gender called has been successfully added');
            }
        }
    }

    // public function edit($id){
    //     $about = About::where('id',$id)->select('id')->first();
    //     return view('menu.aboutme.edit')->with('about',$about);
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'birthday' => 'required',
    //         'age' => 'required',
    //         'facebook_account' => 'required',
    //         'degree' => 'required',
    //         'phone_number' => 'required',
    //         'gmail_account' => 'required',
    //         'city' => 'required',
    //         'freelance' => 'required',

    //     ]);

    //     if($validated){
    //         $aboutMe = About::create([
    //             'birthday' => $request->birthday,
    //             'age' => $request->age,
    //             'facebook_account' => $request->facebook_account,
    //             'degree' => $request->degree,
    //             'phone_number' => $request->phone_number,
    //             'gmail_account' => $request->gmail_account,
    //             'city' => $request->city,
    //             'freelance' => $request->freelance

    //         ]);

    //         if($aboutMe){
    //             return redirect()->route('menu.aboutme.aboutMe')->with('success','The gender called has been successfully added');
    //         }
    //     }
    // }

    // public function update($id,Request $request){
    //     $validated = $request->validate([
    //         'birthday' => 'required',
    //         'age' => 'required',
    //         'facebook_account' => 'required',
    //         'degree' => 'required',
    //         'phone_number' => 'required',
    //         'gmail_account' => 'required',
    //         'city' => 'required',
    //         'freelance' => 'required',
    //     ]);

    //     if($validated){
    //         $aboutMe = About::findOrfail($id);

    //         $aboutMe->update([
    //             'birthday' => $request->birthday,
    //             'age' => $request->age,
    //             'facebook_account' => $request->facebook_account,
    //             'degree' => $request->degree,
    //             'phone_number' => $request->phone_number,
    //             'gmail_account' => $request->gmail_account,
    //             'city' => $request->city,
    //             'freelance' => $request->freelance
    //         ]);

    //         $about = About::all()->first();
    //         return view('menu.aboutme.aboutMe')->with('about', $about);
    //     }
    // }
}
