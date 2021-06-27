@php
    $Seo = DB::table('seos')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $Seo->meta_author }}">
        <meta name="keyword" content="{{ $Seo->meta_keyword }}">
        <meta name="description" content="{{ $Seo->meta_description }}">
        <meta name="google-verification" content="{{ $Seo->google_verification }}">
        <title>{{ $Seo->meta_title }}</title>

        <link href=" {{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/css/menu.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href=" {{ asset('frontend/assets/style.css') }}" rel="stylesheet">

        @yield('header')

    </head>
    <body>