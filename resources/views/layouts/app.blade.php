<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts: Kalam for that wobbly handwritten feel, Quicksand for readable body text -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=kalam:400,700|quicksand:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Quicksand', sans-serif;
                background-color: #FFF6E9;
                background-image: radial-gradient(#E8DFC8 1.5px, transparent 1.5px);
                background-size: 22px 22px;
            }
            h1, h2, h3, .font-doodle {
                font-family: 'Kalam', cursive;
            }
            .doodle-card {
                background: #FFFDF8;
                border: 3px solid #2E2A24;
                border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px;
                box-shadow: 6px 6px 0px #2E2A24;
            }
            .doodle-btn {
                border: 3px solid #2E2A24;
                border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px;
                box-shadow: 4px 4px 0px #2E2A24;
                transition: transform 0.15s ease;
            }
            .doodle-btn:hover {
                transform: translate(2px, 2px);
                box-shadow: 2px 2px 0px #2E2A24;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen text-[#2E2A24]">
            @include('layouts.navigation')

            <!-- Squiggly hand-drawn divider under the nav -->
            <div class="w-full overflow-hidden leading-[0]">
                <svg viewBox="0 0 1200 20" preserveAspectRatio="none" class="w-full h-4">
                    <path d="M0,10 Q30,0 60,10 T120,10 T180,10 T240,10 T300,10 T360,10 T420,10 T480,10 T540,10 T600,10 T660,10 T720,10 T780,10 T840,10 T900,10 T960,10 T1020,10 T1080,10 T1140,10 T1200,10"
                          fill="none" stroke="#2E2A24" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
