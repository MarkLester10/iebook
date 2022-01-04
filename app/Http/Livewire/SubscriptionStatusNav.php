<?php

namespace App\Http\Livewire;

use App\Subscription;
use Livewire\Component;

class SubscriptionStatusNav extends Component
{
    public function render()
    {
        $pendingSubscriptions = Subscription::where('status',0)->count();
        $approvedSubscriptions = Subscription::where('status',1)->count();
        $deniedSubscriptions = Subscription::where('status',2)->count();
        $expiredSubscriptions = Subscription::where('status',3)->count();
        return view('livewire.subscription-status-nav', compact('pendingSubscriptions', 'approvedSubscriptions', 'deniedSubscriptions', 'expiredSubscriptions'));
    }
}
