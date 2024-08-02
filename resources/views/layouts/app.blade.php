<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
        @if (trim($__env->yieldContent('title')))
        @yield('title') | {{ config('app.name', 'Laravel') }}
        @else
        {{ config('app.name', 'Laravel') }}
        @endif
    </title>
    <meta name="theme-color" content="#ffffff">
    @stack('before-styles')
    @vite('resources/sass/app.scss')
    @stack('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    {{-- Libreria de graficos  --}}
    <script src="{{asset('assets/js/package/dist/chart.umd.js')}}"></script>
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        
        <div class="sidebar-brand d-none d-md-flex">
            <img style="height: 50px" src="{{ asset('img/Logo2.png') }}" alt="">
            <h6>SIGRCMA</h6>
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                
            </svg>
        </div>
        @include('layouts.navigation')
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- Header block -->
        @include('layouts.includes.header')
        <!-- / Header block -->

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <!-- Errors block -->
                @include('layouts.includes.errors')
                <!-- / Errors block -->
                <div class="mb-4">@yield('content')</div>
                <div class="mb-4">@yield('script')</div>
            </div>
        </div>

        <!-- Footer block -->
        @include('layouts.includes.footer')
        <!-- / Footer block -->
    </div>

    <!-- Scripts -->
    @stack('before-scripts')

    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    
    @vite('resources/js/app.js')

    @stack('after-scripts')
    <!-- / Scripts -->

</body>

</html>