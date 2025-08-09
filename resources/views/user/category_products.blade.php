@extends('layouts.master')

@section('main')
    <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
        <div class="container container-lg">
            <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
                <h6 class="mb-0">{{ $categoryProducts['name'] }}</h6>
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
                    <li class="text-sm text-main-600">Product Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- =============================== Shop Section Start ======================================== -->
    <section class="shop py-80">
        <div class="container container-lg">
            <div class="row">
                <!-- Sidebar Start -->
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <button type="button"
                            class="w-32 h-32 mt-8 border border-gray-100 shop-sidebar__close d-lg-none d-flex flex-center rounded-circle hover-bg-main-600 position-absolute inset-inline-end-0 me-10 hover-text-white hover-border-main-600">
                            <i class="ph ph-x"></i>
                        </button>
                        <div class="p-32 mb-32 border border-gray-100 shop-sidebar__box rounded-8">
                            <h6 class="pb-24 mb-24 text-xl border-gray-100 border-bottom">
                                Product Category
                            </h6>
                            <ul class="overflow-y-auto max-h-540 scroll-sm">
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Mobile & Accessories (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Laptop (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Electronics (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Smart Watch (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Storage (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Portable Devices (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Action Camera (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Smart Gadget (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Monitor (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Smart TV (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Camera (12)</a>
                                </li>
                                <li class="mb-24">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Monitor Stand (12)</a>
                                </li>
                                <li class="mb-0">
                                    <a href="{{ route('product.details.two') }}"
                                        class="text-gray-900 hover-text-main-600">Headphone (12)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-32 mb-32 border border-gray-100 shop-sidebar__box rounded-8">
                            <h6 class="pb-24 mb-24 text-xl border-gray-100 border-bottom">
                                Filter by Price
                            </h6>
                            <div class="custom--range">
                                <div id="slider-range"></div>
                                <div class="flex-wrap-reverse gap-8 mt-24 flex-between">
                                    <button type="button" class="h-40 btn btn-main flex-align">
                                        Filter
                                    </button>
                                    <div class="gap-8 custom--range__content flex-align">
                                        <span class="flex-shrink-0 text-gray-500 text-md">Price:</span>
                                        <input type="text"
                                            class="custom--range__prices text-neutral-600 text-start text-md fw-medium"
                                            id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-32 mb-32 border border-gray-100 shop-sidebar__box rounded-8">
                            <h6 class="pb-24 mb-24 text-xl border-gray-100 border-bottom">
                                Filter by Rating
                            </h6>
                            <div class="gap-8 mb-20 flex-align position-relative">
                                <label class="cursor-pointer position-absolute w-100 h-100" for="rating5">
                                </label>
                                <div class="mb-0 common-check common-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="rating5" />
                                </div>
                                <div class="h-8 bg-gray-100 progress w-100 rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 70%"></div>
                                </div>
                                <div class="gap-4 flex-align">
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
                                <span class="flex-shrink-0 text-gray-900">124</span>
                            </div>
                            <div class="gap-8 mb-20 flex-align position-relative">
                                <label class="cursor-pointer position-absolute w-100 h-100" for="rating4">
                                </label>
                                <div class="mb-0 common-check common-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="rating4" />
                                </div>
                                <div class="h-8 bg-gray-100 progress w-100 rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 50%"></div>
                                </div>
                                <div class="gap-4 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <span class="flex-shrink-0 text-gray-900">52</span>
                            </div>
                            <div class="gap-8 mb-20 flex-align position-relative">
                                <label class="cursor-pointer position-absolute w-100 h-100" for="rating3">
                                </label>
                                <div class="mb-0 common-check common-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="rating3" />
                                </div>
                                <div class="h-8 bg-gray-100 progress w-100 rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 35%"></div>
                                </div>
                                <div class="gap-4 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <span class="flex-shrink-0 text-gray-900">12</span>
                            </div>
                            <div class="gap-8 mb-20 flex-align position-relative">
                                <label class="cursor-pointer position-absolute w-100 h-100" for="rating2">
                                </label>
                                <div class="mb-0 common-check common-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="rating2" />
                                </div>
                                <div class="h-8 bg-gray-100 progress w-100 rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 20%"></div>
                                </div>
                                <div class="gap-4 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <span class="flex-shrink-0 text-gray-900">5</span>
                            </div>
                            <div class="gap-8 mb-0 flex-align position-relative">
                                <label class="cursor-pointer position-absolute w-100 h-100" for="rating1">
                                </label>
                                <div class="mb-0 common-check common-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="rating1" />
                                </div>
                                <div class="h-8 bg-gray-100 progress w-100 rounded-pill" role="progressbar"
                                    aria-label="Basic example" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 5%"></div>
                                </div>
                                <div class="gap-4 flex-align">
                                    <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                    <span class="text-xs text-gray-400 fw-medium d-flex"><i
                                            class="ph-fill ph-star"></i></span>
                                </div>
                                <span class="flex-shrink-0 text-gray-900">2</span>
                            </div>
                        </div>
                        <div class="p-32 mb-32 border border-gray-100 shop-sidebar__box rounded-8">
                            <h6 class="pb-24 mb-24 text-xl border-gray-100 border-bottom">
                                Filter by Color
                            </h6>
                            <ul class="overflow-y-auto max-h-540 scroll-sm">
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-black">
                                        <input class="form-check-input" type="radio" name="color" id="color1" />
                                        <label class="form-check-label" for="color1">Black(12)</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-primary">
                                        <input class="form-check-input" type="radio" name="color" id="color2" />
                                        <label class="form-check-label" for="color2">Blue (12)</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-gray">
                                        <input class="form-check-input" type="radio" name="color" id="color3" />
                                        <label class="form-check-label" for="color3">Gray (12)</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-success">
                                        <input class="form-check-input" type="radio" name="color" id="color4" />
                                        <label class="form-check-label" for="color4">Green (12)</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-danger">
                                        <input class="form-check-input" type="radio" name="color" id="color5" />
                                        <label class="form-check-label" for="color5">Red (12)</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio checked-white">
                                        <input class="form-check-input" type="radio" name="color" id="color6" />
                                        <label class="form-check-label" for="color6">White (12)</label>
                                    </div>
                                </li>
                                <li class="mb-0">
                                    <div class="form-check common-check common-radio checked-purple">
                                        <input class="form-check-input" type="radio" name="color" id="color7" />
                                        <label class="form-check-label" for="color7">Purple (12)</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="p-32 mb-32 border border-gray-100 shop-sidebar__box rounded-8">
                            <h6 class="pb-24 mb-24 text-xl border-gray-100 border-bottom">
                                Filter by Brand
                            </h6>
                            <ul class="overflow-y-auto max-h-540 scroll-sm">
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="brand1" />
                                        <label class="form-check-label" for="brand1">Apple</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="brand2" />
                                        <label class="form-check-label" for="brand2">Samsung</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="brand3" />
                                        <label class="form-check-label" for="brand3">Microsoft</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="brand4" />
                                        <label class="form-check-label" for="brand4">Apple</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="brand5" />
                                        <label class="form-check-label" for="brand5">HP</label>
                                    </div>
                                </li>
                                <li class="mb-24">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="DELL" />
                                        <label class="form-check-label" for="DELL">DELL</label>
                                    </div>
                                </li>
                                <li class="mb-0">
                                    <div class="form-check common-check common-radio">
                                        <input class="form-check-input" type="radio" name="color" id="Redmi" />
                                        <label class="form-check-label" for="Redmi">Redmi</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-sidebar__box rounded-8">
                            <img src="{{ asset('theme/images/thumbs/advertise-img1.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->

                <!-- Content Start -->
                <div class="col-lg-9">
                    <!-- Top Start -->
                    <div class="flex-wrap gap-16 mb-40 flex-between">
                        {{-- <span class="text-gray-900">Showing 1-20 of 85 result</span> --}}
                        <div class="flex-wrap gap-16 position-relative flex-align">
                            <div class="gap-16 list-grid-btns flex-align">
                                <button type="button"
                                    class="text-2xl border border-gray-100 w-44 h-44 flex-center rounded-6 list-btn">
                                    <i class="ph-bold ph-list-dashes"></i>
                                </button>
                                <button type="button"
                                    class="text-2xl text-white border w-44 h-44 flex-center border-main-600 bg-main-600 rounded-6 grid-btn">
                                    <i class="ph ph-squares-four"></i>
                                </button>
                            </div>
                            <div class="gap-4 text-gray-500 position-relative flex-align text-14">
                                <label for="sorting" class="flex-shrink-0 text-inherit">Sort by:
                                </label>
                                <select class="w-auto form-control common-input px-14 py-14 text-inherit rounded-6"
                                    id="sorting">
                                    <option value="1" selected>Popular</option>
                                    <option value="1">Latest</option>
                                    <option value="1">Trending</option>
                                    <option value="1">Matches</option>
                                </select>
                            </div>
                            <button type="button"
                                class="text-2xl border border-gray-100 w-44 h-44 d-lg-none d-flex flex-center rounded-6 sidebar-btn">
                                <i class="ph-bold ph-funnel"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Top End -->
                    {{-- {{ $products }} --}}
                    <div class="list-grid-wrapper">
                        @if (empty($categoryProducts['products']))
                            <div class="py-40 text-center">
                                <h5 class="text-gray-500">No products found in this category.</h5>
                            </div>
                        @else
                            @foreach ($categoryProducts['products'] as $product)
                                <div
                                    class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2">
                                    <a href="{{ route('product.details', ['id' => $product['id']]) }}"
                                        class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative">
                                        <img src="{{ $product['image_url'] }}" alt="" class="w-[100%]" />
                                        <span
                                            class="px-8 py-4 text-sm text-white product-card__badge bg-primary-600 position-absolute inset-inline-start-0 inset-block-start-0">Best
                                            Sale</span>
                                    </a>
                                    <div class="mt-16 product-card__content">
                                        <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                                            <a href="{{ route('product.details', ['id' => $product['id']]) }}"
                                                class="link text-line-2" tabindex="0">{{ $product['name'] }}</a>
                                        </h6>
                                        <div class="gap-6 mt-16 mb-20 flex-align">
                                            <span
                                                class="text-xs text-gray-500 fw-medium">{{ $product['average_rating'] }}</span>
                                            <span class="text-xs fw-medium text-warning-600 d-flex"><i
                                                    class="ph-fill ph-star"></i></span>
                                            <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                                        </div>

                                        <div class="my-20 product-card__price">
                                            <span class="text-gray-400 text-md fw-semibold text-decoration-line-through">
                                                $28.99
                                            </span>
                                            <span class="text-heading text-md fw-semibold">{{ $product['selling_price'] }}
                                                <span class="text-gray-500 fw-normal">/Qty</span></span>
                                        </div>

                                        <a href="{{ route('cart') }}"
                                            class="gap-8 px-24 text-white product-card__cart btn bg-warning-900 hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                                            tabindex="0">
                                            Add To Cart <i class="ph ph-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>



                    {{-- <div class="list-grid-wrapper">
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img1.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-primary-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Best Sale
                  </span>
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img2.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img3.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Sale 50%
                  </span>
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img4.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img5.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img6.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img7.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img8.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Sale 50%
                  </span>
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img9.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img10.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img11.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >New
                  </span>
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img12.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img13.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img14.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-primary-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Best Sale
                  </span>
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img15.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-warning-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >New</span
                  >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img15.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img1.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-primary-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Best Sale
                  </span>
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img2.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img3.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
              <div
                class="p-16 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
              >
                <a
                  href="{{ route('product.details') }}"
                  class="product-card__thumb flex-center rounded-8 bg-gray-50 position-relative"
                >
                  <span
                    class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600 position-absolute inset-inline-start-0 inset-block-start-0"
                    >Sale 50%
                  </span>
                  <img
                    src="{{ asset('theme/images/thumbs/product-two-img4.png') }}"
                    alt=""
                    class="w-auto max-w-unset"
                  />
                </a>
                <div class="mt-16 product-card__content">
                  <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                    <a
                      href="{{ route('product.details') }}"
                      class="link text-line-2"
                      tabindex="0"
                      >Taylor Farms Broccoli Florets Vegetables</a
                    >
                  </h6>
                  <div class="gap-6 mt-16 mb-20 flex-align">
                    <span class="text-xs text-gray-500 fw-medium">4.8</span>
                    <span class="text-xs fw-medium text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-500 fw-medium">(17k)</span>
                  </div>
                  <div class="mt-8">
                    <div
                      class="h-4 progress w-100 bg-color-three rounded-pill"
                      role="progressbar"
                      aria-label="Basic example"
                      aria-valuenow="35"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      <div
                        class="progress-bar bg-main-two-600 rounded-pill"
                        style="width: 35%"
                      ></div>
                    </div>
                    <span class="mt-8 text-xs text-gray-900 fw-medium"
                      >Sold: 18/35</span
                    >
                  </div>

                  <div class="my-20 product-card__price">
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                  </div>

                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 product-card__cart btn bg-gray-50 text-heading hover-bg-main-600 hover-text-white py-11 rounded-8 flex-center fw-medium"
                    tabindex="0"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div> --}}

                    <!-- Pagination Start -->
                    {{-- <ul class="flex-wrap gap-16 pagination flex-center">
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
                    </ul> --}}
                    <!-- Pagination End -->
                </div>
                <!-- Content End -->
            </div>
        </div>
    </section>
    <!-- =============================== Shop Section End ======================================== -->

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
                            <h6 class="mb-0">100% Satisfaction</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="800">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-credit-card"></i></span>
                        <div class="">
                            <h6 class="mb-0">Secure Payments</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2">
                        <span class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"><i
                                class="ph-fill ph-chats"></i></span>
                        <div class="">
                            <h6 class="mb-0">24/7 Support</h6>
                            <span class="text-sm text-heading">Free shipping all over the US</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Shipping Section End ============================ -->
@endsection
