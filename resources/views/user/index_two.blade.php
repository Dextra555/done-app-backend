@extends('layouts.master')
@section('main')
<!-- ============================ Banner Section start =============================== -->
<div class="banner-two">
    <div class="container container-lg">
        <div class="banner-two-wrapper d-flex align-items-start">

            <div class="flex-shrink-0 w-310 d-lg-block d-none">
                <div class="p-0 border shadow-none responsive-dropdown style-two common-dropdown nav-submenu submenus-submenu-wrapper border-neutral-50 position-relative border-top-0 rounded-0">
                    <button type="button" class="mt-4 text-xl close-responsive-dropdown rounded-circle position-absolute inset-inline-end-0 inset-block-start-0 me-8 d-lg-none d-flex"> <i class="ph ph-x"></i> </button>

                    <div class="px-16 logo d-lg-none d-block">
                        <a href="index.html" class="link">
                            <img src="{{ ('theme/images/logo/logo.png') }}" alt="Logo">
                        </a>
                    </div>

                    <ul class="p-0 overflow-y-auto responsive-dropdown__list scroll-sm">
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon1.png') }}" alt="Category Icon">
                                    <span>Computers & Laptop</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Computers & Laptop</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon2.png') }}" alt="Category Icon">
                                    <span>Smartphones & Gadget</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Smartphones & Gadget</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon3.png') }}" alt="Category Icon">
                                    <span>Gaming & Television</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Gaming & Television</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon4.png') }}" alt="Category Icon">
                                    <span>Office Equipment</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Office Equipment</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon5.png') }}" alt="Category Icon">
                                    <span>Smartwatches</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Smartwatches</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon6.png') }}" alt="Category Icon">
                                    <span>Headphone & Music</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Headphone & Music</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon7.png') }}" alt="Category Icon">
                                    <span>Camera & Videos</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Camera & Videos</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon8.png') }}" alt="Category Icon">
                                    <span>Accessories & Gadget</span>
                                </span>
                                <span class="flex-shrink-0 px-8 py-2 text-xs text-white bg-paste rounded-4">New</span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title"> Accessories & Gadget</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon9.png') }}" alt="Category Icon">
                                    <span>VR Technology</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">VR Technology</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon10.png') }}" alt="Category Icon">
                                    <span>Studio Equipment</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Studio Equipment</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon11.png') }}" alt="Category Icon">
                                    <span>Trending Products</span>
                                </span>
                                <span class="flex-shrink-0 px-8 py-2 text-xs text-white bg-danger-600 rounded-4">New</span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Trending Products</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenus-submenu border-bottom border-neutral-50">
                            <a href="javascript:void(0)" class="gap-8 px-16 text-sm text-gray-500 text-15 py-14 flex-align rounded-0 fw-semibold">
                                <span class="gap-16 d-flex align-items-center">
                                    <img src="{{ ('theme/images/icon/category-icon12.png') }}" alt="Category Icon">
                                    <span>Top Offer Products</span>
                                </span>
                                <span class="icon text-md d-flex ms-auto"><i class="ph ph-caret-right"></i></span>
                            </a>

                            <div class="py-16 submenus-submenu">
                                <h6 class="px-16 text-lg submenus-submenu__title">Top Offer Products</h6>
                                <ul class="overflow-y-auto submenus-submenu__list max-h-300 scroll-sm">
                                    <li>
                                        <a href="shop.html">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Vivo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Itel</a>
                                    </li>
                                    <li>
                                        <a href="shop.html">Realme</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="m-20 mb-0 overflow-hidden banner-item-two-wrapper rounded-24 position-relative arrow-center flex-grow-1">
                <img src="{{ ('theme/images/bg/banner-two-bg.png') }}" alt="" class="banner-img position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1 object-fit-cover rounded-24">

                <div class="banner-item-two__slider">
                    <div class="flex-wrap-reverse gap-32 d-flex align-items-center justify-content-between py-84 px-72-px flex-sm-nowrap">
                        <div class="banner-item-two__content">
                            <span class="mb-8 animate-left-right animation-delay-08 text-md fw-semibold text-main-600">Starting at only <span class="text-danger-600">$250</span> </span>
                            <h2 class="banner-item-two__title animate-left-right animation-delay-1">Get The Sound You Love For Less</h2>
                            <a href="shop.html" class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill animate-left-right animation-delay-12">
                                Shop Now<span class="text-xl icon d-flex"><i class="ph ph-shopping-cart-simple"></i>   </span>
                            </a>
                        </div>
                        <div class="banner-item-two__thumb">
                            <img src="{{ ('theme/images/thumbs/banner-two-img.png') }}" alt="Thumb" class="animate-scale animation-delay-12">
                        </div>
                    </div>
                    <div class="flex-wrap-reverse gap-32 d-flex align-items-center justify-content-between py-84 px-72-px flex-sm-nowrap">
                        <div class="banner-item-two__content">
                            <span class="mb-8 animate-left-right animation-delay-08 text-md fw-semibold text-main-600">Starting at only <span class="text-danger-600">$250</span> </span>
                            <h2 class="banner-item-two__title animate-left-right animation-delay-1">Get The Sound You Love For Less</h2>
                            <a href="shop.html" class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill animate-left-right animation-delay-12">
                                Shop Now<span class="text-xl icon d-flex"><i class="ph ph-shopping-cart-simple"></i>   </span>
                            </a>
                        </div>
                        <div class="banner-item-two__thumb">
                            <img src="{{ ('theme/images/thumbs/banner-two-img.png') }}" alt="Thumb" class="animate-scale animation-delay-12">
                        </div>
                    </div>
                    <div class="flex-wrap-reverse gap-32 d-flex align-items-center justify-content-between py-84 px-72-px flex-sm-nowrap">
                        <div class="banner-item-two__content">
                            <span class="mb-8 animate-left-right animation-delay-08 text-md fw-semibold text-main-600">Starting at only <span class="text-danger-600">$250</span> </span>
                            <h2 class="banner-item-two__title animate-left-right animation-delay-1">Get The Sound You Love For Less</h2>
                            <a href="shop.html" class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill animate-left-right animation-delay-12">
                                Shop Now<span class="text-xl icon d-flex"><i class="ph ph-shopping-cart-simple"></i>   </span>
                            </a>
                        </div>
                        <div class="banner-item-two__thumb">
                            <img src="{{ ('theme/images/thumbs/banner-two-img.png') }}" alt="Thumb" class="animate-scale animation-delay-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Banner Section End =============================== -->

    <!-- ============================ promotional banner Start ========================== -->
