@extends('layouts.master')

@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">Checkout</h6>
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
                    <li class="text-sm text-main-600"> Checkout </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- ================================= Checkout Page Start ===================================== -->
    <section class="checkout py-80">
        <div class="container container-lg">
            <div class="py-20 mb-40 border border-gray-100 rounded-8 px-30">
                <span class="">Have a coupon? <a href="{{ route('cart') }}"
                        class="text-gray-900 fw-semibold hover-text-decoration-underline hover-text-main-600">Click here to
                        enter your code</a> </span>
            </div>
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <form action="#" class="pe-xl-5">
                        <div class="row gy-3">
                            <div class="col-sm-6 col-xs-6">
                                <input type="text" class="border-gray-100 common-input" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <input type="text" class="border-gray-100 common-input" placeholder="Last Name">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input" placeholder="Business Name">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input" placeholder="United states (US)">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input"
                                    placeholder="House number and street name">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input"
                                    placeholder="Apartment, suite, unit, etc. (Optional)">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input" placeholder="City">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input" placeholder="Sans Fransisco">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border-gray-100 common-input" placeholder="Post Code">
                            </div>
                            <div class="col-12">
                                <input type="number" class="border-gray-100 common-input" placeholder="Phone">
                            </div>
                            <div class="col-12">
                                <input type="email" class="border-gray-100 common-input" placeholder="Email Address">
                            </div>

                            <div class="col-12">
                                <div class="my-40">
                                    <h6 class="mb-24 text-lg">Additional Information</h6>
                                    <input type="text" class="border-gray-100 common-input"
                                        placeholder="Notes about your order, e.g. special notes for delivery.">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="p-24 text-center bg-color-three rounded-8">
                            <span class="text-xl text-gray-900 fw-semibold">Your Orders</span>
                        </div>

                        <div class="px-24 py-40 mt-24 border border-gray-100 rounded-8">
                            <div class="gap-8 pb-32 mb-32 border-gray-100 border-bottom flex-between">
                                <span class="text-xl text-gray-900 fw-medium font-heading-two">Product</span>
                                <span class="text-xl text-gray-900 fw-medium font-heading-two">Subtotal</span>
                            </div>

                            <div class="gap-24 mb-32 flex-between">
                                <div class="gap-12 flex-align">
                                    <span class="text-gray-900 fw-normal text-md font-heading-two w-144">HP Chromebook With
                                        Intel Celeron</span>
                                    <span class="text-gray-900 fw-normal text-md font-heading-two"><i
                                            class="ph-bold ph-x"></i></span>
                                    <span class="text-gray-900 fw-semibold text-md font-heading-two">1</span>
                                </div>
                                <span class="text-gray-900 fw-bold text-md font-heading-two">$250.00</span>
                            </div>
                            <div class="gap-24 mb-32 flex-between">
                                <div class="gap-12 flex-align">
                                    <span class="text-gray-900 fw-normal text-md font-heading-two w-144">HP Chromebook With
                                        Intel Celeron</span>
                                    <span class="text-gray-900 fw-normal text-md font-heading-two"><i
                                            class="ph-bold ph-x"></i></span>
                                    <span class="text-gray-900 fw-semibold text-md font-heading-two">1</span>
                                </div>
                                <span class="text-gray-900 fw-bold text-md font-heading-two">$250.00</span>
                            </div>
                            <div class="gap-24 mb-32 flex-between">
                                <div class="gap-12 flex-align">
                                    <span class="text-gray-900 fw-normal text-md font-heading-two w-144">HP Chromebook With
                                        Intel Celeron</span>
                                    <span class="text-gray-900 fw-normal text-md font-heading-two"><i
                                            class="ph-bold ph-x"></i></span>
                                    <span class="text-gray-900 fw-semibold text-md font-heading-two">1</span>
                                </div>
                                <span class="text-gray-900 fw-bold text-md font-heading-two">$250.00</span>
                            </div>
                            <div class="gap-24 mb-32 flex-between">
                                <div class="gap-12 flex-align">
                                    <span class="text-gray-900 fw-normal text-md font-heading-two w-144">HP Chromebook With
                                        Intel Celeron</span>
                                    <span class="text-gray-900 fw-normal text-md font-heading-two"><i
                                            class="ph-bold ph-x"></i></span>
                                    <span class="text-gray-900 fw-semibold text-md font-heading-two">1</span>
                                </div>
                                <span class="text-gray-900 fw-bold text-md font-heading-two">$250.00</span>
                            </div>


                            <div class="border-gray-100 border-top pt-30 mt-30">
                                <div class="gap-8 mb-32 flex-between">
                                    <span class="text-xl text-gray-900 font-heading-two fw-semibold">Subtotal</span>
                                    <span class="text-gray-900 font-heading-two text-md fw-bold">$859.00</span>
                                </div>
                                <div class="gap-8 mb-0 flex-between">
                                    <span class="text-xl text-gray-900 font-heading-two fw-semibold">Total</span>
                                    <span class="text-gray-900 font-heading-two text-md fw-bold">$859.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-32">
                            <div class="payment-item">
                                <div class="py-16 mb-0 form-check common-check common-radio">
                                    <input class="form-check-input" type="radio" name="payment" id="payment1"
                                        checked>
                                    <label class="form-check-label fw-semibold text-neutral-600" for="payment1">Direct
                                        Bank transfer</label>
                                </div>
                                <div class="px-16 py-24 payment-item__content rounded-8 bg-main-50 position-relative">
                                    <p class="text-gray-800">Make your payment directly into our bank account. Please use
                                        your Order ID as the payment reference. Your order will not be shipped until the
                                        funds have cleared in our account.</p>
                                </div>
                            </div>
                            <div class="payment-item">
                                <div class="py-16 mb-0 form-check common-check common-radio">
                                    <input class="form-check-input" type="radio" name="payment" id="payment2">
                                    <label class="form-check-label fw-semibold text-neutral-600" for="payment2">Check
                                        payments</label>
                                </div>
                                <div class="px-16 py-24 payment-item__content rounded-8 bg-main-50 position-relative">
                                    <p class="text-gray-800">Make your payment directly into our bank account. Please use
                                        your Order ID as the payment reference. Your order will not be shipped until the
                                        funds have cleared in our account.</p>
                                </div>
                            </div>
                            <div class="payment-item">
                                <div class="py-16 mb-0 form-check common-check common-radio">
                                    <input class="form-check-input" type="radio" name="payment" id="payment3">
                                    <label class="form-check-label fw-semibold text-neutral-600" for="payment3">Cash on
                                        delivery</label>
                                </div>
                                <div class="px-16 py-24 payment-item__content rounded-8 bg-main-50 position-relative">
                                    <p class="text-gray-800">Make your payment directly into our bank account. Please use
                                        your Order ID as the payment reference. Your order will not be shipped until the
                                        funds have cleared in our account.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-32 mt-32 border-gray-100 border-top">
                            <p class="text-gray-500">Your personal data will be used to process your order, support your
                                experience throughout this website, and for other purposes described in our <a
                                    href="#" class="text-main-600 text-decoration-underline"> privacy policy</a> .
                            </p>
                        </div>

                        <a href="{{ route('checkout') }}" class="mt-40 mt-56 btn btn-main py-18 w-100 rounded-8">Place Order</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= Checkout Page End ===================================== -->

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
