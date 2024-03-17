<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Garage</title>
</head>
@stack('style')

<body>
    @yield('sidebar')
    <div class="container-fluid">
        @hasSection('section')
            @yield('section')
        @else
            <h2>Content Not Found</h2>
        @endif
    </div>
    @stack('script')
</body>

</html>
