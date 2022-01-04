<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function pending()
    {
        return view('admin.subscriptions.pending');
    }

    public function approved()
    {
        return view('admin.subscriptions.approved');
    }

    public function denied()
    {
        return view('admin.subscriptions.denied');
    }

    public function expired()
    {
        return view('admin.subscriptions.expired');
    }
}
