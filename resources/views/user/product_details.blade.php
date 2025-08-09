@extends('layouts.master')

@section('main')
 <!-- ========================= Breadcrumb Start =============================== -->
    <div class="mb-0 breadcrumb py-26 bg-main-two-50">
      <div class="container container-lg">
        <div class="flex-wrap gap-16 breadcrumb-wrapper flex-between">
          <h6 class="mb-0">Product Details</h6>
          <ul class="flex-wrap gap-8 flex-align">
            <li class="text-sm">
              <a
                href="{{ route('home') }}"
                class="gap-8 text-gray-900 flex-align hover-text-main-600"
              >
                <i class="ph ph-house"></i>
                Home
              </a>
            </li>
            <li class="flex-align">
              <i class="ph ph-caret-right"></i>
            </li>
            <li class="text-sm text-main-600">Lay's Potato Chips</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ========================= Breadcrumb End =============================== -->

    <!-- ========================== Product Details Two Start =========================== -->
    <section class="product-details py-80">
      <div class="container container-lg">
        <div class="row gy-4">
          <div class="col-xl-9">
            <div class="row gy-4">
              <div class="col-xl-6">
                <div class="product-details__left">
                  <div
                    class="border border-gray-100 product-details__thumb-slider rounded-16"
                  >
                    <div class="">
                      <div class="product-details__thumb flex-center h-100">
                        <img
                          src="{{ asset('theme/images/thumbs/product-details-two-thumb1.png') }}"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="">
                      <div class="product-details__thumb flex-center h-100">
                        <img
                          src="{{ asset('theme/images/thumbs/product-details-two-thumb2.png') }}"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="">
                      <div class="product-details__thumb flex-center h-100">
                        <img
                          src="{{ asset('theme/images/thumbs/product-details-two-thumb3.png') }}"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="">
                      <div class="product-details__thumb flex-center h-100">
                        <img
                          src="{{ asset('theme/images/thumbs/product-details-two-thumb1.png') }}"
                          alt=""
                        />
                      </div>
                    </div>
                    <div class="">
                      <div class="product-details__thumb flex-center h-100">
                        <img
                          src="{{ asset('theme/images/thumbs/product-details-two-thumb2.png') }}"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>

                  <div class="mt-24">
                    <div class="product-details__images-slider">
                      <div>
                        <div
                          class="p-8 border border-gray-100 max-w-120 max-h-120 h-100 flex-center rounded-16"
                        >
                          <img
                            src="{{ asset('theme/images/thumbs/product-details-two-thumb1.png') }}"
                            alt=""
                          />
                        </div>
                      </div>
                      <div>
                        <div
                          class="p-8 border border-gray-100 max-w-120 max-h-120 h-100 flex-center rounded-16"
                        >
                          <img
                            src="{{ asset('theme/images/thumbs/product-details-two-thumb2.png') }}"
                            alt=""
                          />
                        </div>
                      </div>
                      <div>
                        <div
                          class="p-8 border border-gray-100 max-w-120 max-h-120 h-100 flex-center rounded-16"
                        >
                          <img
                            src="{{ asset('theme/images/thumbs/product-details-two-thumb3.png') }}"
                            alt=""
                          />
                        </div>
                      </div>
                      <div>
                        <div
                          class="p-8 border border-gray-100 max-w-120 max-h-120 h-100 flex-center rounded-16"
                        >
                          <img
                            src="{{ asset('theme/images/thumbs/product-details-two-thumb1.png') }}"
                            alt=""
                          />
                        </div>
                      </div>
                      <div>
                        <div
                          class="p-8 border border-gray-100 max-w-120 max-h-120 h-100 flex-center rounded-16"
                        >
                          <img
                            src="{{ asset('theme/images/thumbs/product-details-two-thumb2.png') }}"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="product-details__content">
                  <div
                    class="flex-wrap gap-16 px-24 py-16 mb-24 flex-center bg-color-one rounded-8 position-relative z-1"
                  >
                    <img
                      src="{{ asset('theme/images/bg/details-offer-bg.png') }}"
                      alt=""
                      class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 z-n1"
                    />
                    <div class="gap-16 flex-align">
                      <span class="text-sm text-white">Special Offer:</span>
                    </div>
                    <div class="countdown" id="countdown11">
                      <ul class="flex-wrap countdown-list flex-align">
                        <li
                          class="gap-4 p-0 text-xs border countdown-list__item text-heading flex-align fw-medium w-28 h-28 rounded-4 border-main-600 flex-center"
                        >
                          <span class="days"></span>
                        </li>
                        <li
                          class="gap-4 p-0 text-xs border countdown-list__item text-heading flex-align fw-medium w-28 h-28 rounded-4 border-main-600 flex-center"
                        >
                          <span class="hours"></span>
                        </li>
                        <li
                          class="gap-4 p-0 text-xs border countdown-list__item text-heading flex-align fw-medium w-28 h-28 rounded-4 border-main-600 flex-center"
                        >
                          <span class="minutes"></span>
                        </li>
                        <li
                          class="gap-4 p-0 text-xs border countdown-list__item text-heading flex-align fw-medium w-28 h-28 rounded-4 border-main-600 flex-center"
                        >
                          <span class="seconds"></span>
                        </li>
                      </ul>
                    </div>
                    <span class="text-xs text-white"
                      >Remains untill the end of the offer</span
                    >
                  </div>

                  <h5 class="mb-12">
                    HP Chromebook With Intel Celeron, 4GB Memory & 64GB eMMC -
                    Modern Gray
                  </h5>
                  <div class="flex-wrap gap-12 flex-align">
                    <div class="flex-wrap gap-12 flex-align">
                      <div class="gap-8 flex-align">
                        <span class="text-xs fw-medium text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                        <span class="text-xs fw-medium text-warning-600 d-flex"
                          ><i class="ph-fill ph-star"></i
                        ></span>
                      </div>
                      <span class="text-sm fw-medium text-neutral-600"
                        >4.7 Star Rating</span
                      >
                      <span class="text-sm text-gray-500 fw-medium"
                        >(21,671)</span
                      >
                    </div>
                    <span class="text-sm text-gray-500 fw-medium">|</span>
                    <span class="text-gray-900">
                      <span class="text-gray-400">SKU:</span>EB4DRP
                    </span>
                  </div>
                  <span
                    class="pt-32 mt-32 text-gray-700 border-gray-100 border-top d-block"
                  ></span>
                  <p class="text-gray-700">
                    Geared up and ready to roll: Get the responsive performance
                    you're looking for with an Intel processor and 64 GB eMMC
                    storage. Stay productive with compatible apps like Microsoft
                    Office, Google Workspace, and more. The Chrome OS gives you
                    a fast, simple, and secure online experience with built-in
                    virus protection.
                  </p>

                  <div class="flex-wrap gap-16 my-32 flex-align">
                    <div class="gap-8 flex-align">
                      <div class="gap-8 flex-align text-main-two-600">
                        <i class="text-xl ph-fill ph-seal-percent"></i>
                        -10%
                      </div>
                      <h6 class="mb-0">USD 320.99</h6>
                    </div>
                    <div class="gap-8 flex-align">
                      <span class="text-gray-700">Regular Price</span>
                      <h6 class="mb-0 text-xl text-gray-400 fw-medium">
                        USD 452.99
                      </h6>
                    </div>
                  </div>

                  <div class="flex-wrap gap-12 my-32 flex-align">
                    <a
                      href="#"
                      class="gap-8 px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 flex-align hover-border-main-600 hover-text-main-600"
                    >
                      Monthyly EMI USD 15.00
                      <i class="ph ph-caret-right"></i>
                    </a>
                    <a
                      href="#"
                      class="gap-8 px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 flex-align hover-border-main-600 hover-text-main-600"
                    >
                      Shipping Charge
                      <i class="ph ph-caret-right"></i>
                    </a>
                    <a
                      href="#"
                      class="gap-8 px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 flex-align hover-border-main-600 hover-text-main-600"
                    >
                      Security & Privacy
                      <i class="ph ph-caret-right"></i>
                    </a>
                  </div>

                  <span
                    class="pt-32 mt-32 text-gray-700 border-gray-100 border-top d-block"
                  ></span>

                  <div class="mt-32">
                    <h6 class="mb-16">Quick Overview</h6>
                    <div
                      class="flex-wrap gap-16 flex-between align-items-start"
                    >
                      <div>
                        <span class="mb-12 text-gray-900 d-block">
                          Color:
                          <span class="fw-medium">Mineral Silver</span>
                        </span>
                        <div class="gap-8 color-list flex-align">
                          <button
                            type="button"
                            class="w-20 h-20 border color-list__button border-gray-50 rounded-circle bg-info-600"
                          ></button>
                          <button
                            type="button"
                            class="w-20 h-20 border color-list__button border-gray-50 rounded-circle bg-warning-600"
                          ></button>
                          <button
                            type="button"
                            class="w-20 h-20 border color-list__button border-gray-50 rounded-circle bg-tertiary-600"
                          ></button>
                          <button
                            type="button"
                            class="w-20 h-20 border color-list__button border-gray-50 rounded-circle bg-main-600"
                          ></button>
                          <button
                            type="button"
                            class="w-20 h-20 bg-gray-100 border color-list__button border-gray-50 rounded-circle"
                          ></button>
                        </div>
                      </div>
                      <div>
                        <span class="mb-12 text-gray-900 d-block">
                          Pattern Name:
                          <span class="fw-medium">with offer</span>
                        </span>
                        <div class="flex-wrap gap-8 flex-align">
                          <a
                            href="#"
                            class="px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 hover-border-main-600 hover-text-main-600"
                          >
                            with offer
                          </a>
                          <a
                            href="#"
                            class="px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 hover-border-main-600 hover-text-main-600"
                            >12th Gen Laptop</a
                          >
                          <a
                            href="#"
                            class="px-12 py-8 text-sm text-gray-900 border border-gray-200 rounded-8 hover-border-main-600 hover-text-main-600"
                            >without offer</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <span
                    class="pt-32 mt-32 text-gray-700 border-gray-100 border-top d-block"
                  ></span>

                  <a
                    href="https://www.whatsapp.com"
                    class="gap-8 py-16 btn btn-black flex-center rounded-8"
                  >
                    <i class="text-lg ph ph-whatsapp-logo"></i>
                    Request More Information
                  </a>

                  <div class="mt-32">
                    <span class="text-gray-900 fw-medium"
                      >100% Guarantee Safe Checkout</span
                    >
                    <div class="mt-10">
                      <img src="{{ asset('theme/images/thumbs/gateway-img.png') }}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div
              class="px-32 py-40 border border-gray-100 product-details__sidebar rounded-16"
            >
              <div class="mb-32">
                <label
                  for="delivery"
                  class="mb-8 h6 activePage text-heading fw-semibold d-block"
                  >Delivery</label
                >
                <div class="px-16 border border-gray-100 flex-align rounded-4">
                  <span class="text-xl d-flex text-main-600">
                    <i class="ph ph-map-pin"></i>
                  </span>
                  <select
                    class="px-8 border-0 common-input rounded-4"
                    id="delivery"
                  >
                    <option value="1">Maymansign</option>
                    <option value="1">Khulna</option>
                    <option value="1">Rajshahi</option>
                    <option value="1">Rangpur</option>
                  </select>
                </div>
              </div>
              <div class="mb-32">
                <label
                  for="stock"
                  class="mb-8 text-lg text-heading fw-semibold d-block"
                  >Total Stock: 21</label
                >
                <span class="text-xl d-flex">
                  <i class="ph ph-location"></i>
                </span>
                <div class="overflow-hidden d-flex rounded-4">
                  <button
                    type="button"
                    class="flex-shrink-0 w-48 h-48 quantity__minus text-neutral-600 bg-gray-50 flex-center hover-bg-main-600 hover-text-white"
                  >
                    <i class="ph ph-minus"></i>
                  </button>
                  <input
                    type="number"
                    class="w-32 px-16 text-center border border-gray-100 quantity__input flex-grow-1 border-start-0 border-end-0"
                    id="stock"
                    value="1"
                    min="1"
                  />
                  <button
                    type="button"
                    class="flex-shrink-0 w-48 h-48 quantity__plus text-neutral-600 bg-gray-50 flex-center hover-bg-main-600 hover-text-white"
                  >
                    <i class="ph ph-plus"></i>
                  </button>
                </div>
              </div>
              <div class="mb-32">
                <div
                  class="flex-wrap gap-8 pb-16 mb-16 border-gray-100 flex-between border-bottom"
                >
                  <span class="text-gray-500">Price</span>
                  <h6 class="mb-0 text-lg">$150.00</h6>
                </div>
                <div class="flex-wrap gap-8 flex-between">
                  <span class="text-gray-500">Shipping</span>
                  <h6 class="mb-0 text-lg">From $10.00</h6>
                </div>
              </div>

              <a
                href="#"
                class="gap-8 py-16 mt-48 btn btn-main flex-center rounded-8 fw-normal"
              >
                <i class="text-lg ph ph-shopping-cart-simple"></i>
                Add To Cart
              </a>
              <a
                href="#"
                class="py-16 mt-16 btn btn-outline-main rounded-8 fw-normal w-100"
              >
                Buy Now
              </a>

              <div class="mt-32">
                <div
                  class="gap-24 px-16 py-8 bg-main-50 rounded-8 flex-between mb-14"
                >
                  <span
                    class="flex-shrink-0 w-32 h-32 text-xl bg-white text-main-600 rounded-circle flex-center"
                  >
                    <i class="ph-fill ph-truck"></i>
                  </span>
                  <span class="text-sm text-neutral-600"
                    >Ship from <span class="fw-semibold">MarketPro</span>
                  </span>
                </div>
                <div
                  class="gap-24 px-16 py-8 mb-0 bg-main-50 rounded-8 flex-between"
                >
                  <span
                    class="flex-shrink-0 w-32 h-32 text-xl bg-white text-main-600 rounded-circle flex-center"
                  >
                    <i class="ph-fill ph-storefront"></i>
                  </span>
                  <span class="text-sm text-neutral-600"
                    >Sold by:
                    <span class="fw-semibold">MR Distribution LLC</span>
                  </span>
                </div>
              </div>

              <div class="mt-32">
                <div
                  class="gap-8 px-32 py-16 border border-gray-100 rounded-8 flex-between"
                >
                  <a href="#" class="d-flex text-main-600 text-28"
                    ><i class="ph-fill ph-chats-teardrop"></i
                  ></a>
                  <span class="border border-gray-100 h-26"></span>

                  <div class="dropdown on-hover-item">
                    <button class="d-flex text-main-600 text-28" type="button">
                      <i class="ph-fill ph-share-network"></i>
                    </button>
                    <div
                      class="border-0 on-hover-dropdown common-dropdown inset-inline-start-auto inset-inline-end-0"
                    >
                      <ul class="gap-16 flex-align">
                        <li>
                          <a
                            href="https://www.facebook.com"
                            class="text-xl w-44 h-44 flex-center bg-main-100 text-main-600 rounded-circle hover-bg-main-600 hover-text-white"
                          >
                            <i class="ph-fill ph-facebook-logo"></i>
                          </a>
                        </li>
                        <li>
                          <a
                            href="https://www.twitter.com"
                            class="text-xl w-44 h-44 flex-center bg-main-100 text-main-600 rounded-circle hover-bg-main-600 hover-text-white"
                          >
                            <i class="ph-fill ph-twitter-logo"></i>
                          </a>
                        </li>
                        <li>
                          <a
                            href="https://www.linkedin.com"
                            class="text-xl w-44 h-44 flex-center bg-main-100 text-main-600 rounded-circle hover-bg-main-600 hover-text-white"
                          >
                            <i class="ph-fill ph-instagram-logo"></i>
                          </a>
                        </li>
                        <li>
                          <a
                            href="https://www.pinterest.com"
                            class="text-xl w-44 h-44 flex-center bg-main-100 text-main-600 rounded-circle hover-bg-main-600 hover-text-white"
                          >
                            <i class="ph-fill ph-linkedin-logo"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="pt-80">
          <div class="border product-dContent rounded-24">
            <div
              class="flex-wrap gap-16 border-gray-100 product-dContent__header border-bottom flex-between"
            >
              <ul
                class="mb-3 nav common-tab nav-pills"
                id="pills-tab"
                role="tablist"
              >
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="pills-description-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-description"
                    type="button"
                    role="tab"
                    aria-controls="pills-description"
                    aria-selected="true"
                  >
                    Description
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="pills-reviews-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-reviews"
                    type="button"
                    role="tab"
                    aria-controls="pills-reviews"
                    aria-selected="false"
                  >
                    Reviews
                  </button>
                </li>
              </ul>
              <a
                href="#"
                class="gap-8 btn bg-color-one rounded-16 flex-align text-main-600 hover-bg-main-600 hover-text-white"
              >
                <img src="{{ asset('theme/images/icon/satisfaction-icon.png') }}" alt="" />
                100% Satisfaction Guaranteed
              </a>
            </div>
            <div class="product-dContent__box">
              <div class="tab-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="pills-description"
                  role="tabpanel"
                  aria-labelledby="pills-description-tab"
                  tabindex="0"
                >
                  <div class="mb-40">
                    <h6 class="mb-24">Product Description</h6>
                    <p>
                      Wherever celebrations and good times happen, the LAY'S
                      brand will be there just as it has been for more than 75
                      years. With flavors almost as rich as our history, we have
                      a chip or crisp flavor guaranteed to bring a smile on your
                      face.
                    </p>
                    <p>
                      Morbi ut sapien vitae odio accumsan gravida. Morbi vitae
                      erat auctor, eleifend nunc a, lobortis neque. Praesent
                      aliquam dignissim viverra. Maecenas lacus odio, feugiat eu
                      nunc sit amet, maximus sagittis dolor. Vivamus nisi
                      sapien, elementum sit amet eros sit amet, ultricies cursus
                      ipsum. Sed consequat luctus ligula. Curabitur laoreet
                      rhoncus blandit. Aenean vel diam ut arcu pharetra
                      dignissim ut sed leo. Vivamus faucibus, ipsum in
                      vestibulum vulputate, lorem orci convallis quam, sit amet
                      consequat nulla felis pharetra lacus. Duis semper erat
                      mauris, sed egestas purus commodo vel.
                    </p>
                    <ul class="mt-32 list-inside ms-16">
                      <li class="mb-4 text-gray-400">
                        8.0 oz. bag of LAY'S Classic Potato Chips
                      </li>
                      <li class="mb-4 text-gray-400">
                        Tasty LAY's potato chips are a great snack
                      </li>
                      <li class="mb-4 text-gray-400">
                        Includes three ingredients: potatoes, oil, and salt
                      </li>
                      <li class="mb-4 text-gray-400">Gluten free product</li>
                    </ul>
                    <ul class="mt-32">
                      <li class="mb-4 text-gray-400">Made in USA</li>
                      <li class="mb-4 text-gray-400">Ready To Eat.</li>
                    </ul>
                  </div>
                  <div class="mb-40">
                    <h6 class="mb-24">Product Specifications</h6>
                    <ul class="mt-32">
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Product Type:
                          <span class="text-gray-500"> Chips & Dips</span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Product Name:
                          <span class="text-gray-500">
                            Potato Chips Classic
                          </span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Brand:
                          <span class="text-gray-500"> Lay's</span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          FSA Eligible:
                          <span class="text-gray-500"> No</span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Size/Count:
                          <span class="text-gray-500"> 8.0oz</span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Item Code:
                          <span class="text-gray-500"> 331539</span>
                        </span>
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Ingredients:
                          <span class="text-gray-500">
                            Potatoes, Vegetable Oil, and Salt.</span
                          >
                        </span>
                      </li>
                    </ul>
                  </div>
                  <div class="mb-40">
                    <h6 class="mb-24">Nutrition Facts</h6>
                    <ul class="mt-32">
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Total Fat 10g 13%</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Saturated Fat 1.5g 7%</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Cholesterol 0mg 0%</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Sodium 170mg 7%</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-heading fw-medium">
                          Potassium 350mg 6%</span
                        >
                      </li>
                    </ul>
                  </div>
                  <div class="mb-0">
                    <h6 class="mb-24">More Details</h6>
                    <ul class="mt-32">
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-gray-500">
                          Lunarlon midsole delivers ultra-plush
                          responsiveness</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-gray-500">
                          Encapsulated Air-Sole heel unit for lightweight
                          cushioning</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-gray-500">
                          Colour Shown: Ale Brown/Black/Goldtone/Ale Brown</span
                        >
                      </li>
                      <li class="text-gray-400 mb-14 flex-align gap-14">
                        <span
                          class="w-20 h-20 text-xs bg-main-50 text-main-600 flex-center rounded-circle"
                        >
                          <i class="ph ph-check"></i>
                        </span>
                        <span class="text-gray-500"> Style: 805899-202</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="pills-reviews"
                  role="tabpanel"
                  aria-labelledby="pills-reviews-tab"
                  tabindex="0"
                >
                  <div class="row g-4">
                    <div class="col-lg-6">
                      <h6 class="mb-24">Product Description</h6>
                      <div
                        class="gap-24 border-gray-100 d-flex align-items-start pb-44 border-bottom mb-44"
                      >
                        <img
                          src="{{ asset('theme/images/thumbs/comment-img1.png') }}"
                          alt=""
                          class="flex-shrink-0 w-52 h-52 object-fit-cover rounded-circle"
                        />
                        <div class="flex-grow-1">
                          <div class="gap-8 flex-between align-items-start">
                            <div class="">
                              <h6 class="mb-12 text-md">Nicolas cage</h6>
                              <div class="gap-8 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                            </div>
                            <span class="text-xs text-gray-800"
                              >3 Days ago</span
                            >
                          </div>
                          <h6 class="mt-24 mb-14 text-md">Greate Product</h6>
                          <p class="text-gray-700">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration
                            in some form, by injected humour
                          </p>

                          <div class="gap-20 flex-align mt-44">
                            <button
                              class="gap-12 text-gray-700 flex-align hover-text-main-600"
                            >
                              <i class="ph-bold ph-thumbs-up"></i>
                              Like
                            </button>
                            <a
                              href="#comment-form"
                              class="gap-12 text-gray-700 flex-align hover-text-main-600"
                            >
                              <i class="ph-bold ph-arrow-bend-up-left"></i>
                              Replay
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="gap-24 d-flex align-items-start">
                        <img
                          src="{{ asset('theme/images/thumbs/comment-img1.png') }}"
                          alt=""
                          class="flex-shrink-0 w-52 h-52 object-fit-cover rounded-circle"
                        />
                        <div class="flex-grow-1">
                          <div class="gap-8 flex-between align-items-start">
                            <div class="">
                              <h6 class="mb-12 text-md">Nicolas cage</h6>
                              <div class="gap-8 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                            </div>
                            <span class="text-xs text-gray-800"
                              >3 Days ago</span
                            >
                          </div>
                          <h6 class="mt-24 mb-14 text-md">Greate Product</h6>
                          <p class="text-gray-700">
                            There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration
                            in some form, by injected humour
                          </p>

                          <div class="gap-20 flex-align mt-44">
                            <button
                              class="gap-12 text-gray-700 flex-align hover-text-main-600"
                            >
                              <i class="ph-bold ph-thumbs-up"></i>
                              Like
                            </button>
                            <a
                              href="#comment-form"
                              class="gap-12 text-gray-700 flex-align hover-text-main-600"
                            >
                              <i class="ph-bold ph-arrow-bend-up-left"></i>
                              Replay
                            </a>
                          </div>
                        </div>
                      </div>

                      <div class="mt-56">
                        <div class="">
                          <h6 class="mb-24">Write a Review</h6>
                          <span class="mb-8 text-heading"
                            >What is it like to Product?</span
                          >
                          <div class="gap-8 flex-align">
                            <span
                              class="text-xs fw-medium text-warning-600 d-flex"
                              ><i class="ph-fill ph-star"></i
                            ></span>
                            <span
                              class="text-xs fw-medium text-warning-600 d-flex"
                              ><i class="ph-fill ph-star"></i
                            ></span>
                            <span
                              class="text-xs fw-medium text-warning-600 d-flex"
                              ><i class="ph-fill ph-star"></i
                            ></span>
                            <span
                              class="text-xs fw-medium text-warning-600 d-flex"
                              ><i class="ph-fill ph-star"></i
                            ></span>
                            <span
                              class="text-xs fw-medium text-warning-600 d-flex"
                              ><i class="ph-fill ph-star"></i
                            ></span>
                          </div>
                        </div>
                        <div class="mt-32">
                          <form action="#">
                            <div class="mb-32">
                              <label for="title" class="mb-8 text-neutral-600"
                                >Review Title</label
                              >
                              <input
                                type="text"
                                class="common-input rounded-8"
                                id="title"
                                placeholder="Great Products"
                              />
                            </div>
                            <div class="mb-32">
                              <label for="desc" class="mb-8 text-neutral-600"
                                >Review Content</label
                              >
                              <textarea
                                class="common-input rounded-8"
                                id="desc"
                              >
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</textarea
                              >
                            </div>
                            <button
                              type="submit"
                              class="mt-48 btn btn-main rounded-pill"
                            >
                              Submit Review
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="ms-xxl-5">
                        <h6 class="mb-24">Customers Feedback</h6>
                        <div class="flex-wrap d-flex gap-44">
                          <div
                            class="flex-shrink-0 px-40 text-center border border-gray-100 rounded-8 py-52 flex-center flex-column"
                          >
                            <h2 class="mb-6 text-main-600">4.8</h2>
                            <div class="gap-8 flex-center">
                              <span
                                class="text-xs fw-medium text-warning-600 d-flex"
                                ><i class="ph-fill ph-star"></i
                              ></span>
                              <span
                                class="text-xs fw-medium text-warning-600 d-flex"
                                ><i class="ph-fill ph-star"></i
                              ></span>
                              <span
                                class="text-xs fw-medium text-warning-600 d-flex"
                                ><i class="ph-fill ph-star"></i
                              ></span>
                              <span
                                class="text-xs fw-medium text-warning-600 d-flex"
                                ><i class="ph-fill ph-star"></i
                              ></span>
                              <span
                                class="text-xs fw-medium text-warning-600 d-flex"
                                ><i class="ph-fill ph-star"></i
                              ></span>
                            </div>
                            <span class="mt-16 text-gray-500"
                              >Average Product Rating</span
                            >
                          </div>
                          <div
                            class="px-24 py-40 border border-gray-100 rounded-8 flex-grow-1"
                          >
                            <div class="gap-8 mb-20 flex-align">
                              <span class="flex-shrink-0 text-gray-900">5</span>
                              <div
                                class="h-8 bg-gray-100 progress w-100 rounded-pill"
                                role="progressbar"
                                aria-label="Basic example"
                                aria-valuenow="70"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  class="progress-bar bg-main-600 rounded-pill"
                                  style="width: 70%"
                                ></div>
                              </div>
                              <div class="gap-4 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                              <span class="flex-shrink-0 text-gray-900"
                                >124</span
                              >
                            </div>
                            <div class="gap-8 mb-20 flex-align">
                              <span class="flex-shrink-0 text-gray-900">4</span>
                              <div
                                class="h-8 bg-gray-100 progress w-100 rounded-pill"
                                role="progressbar"
                                aria-label="Basic example"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  class="progress-bar bg-main-600 rounded-pill"
                                  style="width: 50%"
                                ></div>
                              </div>
                              <div class="gap-4 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                              <span class="flex-shrink-0 text-gray-900"
                                >52</span
                              >
                            </div>
                            <div class="gap-8 mb-20 flex-align">
                              <span class="flex-shrink-0 text-gray-900">3</span>
                              <div
                                class="h-8 bg-gray-100 progress w-100 rounded-pill"
                                role="progressbar"
                                aria-label="Basic example"
                                aria-valuenow="35"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  class="progress-bar bg-main-600 rounded-pill"
                                  style="width: 35%"
                                ></div>
                              </div>
                              <div class="gap-4 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                              <span class="flex-shrink-0 text-gray-900"
                                >12</span
                              >
                            </div>
                            <div class="gap-8 mb-20 flex-align">
                              <span class="flex-shrink-0 text-gray-900">2</span>
                              <div
                                class="h-8 bg-gray-100 progress w-100 rounded-pill"
                                role="progressbar"
                                aria-label="Basic example"
                                aria-valuenow="20"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  class="progress-bar bg-main-600 rounded-pill"
                                  style="width: 20%"
                                ></div>
                              </div>
                              <div class="gap-4 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                              <span class="flex-shrink-0 text-gray-900">5</span>
                            </div>
                            <div class="gap-8 mb-0 flex-align">
                              <span class="flex-shrink-0 text-gray-900">1</span>
                              <div
                                class="h-8 bg-gray-100 progress w-100 rounded-pill"
                                role="progressbar"
                                aria-label="Basic example"
                                aria-valuenow="5"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  class="progress-bar bg-main-600 rounded-pill"
                                  style="width: 5%"
                                ></div>
                              </div>
                              <div class="gap-4 flex-align">
                                <span
                                  class="text-xs fw-medium text-warning-600 d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                                <span
                                  class="text-xs text-gray-400 fw-medium d-flex"
                                  ><i class="ph-fill ph-star"></i
                                ></span>
                              </div>
                              <span class="flex-shrink-0 text-gray-900">2</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================== Product Details Two End =========================== -->

    <!-- ========================== Similar Product Start ============================= -->
    <section class="new-arrival pb-80">
      <div class="container container-lg">
        <div class="section-heading">
          <div class="flex-wrap gap-8 flex-between">
            <h5 class="mb-0">You Might Also Like</h5>
            <div class="gap-16 flex-align">
              <a
                href="{{ route('shop') }}"
                class="text-sm text-gray-700 fw-medium hover-text-main-600 hover-text-decoration-underline"
                >All Products</a
              >
              <div class="gap-8 flex-align">
                <button
                  type="button"
                  id="new-arrival-prev"
                  class="text-xl border border-gray-100 slick-prev slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                >
                  <i class="ph ph-caret-left"></i>
                </button>
                <button
                  type="button"
                  id="new-arrival-next"
                  class="text-xl border border-gray-100 slick-next slick-arrow flex-center rounded-circle hover-border-main-600 hover-bg-main-600 hover-text-white transition-1"
                >
                  <i class="ph ph-caret-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="new-arrival__slider arrow-style-two">
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img7.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >C-500 Antioxidant Protect Dietary Supplement</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <span
                class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600"
                >Sale 50%
              </span>
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img8.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >Marcel's Modern Pantry Almond Unsweetened</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <span
                class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600"
                >Sale 50%
              </span>
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img9.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >O Organics Milk, Whole, Vitamin D</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <span
                class="px-8 py-4 text-sm text-white product-card__badge bg-info-600"
                >Best Sale
              </span>
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img10.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >Whole Grains and Seeds Organic Bread</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img11.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >Lucerne Yogurt, Lowfat, Strawberry</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <span
                class="px-8 py-4 text-sm text-white product-card__badge bg-danger-600"
                >Sale 50%
              </span>
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img12.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >Nature Valley Whole Grain Oats and Honey Protein</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div
              class="p-8 border border-gray-100 product-card h-100 hover-border-main-600 rounded-16 position-relative transition-2"
            >
              <span
                class="px-8 py-4 text-sm text-white product-card__badge bg-info-600"
                >Best Sale
              </span>
              <a
                href="#"
                class="overflow-hidden product-card__thumb flex-center"
              >
                <img src="{{ asset('theme/images/thumbs/product-img10.png') }}" alt="" />
              </a>
              <div class="product-card__content p-sm-2 w-100">
                <h6 class="mt-12 mb-8 text-lg title fw-semibold">
                  <a href="#" class="link text-line-2"
                    >Whole Grains and Seeds Organic Bread</a
                  >
                </h6>
                <div class="gap-4 flex-align">
                  <span class="text-main-600 text-md d-flex"
                    ><i class="ph-fill ph-storefront"></i
                  ></span>
                  <span class="text-xs text-gray-500"
                    >By Lucky Supermarket</span
                  >
                </div>

                <div class="mt-12 product-card__content">
                  <div class="mb-8 product-card__price">
                    <span class="text-heading text-md fw-semibold"
                      >$14.99 <span class="text-gray-500 fw-normal">/Qty</span>
                    </span>
                    <span
                      class="text-gray-400 text-md fw-semibold text-decoration-line-through"
                    >
                      $28.99</span
                    >
                  </div>
                  <div class="gap-6 flex-align">
                    <span class="text-xs text-gray-600 fw-bold">4.8</span>
                    <span class="text-15 fw-bold text-warning-600 d-flex"
                      ><i class="ph-fill ph-star"></i
                    ></span>
                    <span class="text-xs text-gray-600 fw-bold">(17k)</span>
                  </div>
                  <a
                    href="{{ route('cart') }}"
                    class="gap-8 px-24 mt-24 product-card__cart btn bg-main-50 text-main-600 hover-bg-main-600 hover-text-white py-11 rounded-pill flex-align w-100 justify-content-center"
                  >
                    Add To Cart <i class="ph ph-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================== Similar Product End ============================= -->

    <!-- ========================== Shipping Section Start ============================ -->
    <section class="mb-24 shipping" id="shipping">
      <div class="container container-lg">
        <div class="row gy-4">
          <div
            class="col-xxl-3 col-sm-6"
            data-aos="zoom-in"
            data-aos-duration="400"
          >
            <div
              class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2"
            >
              <span
                class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"
                ><i class="ph-fill ph-car-profile"></i
              ></span>
              <div class="">
                <h6 class="mb-0">Free Shipping</h6>
                <span class="text-sm text-heading"
                  >Free shipping all over the US</span
                >
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-sm-6"
            data-aos="zoom-in"
            data-aos-duration="600"
          >
            <div
              class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2"
            >
              <span
                class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"
                ><i class="ph-fill ph-hand-heart"></i
              ></span>
              <div class="">
                <h6 class="mb-0">100% Satisfaction</h6>
                <span class="text-sm text-heading"
                  >Free shipping all over the US</span
                >
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-sm-6"
            data-aos="zoom-in"
            data-aos-duration="800"
          >
            <div
              class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2"
            >
              <span
                class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"
                ><i class="ph-fill ph-credit-card"></i
              ></span>
              <div class="">
                <h6 class="mb-0">Secure Payments</h6>
                <span class="text-sm text-heading"
                  >Free shipping all over the US</span
                >
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-sm-6"
            data-aos="zoom-in"
            data-aos-duration="1000"
          >
            <div
              class="gap-16 shipping-item flex-align rounded-16 bg-main-50 hover-bg-main-100 transition-2"
            >
              <span
                class="flex-shrink-0 w-56 h-56 text-white flex-center rounded-circle bg-main-600 text-32"
                ><i class="ph-fill ph-chats"></i
              ></span>
              <div class="">
                <h6 class="mb-0">24/7 Support</h6>
                <span class="text-sm text-heading"
                  >Free shipping all over the US</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ========================== Shipping Section End ============================ -->

    <!-- =============================== Newsletter Section Start ============================ -->
    <div class="newsletter">
      <div class="container container-lg">
        <div
          class="flex-wrap gap-16 newsletter-box position-relative rounded-16 flex-align z-1"
        >
          <img
            src="{{ asset('theme/images/bg/newsletter-bg.png') }}"
            alt=""
            class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6"
          />
          <div class="row align-items-center">
            <div class="col-xl-6">
              <div class="">
                <h1
                  class="mb-12 text-white"
                  data-aos="fade-down"
                  data-aos-duration="800"
                >
                  Don't Miss Out on Grocery Deals
                </h1>
                <p
                  class="mb-0 text-white h5"
                  data-aos="fade-up"
                  data-aos-duration="800"
                >
                  SING UP FOR THE UPDATE NEWSLETTER
                </p>
                <form
                  action="#"
                  class="mt-40 position-relative"
                  data-aos="zoom-in"
                  data-aos-duration="800"
                >
                  <input
                    type="email"
                    class="px-16 text-white form-control common-input rounded-pill py-22 pe-144"
                    placeholder="Your email address..."
                  />
                  <button
                    type="submit"
                    class="btn btn-main-two rounded-pill position-absolute top-50 translate-middle-y inset-inline-end-0 me-10"
                  >
                    Subscribe
                  </button>
                </form>
              </div>
            </div>
            <div class="text-center col-xl-6 d-xl-block d-none">
              <img
                src="{{ asset('theme/images/thumbs/newsletter-img.png') }}"
                alt=""
                data-aos="zoom-in"
                data-aos-duration="800"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =============================== Newsletter Section End ============================ -->
@endsection
