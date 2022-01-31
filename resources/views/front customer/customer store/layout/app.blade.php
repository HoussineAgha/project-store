<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('customer-store/css/flex-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('customer-store/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('customer-store/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('customer-store/css/tooplate-main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>@yield('title')</title>


</head>
<body>

    @section('style')

    @show

    @include('front customer.customer store.layout.header')

    @yield('content3')

    @include('front customer.customer store.layout.footer')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('customer-store/js/flex-slider.js') }}"></script>
<script src="{{ asset('customer-store/js/isotope.js') }}"></script>
<script src="{{ asset('customer-store/js/owl.js') }}"></script>
<script src="{{ asset('js/javascript.js') }}"></script>

@section('script')

@show

</body>
</html>