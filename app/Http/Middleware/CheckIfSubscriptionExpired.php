<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

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

            if(!$currentSubscription){
                return $next($request);
            }

            if($currentSubscription->end_date <= Carbon::now()){
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
