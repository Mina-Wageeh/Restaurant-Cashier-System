<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Restaurant Cashier</title>
    <!-- Bootstrap CSS -->
    @include('layouts.src.css-links')
</head>

<body class="">
    <div class="wrapper">

{{--        @include('partials.header')--}}

            <div class="">
                   @yield('content')
            </div>

{{--        @include('partials.footer')--}}

    </div>

@include('layouts.src.js-scripts')
@yield('scripts')
</body>

</html>