<section class="mt-32 promotional-banner">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
                <div class="p-32 overflow-hidden position-relative rounded-16 z-1">
                    <img src="{{ ('theme/images/bg/promo-bg-img1.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1">
                    <div class="flex-wrap gap-16 flex-between">
                        <div class="">
                            <span class="mb-8 text-sm text-main-600 fw-semibold">Latest Deal</span>
                            <h6 class="mb-0">iPhone 15 Pro Max</h6>
                            <a href="shop.html" class="gap-8 mt-16 border border-gray-900 d-inline-flex align-items-center text-heading text-md fw-medium border-top-0 border-end-0 border-start-0 hover-text-main-two-600 hover-border-main-two-600">
                                Shop Now
                                <span class="icon text-md d-flex"><i class="ph ph-plus"></i></span>
                            </a>
                        </div>
                        <div class="pe-xxl-2">
                            <img src="{{ ('theme/images/thumbs/promo-img1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
                <div class="p-32 overflow-hidden position-relative rounded-16 z-1">
                    <img src="{{ ('theme/images/bg/promo-bg-img2.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1">
                    <div class="flex-wrap gap-16 flex-between">
                        <div class="">
                            <span class="mb-8 text-sm text-heading fw-semibold">Get <span class="text-info">60%</span> Off</span>
                            <h6 class="mb-0">Instax Mini 11 Camera</h6>
                            <a href="shop.html" class="gap-8 mt-16 border border-gray-900 d-inline-flex align-items-center text-heading text-md fw-medium border-top-0 border-end-0 border-start-0 hover-text-main-two-600 hover-border-main-two-600">
                                Shop Now
                                <span class="icon text-md d-flex"><i class="ph ph-plus"></i></span>
                            </a>
                        </div>
                        <div class="pe-xxl-2">
                            <img src="{{ ('theme/images/thumbs/promo-img2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="p-32 overflow-hidden position-relative rounded-16 z-1">
                    <img src="{{ ('theme/images/bg/promo-bg-img3.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1">
                    <div class="flex-wrap gap-16 flex-between">
                        <div class="">
                            <span class="mb-8 text-sm text-heading fw-semibold">Start From <span class="text-main-600">$250</span></span>
                            <h6 class="mb-0">Airpod Headphone</h6>
                            <a href="shop.html" class="gap-8 mt-16 border border-gray-900 d-inline-flex align-items-center text-heading text-md fw-medium border-top-0 border-end-0 border-start-0 hover-text-main-two-600 hover-border-main-two-600">
                                Shop Now
                                <span class="icon text-md d-flex"><i class="ph ph-plus"></i></span>
                            </a>
                        </div>
                        <div class="pe-xxl-2">
                            <img src="{{ ('theme/images/thumbs/promo-img3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ promotional banner End ========================== -->

    <!-- ========================= Deals Week Start ================================ -->
