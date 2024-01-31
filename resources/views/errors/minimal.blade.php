<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite('resources/js/app.js')

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-stone-900 items-center pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div
                    class="border border-gold-1 p-5 rounded-lg hover:shadow-lg hover:shadow-gold-1/50 hover:scale-110 transition duration-500">
                    <img src="{{ Storage::url('assets/images/logo.png') }}" alt="Logo" class="mb-8 h-40 mx-auto">
                </div>
                <div class="flex items-center justify-center mt-12">
                    <div class="text-center">
                        <h1 class="text-4xl font-semibold text-gold-2">
                            @yield('messageTitle')
                        </h1>
                        <p class="text-lg text-gold-1 mt-5">
                            @yield('message')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
