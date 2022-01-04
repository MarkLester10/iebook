<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item @if(Route::is('admin.dashboard')) m-menu__item--active @endif" aria-haspopup="true" >
                <a  href="{{ route('admin.dashboard') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Menu
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu @if(Route::is('terms.index')) m-menu__item--active @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('terms.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-2"></i>
                    <span class="m-menu__link-text">
                        Manage Terms
                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu  @if(Route::is('users.index')) m-menu__item--active @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('users.index') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-users"></i>
                    <span class="m-menu__link-text">
                        Users
                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu  @if(Route::is(['subscriptions.pending','subscriptions.approved','subscriptions.denied','subscriptions.expired'])) m-menu__item--active @endif" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="{{ route('subscriptions.pending') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list-3"></i>
                    <span class="m-menu__link-text">
                        Subscriptions
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
