<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>abaya Lotus</title>
    <meta charset="utf-8" />
    <meta data-brackets-id='7728' name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('front') }}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/font-awesome.min.css">
    {{-- @if (app()->getLocale() == 'ar') --}}
    <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/animate.min.css">
    
    {{-- @else --}}
    
    {{-- <link rel="stylesheet" href="{{ asset('front') }}/css/style_en.css"> --}}

    {{-- @endif --}}
    @yield('css')

</head>

