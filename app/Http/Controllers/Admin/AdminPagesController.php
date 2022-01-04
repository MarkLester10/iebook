<?php

namespace App\Http\Controllers\Admin;

use App\PageViews;
use Carbon\Carbon;
use App\Models\Term;
use App\Subscription;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CyrildeWit\EloquentViewable\Support\Period;

class AdminPagesController extends Controller
{

    public function index()
    {
        $termOfTheDay = Term::inRandomOrder()->first();
        $pendingSubscriptions = Subscription::where('status',0)->count();
        $approvedSubscriptions = Subscription::where('status',1)->count();
        $deniedSubscriptions = Subscription::where('status',2)->count();
        $expiredSubscriptions = Subscription::where('status',3)->count();
        $totalUsers = User::count();
        $totalPremiumAccount = User::where('is_premium',1)->count();
        $totalBasicAccount = User::where('is_premium',0)->count();
        $salesOverTime = Subscription::whereIn('status',[1,3])
        ->whereDate('updated_at', '=', Carbon::now()->format('Y-m-d'))
        ->sum('amount');
        $totalProfit = Subscription::whereIn('status',[1,3])
        ->sum('amount');

        $monthlyVisits = [];
        $totalVisits =  views(PageViews::find(1)->first())->count();
        for ($m = 1; $m <= 12; $m++) {
            $month = date('Y-m-d', mktime(0, 0, 0, $m, 1, date('Y')));
                $monthlyVisits[] = views(PageViews::find(1)->first())
                    ->period(Period::create(Carbon::parse($month)->startOfMonth()->format('Y-m-d'), Carbon::parse($month)->endOfMonth()->format('Y-m-d')))->count();
        }


        return view('admin.home',compact('pendingSubscriptions','termOfTheDay','approvedSubscriptions', 'deniedSubscriptions', 'expiredSubscriptions','totalVisits','monthlyVisits','totalPremiumAccount','totalBasicAccount','totalUsers','salesOverTime','totalProfit'));
    }
}