<section class="overflow-hidden deals-weeek pt-80">
    <div class="container container-lg">
        <div class="p-24 border border-gray-100 rounded-16">
            <div class="mb-24 section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h6 class="mb-0 wow fadeInLeft">Deal of The Week</h6>
                    <div class="gap-16 flex-align wow fadeInRight">
                        <a href="shop.html" class="text-sm fw-semibold text-main-600 hover-text-main-600 hover-text-decoration-underline">View All Deals</a>
                        <div class="gap-8 flex-align">
                            <button type="button" id="deal-week-prev" class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="deal-week-next" class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-24 overflow-hidden deal-week-box rounded-16 flex-between position-relative z-1">
                <img src="{{ ('theme/images/bg/week-deal-bg.png') }}" alt="" class="position-absolute inset-block-start-0 w-100 h-100 z-n1 object-fit-cover">
                <div class="flex-shrink-0 d-lg-block d-none ps-32" data-aos="zoom-in">
                    <img src="{{ ('theme/images/thumbs/week-deal-img1.png') }}" alt="">
                </div>
                <div class="text-center deal-week-box__content px-sm-4 d-block w-100">
                    <h6 class="mb-20 text-white wow bounceIn">Apple AirPods Max, Over Ear Headphones</h6>
                    <div class="mt-20 countdown" id="countdown4">
                        <ul class="flex-wrap countdown-list style-four flex-center">
                            <li class="text-sm text-white border countdown-list__item flex-align flex-column fw-medium rounded-circle bg-white-12 border-white-13 colon-white">
                                <span class="days"></span>Days
                            </li>
                            <li class="text-sm text-white border countdown-list__item flex-align flex-column fw-medium rounded-circle bg-white-12 border-white-13 colon-white">
                                <span class="hours"></span>Hour
                            </li>
                            <li class="text-sm text-white border countdown-list__item flex-align flex-column fw-medium rounded-circle bg-white-12 border-white-13 colon-white">
                                <span class="minutes"></span>Min
                            </li>
                            <li class="text-sm text-white border countdown-list__item flex-align flex-column fw-medium rounded-circle bg-white-12 border-white-13 colon-white">
                                <span class="seconds"></span>Sec
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-shrink-0 d-lg-block d-none pe-xl-5" data-aos="zoom-in">
                    <div class="me-xxl-5">
                        <img src="{{ ('theme/images/thumbs/week-deal-img2.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="deals-week-slider arrow-style-two">
                <div data-aos="fade-up" data-aos-duration="200">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="400">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Best Sale </span>
                            <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="600">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="800">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0">Sale 50% </span>
                            <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1200">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1400">
                    <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New </span>
                            <img src="{{ ('theme/images/thumbs/product-two-img9.png') }}" alt="" class="w-auto max-w-unset">
                        </a>
                        <div class="mt-16 product-card__content">
                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                            </div>
                            <div class="mt-8">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>

                            <div class="my-20 product-card__price">
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                            </div>

                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                Add To Cart <i class="ph ph-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Deals Week End ================================ -->


    <!-- ========================= Top Selling Products Start ================================ -->
