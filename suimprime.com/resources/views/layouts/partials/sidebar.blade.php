<div class="sidebar-base pr-hide sidebar sidebar-default navs-pill-all" data-toggle="main-sidebar" id="sidebar"
    data-sidebar="responsive">
    <div class="d-flex align-items-center justify-content-start">
        <div class="logo-main">
            <a href="/admin/dashboard" class="navbar-brand">
                <img class="logo-normal img-fluid" src="{{ asset(\App\Models\Setting::get('logo_dark')) }}" height="30"
                    alt="Logo">
                <img class="logo-normal dark-normal img-fluid" src="{{ asset(\App\Models\Setting::get('logo_dark')) }}"
                    height="30" alt="Logo Dark">
                <img class="logo-mini img-fluid" src="{{ asset(\App\Models\Setting::get('logo_mini')) }}" height="30"
                    alt="Logo Mini">
                <img class="logo-mini dark-mini img-fluid" src="{{ asset(\App\Models\Setting::get('logo_dark_mini')) }}"
                    height="30" alt="Logo Dark Mini">

            </a>
        </div>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list" id="sidebar">
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#/#">

                        <span class="default-icon">Main</span>
                        <span class="mini-icon">-</span>

                    </a>
                </li>
                <li class="nav-item active show">
                    <a class="nav-link active show" href="/admin/dashboard">
                        <i class='icon ph ph-squares-four' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Dashboard" data-bs-original-title="Dashboard"></i><span
                            class='item-name'>Dashboard</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/media-library">
                        <i class='icon ph ph-images-square' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Media Library" data-bs-original-title="Media Library"></i><span
                            class='item-name'>Media Library</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#/#">
                        <span class="default-icon">Media Management</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/genres">
                        <i class='icon ph ph-mask-happy' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Genres" data-bs-original-title="Genres"></i><span
                            class='item-name'>Genres</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/movies">
                        <i class='icon ph ph-film-strip' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Movies" data-bs-original-title="Movies"></i><span
                            class='item-name'>Movies</span><i class='icon '></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#tv_show" data-bs-parent="#sidebar-menu" class="nav-link" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseExample" href="">
                        <i class='icon ph ph-television-simple' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="TV Shows" data-bs-original-title="TV Shows"></i><i class='sidenav-mini-icon'>
                            T </i><span class='item-name'>TV Shows</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="tv_show" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/tvshows">
                                <i class='icon ph ph-monitor-play' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="TV Shows" data-bs-original-title="TV Shows"></i><i
                                    class='sidenav-mini-icon'> T </i><span class='item-name'>TV Shows</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/seasons">
                                <i class='icon ph ph-television' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Seasons" data-bs-original-title="Seasons"></i><i
                                    class='sidenav-mini-icon'> S </i><span class='item-name'>Seasons</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/episodes">
                                <i class='icon ph ph-cards-three' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Episodes" data-bs-original-title="Episodes"></i><i
                                    class='sidenav-mini-icon'> E </i><span class='item-name'>Episodes</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/videos">
                        <i class='icon ph ph-video-camera' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Videos" data-bs-original-title="Videos"></i><span
                            class='item-name'>Videos</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#live_tv" data-bs-parent="#sidebar-menu" class="nav-link" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseExample" href="">
                        <i class='icon ph ph-screencast' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Live TV" data-bs-original-title="Live TV"></i><i class='sidenav-mini-icon'> L
                        </i><span class='item-name'>Live TV</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="live_tv" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/tv-category">
                                <i class='icon ph ph-circles-three-plus' data-bs-toggle="tooltip"
                                    data-bs-placement="right" aria-label="TV Category"
                                    data-bs-original-title="TV Category"></i><i class='sidenav-mini-icon'> T </i><span
                                    class='item-name'>TV Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/tv-channel">
                                <i class='icon ph ph-polygon' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="TV Channel" data-bs-original-title="TV Channel"></i><i
                                    class='sidenav-mini-icon'> T </i><span class='item-name'>TV Channel</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="#cast" data-bs-parent="#sidebar-menu" class="nav-link" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseExample" href="">
                        <i class='icon ph ph-users' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Cast & Crew" data-bs-original-title="Cast & Crew"></i><i
                            class='sidenav-mini-icon'> C </i><span class='item-name'>Cast & Crew</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="cast" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/actors">
                                <i class='icon ph ph-user-focus' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Actors" data-bs-original-title="Actors"></i><i
                                    class='sidenav-mini-icon'> A </i><span class='item-name'>Actors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/directors">
                                <i class='icon ph ph-user-circle-gear' data-bs-toggle="tooltip"
                                    data-bs-placement="right" aria-label="Directors"
                                    data-bs-original-title="Directors"></i><i class='sidenav-mini-icon'> D </i><span
                                    class='item-name'>Directors</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#ads" data-bs-parent="#sidebar-menu" class="nav-link" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="collapseExample" href="">
                        <i class='icon ph ph-megaphone' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Ads Manager" data-bs-original-title="Ads Manager"></i><i
                            class='sidenav-mini-icon'> A </i><span class='item-name'>Ads Manager</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="ads" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/vastads">
                                <i class='icon ph ph-gear' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="VAST Ads Settings" data-bs-original-title="VAST Ads Settings"></i><i
                                    class='sidenav-mini-icon'> V </i><span class='item-name'>VAST Ads Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/customads">
                                <i class='icon ph ph-sliders' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Custom Ads Settings"
                                    data-bs-original-title="Custom Ads Settings"></i><i class='sidenav-mini-icon'> C
                                </i><span class='item-name'>Custom Ads Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#/#">

                        <span class="default-icon">Subscription</span>
                        <span class="mini-icon">-</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/subscriptions">
                        <i class='icon ph ph-hand' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="subscriptions" data-bs-original-title="subscriptions"></i><span
                            class='item-name'>subscriptions</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/plans">
                        <i class='icon ph ph-list-dashes' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Plans" data-bs-original-title="Plans"></i><span
                            class='item-name'>Plans</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/planlimitation">
                        <i class='icon ph ph-warning-octagon' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Plan Limits" data-bs-original-title="Plan Limits"></i><span
                            class='item-name'>Plan Limits</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/pay-per-view-history">
                        <i class='icon ph ph-hand' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Rent History" data-bs-original-title="Rent History"></i><span
                            class='item-name'>Rent History</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/coupon">
                        <i class='icon ph ph-ticket' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Coupon" data-bs-original-title="Coupon"></i><span
                            class='item-name'>Coupon</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#/#">

                        <span class="default-icon">Users</span>
                        <span class="mini-icon">-</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/users">
                        <i class='icon ph ph-user' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Users" data-bs-original-title="Users"></i><span
                            class='item-name'>Users</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/app/users/soon-to-expire">
                        <i class='icon ph ph-hourglass' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Soon-to-Expire" data-bs-original-title="Soon-to-Expire"></i><span
                            class='item-name'>Soon-to-Expire</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/reviews">
                        <i class='icon ph ph-star-half' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Reviews" data-bs-original-title="Reviews"></i><span
                            class='item-name'>Reviews</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#/#">

                        <span class="default-icon">System Setting</span>
                        <span class="mini-icon">-</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/banners">
                        <i class='icon ph ph-layout' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="App Banner" data-bs-original-title="App Banner"></i><span
                            class='item-name'>App Banner</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/constants">
                        <i class='icon fa-brands fa-intercom' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="constants" data-bs-original-title="constants"></i><span
                            class='item-name'>constants</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#mobile_setting" data-bs-parent="#sidebar-menu" class="nav-link"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="collapseExample" href="">
                        <i class='icon ph ph-device-mobile' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Mobile Setting" data-bs-original-title="Mobile Setting"></i><i
                            class='sidenav-mini-icon'> M </i><span class='item-name'>Mobile Setting</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="mobile_setting" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/mobile-setting">
                                <i class='icon ph ph-gear' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Dashboard Setting" data-bs-original-title="Dashboard Setting"></i><i
                                    class='sidenav-mini-icon'> D </i><span class='item-name'>Dashboard Setting</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#notifications" data-bs-parent="#sidebar-menu" class="nav-link"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="collapseExample" href="">
                        <i class='icon ph ph-bell' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Notifications" data-bs-original-title="Notifications"></i><i
                            class='sidenav-mini-icon'> N </i><span class='item-name'>Notifications</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse  " id="notifications" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/notifications">
                                <i class='icon ph ph-list-bullets' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Notification List" data-bs-original-title="Notification List"></i><i
                                    class='sidenav-mini-icon'> N </i><span class='item-name'>Notification List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/app/notification-templates">
                                <i class='icon ph ph-layout' data-bs-toggle="tooltip" data-bs-placement="right"
                                    aria-label="Templates" data-bs-original-title="Templates"></i><i
                                    class='sidenav-mini-icon'> T </i><span class='item-name'>Templates</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/setting/general-setting">
                        <i class='icon ph ph-gear-six' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Settings" data-bs-original-title="Settings"></i><span
                            class='item-name'>Settings</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/pages">
                        <i class='icon ph ph-file' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Pages" data-bs-original-title="Pages"></i><span
                            class='item-name'>Pages</span><i class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/taxes">
                        <i class='icon ph ph-percent' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="Tax" data-bs-original-title="Tax"></i><span class='item-name'>Tax</span><i
                            class='icon '></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#/app/faqs">
                        <i class='icon ph ph-question' data-bs-toggle="tooltip" data-bs-placement="right"
                            aria-label="FAQ" data-bs-original-title="FAQ"></i><span class='item-name'>FAQ</span><i
                            class='icon '></i>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-footer"></div>
</div>
