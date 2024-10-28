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
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/backend/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.css"
    rel="stylesheet"/>

    @livewireStyles
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @livewireStyles
</head>


<body>
    @include('sweetalert::alert')

    <!--  Body Wrapper -->
    {{-- <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed"> --}}
        <!-- Sidebar Start -->
       @include('admin.adminSidebar')

       @include('admin.adminHeader')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        @yield('adminContent')
        {{-- <div class="body-wrapper">
            <!--  Header Start -->
            <!--  Header End -->
        </div> --}}
    {{-- </div> --}}
    @livewireScripts
    <script src="{{ asset('assets/backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{ asset('assets/backend/js/dashboard.js') }}"></script>
    @livewireScripts
</body>

</html>
