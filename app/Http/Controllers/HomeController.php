<?php

namespace App\Http\Controllers;

use App\Models\Term;
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
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        return view('users.profile');
    }

    public function welcome()
    {
        $termOfTheDay = Term::inRandomOrder()->first();
        return view('welcome', compact('termOfTheDay'));
    }
}
