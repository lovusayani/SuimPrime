@php
    // Support being included from edit.blade.php where $section may already be defined
    $section = $section ?? request('section', null);
@endphp

<div id="setting-sidebar" class="setting-sidebar-inner">
    <div class="card">
        <div class="card-body">
            <div class="list-group list-group-flush" id="setting-list">
                <div class="mb-3 active-menu">
                    <a id="link-general" href="{{ route('admin.settings.logo', ['section' => 'general']) }}" class="btn btn-border {{ $section === 'general' ? 'active' : '' }}">
                        <i class="fas fa-cube"></i>Business Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-custom-code" href="{{ route('admin.settings.logo', ['section' => 'custom-code']) }}" class="btn btn-border {{ $section === 'custom-code' ? 'active' : '' }}">
                        <i class="fas fa-cube"></i>Custom Code
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-module-setting" href="{{ route('admin.settings.module') }}" class="btn btn-border {{ request()->routeIs('admin.settings.module') ? 'active' : ($section === 'module-setting' ? 'active' : '') }}">
                        <i class="icon ph ph-list-dashes"></i>Module Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-misc" href="{{ route('admin.settings.misc') }}" class="btn btn-border {{ request()->routeIs('admin.settings.misc') ? 'active' : ($section === 'misc' ? 'active' : '') }}">
                        <i class="fa-solid fa-screwdriver-wrench"></i>Misc Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-customization" href="{{ route('admin.settings.logo', ['section' => 'customization']) }}" class="btn btn-border {{ $section === 'customization' ? 'active' : '' }}">
                        <i class="fa-solid fa-swatchbook"></i>Customization
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-mail" href="{{ route('admin.settings.mail') }}" class="btn btn-border {{ request()->routeIs('admin.settings.mail') ? 'active' : ($section === 'mail' ? 'active' : '') }}">
                        <i class="fas fa-envelope"></i>Mail Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-notification" href="{{ route('admin.settings.notification') }}" class="btn btn-border {{ request()->routeIs('admin.settings.notification') ? 'active' : ($section === 'notification' ? 'active' : '') }}">
                        <i class="fa-solid fa-bullhorn"></i>Notification Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-payment-method" href="{{ route('admin.settings.logo', ['section' => 'payment-method']) }}" class="btn btn-border {{ $section === 'payment-method' ? 'active' : '' }}">
                        <i class="fa-solid fa-coins"></i>Payment Method
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-language-settings" href="{{ route('admin.settings.logo', ['section' => 'language-settings']) }}" class="btn btn-border {{ $section === 'language-settings' ? 'active' : '' }}">
                        <i class="fa fa-language" aria-hidden="true"></i>Language Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-notification-configuration" href="{{ route('admin.settings.logo', ['section' => 'notification-configuration']) }}" class="btn btn-border {{ $section === 'notification-configuration' ? 'active' : '' }}">
                        <i class="fa-solid fa-bell"></i>Notification Configuration
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-currency-settings" href="{{ route('admin.settings.logo', ['section' => 'currency-settings']) }}" class="btn btn-border {{ $section === 'currency-settings' ? 'active' : '' }}">
                        <i class="fa fa-dollar fa-lg mr-2"></i>Currency Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-storage-settings" href="{{ route('admin.settings.logo', ['section' => 'storage-settings']) }}" class="btn btn-border {{ $section === 'storage-settings' ? 'active' : '' }}">
                        <i class="fa-solid fa-database"></i>Storage Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-seo-settings" href="{{ route('admin.settings.logo', ['section' => 'seo-settings']) }}" class="btn btn-border {{ $section === 'seo-settings' ? 'active' : '' }}">
                        <i class="fa-solid fa-search"></i>SEO Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
