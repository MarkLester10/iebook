<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Jobs\SendEmailJob;
use App\Mail\SubscriptionReminder;
use Illuminate\Support\Facades\Mail;

class CheckIfSubscriptionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_premium && auth()->guard('web')->check()){
            $currentSubscription = auth()->user()->subscriptions()->where('status', 1)->latest()->first();
            $now = Carbon::now();
            $diff = Carbon::parse($currentSubscription->end_date)->diffInDays($now);
            if(!$currentSubscription){
                return $next($request);
            }

            // Send email to user when subscription will expire in 3 days
            if($diff == 3){
                dispatch(new SendEmailJob($currentSubscription, auth()->user()->email));
            }

            if(!$now->between($currentSubscription->start_date,$currentSubscription->end_date)){
                $currentSubscription->update([
                    'status' => 3
                ]);
                auth()->user()->update([
                    'is_premium' => 0
                ]);
            }
        }
        return $next($request);
    }
}
