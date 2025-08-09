<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>MarketPro - E-commerce HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/images/logo/favicon.png') }}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}" />
    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('theme/css/select2.min.css') }}" />
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" />
    <!-- Jquery Ui -->
    <link rel="stylesheet" href="{{ asset('theme/css/jquery-ui.css') }}" />
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}" />
    <!-- AOS Animation -->
    <link rel="stylesheet" href="{{ asset('theme/css/aos.css') }}" />
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
</head>

<body>
    <!--==================== Preloader Start ====================-->
    <div class="preloader">
        <div id="lottie-preloader" style="width:150px;height:150px;margin:auto;"></div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lottie.loadAnimation({
                container: document.getElementById('lottie-preloader'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: "{{ asset('theme/animations/preloader.json') }}"
            });
        });
    </script>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- ==================== Search Box Start Here ==================== -->
    <form action="#" class="search-box">
        <button type="button"
            class="w-48 h-48 m-16 text-2xl text-white border border-gray-100 search-box__close position-absolute inset-block-start-0 inset-inline-end-0 rounded-circle flex-center hover-text-gray-800 hover-bg-white transition-1">
            <i class="ph ph-x"></i>
        </button>
        <div class="container">
            <div class="position-relative">
                <input type="text" class="px-24 py-16 text-xl form-control rounded-pill pe-64"
                    placeholder="Search for a product or brand" />
                <button type="submit"
                    class="w-48 h-48 text-xl text-white bg-warning-900 rounded-circle flex-center position-absolute top-50 translate-middle-y inset-inline-end-0 me-8">
                    <i class="ph ph-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- ==================== Search Box End Here ==================== -->

    <!-- ==================== Mobile Menu Start Here ==================== -->
    <div class="mobile-menu scroll-sm d-lg-none d-block">
        <button type="button" class="close-button">
            <i class="ph ph-x"></i>
        </button>
        <div class="mobile-menu__inner">
            <a href="{{ route('home') }}" class="mobile-menu__logo">
                <img src="{{ asset('theme/images/logo/logo.png') }}" alt="Logo" />
            </a>
            <div class="mobile-menu__menu">
                <!-- Nav Menu Start -->
                <ul class="nav-menu flex-align nav-menu--mobile">
                    <li class="on-hover-item nav-menu__item has-submenu activePage">
                        <a href="{{ route('home') }}" class="nav-menu__link text-heading-two">Home</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item activePage">
                                <a href="{{ route('home') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Home Grocery</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('home.two') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Home Electronics</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('home.three') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Home Fashion</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <a href="{{ route('shop') }}" class="nav-menu__link text-heading-two">Shop</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('shop') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Shop</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="#"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Shop Details</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('product.details.two') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Shop Details Two</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        {{-- <span class="px-8 py-2 text-sm text-white badge-notification bg-warning-600 rounded-4">New</span> --}}
                        <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Pages</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('cart') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Cart</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('wishlist') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Wishlist</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('checkout') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Checkout
                                </a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('become.seller') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Become Seller</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('account') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        {{-- <span class="px-8 py-2 text-sm text-white badge-notification bg-tertiary-600 rounded-4">New</span> --}}
                        <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Vendors</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="vendor.html"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Vendors
                                </a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="vendor-details.html"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Vendor Details
                                </a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="vendor-two.html"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Vendors Two</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="vendor-two-details.html"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Vendors Two Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Blog</a>
                        <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('blog') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Blog</a>
                            </li>
                            <li class="common-dropdown__item nav-submenu__item">
                                <a href="{{ route('blog.details') }}"
                                    class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                    Blog Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item">
                        <a href="{{ route('contact') }}" class="nav-menu__link text-heading-two">Contact Us</a>
                    </li>
                </ul>
                <!-- Nav Menu End -->
            </div>
        </div>
    </div>
    <!-- ==================== Mobile Menu End Here ==================== -->

    <!-- ======================= Middle Top Start ========================= -->
    {{-- <div class="header-top bg-warning-900 flex-between">
        <div class="container container-lg">
            <div class="flex-wrap gap-8 flex-between">
                <div class="gap-10 d-flex align-items-center">
                    <span class="text-white text-md fw-medium d-none d-md-flex">Until the end of the sale:</span>
                    <span class="text-white text-md fw-medium d-flex d-md-none">Sale end:</span>
                    <div class="gap-10 d-flex align-items-center" id="countdown25">
                        <div class="gap-4 text-white d-flex align-items-center">
                            <strong class="text-md fw-semibold days">35</strong>
                            <span class="text-xs">Days</span>
                        </div>
                        <div class="gap-4 text-white d-flex align-items-center">
                            <strong class="text-md fw-semibold hours">14</strong>
                            <span class="text-xs">Hours</span>
                        </div>
                        <div class="gap-4 text-white d-flex align-items-center">
                            <strong class="text-md fw-semibold minutes">54</strong>
                            <span class="text-xs">Minutes</span>
                        </div>
                        <div class="gap-4 text-white d-flex align-items-center">
                            <strong class="text-md fw-semibold seconds">28 </strong>
                            <span class="text-xs">Sec.</span>
                        </div>
                    </div>
                </div>

                <ul class="flex-wrap flex-align d-none d-xl-flex">
                    <li class="border-right-item pe-12 me-12">
                        <span class="text-sm text-white">
                            Buy one get one free on
                            <span class="text-yellow">first order</span>
                        </span>
                    </li>
                    <li class="border-right-item pe-12 me-12">
                        <a href="javascript:void(0)"
                            class="gap-4 text-sm text-white d-flex align-items-center hover-text-decoration-underline">
                            <img src="{{ asset('theme/images/icon/track-icon.png') }}" alt="Track Icon" />
                            <span class="">Track Your Order</span>
                        </a>
                    </li>
                </ul>

                <ul class="flex-wrap w-auto gap-16 header-top__right flex-align">
                    <li class="d-lg-flex d-none">
                        <a href="#shipping" class="text-sm text-white hover-text-decoration-underline">Order
                            Tracking</a>
                    </li>
                    <li class="d-lg-flex d-none">
                        <a href="javascript:void(0)" class="text-sm text-white hover-text-decoration-underline">About
                            Us</a>
                    </li>
                    <li class="on-hover-item has-submenu arrow-white">
                        <a href="javascript:void(0)" class="py-8 text-sm text-white selected-text">Eng</a>
                        <ul
                            class="px-0 py-8 selectable-text-list on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm">
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag1.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    English
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag2.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    Japan
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag3.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    French
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag4.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    Germany
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag6.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    Bangladesh
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag5.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    South Korea
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="on-hover-item has-submenu arrow-white">
                        <a href="javascript:void(0)" class="py-8 text-sm text-white selected-text">USD</a>
                        <ul
                            class="px-0 py-8 selectable-text-list on-hover-dropdown common-dropdown common-dropdown--sm max-h-200 scroll-sm">
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag1.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    USD
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag2.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    Yen
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag3.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    Franc
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag4.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    EURO
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag6.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    BDT
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="gap-8 px-16 py-6 text-xs text-gray-500 hover-bg-gray-100 flex-align rounded-0">
                                    <img src="{{ asset('theme/images/thumbs/flag5.png') }}" alt=""
                                        class="w-16 h-12 border border-gray-100 rounded-4" />
                                    WON
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- ======================= Middle Top End ========================= -->

    <!-- ======================= Middle Header Start ========================= -->
    <header class="border-gray-100 header-middle border-bottom">
        <div class="container container-lg">
            <nav class="gap-8 header-inner flex-between">
                <!-- Logo Start -->
                <div class="logo">
                    <a href="{{ route('home') }}" class="link">
                        <img src="{{ asset('theme/images/logo/logo.png') }}" alt="Logo"
                            style="width:120px; height:auto;" />
                    </a>
                </div>
                <!-- Logo End  -->

                <!-- form location Start -->
                <form action="#" class="flex-wrap flex-align form-location-wrapper max-w-840 w-100">
                    <div
                        class="text-sm search-category select-style-one d-flex select-border-end-0 search-form d-sm-flex d-none text-heading-two w-100">
                        <select class="border js-example-basic-single border-neutral-40 border-end-0" name="state">
                            <option value="1" selected>All categories</option>
                            @if (!empty($categories))
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            @endif
                            {{-- <option value="1">Grocery</option>
                            <option value="1">Breakfast & Dairy</option>
                            <option value="1">Vegetables</option>
                            <option value="1">Milks and Dairies</option>
                            <option value="1">Pet Foods & Toy</option>
                            <option value="1">Breads & Bakery</option>
                            <option value="1">Fresh Seafood</option>
                            <option value="1">Fronzen Foods</option>
                            <option value="1">Noodles & Rice</option>
                            <option value="1">Ice Cream</option> --}}
                        </select>

                        <div class="search-form__wrapper position-relative border-half-start flex-grow-1">
                            <input type="text"
                                class="common-input border-neutral-40 py-18 ps-16 pe-76 rounded-0 rounded-end pe-44 placeholder-italic placeholder-text-sm border-start-0"
                                placeholder="Search for products, categories or brands..." />
                            <button type="submit"
                                class="w-64 text-xl text-white h-44 bg-warning-900 hover-bg-warning-700 rounded-4 flex-center position-absolute top-50 translate-middle-y inset-inline-end-0 me-6">
                                <i class="ph ph-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form location start -->

                <!-- Header Middle Right start -->
                <div class="flex-shrink-0 header-right flex-align">
                    <div class="gap-20 flex-align">
                        <button type="button" class="gap-4 search-icon flex-align d-lg-none d-flex item-hover">
                            <span class="text-2xl text-gray-700 d-flex position-relative item-hover__text">
                                <i class="ph ph-magnifying-glass"></i>
                            </span>
                        </button>
                        <a href="javascript:void(0)" class="gap-4 flex-align item-hover">
                            <span class="text-xl text-gray-700 d-flex position-relative item-hover__text">
                                <i class="ph ph-user"></i>
                            </span>
                            <span class="text-md text-heading-three item-hover__text d-none d-lg-flex">Profile</span>
                        </a>
                        <a href="{{ route('wishlist') }}" class="gap-4 flex-align item-hover">
                            <span class="mt-6 text-xl text-gray-700 d-flex position-relative me-6 item-hover__text">
                                <i class="ph ph-heart"></i>
                                <span
                                    class="w-16 h-16 text-xs text-white flex-center rounded-circle bg-warning-900 position-absolute top-n6 end-n4">2</span>
                            </span>
                            <span class="text-md text-heading-three item-hover__text d-none d-lg-flex">Wishlist</span>
                        </a>
                        <a href="{{ route('cart') }}" class="gap-4 flex-align item-hover">
                            <span class="mt-6 text-xl text-gray-700 d-flex position-relative me-6 item-hover__text">
                                <i class="ph ph-shopping-cart-simple"></i>
                                <span
                                    class="w-16 h-16 text-xs text-white flex-center rounded-circle bg-warning-900 position-absolute top-n6 end-n4">2</span>
                            </span>
                            <span class="text-md text-heading-three item-hover__text d-none d-lg-flex">Cart</span>
                        </a>
                    </div>
                </div>
                <!-- Header Middle Right End  -->
            </nav>
        </div>
    </header>
    <!-- ======================= Middle Header End ========================= -->

    <!-- ==================== Header Start Here ==================== -->
    <header class="py-10 bg-dark header border-bottom-0 box-shadow-3xl z-2">
        <div class="container container-lg">
            <nav class="gap-8 header-inner d-flex justify-content-between">
                <div class="flex-align menu-category-wrapper position-relative">
                    <!-- Category Dropdown Start -->
                    <div class="">
                        <button type="button"
                            class="gap-12 px-20 py-16 text-white category-button d-flex align-items-center bg-warning-900 rounded-6 hover-bg-warning-700 transition-2">
                            <span class="text-xl line-height-1"><i class="ph ph-squares-four"></i></span>
                            <span class="">Browse Categories</span>
                            <span class="line-height-1 icon transition-2"><i class="ph-bold ph-caret-down"></i></span>
                        </button>

                        <!-- Dropdown Start -->
                        <div
                            class="p-16 bg-white border shadow category-dropdown border-success-200 rounded-16 w-100 max-w-472 position-absolute inset-block-start-100 inset-inline-start-0 z-99 transition-2">
                            <div class="gap-4 overflow-y-auto d-grid grid-cols-3-repeat max-h-350">
                                @if (!empty($categories))

                                    @foreach ($categories as $category)
                                        <a href="{{ route('shop.category', ['slug' => $category['slug']]) }}"
                                            class="px-8 py-16 text-center border border-white rounded-8 hover-bg-main-50 d-flex flex-column align-items-center hover-border-main-100">
                                            <span class="">
                                                <img src="{{ url($category['image_url']) }}" alt="Icon"
                                                    class="w-35" />
                                            </span>
                                            <span
                                                class="mt-8 text-sm fw-semibold text-heading">{{ $category['name'] }}</span>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- Dropdown End -->
                    </div>
                    <!-- Category Dropdown End -->

                    <!-- Menu Start  -->
                    <div class="header-menu d-lg-block d-none">
                        <!-- Nav Menu Start -->
                        {{-- <ul class="nav-menu flex-align">
                            <li class="on-hover-item nav-menu__item has-submenu activePage">
                                <a href="{{ route('home') }}" class="nav-menu__link text-heading-two">Home</a>
                                <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                                    <li class="common-dropdown__item nav-submenu__item activePage">
                                        <a href="{{ route('home') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Home Grocery</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('home.two') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Home Electronics</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('home.three') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Home Fashion</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="on-hover-item nav-menu__item has-submenu">
                                <a href="{{ route('shop') }}" class="nav-menu__link text-heading-two">Shop</a>
                                <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('shop') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Shop</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('product.details') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Shop Details</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('product.details.two') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Shop Details Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="on-hover-item nav-menu__item has-submenu">
                                <span class="px-8 py-2 text-sm text-white badge-notification bg-warning-600 rounded-4">New</span>
                                <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Pages</a>
                                <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('cart') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Cart</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('wishlist') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Wishlist</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('checkout') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Checkout
                                        </a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('become.seller') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Become Seller</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('account') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Account</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="on-hover-item nav-menu__item has-submenu">
                                <span class="px-8 py-2 text-sm text-white badge-notification bg-tertiary-600 rounded-4">New</span>
                                <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Vendors</a>
                                <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="vendor.html"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Vendors
                                        </a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="vendor-details.html"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Vendor Details
                                        </a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="vendor-two.html"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Vendors Two</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="vendor-two-details.html"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Vendors Two Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="on-hover-item nav-menu__item has-submenu">
                                <a href="javascript:void(0)" class="nav-menu__link text-heading-two">Blog</a>
                                <ul class="on-hover-dropdown common-dropdown nav-submenu scroll-sm">
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('blog') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Blog</a>
                                    </li>
                                    <li class="common-dropdown__item nav-submenu__item">
                                        <a href="{{ route('blog.details') }}"
                                            class="common-dropdown__link nav-submenu__link text-heading-two hover-bg-neutral-100">
                                            Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-menu__item">
                                <a href="{{ route('contact') }}" class="nav-menu__link text-heading-two">Contact
                                    Us</a>
                            </li>
                        </ul> --}}
                        <ul class="nav-menu flex-align">
                            <li class="nav-menu__item">
                                <a href="{{ route('home') }}" class="text-white nav-menu__link">Home</a>
                            </li>
                            <li class="nav-menu__item">
                                <a href="{{ route('shop') }}" class="text-white nav-menu__link">Shop</a>
                            </li>
                            <li class="nav-menu__item">
                                <a href="{{ route('become.seller') }}" class="text-white nav-menu__link">Become
                                    Seller</a>
                            </li>
                            <li class="nav-menu__item">
                                <a href="{{ route('blog') }}" class="text-white nav-menu__link">Blog</a>
                            </li>
                            <li class="nav-menu__item">
                                <a href="{{ route('contact') }}" class="text-white nav-menu__link">Contact
                                    Us</a>
                            </li>
                        </ul>
                        <!-- Nav Menu End -->
                    </div>
                    <!-- Menu End  -->
                </div>

                <!-- Header Right start -->
                <div class="gap-20 header-right flex-align">
                    <a href="tel:+(2)871382023" class="gap-16 d-sm-flex align-items-center d-none">
                        <span class="d-flex text-32">
                            <img src="{{ asset('theme/images/icon/mobile.png') }}" alt="Mobile Icon" />
                        </span>
                        <span class="">
                            <span class="text-white d-block fw-medium">Need any Help! call Us</span>
                            <span class="d-block fw-bold text-warning-900 hover-text-decoration-underline">+(2) 871 382
                                023</span>
                        </span>
                    </a>
                    <button type="button" class="text-4xl text-gray-800 toggle-mobileMenu d-lg-none ms-3n d-flex">
                        <i class="ph ph-list"></i>
                    </button>
                </div>
                <!-- Header Right End  -->
            </nav>
        </div>
    </header>
    <!-- ==================== Header End Here ==================== -->
    @yield('main')
    <!-- ==================== Footer Start Here ==================== -->
    <footer class="footer py-120">
        <div class="container container-lg">
            <div class="flex-wrap footer-item-wrapper d-flex align-items-start">
                <div class="footer-item" data-aos="fade-up" data-aos-duration="200">
                    <div class="max-w-340">
                        <div class="footer-item__logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('theme/images/logo/logo.png') }}" alt="" /></a>
                        </div>
                        <p class="mb-28 text-heading">
                            We're Grocery Shop, an innovative team of food supliers.
                        </p>

                        <div class="gap-8 d-flex flex-column">
                            <p class="text-heading fw-medium">
                                2972 Westheimer Rd. Santa Ana, Illinois 85486
                            </p>
                            <a href="mailto:support@example.com"
                                class="text-heading fw-medium hover-text-main-600">support@example.com</a>
                            <a href="tel:+(406)555-0120" class="text-heading fw-medium hover-text-main-600">+ (406)
                                555-0120</a>
                        </div>
                    </div>
                </div>

                <div class="footer-item" data-aos="fade-up" data-aos-duration="400">
                    <h6 class="footer-item__title">Information</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Become a
                                Vendor</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Affiliate
                                Program</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Privacy Policy</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Our Suppliers</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Extended Plan</a>
                        </li>
                        <li class="">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Community</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item" data-aos="fade-up" data-aos-duration="600">
                    <h6 class="footer-item__title">Customer Support</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Help Center</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('contact') }}" class="text-heading hover-text-main-600">Contact Us</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Report Abuse</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Submit and
                                Dispute</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Policies &
                                Rules</a>
                        </li>
                        <li class="">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Online
                                Shopping</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item" data-aos="fade-up" data-aos-duration="800">
                    <h6 class="footer-item__title">My Account</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">My Account</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Order History</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Shoping Cart</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Compare</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Help Ticket</a>
                        </li>
                        <li class="">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Wishlist</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item" data-aos="fade-up" data-aos-duration="1000">
                    <h6 class="footer-item__title">Daily Groceries</h6>
                    <ul class="footer-menu">
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Dairy & Eggs</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Meat &
                                Seafood</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Breakfast
                                Food</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Household
                                Supplies</a>
                        </li>
                        <li class="mb-16">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Bread &
                                Bakery</a>
                        </li>
                        <li class="">
                            <a href="{{ route('shop') }}" class="text-heading hover-text-main-600">Pantry
                                Staples</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-item" data-aos="fade-up" data-aos-duration="1200">
                    <h6 class="">Shop on The Go</h6>
                    <p class="mb-16">MarketPro App is available. Get it now</p>
                    <div class="my-32">
                        <div class="gap-8 flex-align">
                            <div class="p-1 bg-white rounded-10 box-shadow-5xl">
                                <img src="{{ asset('theme/images/thumbs/qr-code.png') }}" alt="QR Code" />
                            </div>
                            <div class="gap-16 d-flex flex-column">
                                <a href="https://www.apple.com/app-store"
                                    class="gap-8 px-32 text-sm py-14 d-flex justify-content-center align-items-center fw-medium text-heading hover-bg-warning-900 hover-text-white box-shadow-6xl rounded-6">
                                    <i class="ph-fill ph-apple-logo"></i>
                                    Google play
                                </a>
                                <a href="https://www.apple.com/app-store"
                                    class="gap-8 px-32 text-sm py-14 d-flex justify-content-center align-items-center fw-medium text-heading hover-bg-warning-900 hover-text-white box-shadow-6xl rounded-6">
                                    <img src="{{ asset('theme/images/icon/google-play.svg') }}" alt="Play Store" />
                                    Google play
                                </a>
                            </div>
                        </div>
                        <div class="mt-24">
                            <img src="{{ asset('theme/images/thumbs/method.png') }}" alt="Method " />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- bottom Footer -->
    <div class="py-8 bottom-footer">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 py-16 bottom-footer__inner flex-between border-top border-neutral-50">
                <p class="bottom-footer__text text-heading wow fadeInLeft fw-medium">
                    Copyright &copy;
                    <span class="text-success-600 fw-semibold">2025</span> Ui-drops All
                    Rights Reserved
                </p>
                <div class="flex-wrap gap-8 flex-align wow fadeInRight">
                    <ul class="gap-16 flex-align">
                        <li>
                            <a href="https://www.facebook.com"
                                class="text-xl bg-white shadow-sm w-44 h-44 flex-center text-main-600 rounded-circle hover-bg-warning-900 hover-text-white">
                                <i class="ph-fill ph-facebook-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com"
                                class="text-xl bg-white shadow-sm w-44 h-44 flex-center text-main-600 rounded-circle hover-bg-warning-900 hover-text-white">
                                <i class="ph-fill ph-twitter-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com"
                                class="text-xl bg-white shadow-sm w-44 h-44 flex-center text-main-600 rounded-circle hover-bg-warning-900 hover-text-white">
                                <i class="ph-fill ph-instagram-logo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com"
                                class="text-xl bg-white shadow-sm w-44 h-44 flex-center text-main-600 rounded-circle hover-bg-warning-900 hover-text-white">
                                <i class="ph-fill ph-linkedin-logo"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ==================== Footer End Here ==================== -->

    <!-- Jquery js -->
    <script src="{{ asset('theme/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('theme/js/boostrap.bundle.min.js') }}"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('theme/js/phosphor-icon.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{ asset('theme/js/select2.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <!-- count down js -->
    <script src="{{ asset('theme/js/count-down.js') }}"></script>
    <!-- jquery UI js -->
    <script src="{{ asset('theme/js/jquery-ui.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('theme/js/wow.min.js') }}"></script>
    <!-- AOS Animation -->
    <script src="{{ asset('theme/js/aos.js') }}"></script>
    <!-- marque -->
    <script src="{{ asset('theme/js/marque.min.js') }}"></script>
    <!-- marque -->
    <script src="{{ asset('theme/js/vanilla-tilt.min.js') }}"></script>
    <!-- Counter -->
    <script src="{{ asset('theme/js/counter.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
</body>

</html>
