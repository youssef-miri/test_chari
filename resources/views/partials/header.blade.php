<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-top-1.png') }}">
    <link href="{{ asset('css/fontfamily2.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/color-01.css') }}">
</head>
<body class="home-page home-01 ">

<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>

<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{ route('boutique')}}" class="link-to-home"><img src="{{ asset('images/logo-top-1.png') }}" alt="Chari.ma"></a>
                    </div>
                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section minicart">
                            <a href="{{ route('cart')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <p class="index" style="margin: 0;"> <span id="nbrprcart"> @isset($cart) {{ count($cart) }} @endisset </span> items</p>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="nav-section header-sticky">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="{{ route('boutique')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('listproduit')}}" class="link-term mercado-item-title">Produits</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('listcat')}}" class="link-term mercado-item-title">Categories</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('listprom')}}" class="link-term mercado-item-title">promotions</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('boutique')}}" class="link-term mercado-item-title">Boutique</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('cart')}}" class="link-term mercado-item-title">Chariot</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('checkout')}}" class="link-term mercado-item-title">Check-out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>