@extends('layouts.master')
@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">Become Seller</h6>
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
                    <li class="text-sm text-main-600"> Become Seller </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- ============================== Banner Inner Start ================================ -->
    <section class="banner-inner bg-overlay z-1 position-relative py-72 bg-img bg-start"
        data-background-image="{{ asset('theme/images/thumbs/banner-inner-bg.png')}}">
        <div
            class="banner-inner__img position-absolute inset-inline-end-0 top-50 translate-middle-y h-100 arrow-left-clip w-30-percent d-xxl-block d-none">
            <img src="{{ asset('theme/images/thumbs/banner-inner-img.png') }}" alt="" class="h-100">
        </div>
        <div class="container">
            <div class="text-center banner-inner__content">
                <h4 class="mb-20 text-white fw-semibold">Become A MarketPro Seller</h4>
                <p class="my-20 text-white">More than half the units sold in our stores from independent sellers.</p>
                <a href="{{ route('account') }}" class="btn btn-main-two rounded-8">Create An Account</a>
            </div>
        </div>
    </section>
    <!-- ============================== Banner Inner End ================================ -->

    <!-- ========================= Why Become Seller section start =================================== -->
    <section class="why-seller py-80">
        <div class="container">
            <div class="mx-auto text-center section-heading">
                <h5 class="">Why become a seller on Marketpro?</h5>
                <span class="text-gray-600">More than half the units sold in our stores from independent sellers.</span>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center why-seller-item">
                        <span class="text-main-two-600 text-72 d-inline-flex">
                            <i class="ph ph-gift"></i>
                        </span>
                        <h6 class="my-28">Free Shipping</h6>
                        <p class="mx-auto text-gray-600 max-w-392">Explore insightful content that keeps you ahead of the
                            curve and connected to the pulse of what's happening.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center why-seller-item">
                        <span class="text-main-two-600 text-72 d-inline-flex">
                            <i class="ph ph-credit-card"></i>
                        </span>
                        <h6 class="my-28">Flexible Payment</h6>
                        <p class="mx-auto text-gray-600 max-w-392">Explore insightful content that keeps you ahead of the
                            curve and connected to the pulse of what's happening.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center why-seller-item">
                        <span class="text-main-two-600 text-72 d-inline-flex">
                            <i class="ph ph-chats"></i>
                        </span>
                        <h6 class="my-28">Online Support</h6>
                        <p class="mx-auto text-gray-600 max-w-392">Explore insightful content that keeps you ahead of the
                            curve and connected to the pulse of what's happening.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= Why Become Seller section End =================================== -->

    <!-- ========================== Counter Section Start ========================== -->
    <section class="counter">
        <div class="container container-lg">
            <div class="row justify-content-center">
                <div class="col-xxl-11">
                    <div class="bg-neutral-600 rounded-16 px-xxl-5 px-xl-4">
                        <div class="row gy-lg-0 gy-4 line-wrapper">
                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                <div class="px-8 text-center counter-item py-100">
                                    <h3 class="mb-8 text-main-600 counter fw-semibold">185+</h3>
                                    <p class="text-xl text-white font-heading-two fw-semibold">Store around the world</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                <div class="px-8 text-center counter-item py-100">
                                    <h3 class="mb-8 text-main-600 counter fw-semibold">152K</h3>
                                    <p class="text-xl text-white font-heading-two fw-semibold">Product Sold</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                <div class="px-8 text-center counter-item py-100">
                                    <h3 class="mb-8 text-main-600 counter fw-semibold">15K+</h3>
                                    <p class="text-xl text-white font-heading-two fw-semibold">Registered Users</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                <div class="px-8 text-center counter-item py-100">
                                    <h3 class="mb-8 text-main-600 counter fw-semibold">2K+</h3>
                                    <p class="text-xl text-white font-heading-two fw-semibold">Top Brands Available in store
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Counter Section End ========================== -->

    <!-- ============================= Steps Section start ================================= -->
    <section class="step py-80">
        <div class="position-relative z-1">
            <img src="{{ asset('theme/images/shape/curve-line-shape.png') }}" alt=""
                class="top-0 position-absolute inset-inline-end-0 z-n1 me-60 d-lg-block d-none">

            <div class="container container-lg">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="step-content">
                            <div class="section-heading ms-auto text-end">
                                <h5 class="">Over $200k in potential benefits</h5>
                                <span class="text-gray-600">Ready to sell? Launch your brand today with a powerful for new
                                    sellers and over $200k in potential benefits</span>
                            </div>
                            <div class="gap-56 d-flex flex-column align-items-end">
                                <div class="gap-32 d-flex align-items-center">
                                    <div class="text-end">
                                        <h5 class="mb-8">Step 01</h5>
                                        <p class="text-gray-600">Create an account on our website. It is fast and free.</p>
                                    </div>
                                    <div class="w-90 h-90 flex-center bg-main-two-100 rounded-circle">
                                        <h6
                                            class="mb-0 text-white border border-white w-60 h-60 bg-main-two-600 d-flex align-items-center justify-content-center rounded-circle border-5 fw-medium">
                                            01</h6>
                                    </div>
                                </div>
                                <div class="gap-32 d-flex align-items-center">
                                    <div class="text-end">
                                        <h5 class="mb-8">Step 02</h5>
                                        <p class="text-gray-600"> Upload your products and the display in your shop.</p>
                                    </div>
                                    <div class="w-90 h-90 flex-center bg-main-two-100 rounded-circle">
                                        <h6
                                            class="mb-0 text-white border border-white w-60 h-60 bg-main-two-600 d-flex align-items-center justify-content-center rounded-circle border-5 fw-medium">
                                            02</h6>
                                    </div>
                                </div>
                                <div class="gap-32 d-flex align-items-center">
                                    <div class="text-end">
                                        <h5 class="mb-8">Step 03</h5>
                                        <p class="text-gray-600">We'll verify your account and then you can start selling!
                                        </p>
                                    </div>
                                    <div class="w-90 h-90 flex-center bg-main-two-100 rounded-circle">
                                        <h6
                                            class="mb-0 text-white border border-white w-60 h-60 bg-main-two-600 d-flex align-items-center justify-content-center rounded-circle border-5 fw-medium">
                                            03</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img src="{{ asset('theme/images/thumbs/steps.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Steps Section End ================================= -->

    <!-- ============================== Testimonial section start ======================= -->
    <section class="overflow-hidden testimonials py-120 bg-neutral-600 bg-img"
        data-background-image="{{ asset('theme/images/bg/pattern-two.png') }}">
        <div class="container container-lg">
            <div class="row gy-4 align-items-center">
                <div class="col-xl-1">
                    <div class="mb-0 section-heading d-flex flex-column align-items-center writing-mode wow fadeInLeft">
                        <p class="text-white">Share information about your brand with your customers.</p>
                        <h5 class="mb-0 text-white text-uppercase">Customers Feedback</h5>
                    </div>
                </div>
                <div class="col-xl-11">
                    <div class="position-relative">
                        <div class="testimonials-slider mb-60">
                            <div class="testimonials-item">
                                <h6 class="mb-8 text-white text-uppercase fw-medium">ROBIUL HASAN</h6>
                                <span class="text-white text-md fw-normal">Business Owner</span>
                                <div class="gap-8 mt-24 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <p class="mt-40 text-2xl text-white testimonials-item__desc fw-normal max-w-990">Customers
                                    expressed that shopping at Asiana Fashion was a "delightful experience," highlighting
                                    the vibrant colors and unique designs that made them feel special at events </p>
                            </div>
                            <div class="testimonials-item">
                                <h6 class="mb-8 text-white text-uppercase fw-medium">SAMIYA AKTER</h6>
                                <span class="text-white text-md fw-normal">Front End Developer</span>
                                <div class="gap-8 mt-24 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <p class="mt-40 text-2xl text-white testimonials-item__desc fw-normal max-w-990">Contrary
                                    to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                    classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                    McClintock, a Latin professor at Hampden-Sydney College in Virginia</p>
                            </div>
                            <div class="testimonials-item">
                                <h6 class="mb-8 text-white text-uppercase fw-medium">JOHN DOE</h6>
                                <span class="text-white text-md fw-normal">Max Model</span>
                                <div class="gap-8 mt-24 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <p class="mt-40 text-2xl text-white testimonials-item__desc fw-normal max-w-990">It is a
                                    long established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                    normal distribution of letters, as opposed to using 'Content here, content here'</p>
                            </div>
                            <div class="testimonials-item">
                                <h6 class="mb-8 text-white text-uppercase fw-medium">MICHEL SMITH</h6>
                                <span class="text-white text-md fw-normal">Former Model</span>
                                <div class="gap-8 mt-24 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <p class="mt-40 text-2xl text-white testimonials-item__desc fw-normal max-w-990">Many
                                    desktop publishing packages and web page editors now use Lorem Ipsum as their default
                                    model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                                    infancy. </p>
                            </div>
                            <div class="testimonials-item">
                                <h6 class="mb-8 text-white text-uppercase fw-medium">ALEX</h6>
                                <span class="text-white text-md fw-normal">Back End Developer</span>
                                <div class="gap-8 mt-24 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <p class="mt-40 text-2xl text-white testimonials-item__desc fw-normal max-w-990">There are
                                    many variations of passages of Lorem Ipsum available, but the majority have suffered
                                    alteration in some form, by injected humour, or randomised words which don't look even
                                    slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
                                    sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                        </div>
                        <div class="testimonials-thumbs-slider">
                            <div class="testimonials-thumbs d-flex position-relative align-items-end justify-content-end">
                                <div class="testimonials-thumbs__img">
                                    <img src="{{ asset('theme/images/thumbs/testimonials-img1.png') }}" alt=""
                                        class="cover-img">
                                </div>
                                <div
                                    class="bottom-0 hidden mb-16 text-center opacity-0 testimonials-thumbs__content position-absolute transition-2 start-50 translate-middle-x">
                                    <h6 class="mb-8 text-white text-uppercase fw-medium">ROBIUL HASAN</h6>
                                    <span class="text-white text-md fw-normal">Business Owner</span>
                                </div>
                            </div>
                            <div class="testimonials-thumbs d-flex position-relative align-items-end justify-content-end">
                                <div class="testimonials-thumbs__img">
                                    <img src="{{ asset('theme/images/thumbs/testimonials-img2.png') }}" alt=""
                                        class="cover-img">
                                </div>
                                <div
                                    class="bottom-0 hidden mb-16 text-center opacity-0 testimonials-thumbs__content position-absolute transition-2 start-50 translate-middle-x">
                                    <h6 class="mb-8 text-white text-uppercase fw-medium">SAMIYA AKTER</h6>
                                    <span class="text-white text-md fw-normal">Front End Developer</span>
                                </div>
                            </div>
                            <div class="testimonials-thumbs d-flex position-relative align-items-end justify-content-end">
                                <div class="testimonials-thumbs__img">
                                    <img src="{{ asset('theme/images/thumbs/testimonials-img3.png') }}" alt=""
                                        class="cover-img">
                                </div>
                                <div
                                    class="bottom-0 hidden mb-16 text-center opacity-0 testimonials-thumbs__content position-absolute transition-2 start-50 translate-middle-x">
                                    <h6 class="mb-8 text-white text-uppercase fw-medium">JOHN DOE</h6>
                                    <span class="text-white text-md fw-normal">Max Model</span>
                                </div>
                            </div>
                            <div class="testimonials-thumbs d-flex position-relative align-items-end justify-content-end">
                                <div class="testimonials-thumbs__img">
                                    <img src="{{ asset('theme/images/thumbs/testimonials-img4.png') }}" alt=""
                                        class="cover-img">
                                </div>
                                <div
                                    class="bottom-0 hidden mb-16 text-center opacity-0 testimonials-thumbs__content position-absolute transition-2 start-50 translate-middle-x">
                                    <h6 class="mb-8 text-white text-uppercase fw-medium">MICHEL SMITH</h6>
                                    <span class="text-white text-md fw-normal">Former Model</span>
                                </div>
                            </div>
                            <div class="testimonials-thumbs d-flex position-relative align-items-end justify-content-end">
                                <div class="testimonials-thumbs__img">
                                    <img src="{{ asset('theme/images/thumbs/testimonials-img2.png') }}" alt=""
                                        class="cover-img">
                                </div>
                                <div
                                    class="bottom-0 hidden mb-16 text-center opacity-0 testimonials-thumbs__content position-absolute transition-2 start-50 translate-middle-x">
                                    <h6 class="mb-8 text-white text-uppercase fw-medium">ALEX</h6>
                                    <span class="text-white text-md fw-normal">Back End Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="gap-8 mt-48 flex-center">
                <button type="button" id="testi-prev"
                    class="text-xl text-white border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 transition-1">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="testi-next"
                    class="text-xl text-white border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 transition-1">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- ============================== Testimonial section start ======================= -->

    <!-- ========================== Shipping Section Start ============================ -->
    <section class="mb-24 shipping mt-80" id="shipping">
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
