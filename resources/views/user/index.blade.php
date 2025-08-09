@extends('layouts.master')

@section('main')
    <!-- ============================ Banner Section start =============================== -->
    <div class="banner">
        <div class="container container-lg">
            <div class="overflow-hidden banner-item rounded-24 position-relative arrow-center">
                <a href="#featureSection"
                    class="bottom-0 text-center text-white border border-white scroll-down w-84 h-84 flex-center bg-main-600 rounded-circle border-5 position-absolute start-50 translate-middle-x hover-bg-main-800">
                    <span class="icon line-height-0"><i class="ph ph-caret-double-down"></i></span>
                </a>
                <img src="{{ asset('theme/images/bg/banner-bg22.png') }}" alt=""
                    class="banner-img position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1 object-fit-cover rounded-24" />

                <div class="flex-align">
                    <button type="button" id="banner-prev"
                        class="text-xl bg-white slick-prev slick-arrow flex-center rounded-circle box-shadow-4xl hover-bg-main-600 hover-text-white transition-1">
                        <i class="ph ph-caret-left"></i>
                    </button>
                    <button type="button" id="banner-next"
                        class="text-xl bg-white slick-next slick-arrow flex-center rounded-circle box-shadow-4xl hover-bg-main-600 hover-text-white transition-1">
                        <i class="ph ph-caret-right"></i>
                    </button>
                </div>

                <div class="banner-slider">
                    <div class="banner-slider__item">
                        <div class="banner-slider__inner flex-between position-relative">
                            <div class="banner-item__content">
                                <span
                                    class="mb-8 fw-semibold text-success-600 text-capitalize animate-left-right animation-delay-08">Save
                                    up to 50% off on your first order</span>
                                {{-- <h2
                    class="banner-item__title max-w-700 mb-30 animate-left-right animation-delay-1"
                  >
                    Daily Grocery Order and Get
                    <span class="text-main-600">Express</span> Delivery
                  </h2> --}}


                                {{-- <h2 class="banner-item__title max-w-700 mb-30 animate-left-right animation-delay-1">
                Discover <span class="text-main-600">3,00,000+</span> Interior Materials at One Place
                </h2> --}}
                                <h2 class="banner-item__title max-w-700 mb-30 animate-left-right animation-delay-1">
                                    Discover <br><span class="text-main-600">3,00,000+ Materials</span><br> One Place
                                </h2>

                                <div class="gap-16 d-flex align-items-center animate-left-right animation-delay-12">
                                    <a href="{{ route('shop') }}"
                                        class="gap-8 btn btn-main d-inline-flex align-items-center rounded-pill">
                                        Explore Shop
                                        <span class="text-xl icon d-flex"><i class="ph ph-shopping-cart-simple"></i>
                                        </span>
                                    </a>
                                    <div class="gap-8 d-flex align-items-end">
                                        <span class="text-sm text-heading fst-italic">Starting at</span>
                                        <h6 class="mb-0 text-danger-600">$60.99</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-item__thumb animate-scale animation-delay-12">
                                <img src="{{ asset('theme/images/thumbs/sample1.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="banner-slider__item">
                        <div class="banner-slider__inner flex-between position-relative">
                            <div class="banner-item__content">
                                <span
                                    class="mb-8 fw-semibold text-success-600 text-capitalize animate-left-right animation-delay-08">Save
                                    up to 50% off on your first order</span>
                                {{-- <h2
                    class="banner-item__title max-w-700 mb-30 animate-left-right animation-delay-1"
                  >
                    Daily Grocery Order and Get
                    <span class="text-main-600">Express</span> Delivery
                  </h2> --}}
                                <h2 class="banner-item__title max-w-700 mb-30 animate-left-right animation-delay-1">
                                    Explore <br> <span class="text-main-600">Top Interior Materials<br></span> Online
                                </h2>


                                <div class="gap-16 d-flex align-items-center animate-left-right animation-delay-12">
                                    <a href="{{ route('shop') }}"
                                        class="gap-8 btn btn-main d-inline-flex align-items-center rounded-pill">
                                        Explore Shop
                                        <span class="text-xl icon d-flex"><i class="ph ph-shopping-cart-simple"></i>
                                        </span>
                                    </a>
                                    <div class="gap-8 d-flex align-items-end">
                                        <span class="text-sm text-heading fst-italic">Starting at</span>
                                        <h6 class="mb-0 text-danger-600">$60.99</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-item__thumb animate-scale animation-delay-12">
                                <img src="{{ asset('theme/images/thumbs/sample.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Banner Section End =============================== -->

    <!-- ============================ Feature Section start =============================== -->
    <div class="feature" id="featureSection">
        <div class="container container-lg">
            <div class="position-relative arrow-center">
                <div class="flex-align">
                    <button type="button" id="feature-item-wrapper-prev"
                        class="text-xl bg-white slick-prev slick-arrow flex-center rounded-circle hover-bg-main-600 hover-text-white transition-1">
                        <i class="ph ph-caret-left"></i>
                    </button>
                    <button type="button" id="feature-item-wrapper-next"
                        class="text-xl bg-white slick-next slick-arrow flex-center rounded-circle hover-bg-main-600 hover-text-white transition-1">
                        <i class="ph ph-caret-right"></i>
                    </button>
                </div>
                <div class="feature-item-wrapper">
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="400"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img1.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Vegetables</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="600"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img2.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Fish & Meats</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="800"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img3.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Desserts</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    @foreach ($categories as $category)
                        <div class="text-center feature-item wow bounceIn" data-aos="fade-up" data-aos-duration="1000">
                            <div class="feature-item__thumb rounded-circle">
                                <a href="{{ route('shop.category', ['slug' => $category['slug']]) }}"
                                    class="w-100 h-100 flex-center">
                                    <img src="{{ url($category['image_url']) }}" alt="" />
                                </a>
                            </div>
                            <div class="mt-16 feature-item__content">
                                <h6 class="mb-8 text-lg">
                                    <a href="{{ route('shop.category', ['slug' => $category['slug']]) }}"
                                        class="text-inherit">{{ $category['name'] }}</a>
                                </h6>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="1200"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img5.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Animals Food</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="1400"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img6.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Fresh Fruits</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="1600"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img7.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Yummy Candy</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="1800"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img2.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Fish & Meats</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="2000"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img8.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Dairy & Eggs</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="2200"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img9.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Snacks</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                    {{-- <div
              class="text-center feature-item wow bounceIn"
              data-aos="fade-up"
              data-aos-duration="2400"
            >
              <div class="feature-item__thumb rounded-circle">
                <a href="{{ route('shop') }}" class="w-100 h-100 flex-center">
                  <img src="{{ asset('theme/images/thumbs/feature-img10.png') }}" alt="" />
                </a>
              </div>
              <div class="mt-16 feature-item__content">
                <h6 class="mb-8 text-lg">
                  <a href="{{ route('shop') }}" class="text-inherit">Frozen Foods</a>
                </h6>
                <span class="text-sm text-gray-400">125+ Products</span>
              </div>
            </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Feature Section End =============================== -->

    <!-- ======================== promotional banner Start ============================== -->
    {{-- <section class="promotional-banner pt-80">
      <div class="container container-lg">
        <div class="row gy-4">
          <div
            class="col-xl-3 col-sm-6 col-xs-6 wow bounceIn"
            data-aos="fade-up"
            data-aos-duration="400"
          >
            <div
              class="overflow-hidden promotional-banner-item position-relative rounded-24 z-1 py-52 ps-40 pe-24 h-100"
            >
              <img
                src="{{ asset('theme/images/thumbs/promotional-banner-img1.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1"
              />
              <div class="promotional-banner-item__content">
                <h6 class="text-2xl promotional-banner-item__title max-w-184">
                  Everyday Fresh Meat
                </h6>
                <div class="gap-8 d-flex align-items-end">
                  <span class="text-sm text-heading fst-italic"
                    >Starting at</span
                  >
                  <h6 class="mb-0 text-xl text-danger-600">$60.99</h6>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
          <div
            class="col-xl-3 col-sm-6 col-xs-6 wow bounceIn"
            data-aos="fade-up"
            data-aos-duration="600"
          >
            <div
              class="overflow-hidden promotional-banner-item position-relative rounded-24 z-1 py-52 ps-40 pe-24 h-100"
            >
              <img
                src="{{ asset('theme/images/thumbs/promotional-banner-img2.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1"
              />
              <div class="promotional-banner-item__content">
                <h6 class="text-2xl promotional-banner-item__title max-w-184">
                  Daily Fresh Vegetables
                </h6>
                <div class="gap-8 d-flex align-items-end">
                  <span class="text-sm text-heading fst-italic"
                    >Starting at</span
                  >
                  <h6 class="mb-0 text-xl text-danger-600">$60.99</h6>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
          <div
            class="col-xl-3 col-sm-6 col-xs-6 wow bounceIn"
            data-aos="fade-up"
            data-aos-duration="800"
          >
            <div
              class="overflow-hidden promotional-banner-item position-relative rounded-24 z-1 py-52 ps-40 pe-24 h-100"
            >
              <img
                src="{{ asset('theme/images/thumbs/promotional-banner-img3.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1"
              />
              <div class="promotional-banner-item__content">
                <h6 class="text-2xl promotional-banner-item__title max-w-184">
                  Everyday Fresh Milk
                </h6>
                <div class="gap-8 d-flex align-items-end">
                  <span class="text-sm text-heading fst-italic"
                    >Starting at</span
                  >
                  <h6 class="mb-0 text-xl text-danger-600">$60.99</h6>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
          <div
            class="col-xl-3 col-sm-6 col-xs-6 wow bounceIn"
            data-aos="fade-up"
            data-aos-duration="1000"
          >
            <div
              class="overflow-hidden promotional-banner-item position-relative rounded-24 z-1 py-52 ps-40 pe-24 h-100"
            >
              <img
                src="{{ asset('theme/images/thumbs/promotional-banner-img4.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1"
              />
              <div class="promotional-banner-item__content">
                <h6 class="text-2xl promotional-banner-item__title max-w-184">
                  Everyday Fresh Fruits
                </h6>

                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- ======================== promotional banner End ============================== -->

    <div class="product pt-60">
        <div class="container container-lg">
            <div class="section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h5 class="mb-0 wow fadeInLeft">New Arrivals</h5>
                    <div class="gap-16 flex-align wow fadeInRight">
                        <a href="{{ route('shop') }}"
                            class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline">View
                            All Deals</a>
                        <div class="gap-8 flex-align">
                            <button type="button" id="product-one-prev"
                                class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1">
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="product-one-next"
                                class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1">
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-one-slider g-12">

                {{-- Flash sale section  --}}
                {{-- @php
                    echo "<pre>";
                    print_r($flashSaleProducts['products']);
                    echo "</pre>";
                @endphp
                {{exit}} --}}
                @if (empty($flashSaleProducts['products']))
                    <div class="text-center">
                        <p class="text-gray-500">No flash sale products.</p>
                    </div>
                @else
                    @foreach ($flashSaleProducts['products'] as $flashSaleProduct)
                        <div class="" data-aos="fade-up" data-aos-duration="200">
                            <div
                                class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 text-white product-card__cart btn bg-warning-900 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>

                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ $flashSaleProduct['image_url'] }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span
                                            class="text-heading text-md fw-semibold">{{ $flashSaleProduct['selling_price'] }}
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span
                                            class="text-xs text-gray-600 fw-bold">{{ $flashSaleProduct['average_rating'] }}</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">{{ $flashSaleProduct['name'] }}</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif





                {{-- <div class="" data-aos="fade-up" data-aos-duration="400">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img27.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" data-aos="fade-up" data-aos-duration="600">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img28.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" data-aos="fade-up" data-aos-duration="800">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img29.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" data-aos="fade-up" data-aos-duration="1000">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img30.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" data-aos="fade-up" data-aos-duration="1200">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img13.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" data-aos="fade-up" data-aos-duration="600">
                    <div
                        class="px-20 py-16 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                        <a href="{{ route('cart') }}"
                            class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                            Add <i class="ph ph-shopping-cart"></i>
                        </a>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="{{ asset('theme/images/thumbs/product-img3.png') }}" alt="" />
                        </a>
                        <div class="mt-12 product-card__content">
                            <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                <span class="text-heading text-md fw-semibold">$14.99 <span
                                        class="text-gray-500 fw-normal">/Qty</span>
                                </span>
                                <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                    $28.99</span>
                            </div>
                            <div class="gap-6 flex-align">
                                <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                            </div>
                            <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets Vegetables</a>
                            </h6>
                            <div class="mt-12">
                                <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- ========================= flash sales Start ================================ -->
    {{-- <section class="overflow-hidden flash-sales pt-80">
      <div class="container container-lg">
        <div class="row gy-4 arrow-style-two">
          <div class="col-lg-6" data-aos="fade-up" data-aos-duration="600">
            <div
              class="gap-8 overflow-hidden flash-sales-item rounded-16 z-1 position-relative flex-align flex-0 justify-content-between ps-56-px"
            >
              <img
                src="{{ asset('theme/images/bg/flash-sale-bg1.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg"
              />
              <div class="flash-sales-item__content ms-sm-auto">
                <h6 class="mb-8 text-32">X-Connect Smart Television</h6>
                <p class="mb-12 text-neutral-500">
                  Time remaining until the end of the offer.
                </p>
                <div class="countdown" id="countdown1">
                  <ul class="flex-wrap countdown-list flex-align">
                    <li
                      class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium box-shadow-4xl rounded-5"
                    >
                      <span class="days"></span> D
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium box-shadow-4xl rounded-5"
                    >
                      <span class="hours"></span> H
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium box-shadow-4xl rounded-5"
                    >
                      <span class="minutes"></span> M
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium box-shadow-4xl rounded-5"
                    >
                      <span class="seconds"></span> S
                    </li>
                  </ul>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn btn-main d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
            <div
              class="gap-8 overflow-hidden flash-sales-item rounded-16 z-1 position-relative flex-align flex-0 justify-content-between ps-56-px"
            >
              <img
                src="{{ asset('theme/images/bg/flash-sale-bg2.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 object-fit-cover z-n1 flash-sales-item__bg"
              />
              <div class="flash-sales-item__content">
                <h6 class="mb-8 text-32">Vegetables Combo Box</h6>
                <p class="mb-12 text-heading">
                  Time remaining until the end of the offer.
                </p>
                <div class="countdown" id="countdown2">
                  <ul class="flex-wrap countdown-list flex-align">
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="days"></span> D
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="hours"></span> H
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="minutes"></span> M
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="seconds"></span> S
                    </li>
                  </ul>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-24 btn bg-success-600 hover-bg-success-700 d-inline-flex align-items-center rounded-pill"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- ========================= flash sales End ================================ -->

    <!-- ========================= Inspiration Start ================================ -->
    <section class="overflow-hidden recommended pt-80">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 section-heading flex-between">
                <h5 class="mb-0 wow fadeInLeft">Inspiration Products By Category</h5>
                <ul class="nav common-tab nav-pills wow fadeInRight" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="text-sm border border-white nav-link fw-medium hover-border-main-600 active"
                            data-inspiration-id="all" id="pills-all-tab" type="button">All</button>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item" role="presentation">
                            <button class="text-sm border border-white nav-link fw-medium hover-border-main-600"
                                data-inspiration-id="{{ $category['id'] }}" id="pills-{{ $category['slug'] }}-tab"
                                type="button">{{ $category['name'] }}</button>
                        </li>
                    @endforeach
                    <!-- Add other categories with their correct inspiration_id -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="inspiration-products">
                        <div class="row g-12" id="inspirationProductsContainer">
                            <!-- Products will be loaded here -->
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Function to render products
                        function renderProducts(products) {
                            let html = '';
                            if (!products || products.length === 0) {
                                html = '<div class="col-12"><p class="text-center text-gray-500">No products found.</p></div>';
                            } else {
                                products.forEach(function(product) {
                                    html += `
                <div class="col-xxl-2 col-lg-3 col-sm-4 col-6" data-aos="fade-up">
                    <div class="p-12 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2 group-item">
                        <button type="button" class="wishlist-btn-two"><i class="ph-bold ph-heart"></i></button>
                        <a href="#" class="overflow-hidden product-card__thumb flex-center">
                            <img src="${product.image_url}" alt="${product.name}" />
                        </a>
                        <div class="product-card__content p-sm-2 w-100">
                            <h6 class="my-12 text-lg title fw-semibold">
                                <a href="#" class="link text-line-2">${product.name}</a>
                            </h6>
                            <div class="mt-12 product-card__content">
                                <div class="mb-8 product-card__price">
                                    <span class="text-heading text-md fw-semibold">${product.selling_price || ''} <span class="text-gray-500 fw-normal">/Qty</span></span>
                                </div>
                                <div class="gap-6 flex-align">
                                    <span class="text-xs text-gray-600 fw-bold">${product.average_rating || ''}</span>
                                    <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                </div>
                                <a href="{{ route('cart') }}" class="gap-8 px-24 mt-24 product-card__cart btn bg-warning-900 text-white hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center">
                                    Add To Cart <i class="ph ph-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                                });
                            }
                            $('#inspirationProductsContainer').html(html);
                        }

                        // Initial load: show all inspiration products (replace 'all' with your default inspiration_id if needed)
                        function loadInspirationProducts(inspirationId) {
                            let url = '';
                            if (inspirationId === 'all') {
                                // Load all products (replace with your actual API for all if different)
                                url = `/shop/category/tiles/inspiration`;
                            } else {
                                // url = `ajax/inspiration/${inspirationId}`;
                                url = `/shop/category/tiles/inspiration`;
                            }
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(response) {
                                    console.log('AJAX Success:', response); // ✅ Debug 4: View full response
                                    if (response.status && response.data && response.data.products) {
                                        renderProducts(response.data.products);
                                    } else {
                                        renderProducts([]);
                                    }
                                },
                                error: function() {
                                    renderProducts([]);
                                }
                            });
                        }

                        // On tab click
                        $('#pills-tab').on('click', 'button[data-inspiration-id]', function() {
                            $('#pills-tab button').removeClass('active');
                            $(this).addClass('active');
                            let inspirationId = $(this).data('inspiration-id');
                            loadInspirationProducts(inspirationId);
                        });

                        // Initial load
                        loadInspirationProducts('all');
                    });
                </script>
            </div>
        </div>
        </div>
    </section>
    <!-- ========================= Inspiration End ================================ -->

    <!-- =========================== Offer Section Start =============================== -->
    {{-- <section class="offer pt-80">
      <div class="container container-lg">
        <div class="row gy-4">
          <div class="col-sm-6" data-aos="zoom-in" data-aos-duration="600">
            <div
              class="p-16 overflow-hidden offer-card position-relative rounded-16 ps-56-px"
            >
              <img
                src="{{ asset('theme/images/bg/offer-bg-img1.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100"
              />
              <div class="py-xl-4 max-w-392 ms-auto">
                <div
                  class="mb-16 bg-white offer-card__logo w-80 h-80 flex-center rounded-circle"
                >
                  <img src="{{ asset('theme/images/thumbs/offer-logo.png') }}" alt="" />
                </div>
                <h5 class="mb-8">$5 off your first order</h5>
                <div class="gap-8 flex-align">
                  <span class="text-sm fw-medium text-heading"
                    >Delivery by 6:15am</span
                  >
                  <span class="text-xs text-heading">Expire Aug 5</span>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-16 text-white btn bg-success-600 hover-text-white hover-bg-success-700 fw-medium d-inline-flex align-items-center rounded-pill"
                  tabindex="0"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6" data-aos="zoom-in" data-aos-duration="800">
            <div
              class="p-16 overflow-hidden offer-card position-relative rounded-16 ps-56-px"
            >
              <img
                src="{{ asset('theme/images/bg/offer-bg-img2.png') }}"
                alt=""
                class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100"
              />
              <div class="py-xl-4 max-w-392">
                <div
                  class="mb-16 bg-white offer-card__logo w-80 h-80 flex-center rounded-circle"
                >
                  <img src="{{ asset('theme/images/thumbs/offer-logo.png') }}" alt="" />
                </div>
                <h5 class="mb-8">$5 off your first order</h5>
                <div class="gap-8 flex-align">
                  <span class="text-sm fw-medium text-heading"
                    >Delivery by 6:15am</span
                  >
                  <span class="text-sm text-success-600">Expire Aug 5</span>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-16 bg-white btn hover-text-white hover-bg-main-800 text-heading fw-medium d-inline-flex align-items-center rounded-pill"
                  tabindex="0"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- =========================== Offer Section End =============================== -->

    <!-- ========================= hot-deals Start ================================ -->
    <section class="overflow-hidden hot-deals pt-80">
        <div class="container container-lg">
            <div class="section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h5 class="mb-0 wow fadeInLeft">Hot Deals Todays</h5>
                    <div class="gap-16 flex-align wow fadeInRight">
                        <a href="{{ route('shop') }}"
                            class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline">View
                            All Deals</a>
                        <div class="gap-8 flex-align">
                            <button type="button" id="deals-prev"
                                class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1">
                                <i class="ph ph-caret-left"></i>
                            </button>
                            <button type="button" id="deals-next"
                                class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1">
                                <i class="ph ph-caret-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-12">
                <div class="col-md-4" data-aos="zoom-in">
                    <div
                        class="overflow-hidden hot-deals position-relative rounded-16 bg-main-600 ps-40 pe-24 pt-80 pb-120 z-1">
                        <img src="{{ asset('theme/images/shape/offer-shape.png') }}" alt=""
                            class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6" />

                        <img src="{{ asset('theme/images/thumbs/basket-img.png') }}" alt="Basket Thumb"
                            class="position-absolute inset-inline-end-0 inset-block-end-0" />

                        <span
                            class="px-12 py-4 text-sm text-primary-600 bg-yellow text-heading rounded-4 fw-medium">Medical
                            equipment</span>
                        <div class="">
                            <h5 class="mt-12 mb-8 text-white">Deals of the day</h5>
                            <p class="fw-semibold text-success-600">
                                Save up to 50% off on your first order
                            </p>
                            <div class="mt-24 mb-24 countdown" id="countdown4">
                                <ul class="flex-wrap countdown-list d-flex align-items-center">
                                    <li
                                        class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium colon-white">
                                        <span class="days"></span> D
                                    </li>
                                    <li
                                        class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium colon-white">
                                        <span class="hours"></span> H
                                    </li>
                                    <li
                                        class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium colon-white">
                                        <span class="minutes"></span> M
                                    </li>
                                    <li
                                        class="gap-4 px-12 py-8 text-sm countdown-list__item text-heading flex-align fw-medium colon-white">
                                        <span class="seconds"></span> S
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('shop') }}"
                                class="gap-8 mt-16 bg-white btn hover-text-white hover-bg-main-800 text-main-600 fw-medium d-inline-flex align-items-center rounded-pill"
                                tabindex="0">
                                Explore Shop
                                <span class="text-xl icon d-flex"><i class="ph-bold ph-shopping-cart"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="hot-deals-slider arrow-style-two">
                        <div class="" data-aos="fade-up" data-aos-duration="200">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>

                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img26.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="400">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img27.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="600">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img28.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="800">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img29.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="1000">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img30.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="1200">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img13.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" data-aos="fade-up" data-aos-duration="600">
                            <div
                                class="px-20 pt-16 pb-40 border border-gray-100 product-card hover-border-main-600 rounded-16 position-relative transition-2">
                                <a href="{{ route('cart') }}"
                                    class="gap-8 px-24 mt-16 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align position-absolute inset-block-start-0 inset-inline-end-0 me-16">
                                    Add <i class="ph ph-shopping-cart"></i>
                                </a>
                                <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                    <img src="{{ asset('theme/images/thumbs/product-img3.png') }}" alt="" />
                                </a>
                                <div class="mt-12 product-card__content">
                                    <div class="gap-8 mb-8 product-card__price d-flex align-items-center">
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-20 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= hot-deals End ================================ -->

    <!-- Super Discount Start -->
    {{-- <div class="pt-80">
        <div class="container container-lg">
            <div
                class="py-20 border border-dashed border-main-500 bg-main-50 rounded-8 d-flex align-items-center justify-content-evenly">
                <p class="h6 text-main-600 fw-normal">
                    Super discount for your
                    <a href="javascript:void(0)"
                        class="fw-bold text-decoration-underline text-main-600 hover-text-decoration-none hover-text-primary-600">first
                        purchase</a>
                </p>
                <div class="position-relative">
                    <button
                        class="px-32 py-10 text-white border-0 copy-coupon-btn text-uppercase bg-main-600 rounded-pill hover-bg-main-800">
                        FREE25BAC
                        <i class="text-lg ph ph-file-text line-height-1"></i>
                    </button>
                    <span
                        class="px-16 py-6 mb-8 text-xs text-white copy-text bg-main-600 fw-normal position-absolute rounded-pill bottom-100 start-50 translate-middle-x min-w-max"></span>
                </div>
                <p class="text-md text-main-600 fw-normal">
                    Use discount code to get
                    <span class="fw-bold text-main-600">20% </span> discount for any
                    item
                </p>
            </div>
        </div>
    </div> --}}
    <!-- Super Discount End -->

    <!-- ========================== Short Product Section Start ============================== -->
    {{-- <div class="short-product pt-110">
      <div class="container container-lg">
        <div class="row gy-4">
          <div
            class="col-xxl-3 col-lg-4 col-sm-6"
            data-aos="fade-up"
            data-aos-duration="600"
          >
            <div
              class="p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <div class="p-16 mb-32 bg-main-50 rounded-16">
                <h6
                  class="pb-16 mb-0 underlined-line position-relative d-inline-block"
                >
                  Featured Products
                </h6>
              </div>
              <div class="short-product-list arrow-style-two max-h-unset">
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img1.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img2.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img3.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img1.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img2.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img3.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-lg-4 col-sm-6"
            data-aos="fade-up"
            data-aos-duration="700"
          >
            <div
              class="p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <div class="p-16 mb-32 bg-main-50 rounded-16">
                <h6
                  class="pb-16 mb-0 underlined-line position-relative d-inline-block"
                >
                  Top Selling Products
                </h6>
              </div>
              <div class="short-product-list arrow-style-two max-h-unset">
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img5.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img6.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img7.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img8.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img5.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img6.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img7.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img8.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-lg-4 col-sm-6"
            data-aos="fade-up"
            data-aos-duration="800"
          >
            <div
              class="p-16 border border-gray-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <div class="p-16 mb-32 bg-main-50 rounded-16">
                <h6
                  class="pb-16 mb-0 underlined-line position-relative d-inline-block"
                >
                  On-sale Products
                </h6>
              </div>
              <div class="short-product-list arrow-style-two max-h-unset">
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img9.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img7.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column gap-44">
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img9.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img7.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="gap-16 flex-align">
                    <div
                      class="flex-shrink-0 border border-gray-100 w-90 h-90 rounded-12"
                    >
                      <a href="#" class="link"
                        ><img
                          src="{{ asset('theme/images/thumbs/short-product-img4.png') }}"
                          alt=""
                      /></a>
                    </div>
                    <div class="mt-12 product-card__content">
                      <div class="gap-6 flex-align">
                        <span class="text-xs text-gray-500 fw-bold">4.8</span>
                        <span class="text-15 fw-bold text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs text-gray-500 fw-bold">(17k)</span>
                      </div>
                      <h6 class="mt-8 mb-8 text-lg title fw-semibold">
                        <a href="#" class="link text-line-1"
                          >Taylor Farms Broccoli Florets Vegetables</a
                        >
                      </h6>
                      <div class="gap-8 product-card__price flex-align">
                        <span class="text-heading text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                        <span class="text-gray-400 text-md fw-semibold d-block"
                          >$1500.00</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="col-xxl-3 col-lg-4 col-sm-6"
            data-aos="fade-up"
            data-aos-duration="900"
          >
            <div
              class="p-24 pt-32 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2 group-item"
            >
              <button type="button" class="wishlist-btn-two">
                <i class="ph-bold ph-heart"></i>
              </button>

              <div class="">
                <h6 class="pb-12 mb-0 position-relative d-inline-block">
                  Deals of the week
                </h6>
                <div class="mb-10 countdown" id="countdown26">
                  <ul class="flex-wrap countdown-list flex-align">
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item colon-red flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="days"></span> D
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item colon-red flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="hours"></span> H
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item colon-red flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="minutes"></span> M
                    </li>
                    <li
                      class="gap-4 px-12 py-8 text-sm text-white countdown-list__item colon-red flex-align fw-medium box-shadow-4xl rounded-5 bg-main-600"
                    >
                      <span class="seconds"></span> S
                    </li>
                  </ul>
                </div>
                <p class="text-sm text-neutral-300 fw-medium">
                  Don't miss this opportunity at a special
                </p>
              </div>

              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img32.png') }}" alt="" />
              </a>
              <div class="product-card__content w-100">
                <div class="gap-4 flex-align">
                  <div class="gap-2 flex-align me-4">
                    <span class="text-12 fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-12 fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-12 fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-12 fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-12 fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                  </div>
                  <span class="text-xs fw-medium text-heading">(3)</span>
                </div>
                <div class="gap-12 mt-6 d-flex align-items-center">
                  <h6 class="mb-0 text-lg text-danger-600">$60.99</h6>
                  <h6 class="mb-0 text-lg text-neutral-300 fw-medium">
                    $79.99
                  </h6>
                </div>

                <h6 class="mt-10 mb-0 title text-md fw-semibold">
                  <a
                    href="#"
                    class="link text-line-2 fw-bold"
                    >Perfectly Packed Meat Combos for Delicious and Flavorful
                    Meals Every Day</a
                  >
                </h6>
                <p
                  class="pb-12 mt-12 mb-8 text-sm text-gray-500 border-bottom border-neutral-100"
                >
                  This product is about to run out
                </p>

                <div
                  class="h-8 bg-gray-100 progress w-100 rounded-pill"
                  role="progressbar"
                  aria-label="Basic example"
                  aria-valuenow="35"
                  aria-valuemin="0"
                  aria-valuemax="100"
                >
                  <div
                    class="progress-bar bg-success-600 rounded-pill"
                    style="width: 35%"
                  ></div>
                </div>
                <div class="gap-6 mt-6 d-flex align-items-center">
                  <span class="text-sm text-gray-500">available only:</span>
                  <h6 class="mb-0 text-danger-600 text-md fw-semibold">
                    $60.99
                  </h6>
                </div>
                <a
                  href="{{ route('cart') }}"
                  class="gap-8 px-24 mt-16 text-white product-card__cart btn bg-success-600 hover-bg-success-700 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                >
                  Add To Cart <i class="ph ph-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- ========================== Short Product Section End ============================== -->

    <!-- ============================== Brand Section Start =============================== -->
    {{-- <div class="overflow-hidden brand py-80">
      <div class="container container-lg">
        <div class="p-24 brand-inner rounded-16">
          <div class="section-heading">
            <div class="flex-wrap gap-8 flex-between">
              <h5 class="mb-0 wow fadeInLeft">Shop by Brands</h5>
              <div class="gap-16 flex-align wow fadeInRight">
                <a
                  href="{{ route('shop') }}"
                  class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline"
                  >View All Deals</a
                >
                <div class="gap-8 flex-align">
                  <button
                    type="button"
                    id="brand-prev"
                    class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                  >
                    <i class="ph ph-caret-left"></i>
                  </button>
                  <button
                    type="button"
                    id="brand-next"
                    class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                  >
                    <i class="ph ph-caret-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="brand-slider arrow-style-two">
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="200">
              <img src="{{ asset('theme/images/thumbs/brand-img1.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="400">
              <img src="{{ asset('theme/images/thumbs/brand-img2.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="600">
              <img src="{{ asset('theme/images/thumbs/brand-img3.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="800">
              <img src="{{ asset('theme/images/thumbs/brand-img4.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1000">
              <img src="{{ asset('theme/images/thumbs/brand-img5.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1200">
              <img src="{{ asset('theme/images/thumbs/brand-img6.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1400">
              <img src="{{ asset('theme/images/thumbs/brand-img7.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1600">
              <img src="{{ asset('theme/images/thumbs/brand-img8.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1800">
              <img src="{{ asset('theme/images/thumbs/brand-img3.png') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="overflow-hidden brand py-80">
      <div class="container container-lg">
        <div class="p-24 brand-inner rounded-16">
          <div class="section-heading">
            <div class="flex-wrap gap-8 flex-between">
              <h5 class="mb-0 wow fadeInLeft">Shop by Category</h5>
              <div class="gap-16 flex-align wow fadeInRight">
                <a
                  href="{{ route('shop') }}"
                  class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline"
                  >View All Deals</a
                >
                <div class="gap-8 flex-align">
                  <button
                    type="button"
                    id="brand-prev"
                    class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                  >
                    <i class="ph ph-caret-left"></i>
                  </button>
                  <button
                    type="button"
                    id="brand-next"
                    class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                  >
                    <i class="ph ph-caret-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="brand-slider arrow-style-two">
            @if ($categories->count() > 0)
              @foreach ($categories as $category)
                <div class="brand-item" data-aos="zoom-in" data-aos-duration="200">
                  <a href="{{ route('shop.category', ['slug' => $category['slug']]) }}">
                    <img src="{{ url($category->image_url) }}" alt="{{ $category->name }}" />
                  </a>
                </div>
              @endforeach
            @endif
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="200">
              <img src="{{ asset('theme/images/thumbs/brand-img1.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="400">
              <img src="{{ asset('theme/images/thumbs/brand-img2.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="600">
              <img src="{{ asset('theme/images/thumbs/brand-img3.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="800">
              <img src="{{ asset('theme/images/thumbs/brand-img4.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1000">
              <img src="{{ asset('theme/images/thumbs/brand-img5.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1200">
              <img src="{{ asset('theme/images/thumbs/brand-img6.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1400">
              <img src="{{ asset('theme/images/thumbs/brand-img7.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1600">
              <img src="{{ asset('theme/images/thumbs/brand-img8.png') }}" alt="" />
            </div>
            <div class="brand-item" data-aos="zoom-in" data-aos-duration="1800">
              <img src="{{ asset('theme/images/thumbs/brand-img3.png') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- ============================== Brand Section End =============================== -->

    <!-- ========================= best sells Start ================================ -->
    <section class="best sells pb-80 pt-80">
        <div class="container container-lg">
            <div class="section-heading">
                <div class="flex-wrap gap-8 flex-between">
                    <h5 class="mb-0 wow fadeInLeft">Daily Best Sells</h5>
                </div>
            </div>

            <div class="row g-12">
                <div class="col-xxl-8">
                    <div class="row gy-4">
                        @if (empty($popularProducts['products']))
                            <div class="col-12">
                                <p class="text-center text-gray-500">No popular products available.</p>
                            </div>
                        @else
                            @foreach ($popularProducts['products'] as $popularProduct)
                                <div class="col-md-6" data-aos="fade-up" data-aos-duration="200">
                                    <div
                                        class="gap-16 p-8 border border-gray-100 product-card style-two h-100 hover-border-main-600 rounded-16 position-relative transition-2 flex-align">
                                        <div class="">
                                            <span
                                                class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600">Sale
                                                50%
                                            </span>
                                            <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                                <img src="{{ $popularProduct['image_url'] }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-card__content">
                                            <div class="mb-16 product-card__price">
                                                <span
                                                    class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                                    $28.99</span>
                                                <span
                                                    class="text-heading text-md fw-semibold">{{ $popularProduct['selling_price'] }}
                                                    <span class="text-gray-500 fw-normal">/Qty</span>
                                                </span>
                                            </div>
                                            <div class="gap-6 flex-align">
                                                <span
                                                    class="text-xs text-gray-600 fw-bold">{{ $popularProduct['average_rating'] }}</span>
                                                <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                        class="ph-fill ph-star"></i></span>
                                                <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                            </div>
                                            <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                                <a href="#"
                                                    class="link text-line-2">{{ $popularProduct['name'] }}</a>
                                            </h6>
                                            <div class="gap-4 flex-align">
                                                <span class="text-main-600 text-md d-flex"><i
                                                        class="ph-fill ph-storefront"></i></span>
                                                <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                            </div>
                                            <div class="mt-12">
                                                <div class="h-4 progress w-100 bg-color-three rounded-pill"
                                                    role="progressbar" aria-label="Basic example" aria-valuenow="35"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%">
                                                    </div>
                                                </div>
                                                <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                            </div>
                                            <a href="{{ route('cart') }}"
                                                class="gap-8 px-24 mt-24 text-white product-card__cart btn bg-warning-900 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center">
                                                Add To Cart <i class="ph ph-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                        {{-- <div class="col-md-6" data-aos="fade-up" data-aos-duration="400">
                            <div
                                class="gap-16 p-8 border border-gray-100 product-card style-two h-100 hover-border-main-600 rounded-16 position-relative transition-2 flex-align">
                                <div class="">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600">Sale 50%
                                    </span>
                                    <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                        <img src="{{ asset('theme/images/thumbs/best-sell2.png') }}" alt="" />
                                    </a>
                                    <div class="countdown" id="countdown7">
                                        <ul class="flex-wrap countdown-list style-three flex-align">
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="days"></span>Days
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="hours"></span>Hours
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="minutes"></span>Min
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="seconds"></span>Sec
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-card__content">
                                    <div class="mb-16 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-main-600 text-md d-flex"><i
                                                class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                    <a href="{{ route('cart') }}"
                                        class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-duration="200">
                            <div
                                class="gap-16 p-8 border border-gray-100 product-card style-two h-100 hover-border-main-600 rounded-16 position-relative transition-2 flex-align">
                                <div class="">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600">Sale 50%
                                    </span>
                                    <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                        <img src="{{ asset('theme/images/thumbs/best-sell3.png') }}" alt="" />
                                    </a>
                                    <div class="countdown" id="countdown8">
                                        <ul class="flex-wrap countdown-list style-three flex-align">
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="days"></span>Days
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="hours"></span>Hours
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="minutes"></span>Min
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="seconds"></span>Sec
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-card__content">
                                    <div class="mb-16 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-main-600 text-md d-flex"><i
                                                class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                    <a href="{{ route('cart') }}"
                                        class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-duration="400">
                            <div
                                class="gap-16 p-8 border border-gray-100 product-card style-two h-100 hover-border-main-600 rounded-16 position-relative transition-2 flex-align">
                                <div class="">
                                    <span class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600">Sale 50%
                                    </span>
                                    <a href="#" class="overflow-hidden product-card__thumb flex-center">
                                        <img src="{{ asset('theme/images/thumbs/best-sell4.png') }}" alt="" />
                                    </a>
                                    <div class="countdown" id="countdown9">
                                        <ul class="flex-wrap countdown-list style-three flex-align">
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="days"></span>Days
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="hours"></span>Hours
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="minutes"></span>Min
                                            </li>
                                            <li
                                                class="gap-4 text-sm countdown-list__item text-heading flex-align fw-medium">
                                                <span class="seconds"></span>Sec
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-card__content">
                                    <div class="mb-16 product-card__price">
                                        <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                            $28.99</span>
                                        <span class="text-heading text-md fw-semibold">$14.99
                                            <span class="text-gray-500 fw-normal">/Qty</span>
                                        </span>
                                    </div>
                                    <div class="gap-6 flex-align">
                                        <span class="text-xs text-gray-600 fw-bold">4.8</span>
                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i
                                                class="ph-fill ph-star"></i></span>
                                        <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                                    </div>
                                    <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                        <a href="#" class="link text-line-2">Taylor Farms Broccoli Florets
                                            Vegetables</a>
                                    </h6>
                                    <div class="gap-4 flex-align">
                                        <span class="text-main-600 text-md d-flex"><i
                                                class="ph-fill ph-storefront"></i></span>
                                        <span class="text-xs text-gray-500">By Lucky Supermarket</span>
                                    </div>
                                    <div class="mt-12">
                                        <div class="h-4 progress w-100 bg-color-three rounded-pill" role="progressbar"
                                            aria-label="Basic example" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                        </div>
                                        <span class="mt-8 text-xs text-gray-900 fw-medium">Sold: 18/35</span>
                                    </div>
                                    <a href="{{ route('cart') }}"
                                        class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center">
                                        Add To Cart <i class="ph ph-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                {{-- <div class="col-xxl-4" data-aos="zoom-in" data-aos-duration="600">
            <div
              class="overflow-hidden position-relative rounded-16 bg-light-purple p-28 z-1 h-100"
            >
              <div class="">
                <img
                  src="{{ asset('theme/images/bg/special-snacks.png') }}"
                  alt=""
                  class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 cover-img"
                />
              </div>
              <div class="py-xl-4">
                <div
                  class="mb-16 bg-white offer-card__logo w-80 h-80 flex-center rounded-circle"
                >
                  <img src="{{ asset('theme/images/thumbs/offer-logo.png') }}" alt="" />
                </div>
                <h5 class="mb-8">$5 off your first order</h5>
                <div class="gap-8 flex-align">
                  <span class="text-sm fw-medium text-heading"
                    >Delivery by 6:15am</span
                  >
                  <span class="text-xs text-heading">Expire Aug 5</span>
                </div>
                <a
                  href="{{ route('shop') }}"
                  class="gap-8 mt-16 text-white btn bg-success-600 hover-text-white hover-bg-success-700 fw-medium d-inline-flex align-items-center rounded-pill"
                  tabindex="0"
                >
                  Shop Now
                  <span class="text-xl icon d-flex"
                    ><i class="ph ph-arrow-right"></i
                  ></span>
                </a>
              </div>
            </div>
          </div> --}}
            </div>
        </div>
    </section>
    <!-- ========================= best sells End ================================ -->

    <!-- ================================ Newsletter new section Start ================================== -->
    <section class="newsletter-new">
        <div class="container container-lg">
            <div
                class="flex-wrap gap-32 py-20 px-80-px bg-neutral-100 rounded-12 d-flex align-items-center justify-content-between flex-sm-nowrap">
                <div class="max-w-700">
                    <h3 class="mb-30">
                        Stay home & get your daily needs from our shop
                    </h3>
                    <form action="#" class="flex-wrap gap-8 d-flex flex-sm-nowrap">
                        <input type="text"
                            class="px-20 py-16 bg-white rounded shadow-none form-control placeholder-text-14 flex-grow-1"
                            placeholder="Enter your mail" />
                        <button type="submit"
                            class="flex-shrink-0 px-32 py-20 btn bg-success-600 hover-bg-success-700 flex-grow-1">
                            Subscribe now
                        </button>
                    </form>
                    <p class="mt-20 text-sm text-heading fw-medium">
                        I agree that my submitted data is being collected and stored.
                    </p>
                </div>
                <div class="d-lg-block d-none">
                    <img src="{{ asset('theme/images/thumbs/newsletter-img.png') }}" alt="Thumbnail" />
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ Newsletter new section End ================================== -->
@endsection
