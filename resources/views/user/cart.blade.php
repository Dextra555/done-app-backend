@extends('layouts.master')

@section('main')
<!-- ========================= Breadcrumb Start =============================== -->
<div class="mb-0 breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
            <h6 class="mb-0">Cart</h6>
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
                <li class="text-sm text-main-600"> Product Cart </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- ================================ Cart Section Start ================================ -->
<section class="cart py-80">
    <div class="container container-lg">
        <div class="row gy-4">
            <div class="col-xl-9 col-lg-8">
                <div class="px-40 py-48 border border-gray-100 cart-table rounded-8">
                    <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">
                        <table class="table style-three">
                            <thead>
                                <tr>
                                    <th class="mb-0 text-lg h6 fw-bold">Delete</th>
                                    <th class="mb-0 text-lg h6 fw-bold">Product Name</th>
                                    <th class="mb-0 text-lg h6 fw-bold">Price</th>
                                    <th class="mb-0 text-lg h6 fw-bold">Quantity</th>
                                    <th class="mb-0 text-lg h6 fw-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button type="button"
                                            class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                            <i class="text-2xl ph ph-x-circle d-flex"></i>
                                            Remove
                                        </button>
                                    </td>
                                    <td>
                                        <div class="gap-24 table-product d-flex align-items-center">
                                            <a href="{{ route('product.details.two') }}"
                                                class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                <img src="{{ asset('theme/images/thumbs/product-two-img1.png')}}" alt="">
                                            </a>
                                            <div class="table-product__content text-start">

                                                <h6 class="mb-8 text-lg title fw-semibold">
                                                    <a href="{{ route('product.details') }}" class="link text-line-2"
                                                        tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                                </h6>

                                                <div class="gap-16 mb-16 flex-align">
                                                    <div class="gap-6 flex-align">
                                                        <span class="text-md fw-medium text-warning-600 d-flex"><i
                                                                class="ph-fill ph-star"></i></span>
                                                        <span class="text-gray-900 text-md fw-semibold">4.8</span>
                                                    </div>
                                                    <span class="text-sm text-gray-200 fw-medium">|</span>
                                                    <span class="text-sm text-neutral-600">128 Reviews</span>
                                                </div>

                                                <div class="gap-16 flex-align">
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Camera
                                                    </a>
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Videos
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                    <td>
                                        <div class="overflow-hidden d-flex rounded-4">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__minus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </button>
                                            <input type="number"
                                                class="w-32 px-4 text-center border border-gray-100 quantity__input flex-grow-1 border-start-0 border-end-0"
                                                value="1" min="1">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__plus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button"
                                            class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                            <i class="text-2xl ph ph-x-circle d-flex"></i>
                                            Remove
                                        </button>
                                    </td>
                                    <td>
                                        <div class="gap-24 table-product d-flex align-items-center">
                                            <a href="{{ route('product.details.two') }}"
                                                class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                <img src="{{ asset('theme/images/thumbs/product-two-img2.png')}}" alt="">
                                            </a>
                                            <div class="table-product__content text-start">

                                                <h6 class="mb-8 text-lg title fw-semibold">
                                                    <a href="{{ route('product.details') }}" class="link text-line-2"
                                                        tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                                </h6>

                                                <div class="gap-16 mb-16 flex-align">
                                                    <div class="gap-6 flex-align">
                                                        <span class="text-md fw-medium text-warning-600 d-flex"><i
                                                                class="ph-fill ph-star"></i></span>
                                                        <span class="text-gray-900 text-md fw-semibold">4.8</span>
                                                    </div>
                                                    <span class="text-sm text-gray-200 fw-medium">|</span>
                                                    <span class="text-sm text-neutral-600">128 Reviews</span>
                                                </div>

                                                <div class="gap-16 flex-align">
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Camera
                                                    </a>
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Videos
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                    <td>
                                        <div class="overflow-hidden d-flex rounded-4">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__minus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </button>
                                            <input type="number"
                                                class="w-32 px-4 text-center border border-gray-100 quantity__input flex-grow-1 border-start-0 border-end-0"
                                                value="1" min="1">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__plus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button"
                                            class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                            <i class="text-2xl ph ph-x-circle d-flex"></i>
                                            Remove
                                        </button>
                                    </td>
                                    <td>
                                        <div class="gap-24 table-product d-flex align-items-center">
                                            <a href="{{ route('product.details.two') }}"
                                                class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                <img src="{{ asset('theme/images/thumbs/product-two-img3.png')}}" alt="">
                                            </a>
                                            <div class="table-product__content text-start">

                                                <h6 class="mb-8 text-lg title fw-semibold">
                                                    <a href="{{ route('product.details') }}" class="link text-line-2"
                                                        tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                                </h6>

                                                <div class="gap-16 mb-16 flex-align">
                                                    <div class="gap-6 flex-align">
                                                        <span class="text-md fw-medium text-warning-600 d-flex"><i
                                                                class="ph-fill ph-star"></i></span>
                                                        <span class="text-gray-900 text-md fw-semibold">4.8</span>
                                                    </div>
                                                    <span class="text-sm text-gray-200 fw-medium">|</span>
                                                    <span class="text-sm text-neutral-600">128 Reviews</span>
                                                </div>

                                                <div class="gap-16 flex-align">
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Camera
                                                    </a>
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Videos
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                    <td>
                                        <div class="overflow-hidden d-flex rounded-4">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__minus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </button>
                                            <input type="number"
                                                class="w-32 px-4 text-center border border-gray-100 quantity__input flex-grow-1 border-start-0 border-end-0"
                                                value="1" min="1">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__plus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button"
                                            class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                            <i class="text-2xl ph ph-x-circle d-flex"></i>
                                            Remove
                                        </button>
                                    </td>
                                    <td>
                                        <div class="gap-24 table-product d-flex align-items-center">
                                            <a href="{{ route('product.details.two') }}"
                                                class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                <img src="{{ asset('theme/images/thumbs/product-two-img4.png')}}" alt="">
                                            </a>
                                            <div class="table-product__content text-start">

                                                <h6 class="mb-8 text-lg title fw-semibold">
                                                    <a href="{{ route('product.details') }}" class="link text-line-2"
                                                        tabindex="0">Taylor Farms Broccoli Florets Vegetables</a>
                                                </h6>

                                                <div class="gap-16 mb-16 flex-align">
                                                    <div class="gap-6 flex-align">
                                                        <span class="text-md fw-medium text-warning-600 d-flex"><i
                                                                class="ph-fill ph-star"></i></span>
                                                        <span class="text-gray-900 text-md fw-semibold">4.8</span>
                                                    </div>
                                                    <span class="text-sm text-gray-200 fw-medium">|</span>
                                                    <span class="text-sm text-neutral-600">128 Reviews</span>
                                                </div>

                                                <div class="gap-16 flex-align">
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Camera
                                                    </a>
                                                    <a href="{{ route('cart') }}"
                                                        class="gap-8 px-8 text-sm product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-7 rounded-8 flex-center fw-medium">
                                                        Videos
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                    <td>
                                        <div class="overflow-hidden d-flex rounded-4">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__minus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-minus"></i>
                                            </button>
                                            <input type="number"
                                                class="w-32 px-4 text-center border border-gray-100 quantity__input flex-grow-1 border-start-0 border-end-0"
                                                value="1" min="1">
                                            <button type="button"
                                                class="flex-shrink-0 w-48 h-48 border border-gray-100 quantity__plus border-end text-neutral-600 flex-center hover-bg-main-600 hover-text-white">
                                                <i class="ph ph-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-wrap gap-16 mt-16 flex-between">
                        <div class="gap-16 flex-align">
                            <input type="text" class="common-input" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-main py-18 w-100 rounded-8">Apply Coupon</button>
                        </div>
                        <button type="submit" class="text-lg text-gray-500 hover-text-main-600">Update Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="px-24 py-40 border border-gray-100 cart-sidebar rounded-8">
                    <h6 class="mb-32 text-xl">Cart Totals</h6>
                    <div class="p-24 bg-color-three rounded-8">
                        <div class="gap-8 mb-32 flex-between">
                            <span class="text-gray-900 font-heading-two">Subtotal</span>
                            <span class="text-gray-900 fw-semibold">$250.00</span>
                        </div>
                        <div class="gap-8 mb-32 flex-between">
                            <span class="text-gray-900 font-heading-two">Extimated Delivery</span>
                            <span class="text-gray-900 fw-semibold">Free</span>
                        </div>
                        <div class="gap-8 mb-0 flex-between">
                            <span class="text-gray-900 font-heading-two">Extimated Taxs</span>
                            <span class="text-gray-900 fw-semibold">USD 10.00</span>
                        </div>
                    </div>
                    <div class="p-24 mt-24 bg-color-three rounded-8">
                        <div class="gap-8 flex-between">
                            <span class="text-xl text-gray-900 fw-semibold">Total</span>
                            <span class="text-xl text-gray-900 fw-semibold">$250.00</span>
                        </div>
                    </div>
                    <a href="{{ route('checkout') }}" class="mt-40 btn btn-main py-18 w-100 rounded-8">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ Cart Section End ================================ -->

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
