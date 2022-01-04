<div class="bg-light p-3">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if(Route::is('subscriptions.pending')) active bg-dark text-white @endif" href="{{ route('subscriptions.pending') }}">
                <i class="la la-history"></i>
                Pending
                @if($pendingSubscriptions > 0)
                <span class="m-badge m-badge--danger">{{ $pendingSubscriptions }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('subscriptions.approved')) active bg-dark text-white @endif" href="{{ route('subscriptions.approved') }}">
                <i class="la la-check-circle"></i>
                Approved
                @if($approvedSubscriptions > 0)
                <span class="m-badge m-badge--danger">{{ $approvedSubscriptions }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('subscriptions.denied')) active bg-dark text-white @endif"  href="{{ route('subscriptions.denied') }}">
                <i class="la la-ban"></i>
                Denied
                @if($deniedSubscriptions > 0)
                <span class="m-badge m-badge--danger">{{ $deniedSubscriptions }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('subscriptions.expired')) active bg-dark text-white @endif" href="{{ route('subscriptions.expired') }}">
                <i class="la la-dashboard"></i>
                Expired
                @if($expiredSubscriptions > 0)
                <span class="m-badge m-badge--danger">{{ $expiredSubscriptions }}</span>
                @endif
            </a>
        </li>

    </ul>
</div>
