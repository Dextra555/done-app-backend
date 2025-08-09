@extends('layouts.master')
@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">Blog</h6>
                <ul class="flex-wrap gap-8 flex-align">
                    <li class="text-sm">
                        <a href="{{ route('home') }}" class="gap-8 text-gray-900 flex-align hover-text-main-600">
                            <i class="ph ph-house"></i>
                            Home
                        </a>
                    </li>
                    <li class="flex-align">
                        <i class="ph ph-caret-right"></i>
                    </li>
                    <li class="text-sm text-main-600"> Blog </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- =============================== Blog Section Start =========================== -->
    <section class="blog py-80">
        <div class="container container-lg">
            <div class="row gy-5">
                <div class="col-lg-8 pe-xl-4">
                    <div class="blog-item-wrapper">
                        <div class="blog-item">
                            <a href="{{ route('blog.details') }}" class="overflow-hidden w-100 h-100 rounded-16">
                                <img src="{{ asset('theme/images/thumbs/blog-img1.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="mt-24 blog-item__content">
                                <span class="px-24 py-4 mb-16 bg-main-50 text-main-600 rounded-8">Gadget</span>
                                <h6 class="mb-24 text-2xl">
                                    <a href="blog-details.html" class="">Legal structure, can make profit buisness</a>
                                </h6>
                                <p class="text-gray-700 text-line-2">Re-engagement — objectives. As developers, we
                                    rightfully obsess about the customer experience, relentlessly working to squeeze every
                                    millisecond out of the critical rendering path, optimize input latency, and eliminate...
                                </p>

                                <div class="flex-wrap gap-24 pt-24 mt-24 border-gray-100 flex-align border-top">
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                                2025</a>
                                        </span>
                                    </div>
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-chats-circle"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">0
                                                Comments</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <a href="{{ route('blog.details') }}" class="overflow-hidden w-100 h-100 rounded-16">
                                <img src="{{ asset('theme/images/thumbs/blog-img2.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="mt-24 blog-item__content">
                                <span class="px-24 py-4 mb-16 bg-main-50 text-main-600 rounded-8">Gadget</span>
                                <h6 class="mb-24 text-2xl">
                                    <a href="blog-details.html" class="">Legal structure, can make profit buisness</a>
                                </h6>
                                <p class="text-gray-700 text-line-2">Re-engagement — objectives. As developers, we
                                    rightfully obsess about the customer experience, relentlessly working to squeeze every
                                    millisecond out of the critical rendering path, optimize input latency, and eliminate...
                                </p>

                                <div class="flex-wrap gap-24 pt-24 mt-24 border-gray-100 flex-align border-top">
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                                2025</a>
                                        </span>
                                    </div>
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-chats-circle"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">0
                                                Comments</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <a href="{{ route('blog.details') }}" class="overflow-hidden w-100 h-100 rounded-16">
                                <img src="{{ asset('theme/images/thumbs/blog-img3.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="mt-24 blog-item__content">
                                <span class="px-24 py-4 mb-16 bg-main-50 text-main-600 rounded-8">Gadget</span>
                                <h6 class="mb-24 text-2xl">
                                    <a href="blog-details.html" class="">Legal structure, can make profit buisness</a>
                                </h6>
                                <p class="text-gray-700 text-line-2">Re-engagement — objectives. As developers, we
                                    rightfully obsess about the customer experience, relentlessly working to squeeze every
                                    millisecond out of the critical rendering path, optimize input latency, and eliminate...
                                </p>

                                <div class="flex-wrap gap-24 pt-24 mt-24 border-gray-100 flex-align border-top">
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                                2025</a>
                                        </span>
                                    </div>
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-chats-circle"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="blog-details.html" class="text-gray-500 hover-text-main-600">0
                                                Comments</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Start -->
                    <ul class="flex-wrap gap-16 pagination flex-align">
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-xxl rounded-8 fw-medium text-neutral-600"
                                href="#">
                                <i class="ph-bold ph-arrow-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">01</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">02</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">03</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">04</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">05</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">06</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-md rounded-8 fw-medium text-neutral-600"
                                href="#">07</a>
                        </li>
                        <li class="page-item">
                            <a class="w-64 h-64 border border-gray-100 page-link flex-center text-xxl rounded-8 fw-medium text-neutral-600"
                                href="#">
                                <i class="ph-bold ph-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Pagination End -->

                </div>
                <div class="col-lg-4 ps-xl-4">
                    <!-- Search Start -->
                    <div class="p-32 mb-40 border border-gray-100 blog-sidebar rounded-8">
                        <h6 class="pb-32 mb-32 text-xl border-gray-100 border-bottom">Search Here</h6>
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control common-input bg-color-three"
                                    placeholder="Searching...">
                                <button type="submit"
                                    class="w-56 h-56 text-2xl btn btn-main flex-center input-group-text"><i
                                        class="ph ph-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Search End -->

                    <!-- Recent Post Start -->
                    <div class="p-32 mb-40 border border-gray-100 blog-sidebar rounded-8">
                        <h6 class="pb-32 mb-32 text-xl border-gray-100 border-bottom">Recent Posts</h6>
                        <div class="flex-wrap gap-24 mb-16 d-flex align-items-center flex-sm-nowrap">
                            <a href="blog-details.html"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post1.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="blog-details.html" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-16 d-flex align-items-center flex-sm-nowrap">
                            <a href="blog-details.html"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post2.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="blog-details.html" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-16 d-flex align-items-center flex-sm-nowrap">
                            <a href="blog-details.html"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post3.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="blog-details.html" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-0 d-flex align-items-center flex-sm-nowrap">
                            <a href="blog-details.html"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post4.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="blog-details.html" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="blog-details.html" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Tags Start -->
                    <div class="p-32 mb-40 border border-gray-100 blog-sidebar rounded-8">
                        <h6 class="pb-32 mb-32 text-xl border-gray-100 border-bottom">Recent Posts</h6>
                        <ul>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Gaming (12)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Smart Gadget (05)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Software (29)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Electronics (24)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Laptop (08)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Mobile & Accessories (16)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="blog-details.html"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Apliance (24)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tags End -->

                </div>
            </div>
        </div>
    </section>
    <!-- =============================== Blog Section End =========================== -->

    <!-- ========================== Shipping Section Start ============================ -->
    <section class="mb-24 shipping" id="shipping">
        <div class="container container-lg">
            <div class="row gy-4">
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="400">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-car-profile"></i></span>
                        <div class="">
                            <h6 class="mb-0">Free Shipping</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="600">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-hand-heart"></i></span>
                        <div class="">
                            <h6 class="mb-0"> 100% Satisfaction</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="800">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-credit-card"></i></span>
                        <div class="">
                            <h6 class="mb-0"> Secure Payments</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-chats"></i></span>
                        <div class="">
                            <h6 class="mb-0"> 24/7 Support</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Shipping Section End ============================ -->
@endsection
