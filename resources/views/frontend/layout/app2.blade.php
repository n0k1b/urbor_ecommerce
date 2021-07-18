<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="#" rel="apple-touch-icon">
    <link href="#" rel="icon">
    {{-- <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content=""> --}}
    <title>Urbor</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/fonts/Linearicons/Font/demo-files/demo.css">

    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/css/style.css?{{ time() }}">
    <style>
        .ps-header--center .header-inner {
            padding: 6px 0;
        }
    </style>
    @yield('page_css')
</head>

<body>
    <?php
    $company_info =DB::table('company_infos')->first();
    ?>
    <header class="header">
        <div class="ps-top-bar">
            <div class="container">
                <div class="top-bar">
                    <div class="top-bar__left">

                    </div>
                    <div class="top-bar__right">
                        <ul class="nav-top">
                            <li class="nav-top-item contact"><a class="nav-top-link" href="tel:970978-6290"> <i class="icon-telephone"></i><span>Hotline:</span><span class="text-success font-bold">{{ $company_info->contact_no1 }}</span></a></li>



                          @if(auth()->check())
                          <li class="nav-top-item"><a class="nav-top-link" href="{{ url('order_list') }}">Order Tracking</a></li>
                            <li class="nav-top-item account"><a class="nav-top-link" href="javascript:void(0);"> <i class="icon-user"></i>Hi! <span class="font-bold">{{ auth()->user()->name }}</span></a>
                                <div class="account--dropdown">
                                    <div class="account-anchor">
                                        <div class="triangle"></div>
                                    </div>
                                    <div class="account__content">
                                        <ul class="account-list">
                                            <li class="title-item"> <a href="javascript:void(0);">My Account</a>
                                            </li>
                                            <li> <a href="#">Dasdboard</a>
                                            </li>
                                            <li> <a href="#">Account Setting</a>
                                            </li>
                                            <li> <a href="#">Orders</a>
                                            </li>
                                            <li> <a href="#">Wishlist</a>
                                            </li>
                                            <li> <a href="#">Shipping Address</a>
                                            </li>
                                        </ul>
                                        <hr>

                                        <hr><a class="account-logout" href="{{ route('logout') }}"><i class="icon-exit-left"></i>Log out</a>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li class="nav-top-item account"><a class="nav-top-link" href="{{url('login')}}"> <i class="icon-user" style="color:#3fc979"></i> <span class="font-bold" style="color:#3fc979">LOGIN</span></a>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-header--center header--mobile">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left">
                        <button class="navbar-toggler"><i class="icon-menu"></i></button>
                    </div>
                    <div class="header-inner__center"><a class="logo open" href="{{ url('/') }}"><img src="{{ asset('image') }}/logo2.png?{{ time() }}" style="height: 70px"></div>
                    <div class="header-inner__right">
                        <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="ps-header--center header-desktop">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left"><a class="logo" href="{{ url('/') }}"><img src="{{ asset('image') }}/logo2.png?{{ time() }}" style="height: 70px"></a>
                        <ul class="menu">
                            <li class="menu-item-has-children has-mega-menu">
                                <button class="category-toggler"><i class="icon-menu"></i></button>
                                <div class="mega-menu mega-menu-category">
                                    <ul class="menu--mobile menu--horizontal" id="category_list">







                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="header-inner__center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                               <i class="icon-magnifier search"></i>
                            </div>
                            <input class="form-control input-search" id="search_input" onkeyup="search_product()" placeholder="I'm searchching for...">
                            <div class="input-group-append">
                                <button class="btn">Search</button>
                            </div>
                        </div>

                        <div class="result-search">
                            <input type = 'hidden' id="toggle_state" value="close">
                            <ul class="list-result" id="search_result">





                            </ul>
                        </div>
                    </div>
                    {{-- cart start --}}
                    <div class="header-inner__right">
                      <a class="button-icon icon-md" href="#"><i class="icon-heart"></i><span class="badge bg-warning">2</span></a>
                        <div class="button-icon btn-cart-header"><i class="icon-cart icon-Ecommerce5"></i><span class="badge bg-warning" id="cart_itemt_count"></span>
                            <div class="mini-cart">
                                <div class="mini-cart--content">
                                    <div class="mini-cart--overlay"></div>
                                    <div class="mini-cart--slidebar cart--box">
                                        <div class="mini-cart__header">
                                            <div class="cart-header-title">
                                                <h5>Ecommerceping Cart(3)</h5><a class="close-cart" href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div id="cart_box">


                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- cart end --}}
                </div>
            </div>
        </section>

        <div class="mobile-search--slidebar">
            <div class="mobile-search--content">
                <div class="mobile-search__header">
                    <div class="mobile-search-box">
                        <div class="input-group">
                            <input class="form-control input-search" id="search_input_mobile" onkeyup="search_product_mobile()" placeholder="I'm searchching for...">
                            {{-- <input class="form-control" placeholder="I'm Ecommerceping for..." id="inputSearchMobile"> --}}
                            <div class="input-group-append">
                                <button class="btn"> <i class="icon-magnifier"></i></button>
                            </div>
                        </div>
                        <button class="cancel-search"><i class="icon-cross"></i></button>
                    </div>
                </div>


                <div class="mobile-search__result">
                    <h5> <span class="number-result">5</span>search result</h5>
                    <ul class="list-result"  id="search_result_mobile" >


                    </ul>
                </div>
            </div>
        </div>
    </header>
   @yield('main_content')
    <div class="modal fade" id="cart_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

    </div>
    <footer class="ps-footer">
        <div class="container">
            <div class="ps-footer--contact">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <p class="contact__title">Contact Us</p>
                        <p><b><i class="icon-telephone"> </i>Hotline: </b></p>
                        <p class="telephone">{{ $company_info->contact_no1 }}<br><p>{{ $company_info->contact_no1 }}</p>
                        <p> <b>Head office: </b>{{ $company_info->address }}</p>
                        <p> <b>Email us: </b><a href="http://nouthemes.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fa898f8a8a95888eba9c9b88979b888ed4999597">{{ $company_info->email }}</a></p>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <p class="contact__title">Help & Info<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                                <ul class="footer-list">
                                    <li> <a href="#">About Us</a>
                                    </li>
                                    <li> <a href="#">Contact</a>
                                    </li>
                                    <li> <a href="#">Sore Locations</a>
                                    </li>
                                    <li> <a href="#">Terms of Use</a>
                                    </li>
                                    <li> <a href="#">Policy</a>
                                    </li>
                                    <li> <a href="#">Flash Sale</a>
                                    </li>
                                    <li> <a href="#">FAQs</a>
                                    </li>
                                </ul>
                                <hr>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <p class="contact__title">Newsletter Subscription</p>
                        <p>Join our email subscription now to get updates on <b>promotions </b>and <b>coupons.</b></p>
                        <div class="input-group">
                            <div class="input-group-prepend"><i class="icon-envelope"></i></div>
                            <input class="form-control" type="text" placeholder="Enter your email...">
                            <div class="input-group-append">
                                <button class="btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer--service">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="service__payment"><img src="{{asset('assets')}}/frontend/img/promotion/payment_paypal.jpg" alt><img src="{{asset('assets')}}/frontend/img/promotion/payment_visa.jpg" alt><img src="{{asset('assets')}}/frontend/img/promotion/payment_mastercart.jpg" alt><img src="{{asset('assets')}}/frontend/img/promotion/payment_electron.jpg" alt><img src="{{asset('assets')}}/frontend/img/promotion/payment_skrill.jpg" alt></div>
                        <p class="service__app">Get Urbor App </p>
                        <div class="service__download"><a href="#"><img src="{{asset('assets')}}/frontend/img/promotion/appStore.jpg" alt></a><a href="#"><img src="{{asset('assets')}}/frontend/img/promotion/googlePlay.jpg" alt></a></div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="service--block">
                            <p class="service__item"> <i class="icon-speed-fast"></i><span> <b>Fast Delivery </b>& Shipping</span></p>
                            <p class="service__item"> <i class="icon-color-sampler"></i><span>Top <b>Offers</b></span></p>
                            <p class="service__item"> <i class="icon-wallet"></i><span>Money <b>Cashback</b></span></p>
                            <p class="service__item"> <i class="icon-bubble-user"></i><span>Friendly <b>Support 24/7</b></span></p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </footer>
    <div class="ps-footer-mobile">
        <div class="menu__content">
            <ul class="menu--footer">
                <li class="nav-item"><a class="nav-link" href="#"><i class="icon-home3"></i><span>Home</span></a></li>
                <li class="nav-item"><a class="nav-link footer-category" href="javascript:void(0);"><i class="icon-list"></i><span>Category</span></a></li>
                <li class="nav-item"><a class="nav-link footer-cart" href="#"><i class="icon-cart"></i><span class="badge bg-warning">3</span><span>Cart</span></a></li>

                <li class="nav-item"><a class="nav-link" href="#"><i class="icon-user"></i><span>Account</span></a></li>
            </ul>
        </div>
    </div>
    <button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>
    <div class="ps-category--mobile">
        <div class="category__header">
            <div class="category__title">All Departments</div><span class="category__close"><i class="icon-cross"></i></span>
        </div>
        <div class="category__content">
            <ul class="menu--mobile">


                <li class="menu-item-has-children category-item"><a href="#">Category 2</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li> <a href="#">Sub Category 1</a>
                        </li>
                        <li> <a href="#">Sub Category 2</a>
                        </li>
                        <li> <a href="#">Sub Category 3</a>
                        </li>
                        <li> <a href="#">Sub Category 4</a>
                        </li>
                        <li> <a href="#">Sub Category 5</a>
                        </li>
                        <li> <a href="#">Sub Category 6</a>
                        </li>
                        <li> <a href="#">Sub Category 7</a>
                        </li>
                        <li> <a href="#">Sub Category 8</a>
                        </li>

                    </ul>
                </li>




            </ul>
        </div>
    </div>
    <nav class="navigation--mobile">
        <div class="navigation__header">
            <div class="navigation__select">
                <div class="languages"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-languages">English</span><i class="icon-chevron-down"></i></a>
                    <div class="select--dropdown">
                        <ul class="select-languages">
                            <li class="active language-item" data-value="English"><a href="javascript:void(0);">English</a></li>
                            <li class="language-item" data-value="Brunei"><a href="javascript:void(0);">Brunei</a></li>
                            <li class="language-item" data-value="Armenia"><a href="javascript:void(0);">Armenia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="currency"><a class="nav-top-link" href="javascript:void(0);"> <span class="current-currency">USD</span><i class="icon-chevron-down"></i></a>
                    <div class="select--dropdown">
                        <ul class="select-currency">
                            <li class="active currency-item" data-value="USD"><a href="javascript:void(0);">USD</a></li>
                            <li class="currency-item" data-value="VND"><a href="javascript:void(0);">VND</a></li>
                            <li class="currency-item" data-value="EUR"><a href="javascript:void(0);">EUR</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation-title">
                <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>
                <div><span> <i class="icon-user"></i>Hi, </span><span class="account">Morgan Averill</span><a class="dropdown-user" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-chevron-down"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownAccount"><a class="dropdown-item" href="#"><b>My Account</b></a><a class="dropdown-item" href="#">Dashboard</a><a class="dropdown-item" href="#">Account Setting</a><a class="dropdown-item" href="#">Orders</a><a class="dropdown-item" href="#">Wishlist</a><a class="dropdown-item" href="#">Shipping Address</a><a class="dropdown-item" href="#"><i class="icon-exit-left"></i>Log out</a></div>
                </div>
            </div>
        </div>
        <div class="navigation__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="#">Home</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li> <a href="#">Home Supermarket</a>
                        </li>
                        <li> <a href="#">Home Supermarket Full Width</a>
                        </li>
                        <li> <a href="#">Home Local Store</a>
                        </li>
                        <li> <a href="#">Home Sidebar</a>
                        </li>
                        <li> <a href="#">Home Business</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Ecommerce</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li> <a href="#">Ecommerce Default View Grid</a>
                        </li>
                        <li> <a href="#">Ecommerce Default View Listing</a>
                        </li>
                        <li> <a href="#">Ecommerce Default View Products</a>
                        </li>
                        <li> <a href="#">Ecommerce Categories</a>
                        </li>
                        <li> <a href="#">Ecommerce With Banner</a>
                        </li>
                        <li> <a href="#">Ecommerce All Brands</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Pages</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li> <a href="#">Vendor Register</a>
                        </li>
                        <li> <a href="#">Become a Vendor</a>
                        </li>
                        <li> <a href="#">Dokan Store List</a>
                        </li>
                        <li> <a href="#">Dokan Vendor Store</a>
                        </li>
                        <li> <a href="#">Flash Sale</a>
                        </li>
                        <li> <a href="#">About Us</a>
                        </li>
                        <li> <a href="#">Contact</a>
                        </li>
                        <li> <a href="#">FAQs</a>
                        </li>
                        <li> <a href="#">404 Not Found</a>
                        </li>
                        <li> <a href="#l">Coming Soon</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Blog</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li> <a href="#">01 Blog-Default</a>
                        </li>
                        <li> <a href="#">Blog Small Thumbnail</a>
                        </li>
                        <li> <a href="#">Blog Gird</a>
                        </li>
                        <li> <a href="#">Blog Listing</a>
                        </li>
                        <li> <a href="#">Single Post without Sidebar</a>
                        </li>
                        <li> <a href="#">Single Post with Sidebar</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"> <a href="#">Brand</a>
                </li>
                <li class="menu-item-has-children"> <a href="#">Flash Sale</a>
                </li>
            </ul>
            <ul class="menu--mobile">
                <li class="daily-deals"><a>daily deals</a></li>
            </ul>
        </div>
        <div class="navigation__footer">
            <ul class="menu--icon">
                <li class="footer-item"><a class="footer-link" href="#"><i class="icon-history2"></i><span>Recent viewed product</span></a></li>
                <li class="footer-item"><a class="footer-link" href="#"><i class="icon-cube"></i><span>Become a vendor</span></a></li>
                <li class="footer-item"><a class="footer-link" href="#"><i class="icon-question-circle"></i><span>Help & Contact</span></a></li>
                <li class="footer-item"><a class="footer-link" href="#"><i class="icon-telephone"></i><span>HOTLINE: <span class='text-success'>{{ $company_info->contact_no1 }}</span></span></a></li>
            </ul>
        </div>
    </nav>
    <script src="{{asset('assets')}}/frontend/plugins/jquery.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/popper.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/jquery.matchHeight-min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/select2/dist/js/select2.min.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/slick/slick.js"></script>
    <script src="{{asset('assets')}}/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>



    <!-- custom code-->
    <script src="{{asset('assets')}}/frontend/js/main.js?{{ time() }}"></script>
    <script src="{{asset('assets')}}/frontend/js/custom.js"></script>
    <script src="{{asset('assets')}}/frontend/js/frontend.js?{{ time() }}"></script>
    {{-- <script src="{{asset('assets')}}/frontend/js/cart.js?{{ time() }}"></script> --}}
    @yield('page_js')




</body>


<!-- Mirrored from nouthemes.net/html/farmart/home-local-store.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Dec 2020 07:07:24 GMT -->
</html>
