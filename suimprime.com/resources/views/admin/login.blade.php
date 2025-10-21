<!doctype html>
<html lang="en" data-bs-theme="dark" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title data-setting="app_name" data-rightJoin=" Responsive Bootstrap 5 Admin Dashboard Template">Admin Login
        </title>
        <meta name="description"
            content="Streamit is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules.">
        <meta name="keywords"
            content="premium, admin, dashboard, template, bootstrap 5, clean ui, streamit, admin dashboard,responsive dashboard, optimized dashboard, simple auth">
        <meta name="author" content="Iqonic Design">
        <meta name="DC.title" content="Streamit Simple | Responsive Bootstrap 5 Admin Dashboard Template">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Library / Plugin Css Build -->
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            {{-- No code --}}
        @endif
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pro.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">


        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300&amp;display=swap"
            rel="stylesheet">

        <style>
            :root {}
        </style>
    </head>
    <body>
        <!-- Loader Start -->
        <div id="loading">
        </div>
        <!-- Loader End -->
        <div style="background-image: url('../assets/dummy-images/login_banner.jpg')">
            <div class="container">
                <div class="row justify-content-center align-items-center vh-100">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="/admin/login">
                                        <img class="logo-normal img-fluid"
                                            src="{{ asset(\App\Models\Setting::get('logo_dark')) }}" height="30"
                                            alt="Logo">
                                    </a>
                                </div>

                                <div>
                                    <!-- Session Status -->
                                    <!-- Social Login -->
                                    <!-- Validation Errors -->
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <form method="POST" action="{{ route('admin.login.submit') }}">
                                        @csrf
                                        <!-- Email -->
                                        <div>
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Email" required autofocus>
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control" id="password" type="password" name="password"
                                                placeholder="Enter Password" required>
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mt-4">
                                            <label for="remember_me" class="d-inline-flex">
                                                <input id="remember_me" type="checkbox" class="form-check-input"
                                                    name="remember">
                                                <span class="ms-2">Remember Me</span>
                                            </label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4">
                                            <a href="">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary"
                                                id="submit-btn">Login</button>
                                        </div>
                                    </form>

                                    <div class="d-none">
                                        <h6 class="text-center border-top py-3 mt-3">Demo Accounts</h6>
                                        <div class="parent">

                                            <select name="select" id="SelectUser" class="form-control selectpiker"
                                                onchange="if (!window.__cfRLUnblockHandlers) return false; getSelectedOption()"
                                                data-cf-modified-4a8333e0b6f24015c9e3c462-="">
                                                <option value="">Select Role</option>
                                                <option value="12345678,admin@gmail.com">Admin</option>
                                                <option value="12345678,admin@gmail.com" selected>Demo Admin</option>
                                                <option value="secret,test@example.com">User</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-center mt-3 d-none">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <style>
                .select2-container--default .select2-selection--single .select2-selection__rendered {
                    line-height: inherit;
                }

                .select2-container--default .select2-selection--single .select2-selection__arrow,
                .select2-container--default .select2-selection--single .select2-selection__clear,
                .select2-container--classic .select2-selection--single .select2-selection__arrow {
                    height: 100%;
                }
            </style>

            <!-- Select2 JS -->
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript"></script>

            <script type="text/javascript">
                window.onload = function() {
                    getSelectedOption();
                };

                $(document).ready(function() {
                    $('#SelectUser').select2({
                        placeholder: "Select Role",
                        minimumResultsForSearch: Infinity

                    });
                });

                function disableButton() {
                    document.getElementById('submit-btn').classList.add('disabled');
                    document.getElementById('submit-btn').innerText = 'Login...';
                }

                function getSelectedOption() {
                    var selectElement = document.getElementById("SelectUser");
                    var selectedOption = selectElement.options[selectElement.selectedIndex];

                    if (selectedOption && selectedOption.value !== "") {
                        var optionText = selectedOption.textContent || selectedOption
                            .innerText; // Get the text of the selected option
                        var optionValue = selectedOption.value; // Get the value of the selected option

                        var values = optionValue.split(",");
                        var password = values[0];
                        var email = values[1];

                        domId('email').value = email;
                        domId('password').value = password;

                    } else {
                        domId('email').value = "";
                        domId('password').value = "";
                    }
                }

                function domId(name) {
                    return document.getElementById(name)
                }

                function setLoginCredentials(type) {
                    domId('email').value = domId(type + '_email').textContent
                    domId('password').value = domId(type + '_password').textContent
                }
            </script>
        </div>
        <!-- Scripts -->
    </body>
</html>