<section class="overflow-hidden top-selling-products pt-80">
    <div class="container container-lg">
        <div class="p-24 border border-gray-100 rounded-16">
            <div class="mb-24 section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h6 class="mb-0 wow fadeInLeft">Top Selling Products</h6>
                    <div class="gap-16 flex-align wow fadeInRight">
                        <a href="shop.html" class="text-sm text-gray-700 fw-semibold hover-text-main-600 hover-text-decoration-underline">View All Products</a>
                        <div class="gap-8 flex-align">
                            <button type="button" id="top-selling-prev" class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-neutral-600 hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="top-selling-next" class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-neutral-600 hover-bg-neutral-600 hover-text-white transition-1" >
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-12">
                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="800">
                    <div class="overflow-hidden text-center position-relative rounded-16 p-28 z-1 bg-main-100 h-100">
                        <div class="py-xl-4">
                            <h6 class="mb-8 fw-bold">Polaroid Now+ Gen 2 - White</h6>
                            <h6 class="mb-8 fw-bold">Get <span class="text-main-600">35%</span> off</h6>
                            <a href="cart.html" class="gap-8 px-24 py-16 mt-24 bg-white border-white btn text-heading flex-center d-inline-flex rounded-pill fw-medium hover-bg-main-600 hover-bg-main-two-600 hover-border-main-two-600 hover-text-white" tabindex="0">
                                Shop Now <i class="text-xl ph ph-shopping-cart d-flex"></i>
                            </a>
                        </div>
                        <div class="d-md-block d-none mt-36">
                            <img src="{{ ('theme/images/thumbs/deal-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="top-selling-product-slider arrow-style-two">
                        <div data-aos="fade-up" data-aos-duration="200">
                            <div class="p-16 border border-gray-100 product-card hover-card-shadows h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <img src="{{ ('theme/images/thumbs/product-two-img7.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-tertiary-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-8">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>

                                    <div class="my-20 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>

                                    <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="400">
                            <div class="p-16 border border-gray-100 product-card hover-card-shadows h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0">Sale 50% </span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img8.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-tertiary-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-8">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>

                                    <div class="my-20 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>

                                    <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="600">
                            <div class="p-16 border border-gray-100 product-card hover-card-shadows h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <img src="{{ ('theme/images/thumbs/product-two-img9.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-tertiary-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-8">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>

                                    <div class="my-20 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>

                                    <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="800">
                            <div class="p-16 border border-gray-100 product-card hover-card-shadows h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <img src="{{ ('theme/images/thumbs/product-two-img10.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-tertiary-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-8">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>

                                    <div class="my-20 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>

                                    <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1000">
                            <div class="p-16 border border-gray-100 product-card hover-card-shadows h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-main-600 position-absolute inset-inline-start-0 inset-block-start-0">Best Sale </span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img8.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-tertiary-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-8">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar" aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-tertiary-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>

                                    <div class="my-20 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>

                                    <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-pill flex-center fw-medium" tabindex="0">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Top Selling Products End ================================ -->


    <!-- ========================= Trending Products Start ================================ -->
<section class="overflow-hidden trending-productss pt-80">
    <div class="container container-lg">
        <div class="p-24 border border-gray-100 rounded-16">
            <div class="mb-24 section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h6 class="mb-0 wow fadeInLeft">Trending Products</h6>
                    <ul class="nav common-tab style-two nav-pills wow fadeInRight" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600 active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-mobile-tab" data-bs-toggle="pill" data-bs-target="#pills-mobile" type="button" role="tab" aria-controls="pills-mobile" aria-selected="false">Mobile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-headphone-tab" data-bs-toggle="pill" data-bs-target="#pills-headphone" type="button" role="tab" aria-controls="pills-headphone" aria-selected="false">Headphone</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-usb-tab" data-bs-toggle="pill" data-bs-target="#pills-usb" type="button" role="tab" aria-controls="pills-usb" aria-selected="false">USB</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-camera-tab" data-bs-toggle="pill" data-bs-target="#pills-camera" type="button" role="tab" aria-controls="pills-camera" aria-selected="false">Camera</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-laptop-tab" data-bs-toggle="pill" data-bs-target="#pills-laptop" type="button" role="tab" aria-controls="pills-laptop" aria-selected="false">Laptop</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="text-sm nav-link fw-medium hover-border-main-600" id="pills-accessories-tab" data-bs-toggle="pill" data-bs-target="#pills-accessories" type="button" role="tab" aria-controls="pills-accessories" aria-selected="false">Accessories</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mb-24 overflow-hidden rounded-16 flex-between position-relative">
                <img src="{{ ('theme/images/bg/trending-products-bg-gradient.png') }}" alt="" class="banner-img position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1 object-fit-cover rounded-24">

                <img src="{{ ('theme/images/thumbs/trending-products-img1.png') }}" alt="" class="d-xl-block d-none ps-xxl-5 ps-md-4" data-aos="zoom-in" data-aos-duration="800">
                <div class="px-4 text-center trending-products-box__content d-block w-100 py-72 wow bounceIn">
                    <h5 class="mb-0 text-white trending-products-box__title fw-semibold">Laptop Pro 20% off All Time On Order Now $980</h5>
                </div>
                <img src="{{ ('theme/images/thumbs/trending-products-img2.png') }}" alt="" class="d-xl-block d-none pe-xxl-5 me-xxl-5 pe-md-4" data-aos="zoom-in" data-aos-duration="800">
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-mobile" role="tabpanel" aria-labelledby="pills-mobile-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-headphone" role="tabpanel" aria-labelledby="pills-headphone-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-usb" role="tabpanel" aria-labelledby="pills-usb-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-camera" role="tabpanel" aria-labelledby="pills-camera-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-laptop" role="tabpanel" aria-labelledby="pills-laptop-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="pills-accessories" role="tabpanel" aria-labelledby="pills-accessories-tab" tabindex="0">
                    <div class="row g-12">
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="400">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="600">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img5.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="1200">
        <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
            <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                <img src="{{ ('theme/images/thumbs/product-two-img6.png') }}" alt="" class="w-auto max-w-unset">
            </a>
            <div class="mt-16 product-card__content">
                <span class="px-8 py-4 text-sm text-success-600 bg-success-50 fw-medium">19%OFF</span>
                <h6 class="my-16 text-lg title fw-semibold">
                    <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                </h6>
                <div class="gap-6 flex-align">
                    <div class="gap-2 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                    </div>
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                </div>

                <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50 fw-normal">Fulfilled by Marketpro</span>

                <div class="mt-16 product-card__price mb-30">
                    <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                    <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                </div>
                <span class="text-xs text-neutral-600 fw-medium">Delivered by <span class="text-main-600">Aug 02</span></span>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Trending Products End ================================ -->


    <!-- =============================== Discount Start ============================ -->
<section class="discount py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-6" data-aos="zoom-in" data-aos-duration="600">
                <div class="overflow-hidden discount-item rounded-16 position-relative z-1 h-100 d-flex flex-column align-items-start justify-content-center">
                    <img src="{{ ('theme/images/bg/discount-bg1.jpg') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1">
                    <div class="gap-20 w-100 flex-between">
                        <div class="discount-item__content">
                            <span class="mb-20 fw-semibold text-tertiary-600">UP TO 30% OFF</span>
                            <h6 class="mb-20 fw-medium">57" Odyssey Neo G9 Dual 4K UHD Quantum Mini-LED</h6>
                            <a href="shop.html" class="gap-8 px-24 py-16 mt-24 bg-white border-white btn text-heading flex-center d-inline-flex rounded-pill fw-medium hover-bg-main-600 hover-border-main-two-600 hover-text-white box-shadow-5xl" tabindex="0">
                                Shop Now
                            </a>
                        </div>
                        <img src="{{ ('theme/images/thumbs/discount-img1.png') }}" alt="" class="d-sm-block d-none">
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="zoom-in" data-aos-duration="60">
                <div class="overflow-hidden discount-item rounded-16 position-relative z-1 h-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ ('theme/images/bg/discount-bg2.jpg') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1">
                    <div class="gap-20 w-100 flex-between">
                        <div class="discount-item__content">
                            <span class="mb-20 fw-semibold text-yellow">UP TO 30% OFF</span>
                            <h6 class="mb-20 text-white fw-medium">57" Odyssey Neo G9 Dual 4K UHD Quantum Mini-LED</h6>
                            <a href="shop.html" class="gap-8 px-24 py-16 mt-24 bg-white border-white btn text-heading flex-center d-inline-flex rounded-pill fw-medium hover-bg-main-800 hover-border-main-two-800 hover-text-white box-shadow-5xl" tabindex="0">
                                Shop Now
                            </a>
                        </div>
                        <img src="{{ ('theme/images/thumbs/discount-img2.png') }}" alt="" class="d-sm-block d-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =============================== Discount End ============================ -->

    <section class="overflow-hidden featured-products">
    <div class="container container-lg">
        <div class="flex-wrap-reverse row g-4">
            <div class="col-xxl-8">
                <div class="p-24 border border-gray-100 rounded-16">
                    <div class="mb-24 section-heading">
                        <div class="flex-wrap gap-8 flex-between">
                            <h6 class="mb-0 wow fadeInLeft">Featured Products </h6>
                            <div class="gap-16 flex-align wow fadeInRight">
                                <a href="shop.html" class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline">View All Deals</a>
                                <div class="gap-8 flex-align">
                                    <button type="button" id="featured-products-prev" class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-neutral-600 hover-bg-neutral-600 hover-text-white transition-1" >
                                        <i class="ph ph-caret-left"></i>
                                    </button>
                                    <button type="button" id="featured-products-next" class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-neutral-600 hover-bg-neutral-600 hover-text-white transition-1" >
                                        <i class="ph ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gy-4 featured-product-slider">
                        <div class="col-xxl-6">
                            <div class="featured-products__sliders">
                                <div class="" data-aos="fade-up" data-aos-duration="800" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="" data-aos="fade-up" data-aos-duration="1000" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-tertiary-600 position-absolute inset-inline-start-0 inset-block-start-0">Best seller</span>
                                            <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="featured-products__sliders">
                                <div class="" data-aos="fade-up" data-aos-duration="800" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-primary-600 position-absolute inset-inline-start-0 inset-block-start-0">Best Sale</span>
                                            <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="" data-aos="fade-up" data-aos-duration="1000" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="featured-products__sliders">
                                <div class="" data-aos="fade-up" data-aos-duration="800" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0">Sale 50% </span>
                                            <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="" data-aos="fade-up" data-aos-duration="1000" >
                                    <div class="gap-16 p-16 mt-24 border border-gray-100 product-card d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                                        <a href="product-details-two.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 position-relative w-unset" tabindex="0">
                                            <span class="px-8 py-4 text-sm text-white product-card__badge bg-tertiary-600 position-absolute inset-inline-start-0 inset-block-start-0">Best seller</span>
                                            <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
                                        </a>
                                        <div class="my-20 product-card__content flex-grow-1">
                                            <h6 class="mb-12 text-lg title fw-semibold">
                                                <a href="product-details-two.html" class="link text-line-2" tabindex="0">iPhone 15 Pro Warp Charge 30W Power Adapter</a>
                                            </h6>
                                            <div class="gap-6 mb-12 flex-align">
                                                <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                                <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                            </div>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-two-600 text-md d-flex"><i class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="my-20 product-card__price">
                                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                                <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                            </div>

                                            <a href="cart.html" class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium" tabindex="0">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="pb-0 overflow-hidden text-center position-relative rounded-16 bg-light-purple p-28 z-1 h-100" data-aos="fade-up" data-aos-duration="1000" >
                    <img src="{{ ('theme/images/bg/featured-product-bg.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 cover-img">
                    <div class="text-center py-xl-4">
                        <span class="mb-20 text-white h6">iPhone Smart Phone - Red</span>
                        <div class="gap-12 text-white flex-center">
                            <span class="">FROM</span>
                            <h4 class="mb-8 text-white fw-semibold">$890</h4>
                            <span class="px-8 py-2 text-sm text-white badge-style-two position-relative me-8 bg-paste rounded-4">20% off</span>
                        </div>
                        <a href="shop.html" class="gap-8 px-24 py-16 mt-16 mb-24 bg-white border-white btn text-heading flex-center d-inline-flex rounded-pill fw-medium hover-bg-main-600 hover-border-main-two-600 hover-text-white box-shadow-5xl" tabindex="0">
                            Shop Now
                            <span class="text-xl icon d-flex"><i class="ph ph-arrow-right"></i></span>
                        </a>
                    </div>
                    <img src="{{ ('theme/images/thumbs/featured-product-img.png') }}" alt="" class="d-xxl-inline-flex d-none wow bounceInUp">
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Super Discount Start -->
 <div class="pt-80">
     <div class="container container-lg">
        <div class="py-20 border border-dashed border-main-500 bg-main-50 rounded-8 d-flex align-items-center justify-content-evenly">
            <p class="h6 text-main-600 fw-normal">Super discount for your <a href="javascript:void(0)" class="fw-bold text-decoration-underline text-main-600 hover-text-decoration-none hover-text-primary-600 ">first purchase</a> </p>
            <div class="position-relative">
                <button class="px-32 py-10 text-white border-0 copy-coupon-btn text-uppercase bg-main-600 rounded-pill hover-bg-main-800 ">
                    FREE25BAC
                    <i class="text-lg ph ph-file-text line-height-1"></i>
                </button>
                <span class="px-16 py-6 mb-8 text-xs text-white copy-text bg-main-600 fw-normal position-absolute rounded-pill bottom-100 start-50 translate-middle-x min-w-max"></span>
            </div>
            <p class="text-md text-main-600 fw-normal">Use discount code to get <span class="fw-bold text-main-600">20% </span> discount for any item</p>
        </div>
     </div>
 </div>
<!-- Super Discount End -->

    <!-- ========================= Top Selling Products Start ================================ -->
<section class="overflow-hidden recommended pt-80">
    <div class="container container-lg">
        <div class="row g-12">
            <div class="col-xxl-4">
                <div class="overflow-hidden text-center position-relative rounded-16 bg-light-purple p-28 z-1 h-100" data-aos="zoom-in" data-aos-duration="800" >
                    <img src="{{ ('theme/images/bg/recommended-bg.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 cover-img">
                    <div class="text-center py-xl-4">
                        <span class="mb-20 text-white h6">Insta360 GO 3S Action Camera - White</span>
                        <div class="gap-12 text-white flex-center">
                            <span class="">FROM</span>
                            <h4 class="mb-8 text-white">$430</h4>
                            <span class="px-8 py-2 text-sm text-white badge-style-two position-relative me-8 bg-success-600 rounded-4">20% off</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8">
                <div class="p-24 border border-gray-100 rounded-16">
                    <div class="mb-24 section-heading">
                        <div class="flex-wrap gap-8 flex-between">
                            <h6 class="mb-0 wow fadeInLeft">Recommended For You</h6>
                            <div class="gap-16 flex-align wow fadeInRight">
                                <a href="shop.html" class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline">View All</a>
                                <div class="gap-8 flex-align">
                                    <button type="button" id="recommended-prev" class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1" >
                                        <i class="ph ph-caret-left"></i>
                                    </button>
                                    <button type="button" id="recommended-next" class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1" >
                                        <i class="ph ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recommended-slider">
                        <div data-aos="fade-up" data-aos-duration="400">
                            <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-tertiary-600 position-absolute inset-inline-start-0 inset-block-start-0">Best Seller </span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img1.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <span class="px-8 py-4 text-sm text-main-600 bg-main-50 fw-medium">19%OFF</span>
                                    <h6 class="my-16 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                                    </h6>
                                    <div class="gap-6 flex-align">
                                        <div class="gap-2 flex-align">
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        </div>
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                                    </div>

                                    <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50">Fulfilled by Marketpro</span>

                                    <div class="mt-16 product-card__price mb-30">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>
                                    <span class="text-neutral-600">Delivered by <span class="text-main-600">Aug 02</span></span>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="600">
                            <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <span class="px-8 py-4 text-sm text-main-600 bg-main-50 fw-medium">19%OFF</span>
                                    <h6 class="my-16 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                                    </h6>
                                    <div class="gap-6 flex-align">
                                        <div class="gap-2 flex-align">
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        </div>
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                                    </div>

                                    <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50">Fulfilled by Marketpro</span>

                                    <div class="mt-16 product-card__price mb-30">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>
                                    <span class="text-neutral-600">Delivered by <span class="text-main-600">Aug 02</span></span>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="800">
                            <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0">Sale 50%</span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img3.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <span class="px-8 py-4 text-sm text-main-600 bg-main-50 fw-medium">19%OFF</span>
                                    <h6 class="my-16 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                                    </h6>
                                    <div class="gap-6 flex-align">
                                        <div class="gap-2 flex-align">
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        </div>
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                                    </div>

                                    <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50">Fulfilled by Marketpro</span>

                                    <div class="mt-16 product-card__price mb-30">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>
                                    <span class="text-neutral-600">Delivered by <span class="text-main-600">Aug 02</span></span>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1000">
                            <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-success-600 position-absolute inset-inline-start-0 inset-block-start-0">Sold</span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img4.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <span class="px-8 py-4 text-sm text-main-600 bg-main-50 fw-medium">19%OFF</span>
                                    <h6 class="my-16 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                                    </h6>
                                    <div class="gap-6 flex-align">
                                        <div class="gap-2 flex-align">
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        </div>
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                                    </div>

                                    <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50">Fulfilled by Marketpro</span>

                                    <div class="mt-16 product-card__price mb-30">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>
                                    <span class="text-neutral-600">Delivered by <span class="text-main-600">Aug 02</span></span>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1200">
                            <div class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="product-details-two.html" class="product-card__thumb flex-center rounded-8 position-relative">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0">New</span>
                                    <img src="{{ ('theme/images/thumbs/product-two-img2.png') }}" alt="" class="w-auto max-w-unset">
                                </a>
                                <div class="mt-16 product-card__content">
                                    <span class="px-8 py-4 text-sm text-main-600 bg-main-50 fw-medium">19%OFF</span>
                                    <h6 class="my-16 text-lg title fw-semibold">
                                        <a href="product-details-two.html" class="link text-line-2" tabindex="0">Instax Mini 12 Instant Film Camera - Green</a>
                                    </h6>
                                    <div class="gap-6 flex-align">
                                        <div class="gap-2 flex-align">
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                        </div>
                                        <span class="text-xs text-gray-500 fw-medium">4.8</span>
                                        <span class="text-xs text-gray-500 fw-medium">(12K)</span>
                                    </div>

                                    <span class="px-8 py-2 mt-16 text-xs rounded-pill text-main-two-600 bg-main-two-50">Fulfilled by Marketpro</span>

                                    <div class="mt-16 product-card__price mb-30">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through"> $28.99</span>
                                        <span class="text-heading text-md fw-semibold ">$14.99 <span class="text-gray-500 fw-normal">/Qty</span> </span>
                                    </div>
                                    <span class="text-neutral-600">Delivered by <span class="text-main-600">Aug 02</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Top Selling Products End ================================ -->


    <!-- ========================= Cyber Monday Section Start =============================== -->
<div class="mb-24 overflow-hidden big-deal rounded-16 flex-between position-relative mt-80 z-1">
    <div class="container container-lg">
        <div class="overflow-hidden big-deal-box position-relative z-1 rounded-16 px-72-px">
            <img src="{{ ('theme/images/bg/cyber-monday-bg.png') }}" alt="" class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 cover-img">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-lg-block d-none" data-aos="zoom-out" data-aos-duration="1000" >
                    <img src="{{ ('theme/images/thumbs/cyber-monday-img1.png') }}" alt="">
                </div>
                <div class="max-w-472 py-80 ms-auto me-auto">
                    <h4 class="mb-20">Cyber Monday Sell</h4>
                    <h6 class="mb-10 text-white">UP TO <span class="text-main-600">30%</span> OFF</h6>
                    <h6 class="mb-10 fw-bold">COMPUTER & MOBILE ACCESSORIES</h6>
                    <a href="shop.html" class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill" tabindex="0">
                        Shop Now<span class="text-xl icon d-flex"><i class="ph ph-plus"></i>   </span>
                    </a>
                </div>
                <div class="d-lg-block d-none" data-aos="zoom-out" data-aos-duration="1000" >
                    <img src="{{ ('theme/images/thumbs/cyber-monday-img2.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================= Cyber Monday Section End =============================== -->


    <!-- ============================== Top Brand Section Start ==================================== -->
<div class="top-brand py-80">
    <div class="container container-lg">
        <div class="p-24 border border-gray-50 rounded-16">
            <div class="mb-24 section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h6 class="mb-0">Top Brands</h6>
                    <div class="gap-8 flex-align">
                        <button type="button" id="topBrand-prev" class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-two-600 hover-bg-main-two-600 hover-text-white transition-1">
                            <i class="ph ph-caret-left"></i>
                        </button>
                        <button type="button" id="topBrand-next" class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-two-600 hover-bg-main-two-600 hover-text-white transition-1">
                            <i class="ph ph-caret-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="top-brand__slider">
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img1.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img2.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img3.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img4.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img5.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img6.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img7.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img8.png') }}" alt="">
                    </div>
                </div>
                <div class="wow bounceIn">
                    <div class="px-8 my-4 top-brand__item flex-center rounded-8 hover-border-main-600 transition-1 box-shadow-7xl">
                        <img src="{{ ('theme/images/thumbs/top-brand-img5.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================== Top Brand Section End ==================================== -->

    <!-- ========================= Popular Products Start ================================ -->
<section class="overflow-hidden popular-products mb-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img1.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Headphone & Earphone</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img2.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">TV & Smart Home</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img3.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Video Games</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img4.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Computer & Tablets</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img5.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Car & GPS</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img6.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Camera & Video</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img7.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Kitchen Appliance</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-sm-6 col-xs-6 wow bounceIn">
                <div class="gap-16 p-16 border border-gray-100 product-card h-100 d-flex hover-border-main-600 rounded-16 position-relative transition-2">
                    <a href="product-details.html" class="flex-shrink-0 p-24 product-card__thumb flex-center h-unset rounded-8 bg-gray-50 position-relative w-unset" tabindex="0">
                        <img src="{{ ('theme/images/thumbs/popular-img8.png') }}" alt="" class="w-auto max-w-unset">
                    </a>
                    <div class="product-card__content flex-grow-1">
                        <h6 class="mb-12 text-lg title fw-semibold">
                            <a href="product-details.html" class="link text-line-2" tabindex="0">Phone & Accessories</a>
                        </h6>
                        <span class="mb-4 text-sm text-gray-600">Wired Headphones</span>
                        <span class="mb-4 text-sm text-gray-600">Over-Ear Headphone</span>
                        <span class="mb-4 text-sm text-gray-600">Sports Headphone</span>
                        <span class="mb-0 text-sm text-gray-600">Earbud Headphone</span>

                        <a href="shop.html" class="gap-8 mt-24 text-tertiary-600 flex-align">
                            All Categories
                            <i class="ph ph-arrow-right d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================= Popular Products End ================================ -->


    <!-- =============================== Newsletter-two Section Start ============================ -->
<div class="overflow-hidden newsletter-two bg-black-light pb-72 pt-76" data-aos="fade-up" data-aos-duration="600">
    <div class="container container-lg">
        <div class="flex-wrap gap-20 flex-between">
            <div class="flex-align gap-22">
                <h4 class="mb-12 text-white fw-medium">Join Our Newsletter, Get <span class="text-main-600">10% Off</span> </h4>
            </div>
            <form action="#" class="newsletter-two__form w-50">
                <div class="gap-16 d-flex">
                    <input type="email" class="text-white border common-input rounded-8 flex-grow-1 py-14 placeholder-text-16 bg-white-06 border-neutral-600 focus-border-main-600 hover-border-main-600" placeholder="Enter your email address">
                    <button type="submit" class="flex-shrink-0 py-24 btn btn-main-two rounded-8 px-44"> Subscribe Now </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- =============================== Newsletter-two Section End ============================ -->

<!-- =============================== Shipping Section Start ============================ -->
<section class="shipping bg-black-light">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xxl-3 col-sm-6 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="400">
                <div class="gap-16 border border-dashed shipping-item flex-align rounded-16 border-white-13 hover-bg-main-700 transition-2">
                    <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-two-600 text-32"><i class="ph-fill ph-car-profile"></i></span>
                    <div class="">
                        <h6 class="mb-0 text-xl text-white fw-semibold">Free Shipping</h6>
                        <span class="mt-10 text-sm text-neutral-300 d-block">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="600">
                <div class="gap-16 border border-dashed shipping-item flex-align rounded-16 border-white-13 hover-bg-main-700 transition-2">
                    <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-two-600 text-32"><i class="ph-fill ph-hand-heart"></i></span>
                    <div class="">
                        <h6 class="mb-0 text-xl text-white fw-semibold"> 100% Satisfaction</h6>
                        <span class="mt-10 text-sm text-neutral-300 d-block">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                <div class="gap-16 border border-dashed shipping-item flex-align rounded-16 border-white-13 hover-bg-main-700 transition-2">
                    <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-two-600 text-32"><i class="ph-fill ph-credit-card"></i></span>
                    <div class="">
                        <h6 class="mb-0 text-xl text-white fw-semibold"> Secure Payments</h6>
                        <span class="mt-10 text-sm text-neutral-300 d-block">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                <div class="gap-16 border border-dashed shipping-item flex-align rounded-16 border-white-13 hover-bg-main-700 transition-2">
                    <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-two-600 text-32"><i class="ph-fill ph-chats"></i></span>
                    <div class="">
                        <h6 class="mb-0 text-xl text-white fw-semibold"> 24/7 Support</h6>
                        <span class="mt-10 text-sm text-neutral-300 d-block">Free shipping all over the US</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =============================== Shipping Section End ============================ -->
@endsection
