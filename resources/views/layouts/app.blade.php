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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- admin lte  --}}
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
        <script src="{{ asset('js/adminlte.js') }}" ></script>
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')
        @include('layouts.sidebar')
            <div class="content-wrapper">
                <section class="content p-0">

                    @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif



                    @if($message = Session::get('error'))
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    @yield('content')
                </section>
            </div>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
              // Get the current page URL
              var currentPageUrl = window.location.href;

              // Get all sidebar links
              var sidebarLinks = document.querySelectorAll('.nav-link');

              // Loop through each sidebar link and check if it matches the current page URL
              sidebarLinks.forEach(function(link) {
                if (link.href === currentPageUrl) {
                  link.classList.add('active'); // Add "active" class to the link
                }
              });
            </script>
    </body>
</html>
