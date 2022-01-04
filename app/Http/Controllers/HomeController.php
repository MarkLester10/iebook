<?php

namespace App\Http\Controllers;


use App\PageViews;
use App\Models\Term;


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
        $currentSubscription = auth()->user()->subscriptions()->where('status', 1)->latest()->first() ?? null;
        $subscriptions = auth()->user()->subscriptions()->latest()->paginate(10);

        return view('users.profile', compact('currentSubscription', 'subscriptions'));
    }

    public function welcome()
    {
        views(PageViews::find(1)->first())
        ->cooldown($minutes = 3)
        ->record();
        $termOfTheDay = Term::inRandomOrder()->first();
        return view('welcome', compact('termOfTheDay'));
    }
}
