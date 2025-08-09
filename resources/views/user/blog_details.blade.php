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

    <!-- =============================== Blog Details Section Start =========================== -->
    <section class="blog-details py-80">
        <div class="container container-lg">
            <div class="row gy-5">
                <div class="col-lg-8 pe-xl-4">
                    <div class="blog-item-wrapper">
                        <div class="blog-item">
                            <img src="{{ asset('theme/images/thumbs/blog-img1.png') }}" alt="" class="cover-img rounded-16">
                            <div class="mt-24 blog-item__content">
                                <span class="px-24 py-4 mb-16 bg-main-50 text-main-600 rounded-8">Gadget</span>
                                <h4 class="mb-24">Nice decoration make be distilled to a single house</h4>
                                <p class="mb-24 text-gray-700">A great commerce experience cannot be distilled to a single
                                    number. It's not a Lighthouse score, or a set of Core Web Vitals figures, although both
                                    are important inputs. A great commerce experience is a trilemma that carefully balances
                                    competing needs of delivering great customer experience, dynamic storefront
                                    capabilities, and long-term business — conversion, retention, re-engagement —
                                    objectives. As developers, we rightfully obsess about the customer experience,
                                    relentlessly working to squeeze every millisecond out of the critical rendering path,
                                    optimize input latency, and eliminate jank. At the limit, statically generated, edge
                                    delivered, and HTML-first pages look like the optimal strategy. That is until you are
                                    confronted with the realization that the next step function in improving conversion
                                    rates and business.</p>
                                <p class="pb-24 mb-24 text-gray-700 border-gray-100 border-bottom">Re-engagement —
                                    objectives. As developers, we rightfully obsess about the customer experience,
                                    relentlessly working to squeeze every millisecond out of the critical rendering path,
                                    optimize input latency, and eliminate...</p>

                                <div class="flex-wrap gap-24 flex-align">
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">July 12,
                                                2025</a>
                                        </span>
                                    </div>
                                    <div class="flex-wrap gap-8 flex-align">
                                        <span class="text-lg text-main-600"><i class="ph ph-chats-circle"></i></span>
                                        <span class="text-sm text-gray-500">
                                            <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">0
                                                Comments</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-48">
                        <div class="row gy-4">
                            <div class="col-sm-6 col-xs-6">
                                <img src="{{ asset('theme/images/thumbs/blog-details-img1.png') }}" alt="" class="rounded-16">
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <img src="{{ asset('theme/images/thumbs/blog-details-img2.png') }}" alt="" class="rounded-16">
                            </div>
                        </div>
                    </div>

                    <div class="mt-48">
                        <p class="mb-24 text-gray-700">A great commerce experience cannot be distilled to a single number.
                            It’s not a Lighthouse score, or a set of Core Web Vitals figures, although both are important
                            inputs. A great commerce experience is a trilemma that carefully balances competing needs of
                            delivering great customer experience, dynamic storefront capabilities, and long-term business.
                        </p>
                    </div>

                    <div class="mt-48">
                        <h6 class="mb-32">The following are the four main market segments in which e-commerce is present.
                            These are the following:</h6>
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <ul>
                                    <li class="gap-8 mb-20 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                    <li class="gap-8 mb-20 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                    <li class="gap-8 mb-0 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <li class="gap-8 mb-20 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                    <li class="gap-8 mb-20 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                    <li class="gap-8 mb-0 d-flex align-items-start">
                                        <span class="flex-shrink-0 text-xl d-flex"><i class="ph ph-check"></i></span>
                                        <span class="text-gray-700 flex-grow-1">A great commerce experience cannot be
                                            distilled to a single number. </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="mt-48">
                        <div class="p-24 rounded-16 bg-main-50">
                            <span class="w-48 h-48 mb-24 text-2xl text-white bg-main-600 flex-center rounded-circle"><i
                                    class="ph ph-quotes"></i></span>
                            <p class="mb-24 text-gray-700">A great commerce experience cannot be distilled to a single
                                number. It’s not a Lighthouse score, or a set of Core Web Vitals figures, although both are
                                important inputs. A great commerce experience is a trilemma that carefully balances
                                competing needs of delivering great customer experience, dynamic storefront capabilities,
                                and long-term business.</p>
                            <div class="gap-8 flex-align">
                                <span class="text-15 fw-medium text-neutral-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-15 fw-medium text-neutral-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-15 fw-medium text-neutral-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-15 fw-medium text-neutral-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                                <span class="text-15 fw-medium text-neutral-600 d-flex"><i
                                        class="ph-fill ph-star"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-48">
                        <div class="gap-8 flex-align">
                            <h6 class="mb-0">Tag:</h6>
                            <a href="{{ route('shop') }}"
                                class="px-8 py-6 text-gray-900 border border-gray-100 rounded-4 hover-bg-gray-100">Mobile</a>
                            <a href="{{ route('shop') }}"
                                class="px-8 py-6 text-gray-900 border border-gray-100 rounded-4 hover-bg-gray-100">Laptop</a>
                            <a href="{{ route('shop') }}"
                                class="px-8 py-6 text-gray-900 border border-gray-100 rounded-4 hover-bg-gray-100">Gadget</a>
                        </div>
                    </div>

                    <div class="my-48">
                        <span class="border-gray-100 border-bottom d-block"></span>
                    </div>

                    <div class="flex-wrap gap-24 my-48 flex-between flex-sm-nowrap">
                        <div class="">
                            <button type="button"
                                class="mb-20 text-lg text-gray-500 h6 fw-normal hover-text-main-600">Previous Post</button>
                            <h6 class="mb-0 text-lg">
                                <a href="{{ route('blog.details') }}" class="">A great commerce experience cannot be distilled
                                    to a single number. </a>
                            </h6>
                        </div>
                        <div class="text-end">
                            <button type="button"
                                class="mb-20 text-lg text-gray-500 h6 fw-normal hover-text-main-600">Next</button>
                            <h6 class="mb-0 text-lg">
                                <a href="{{ route('blog.details') }}" class="">A great commerce experience cannot be distilled
                                    to a single number. </a>
                            </h6>
                        </div>
                    </div>

                    <div class="my-48">
                        <span class="border-gray-100 border-bottom d-block"></span>
                    </div>

                    <div class="my-48">
                        <form action="#">
                            <h6 class="mb-24">Leave a Comment</h6>
                            <div class="row gy-4">
                                <div class="col-sm-6 col-xs-6">
                                    <label for="name"
                                        class="mb-4 text-sm text-gray-900 font-heading-two fw-semibold">Full Name</label>
                                    <input type="text" class="px-16 common-input" id="name"
                                        placeholder="Full name">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <label for="email"
                                        class="mb-4 text-sm text-gray-900 font-heading-two fw-semibold">Email
                                        Address</label>
                                    <input type="email" class="px-16 common-input" id="email"
                                        placeholder="Email address">
                                </div>
                                <div class="col-sm-12">
                                    <label for="message"
                                        class="mb-4 text-sm text-gray-900 font-heading-two fw-semibold">Message</label>
                                    <textarea class="px-16 common-input" id="message" placeholder="What's your thought about this blog..."></textarea>
                                </div>
                                <div class="mt-32 col-sm-12">
                                    <button type="submit" class="px-32 btn btn-main py-18 rounded-8">Post
                                        Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="my-48">
                        <form action="#">
                            <h6 class="mb-48">Comments</h6>
                            <div class="gap-16 pb-32 mb-32 border-gray-100 d-flex align-items-start border-bottom">
                                <img src="{{ asset('theme/images/thumbs/comment-img1.png') }}" alt=""
                                    class="flex-shrink-0 w-40 h-40 rounded-circle object-fit-cover">
                                <div class="flex-grow-1">
                                    <div class="gap-8 flex-align">
                                        <h6 class="mb-0 text-md fw-bold">Marvin McKinney</h6>
                                        <span class="w-6 h-6 bg-gray-500 rounded-circle"></span>
                                        <span class="text-sm text-gray-700 fw-medium">26 Apr, 2024</span>
                                    </div>
                                    <p class="mt-16 text-gray-700">In a nisi commodo, porttitor ligula consequat, tincidunt
                                        dui. Nulla volutpat, metus eu aliquam malesuada, elit libero venenatis urna,
                                        consequat maximus arcu diam non diam.</p>
                                </div>
                            </div>
                            <div class="gap-16 pb-32 mb-32 border-gray-100 d-flex align-items-start border-bottom">
                                <img src="{{ asset('theme/images/thumbs/comment-img2.png') }}" alt=""
                                    class="flex-shrink-0 w-40 h-40 rounded-circle object-fit-cover">
                                <div class="flex-grow-1">
                                    <div class="gap-8 flex-align">
                                        <h6 class="mb-0 text-md fw-bold">Kristin Watson</h6>
                                        <span class="w-6 h-6 bg-gray-500 rounded-circle"></span>
                                        <span class="text-sm text-gray-700 fw-medium">24 Apr, 2024</span>
                                    </div>
                                    <p class="mt-16 text-gray-700">Quisque eget tortor lobortis, facilisis metus eu,
                                        elementum est. Nunc sit amet erat quis ex convallis suscipit. Nam hendrerit, velit
                                        ut aliquam euismod, nibh tortor rutrum nisi, ac sodales nunc eros porta nisi. Sed
                                        scelerisque, est eget aliquam venenatis, est sem tempor eros.</p>
                                </div>
                            </div>
                            <div class="gap-16 pb-32 mb-32 border-gray-100 d-flex align-items-start border-bottom">
                                <img src="{{ asset('theme/images/thumbs/comment-img3.png') }}" alt=""
                                    class="flex-shrink-0 w-40 h-40 rounded-circle object-fit-cover">
                                <div class="flex-grow-1">
                                    <div class="gap-8 flex-align">
                                        <h6 class="mb-0 text-md fw-bold">Jenny Wilson</h6>
                                        <span class="w-6 h-6 bg-gray-500 rounded-circle"></span>
                                        <span class="text-sm text-gray-700 fw-medium">20 Apr, 2024</span>
                                    </div>
                                    <p class="mt-16 text-gray-700">Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia curae.</p>
                                </div>
                            </div>
                            <div class="gap-16 pb-32 mb-32 border-gray-100 d-flex align-items-start border-bottom">
                                <img src="{{ asset('theme/images/thumbs/comment-img4.png') }}" alt=""
                                    class="flex-shrink-0 w-40 h-40 rounded-circle object-fit-cover">
                                <div class="flex-grow-1">
                                    <div class="gap-8 flex-align">
                                        <h6 class="mb-0 text-md fw-bold">Robert Fox</h6>
                                        <span class="w-6 h-6 bg-gray-500 rounded-circle"></span>
                                        <span class="text-sm text-gray-700 fw-medium">18 Apr, 2024</span>
                                    </div>
                                    <p class="mt-16 text-gray-700">Pellentesque feugiat, nibh vel vehicula pretium, nibh
                                        nibh bibendum elit, a volutpat arcu dui nec orci. Aenean dui odio, ullamcorper quis
                                        turpis ac, volutpat imperdiet ex.</p>
                                </div>
                            </div>
                            <div class="gap-16 d-flex align-items-start">
                                <img src="{{ asset('theme/images/thumbs/comment-img5.png') }}" alt=""
                                    class="flex-shrink-0 w-40 h-40 rounded-circle object-fit-cover">
                                <div class="flex-grow-1">
                                    <div class="gap-8 flex-align">
                                        <h6 class="mb-0 text-md fw-bold">Eleanor Pena</h6>
                                        <span class="w-6 h-6 bg-gray-500 rounded-circle"></span>
                                        <span class="text-sm text-gray-700 fw-medium">7 Apr, 2024</span>
                                    </div>
                                    <p class="mt-16 text-gray-700">Nulla molestie interdum ultricies. </p>
                                </div>
                            </div>
                            <div class="mt-48">
                                <button type="submit" class="gap-8 btn btn-main py-13 flex-align">
                                    Load More <i class="text-2xl ph ph-spinner-gap"></i>
                                </button>
                            </div>
                        </form>
                    </div>


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
                            <a href="{{ route('blog.details') }}"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post1.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="{{ route('blog.details') }}" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-16 d-flex align-items-center flex-sm-nowrap">
                            <a href="{{ route('blog.details') }}"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post2.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="{{ route('blog.details') }}" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-16 d-flex align-items-center flex-sm-nowrap">
                            <a href="{{ route('blog.details') }}"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post3.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="{{ route('blog.details') }}" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">July 12,
                                            2025</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap gap-24 mb-0 d-flex align-items-center flex-sm-nowrap">
                            <a href="{{ route('blog.details') }}"
                                class="flex-shrink-0 overflow-hidden w-100 h-100 rounded-4 w-120 h-120">
                                <img src="{{ asset('theme/images/thumbs/recent-post4.png') }}" alt="" class="cover-img">
                            </a>
                            <div class="flex-grow-1">
                                <h6 class="text-lg">
                                    <a href="{{ route('blog.details') }}" class="text-line-3">Once determined you need to come up
                                        with a name</a>
                                </h6>
                                <div class="flex-wrap gap-8 flex-align">
                                    <span class="text-lg text-main-600"><i class="ph ph-calendar-dots"></i></span>
                                    <span class="text-sm text-gray-500">
                                        <a href="{{ route('blog.details') }}" class="text-gray-500 hover-text-main-600">July 12,
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
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Gaming (12)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Smart Gadget (05)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Software (29)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Electronics (24)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Laptop (08)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-16">
                                <a href="{{ route('blog.details') }}"
                                    class="gap-8 p-4 text-gray-700 border border-gray-100 flex-between rounded-4 ps-16 hover-border-main-600 hover-text-main-600">
                                    <span>Mobile & Accessories (16)</span>
                                    <span class="w-40 h-40 flex-center rounded-4 bg-main-50 text-main-600"><i
                                            class="ph ph-arrow-right"></i></span>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="{{ route('blog.details') }}"
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
    <!-- =============================== Blog Details Section End =========================== -->

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
