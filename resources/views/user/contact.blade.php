@extends('layouts.master')

@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">Contact</h6>
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
                    <li class="text-sm text-main-600"> Contact </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- ============================ Contact Section Start ================================== -->
    <section class="contact py-80">
        <div class="container container-lg">
            <div class="row gy-5">
                <div class="col-lg-8">
                    <div class="px-24 py-40 border border-gray-100 contact-box rounded-16">
                        <form action="#">
                            <h6 class="mb-32">Make Custom Request</h6>
                            <div class="row gy-4">
                                <div class="col-sm-6 col-xs-6">
                                    <label for="name"
                                        class="gap-4 mb-4 text-sm text-gray-900 flex-align font-heading-two fw-semibold">Full
                                        Name <span class="text-xl text-danger line-height-1">*</span> </label>
                                    <input type="text" class="px-16 common-input" id="name" placeholder="Full name">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <label for="email"
                                        class="gap-4 mb-4 text-sm text-gray-900 flex-align font-heading-two fw-semibold">Email
                                        Address <span class="text-xl text-danger line-height-1">*</span> </label>
                                    <input type="email" class="px-16 common-input" id="email"
                                        placeholder="Email address">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <label for="phone"
                                        class="gap-4 mb-4 text-sm text-gray-900 flex-align font-heading-two fw-semibold">Phone
                                        Number<span class="text-xl text-danger line-height-1">*</span> </label>
                                    <input type="number" class="px-16 common-input" id="phone"
                                        placeholder="Phone Number*">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <label for="subject"
                                        class="gap-4 mb-4 text-sm text-gray-900 flex-align font-heading-two fw-semibold">Subject
                                        <span class="text-xl text-danger line-height-1">*</span> </label>
                                    <input type="text" class="px-16 common-input" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-sm-12">
                                    <label for="message"
                                        class="gap-4 mb-4 text-sm text-gray-900 flex-align font-heading-two fw-semibold">Message
                                        <span class="text-xl text-danger line-height-1">*</span> </label>
                                    <textarea class="px-16 common-input" id="message" placeholder="Type your message"></textarea>
                                </div>
                                <div class="mt-32 col-sm-12">
                                    <button type="submit" class="px-32 btn btn-main py-18 rounded-8">Get a Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-24 py-40 border border-gray-100 contact-box rounded-16">
                        <h6 class="mb-48">Get In Touch</h6>
                        <div class="gap-16 mb-16 flex-align">
                            <span
                                class="flex-shrink-0 w-40 h-40 text-2xl border border-gray-100 flex-center rounded-circle text-main-two-600"><i
                                    class="ph-fill ph-phone-call"></i></span>
                            <a href="tel:+00123456789" class="text-gray-900 text-md hover-text-main-600">+00 123 456 789</a>
                        </div>
                        <div class="gap-16 mb-16 flex-align">
                            <span
                                class="flex-shrink-0 w-40 h-40 text-2xl border border-gray-100 flex-center rounded-circle text-main-two-600"><i
                                    class="ph-fill ph-envelope"></i></span>
                            <a href="mailto:support24@marketpro.com"
                                class="text-gray-900 text-md hover-text-main-600">support24@marketpro.com</a>
                        </div>
                        <div class="gap-16 mb-0 flex-align">
                            <span
                                class="flex-shrink-0 w-40 h-40 text-2xl border border-gray-100 flex-center rounded-circle text-main-two-600"><i
                                    class="ph-fill ph-map-pin"></i></span>
                            <span class="text-gray-900 text-md ">789 Inner Lane, California, USA</span>
                        </div>
                    </div>
                    <div class="flex-wrap gap-16 mt-24 flex-align">
                        <a href="#"
                            class="flex-wrap gap-8 p-10 px-16 bg-neutral-600 hover-bg-main-600 rounded-8 flex-between flex-grow-1">
                            <span class="text-white fw-medium">Get Support On Call</span>
                            <span class="text-xl text-white w-36 h-36 bg-main-600 rounded-8 flex-center"><i
                                    class="ph ph-headset"></i></span>
                        </a>
                        <a href="#"
                            class="flex-wrap gap-8 p-10 px-16 bg-neutral-600 hover-bg-main-600 rounded-8 flex-between flex-grow-1">
                            <span class="text-white fw-medium">Get Direction</span>
                            <span class="text-xl text-white w-36 h-36 bg-main-600 rounded-8 flex-center"><i
                                    class="ph ph-map-pin"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Contact Section End ================================== -->

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
