@extends('layouts.master')

@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">My Wishlist</h6>
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
                    <li class="text-sm text-main-600"> Wishlist </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- ================================ Cart Section Start ================================ -->
    <section class="cart py-80">
        <div class="container container-lg">
            <div class="row gy-4">
                <div class="col-lg-11">
                    <div class="border border-gray-100 cart-table rounded-8">
                        <div class="overflow-x-auto scroll-sm scroll-sm-horizontal">
                            <table class="table overflow-hidden rounded-8">
                                <thead>
                                    <tr class="border-bottom border-neutral-100">
                                        <th class="px-40 py-32 mb-0 text-lg h6 fw-bold border-end border-neutral-100">Delete
                                        </th>
                                        <th class="px-40 py-32 mb-0 text-lg h6 fw-bold border-end border-neutral-100">
                                            Product Name</th>
                                        <th class="px-40 py-32 mb-0 text-lg h6 fw-bold border-end border-neutral-100">Unit
                                            Price</th>
                                        <th class="px-40 py-32 mb-0 text-lg h6 fw-bold border-end border-neutral-100">Stock
                                            Status</th>
                                        <th class="px-40 py-32 mb-0 text-lg h6 fw-bold"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <button type="button"
                                                class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                                <i class="text-2xl ph ph-x-circle d-flex"></i>
                                                Remove
                                            </button>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <div class="gap-24 table-product d-flex align-items-center">
                                                <a href="{{ route('product.details.two') }}"
                                                    class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                    {{-- <img src="assets/images/thumbs/product-two-img1.png" alt=""> --}}
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
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">In Stock</span>
                                        </td>
                                        <td class="px-40 py-32">
                                            <a href="{{ route('cart') }}" class="px-64 btn btn-main-two rounded-8">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <button type="button"
                                                class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                                <i class="text-2xl ph ph-x-circle d-flex"></i>
                                                Remove
                                            </button>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <div class="gap-24 table-product d-flex align-items-center">
                                                <a href="{{ route('product.details.two') }}"
                                                    class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                    <img src="assets/images/thumbs/product-two-img3.png" alt="">
                                                </a>
                                                <div class="table-product__content text-start">

                                                    <h6 class="mb-8 text-lg title fw-semibold">
                                                        <a href="{{ route('product.details') }}" class="link text-line-2"
                                                            tabindex="0">Smart Phone With Intel Celeron</a>
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
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">In Stock</span>
                                        </td>
                                        <td class="px-40 py-32">
                                            <a href="{{ route('cart') }}" class="px-64 btn btn-main-two rounded-8">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <button type="button"
                                                class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                                <i class="text-2xl ph ph-x-circle d-flex"></i>
                                                Remove
                                            </button>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <div class="gap-24 table-product d-flex align-items-center">
                                                <a href="{{ route('product.details.two') }}"
                                                    class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                    <img src="assets/images/thumbs/product-two-img14.png" alt="">
                                                </a>
                                                <div class="table-product__content text-start">

                                                    <h6 class="mb-8 text-lg title fw-semibold">
                                                        <a href="{{ route('product.details') }}" class="link text-line-2"
                                                            tabindex="0">HP Chromebook With Intel Celeron</a>
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
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">In Stock</span>
                                        </td>
                                        <td class="px-40 py-32">
                                            <a href="{{ route('cart') }}" class="px-64 btn btn-main-two rounded-8">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <button type="button"
                                                class="gap-12 remove-tr-btn flex-align hover-text-danger-600">
                                                <i class="text-2xl ph ph-x-circle d-flex"></i>
                                                Remove
                                            </button>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <div class="gap-24 table-product d-flex align-items-center">
                                                <a href="{{ route('product.details.two') }}"
                                                    class="border border-gray-100 table-product__thumb rounded-8 flex-center ">
                                                    <img src="assets/images/thumbs/product-two-img2.png" alt="">
                                                </a>
                                                <div class="table-product__content text-start">

                                                    <h6 class="mb-8 text-lg title fw-semibold">
                                                        <a href="{{ route('product.details') }}" class="link text-line-2"
                                                            tabindex="0">Smart watch With Intel Celeron</a>
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
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">$125.00</span>
                                        </td>
                                        <td class="px-40 py-32 border-end border-neutral-100">
                                            <span class="mb-0 text-lg h6 fw-semibold">In Stock</span>
                                        </td>
                                        <td class="px-40 py-32">
                                            <a href="{{ route('cart') }}" class="px-64 btn btn-main-two rounded-8">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
