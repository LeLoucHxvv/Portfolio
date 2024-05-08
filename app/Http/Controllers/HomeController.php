<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Profile::all()->first();
        $portfolio = Portfolio::all();
        return view('home')->with(['profile'=> $profile,
                                'portfolio' => $portfolio]);
    }
}
