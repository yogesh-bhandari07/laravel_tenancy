<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom CSS for Theme Colors -->
    <style>
        :root {
            --oxford-blue: #334153;
            --iron: #d1d8d9;
            --hoki: #67869f;
            --pine-cone: #62544b;
            --beaver: #8d7456;
            --nepal: #91abbc;
            --natural-gray: #938c88;
            --mongoose: #baa88b;
            --hit-gray: #a8b1b9;
            --fountain-blue: #48a4b8;
            --background: #F4F6FF;
            --heading: #33372C;
            --text: #3C3D37;
            --dark-text: #F4F6FF;
            --dark-heading: #d1d8d9;

            background: var(--background);
        }

        body {
            background: var(--background);
            color: var(--text);
        }

        header {
            background-color: var(--dark-heading);
        }

        .text-heading {
            color: var(--heading);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
