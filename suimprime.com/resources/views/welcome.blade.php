<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Site — Page Under Construction</title>

        <!-- Tailwind CDN (quick prototype) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Optional: Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            }

            /* subtle floating animation for the illustration */
            @keyframes floatY {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .float-anim {
                animation: floatY 4s ease-in-out infinite;
            }

            /* dashed border container */
            .dashed-card {
                border: 3px dashed rgba(100, 116, 139, 0.15);
            }

            /* neon accent */
            .accent {
                background: linear-gradient(90deg, #f97316, #ef4444);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            /* small responsive tweak */
            @media (min-width: 768px) {
                .card-inner {
                    padding: 3rem;
                }
            }
        </style>
    </head>

    <body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">
        <div class="max-w-4xl w-full">
            <div class="bg-white rounded-2xl shadow-lg dashed-card p-6 sm:p-8">
                <div class="flex flex-col-reverse sm:flex-row items-center gap-6">

                    <!-- Text block -->
                    <div class="flex-1 text-center sm:text-left">
                        <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight">
                            <span class="accent">Page Under Construction</span>
                        </h1>
                        <p class="mt-3 text-slate-600">We're doing some improvements to make the site even better.
                            Thanks for your patience — we'll be back soon.</p>

                        <div class="mt-6 flex items-center justify-center sm:justify-start gap-3">
                            <a href="/"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg font-medium ring-1 ring-inset ring-slate-200 hover:shadow-sm">
                                <!-- home icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l9-9 9 9M9 21V9h6v12" />
                                </svg>
                                Go to homepage
                            </a>

                            <a href="/admin/dashboard"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-500 text-white font-medium hover:opacity-95">
                                Contact admin
                            </a>
                        </div>

                        <div class="mt-6 sm:mt-8">
                            <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                                <div class="h-3 rounded-full"
                                    style="width:42%; background: linear-gradient(90deg,#f97316,#ef4444);"></div>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">Estimated progress: <span
                                    class="font-medium">42%</span></p>
                        </div>

                        <p class="mt-6 text-xs text-slate-400">Want updates? Email <a href="mailto:admin@example.com"
                                class="underline">admin@example.com</a></p>
                    </div>

                    <!-- Illustration / icon -->
                    <div class="w-48 sm:w-56 flex-shrink-0 flex items-center justify-center">
                        <div class="bg-gradient-to-tr from-white to-slate-50 rounded-xl p-6 shadow-inner float-anim">
                            <!-- simple construction SVG -->
                            <svg width="160" height="160" viewBox="0 0 64 64" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="6" y="38" width="52" height="12" rx="2" fill="#111827"
                                    opacity="0.06" />
                                <g transform="translate(4,4)">
                                    <path d="M22 2v10" stroke="#f97316" stroke-width="2.5" stroke-linecap="round" />
                                    <path d="M10 14l12-12 12 12" stroke="#111827" stroke-width="2.2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="22" cy="24" r="10" fill="#fff" stroke="#ef4444"
                                        stroke-width="1.6" />
                                    <path d="M22 18v6l4 2" stroke="#ef4444" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </div>
                    </div>

                </div>

                <div class="mt-6 text-center text-xs text-slate-400">Laravel — Welcome Page • Built with ❤️</div>
            </div>

            <!-- small footer link -->
            <div class="mt-6 text-center text-sm text-slate-500">
                <a href="/admin" class="underline">Admin dashboard</a>
            </div>
        </div>
    </body>

</html>
