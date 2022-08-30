<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.css')
    <title>Laravel Yajra Table</title>
</head>
<body>
<section class="dashboard">
    <div class="menuSec">
        <div class="container">
            <div class="row">
                <!-- content start -->
                @yield('content')
                <!-- content ends -->
            </div>
        </div>
    </div>
</section>
</body>
@include('layouts.js')
</html>
