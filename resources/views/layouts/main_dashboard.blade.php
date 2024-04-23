<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}">
    <title>My Garage</title>
</head>
@stack('style')

<body>
    @include('layouts.member_sidenavbar')
    <div class="container-fluid">
        @hasSection('section')
            @yield('section')
        @else
            <h2>Content Not Found</h2>
        @endif
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/src/sweetalert2.js') }}"></script>
    @stack('script')
</body>

</html>
