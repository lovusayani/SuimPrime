<div class="position-relative pr-hide default">
    <!-- Header -->
    <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu left-border  ">
        <div class="container-fluid navbar-inner">
            <a href="#/app/dashboard" class="navbar-brand">
                <div class="logo-main">
                    <div class="logo-mini d-none">
                        <img src="{{ asset(\App\Models\Setting::get('logo_mini')) }}" height="30"
                            alt="Streamit: Your Ultimate Entertainment Hub">
                    </div>
                    <div class="logo-normal">
                        <img src="{{ asset(\App\Models\Setting::get('logo_normal')) }}" height="30"
                            alt="Streamit: Your Ultimate Entertainment Hub">

                    </div>
                    <div class="logo-dark">
                        <img src="{{ asset(\App\Models\Setting::get('logo_dark')) }}" height="30"
                            alt="Streamit: Your Ultimate Entertainment Hub">
                    </div>
                </div>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon d-flex">
                    <i class="ph ph-caret-left"></i>
                </i>
            </div>

            <!-- horizontal header code -->

            <div class="d-flex align-items-center">
                <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <span class="navbar-toggler-bar bar1 mt-1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center navbar-list gap-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex align-items-center mr-2 iq-font-style" role="group"
                            aria-label="First group">
                            <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm"
                                id="font-size-sm" checked>
                            <label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm"
                                data-bs-toggle="tooltip" title="Font size 14px" data-bs-placement="bottom">
                                <span class="mb-0 h6" style="color: inherit !important;">A</span>
                            </label>
                            <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md"
                                id="font-size-md">
                            <label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                                title="Font size 16px" data-bs-placement="bottom">
                                <span class="mb-0 h4" style="color: inherit !important;">A</span>
                            </label>
                            <input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg"
                                id="font-size-lg">
                            <label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip"
                                title="Font size 18px" data-bs-placement="bottom">
                                <span class="mb-0 h2" style="color: inherit !important;">A</span>
                            </label>
                        </div>
                    </li>
                    <li class="nav-item theme-scheme-dropdown dropdown iq-dropdown">
                        <a href="javascript:void(0)" class="nav-link d-flex align-items-center change-mode p-0"
                            data-change-mode="dark" id="mode-drop" style="color: inherit !important;">
                            <i class="ph ph-sun mode-icons light-mode"></i>
                            <i class="ph ph-moon mode-icons dark-mode"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown iq-dropdown">
                        <a class="nav-link btn btn-primary btn-icon btn-sm rounded-pill btn-action p-0"
                            data-bs-toggle="dropdown" href="#">
                            <div class="iq-sub-card">
                                <div class="d-flex align-items-center notification_list">
                                    <span class="btn-inner">
                                        <i class="ph ph-bell"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="p-0 sub-drop dropdown-menu dropdown-notification dropdown-menu-end">
                            <div class="m-0 shadow-none card bg-transparent notification_data"></div>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link p-0" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img class="avatar avatar-40 img-fluid rounded-pill"
                                    src="#/storage/streamit-laravel/demo_admin.png" alt="Streamit User"
                                    loading="lazy">
                            </div>
                        </a>
                        <ul class="dropdown-menu sub-drop dropdown-menu-end">
                            <div class="dropdown-header bg-primary-subtle py-3 rounded">
                                <div class="d-flex gap-2">
                                    <img class="avatar avatar-40 img-fluid rounded-pill"
                                        src="#/storage/streamit-laravel/demo_admin.png" />
                                    <div class="d-flex flex-column align-items-start">
                                        <h5 class="m-0 text-primary">Ivan Norris
                                        </h5>
                                        <span class="text-muted">demo@streamit.com</span>
                                    </div>
                                </div>
                            </div>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                    href="#/app/my-profile">My Profile<i class="ph ph-user"></i></a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                    href="#/app/setting/general-setting">
                                    Settings <i class="ph ph-gear"></i>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                    href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout <i class="ph ph-sign-out"></i>
                                </a>
                            </li>

                            {{-- Hidden Logout Form --}}
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Header -->
</div>
