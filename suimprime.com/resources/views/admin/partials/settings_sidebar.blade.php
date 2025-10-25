@php
    // Support being included from edit.blade.php where $section may already be defined
    $section = $section ?? request('section', null);
@endphp

<div id="setting-sidebar" class="setting-sidebar-inner">
    <div class="card">
        <div class="card-body">
            <div class="list-group list-group-flush" id="setting-list">
                <div class="mb-3 active-menu">
                    <a id="link-general" href="{{ route('admin.settings.logo', ['section' => 'general']) }}"
                        class="btn btn-border {{ $section === 'general' ? 'active' : '' }}">
                        <i class="icon ph ph-buildings me-2"></i> Business Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-content-setting" href="{{ route('admin.settings.contentSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.contentSettings') ? 'active' : '' }}">
                        <i class="icon ph ph-film me-2"></i> Content Setting
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-module-setting" href="{{ route('admin.settings.module') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.module') ? 'active' : ($section === 'module-setting' ? 'active' : '') }}">
                        <i class="icon ph ph-list-dashes me-2"></i> Module Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-misc" href="{{ route('admin.settings.misc') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.misc') ? 'active' : ($section === 'misc' ? 'active' : '') }}">
                        <i class="icon ph ph-wrench me-2"></i> Misc Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-customization" href="{{ route('admin.settings.logo', ['section' => 'customization']) }}"
                        class="btn btn-border {{ $section === 'customization' ? 'active' : '' }}">
                        <i class="icon ph ph-palette me-2"></i> Customization
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-mail" href="{{ route('admin.settings.mail') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.mail') ? 'active' : ($section === 'mail' ? 'active' : '') }}">
                        <i class="icon ph ph-envelope me-2"></i> Mail Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-notification" href="{{ route('admin.settings.notification') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.notification') ? 'active' : ($section === 'notification' ? 'active' : '') }}">
                        <i class="icon ph ph-megaphone me-2"></i> Notification Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-payment-method" href="{{ route('admin.settings.paymentMethod') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.paymentMethod') ? 'active' : ($section === 'payment-method' ? 'active' : '') }}">
                        <i class="icon ph ph-credit-card me-2"></i> Payment Method
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-language-settings" href="{{ route('admin.settings.languageSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.languageSettings') ? 'active' : ($section === 'language-settings' ? 'active' : '') }}">
                        <i class="icon ph ph-translate me-2"></i> Language Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-notification-configuration"
                        href="{{ route('admin.settings.notificationConfiguration') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.notificationConfiguration') ? 'active' : ($section === 'notification-configuration' ? 'active' : '') }}">
                        <i class="icon ph ph-bell me-2"></i> Notification Configuration
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-currency-settings" href="{{ route('admin.settings.currencySettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.currencySettings') ? 'active' : ($section === 'currency-settings' ? 'active' : '') }}">
                        <i class="icon ph ph-currency-circle-dollar me-2"></i> Currency Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-storage-settings" href="{{ route('admin.settings.storageSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.storageSettings') ? 'active' : ($section === 'storage-settings' ? 'active' : '') }}">
                        <i class="icon ph ph-database me-2"></i> Storage Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-seo-settings" href="{{ route('admin.settings.seoSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.seoSettings') ? 'active' : '' }}">
                        <i class="icon ph ph-magnifying-glass me-2"></i> SEO Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-admin-settings" href="{{ route('admin.settings.admSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.admSettings') ? 'active' : '' }}">
                        <i class="icon ph ph-gear me-2"></i> Admin Settings
                    </a>
                </div>
                <div class="mb-3 active-menu">
                    <a id="link-database-settings" href="{{ route('admin.settings.databaseSettings') }}"
                        class="btn btn-border {{ request()->routeIs('admin.settings.databaseSettings') ? 'active' : '' }}">
                        <i class="icon ph ph-database me-2"></i> Database Setting
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
