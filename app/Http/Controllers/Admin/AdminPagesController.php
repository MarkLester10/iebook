<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPagesController extends Controller
{

    public function index()
    {
        $termOfTheDay = Term::inRandomOrder()->first();
        return view('admin.home',compact('termOfTheDay'));
    }
}
