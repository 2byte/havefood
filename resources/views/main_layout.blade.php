<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Есть еда</title>
    <script src="/assets/registerSw.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/pronia/assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" href="/pronia/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="/pronia/assets/css/animate.min.css">
    <link rel="stylesheet" href="/pronia/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/pronia/assets/css/nice-select.css">
    <link rel="stylesheet" href="/pronia/assets/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/ion.rangeSlider.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="/pronia/assets/css/style.css">

</head>
<body>
    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    
    <div class="main-wrapper">
        @include('header')

        <!-- Begin Product Area -->
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title mb-0">Наши продукты</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">
                                    Featured
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="bestseller-tab" data-bs-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="false">
                                    Bestseller
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="latest-tab" data-bs-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">
                                    Latest
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                <div class="product-item-wrap row">
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">American Marigold</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$23.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$25.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bleeding Heart</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$30.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$45.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Butterfly Weed</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$50.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Common Yarrow</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$65.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$67.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$20.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bestseller" role="tabpanel" aria-labelledby="bestseller-tab">
                                <div class="product-item-wrap row">
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Butterfly Weed</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$50.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Common Yarrow</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$65.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$67.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$20.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">American Marigold</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$23.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$25.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bleeding Heart</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$30.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$45.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                                <div class="product-item-wrap row">
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$67.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$20.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">

                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">

                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$67.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$20.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">American Marigold</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$23.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$25.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Butterfly Weed</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$50.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-6-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Common Yarrow</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$65.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-3-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bleeding Heart</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$30.45</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="shop.html">
                                                    <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                                    <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-5-270x300.jpg" alt="Product Images">
                                                </a>
                                                <div class="product-add-action">
                                                    <ul>
                                                        <li>
                                                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </li>
                                                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                            <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price">$45.00</span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
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
        <!-- Product Area End Here -->

        <!-- Begin Banner Area -->
        <div class="banner-area section-space-top-90">
            <div class="container">
                <div class="row g-min-30 g-4">
                    <div class="col-lg-8">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img">
                                <img src="/pronia/assets/images/banner/1-1-770x300.jpg" alt="Banner Image">
                            </div>
                            <div class="banner-content text-position-left">
                                <span class="collection">Collection Of Cactus</span>
                                <h3 class="title">Pottery Pots & <br> Plant</h3>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size btn-pronia-primary" href="shop.html">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img">
                                <img src="/pronia/assets/images/banner/1-2-370x300.jpg" alt="Banner Image">
                            </div>
                            <div class="banner-content text-position-center">
                                <span class="collection">New Collection</span>
                                <h3 class="title">Plant Port</h3>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img">
                                <img src="/pronia/assets/images/banner/1-3-370x300.jpg" alt="Banner Image">
                            </div>
                            <div class="banner-content text-position-center">
                                <span class="collection">New Collection</span>
                                <h3 class="title">Plant Port</h3>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img">
                                <img src="/pronia/assets/images/banner/1-4-770x300.jpg" alt="Banner Image">
                            </div>
                            <div class="banner-content text-position-left">
                                <span class="collection">Collection Of Cactus</span>
                                <h3 class="title">Hanging Pots & <br> Plant</h3>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End Here -->

        <!-- Begin Product Area -->
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="section-title-wrap without-tab">
                        <h2 class="section-title">New Products</h2>
                        <p class="section-desc">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                            roots in a piece of classical Latin literature
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <div class="swiper-container product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide product-item">
                                    <div class="product-img">
                                        <a href="shop.html">
                                            <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-9-270x300.jpg" alt="Product Images">
                                            <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-10-270x300.jpg" alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="shop.html">American Marigold</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$23.45</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-item">
                                    <div class="product-img">
                                        <a href="shop.html">
                                            <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-10-270x300.jpg" alt="Product Images">
                                            <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-11-270x300.jpg" alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$25.45</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-item">
                                    <div class="product-img">
                                        <a href="shop.html">
                                            <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-11-270x300.jpg" alt="Product Images">
                                            <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-4-270x300.jpg" alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="shop.html">Bleeding Heart</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$30.45</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-item">
                                    <div class="product-img">
                                        <a href="shop.html">
                                            <img class="primary-img" src="/pronia/assets/images/product/medium-size/1-7-270x300.jpg" alt="Product Images">
                                            <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-8-270x300.jpg" alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                            <ul>
                                                <li>
                                                    <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </li>
                                                <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">$45.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->

        <!-- Begin Testimonial Area -->
        <div class="testimonial-area section-space-top-90 section-space-bottom-95">
            <div class="container-fluid">
                <div class="testimonial-bg" data-bg-image="/pronia/assets/images/testimonial/bg/1-1-1820x443.jpg">
                    <div class="section-title-wrap">
                        <h2 class="section-title">What Say Client</h2>
                        <p class="section-desc mb-0">
                            Contrary to popular belief, Lorem Ipsum is not simply random
                            text. It has roots in a piece of classical Latin literature
                        </p>
                    </div>
                </div>
                <div class="container custom-space">
                    <div class="swiper-container testimonial-slider with-bg">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide testimonial-item">
                                <div class="user-info mb-3">
                                    <div class="user-shape-wrap">
                                        <div class="user-img">
                                            <img src="/pronia/assets/images/testimonial/user/1.png" alt="User Image">
                                        </div>
                                    </div>
                                    <div class="user-content text-charcoal">
                                        <h4 class="user-name mb-1">Phoenix Baker</h4>
                                        <span class="user-occupation">Client</span>
                                    </div>
                                </div>
                                <p class="user-comment mb-6">
                                    Lorem ipsum dolor sit amet, conse adipisic elit, sed do eiusmod
                                    tempo
                                    incididunt ut labore et dolore. magna
                                </p>
                            </div>
                            <div class="swiper-slide testimonial-item">
                                <div class="user-info mb-3">
                                    <div class="user-shape-wrap">
                                        <div class="user-img">
                                            <img src="/pronia/assets/images/testimonial/user/2.png" alt="User Image">
                                        </div>
                                    </div>
                                    <div class="user-content text-charcoal">
                                        <h4 class="user-name mb-1">Phoenix Baker</h4>
                                        <span class="user-occupation">Client</span>
                                    </div>
                                </div>
                                <p class="user-comment mb-6">
                                    Lorem ipsum dolor sit amet, conse adipisic elit, sed do eiusmod
                                    tempo
                                    incididunt ut labore et dolore. magna
                                </p>
                            </div>
                            <div class="swiper-slide testimonial-item">
                                <div class="user-info mb-3">
                                    <div class="user-shape-wrap">
                                        <div class="user-img">
                                            <img src="/pronia/assets/images/testimonial/user/3.png" alt="User Image">
                                        </div>
                                    </div>
                                    <div class="user-content text-charcoal">
                                        <h4 class="user-name mb-1">Phoenix Baker</h4>
                                        <span class="user-occupation">Client</span>
                                    </div>
                                </div>
                                <p class="user-comment mb-6">
                                    Lorem ipsum dolor sit amet, conse adipisic elit, sed do eiusmod
                                    tempo
                                    incididunt ut labore et dolore. magna
                                </p>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination without-absolute"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Area End Here -->

        <!-- Begin Brand Area -->
        <div class="brand-area section-space-bottom-100">
            <div class="container">
                <div class="brand-bg" data-bg-image="/pronia/assets/images/brand/bg/1-1170x300.jpg">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-container brand-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="#">
                                            <img src="/pronia/assets/images/brand/1-1.png" alt="Brand Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="#">
                                            <img src="/pronia/assets/images/brand/1-2.png" alt="Brand Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="#">
                                            <img src="/pronia/assets/images/brand/1-3.png" alt="Brand Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="#">
                                            <img src="/pronia/assets/images/brand/1-4.png" alt="Brand Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a class="brand-item" href="#">
                                            <img src="/pronia/assets/images/brand/1-5.png" alt="Brand Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Area End Here -->

        <!-- Begin Blog Area -->
        <div class="blog-area section-space-bottom-100">
            <div class="container">
                <div class="section-title-wrap">
                    <h2 class="section-title mb-7">Latest Blog</h2>
                    <p class="section-desc">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                        roots in a piece of classical Latin literature
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container blog-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li class="author">
                                                        <a href="#">By: Admin</a>
                                                    </li>
                                                    <li class="date">24 April 2021</li>
                                                </ul>
                                            </div>
                                            <h2 class="title">
                                                <a href="blog.html">There Many Variations</a>
                                            </h2>
                                            <p class="short-desc mb-7">
                                                Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                                sed do eiusmod tempor incidio ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <div class="blog-img img-hover-effect">
                                            <a href="blog.html">
                                                <img class="img-full" src="/pronia/assets/images/blog/medium-size/1-1-310x220.jpg" alt="Blog Image">
                                            </a>
                                            <div class="inner-btn-wrap">
                                                <a class="inner-btn" href="blog.html">
                                                    <i class="pe-7s-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li class="author">
                                                        <a href="#">By: Admin</a>
                                                    </li>
                                                    <li class="date">24 April 2021</li>
                                                </ul>
                                            </div>
                                            <h2 class="title">
                                                <a href="blog.html">Maecenas Laoreet Massa</a>
                                            </h2>
                                            <p class="short-desc mb-7">
                                                Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                                sed do eiusmod tempor incidio ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <div class="blog-img img-hover-effect">
                                            <a href="blog.html">
                                                <img class="img-full" src="/pronia/assets/images/blog/medium-size/1-2-310x220.jpg" alt="Blog Image">
                                            </a>
                                            <div class="inner-btn-wrap">
                                                <a class="inner-btn" href="blog.html">
                                                    <i class="pe-7s-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="blog-item">
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li class="author">
                                                        <a href="#">By: Admin</a>
                                                    </li>
                                                    <li class="date">24 April 2021</li>
                                                </ul>
                                            </div>
                                            <h2 class="title">
                                                <a href="blog.html">Aenean Vulputate Lorem</a>
                                            </h2>
                                            <p class="short-desc mb-7">
                                                Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                                sed do eiusmod tempor incidio ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <div class="blog-img img-hover-effect">
                                            <a href="blog.html">
                                                <img class="img-full" src="/pronia/assets/images/blog/medium-size/1-3-310x220.jpg" alt="Blog Image">
                                            </a>
                                            <div class="inner-btn-wrap">
                                                <a class="inner-btn" href="blog.html">
                                                    <i class="pe-7s-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End Here -->

        <!-- Begin Footer Area -->
        <div class="footer-area" data-bg-image="/pronia/assets/images/footer/bg/1-1920x465.jpg">
            <div class="footer-top section-space-top-100 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="footer-widget-item">
                                <div class="footer-widget-logo">
                                    <a href="index.html">
                                        <img src="/pronia/assets/images/logo/dark.png" alt="Logo">
                                    </a>
                                </div>
                                <p class="footer-widget-desc">
                                    Lorem ipsum dolor sit amet, consec adipisl elit, sed do eiusmod
                                    tempor
                                    <br>
                                    incidio ut labore et dolore magna.
                                </p>
                                <div class="social-link with-border">
                                    <ul>
                                        <li>
                                            <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-tippy="Pinterest" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-tippy="Dribbble" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                <i class="fa fa-dribbble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 pt-40">
                            <div class="footer-widget-item">
                                <h3 class="footer-widget-title">Useful Links</h3>
                                <ul class="footer-widget-list-item">
                                    <li>
                                        <a href="#">About Pronia</a>
                                    </li>
                                    <li>
                                        <a href="#">How to shop</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact us</a>
                                    </li>
                                    <li>
                                        <a href="#">Log in</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 pt-40">
                            <div class="footer-widget-item">
                                <h3 class="footer-widget-title">My Account</h3>
                                <ul class="footer-widget-list-item">
                                    <li>
                                        <a href="#">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="#">View Cart</a>
                                    </li>
                                    <li>
                                        <a href="#">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#">Track My Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 pt-40">
                            <div class="footer-widget-item">
                                <h3 class="footer-widget-title">Our Service</h3>
                                <ul class="footer-widget-list-item">
                                    <li>
                                        <a href="#">Payment Methods</a>
                                    </li>
                                    <li>
                                        <a href="#">Money Guarantee!</a>
                                    </li>
                                    <li>
                                        <a href="#">Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 pt-40">
                            <div class="footer-contact-info">
                                <h3 class="footer-widget-title">Got Question? Call Us</h3>
                                <a class="number" href="tel://123-456-789">123 456 789</a>
                                <div class="address">
                                    <ul>
                                        <li>
                                            Your Address Goes Here
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <a href="#">
                                    <img src="/pronia/assets/images/payment/1.png" alt="Payment Method">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <span class="copyright-text">© 2021 Pronia Made with <i class="fa fa-heart text-danger"></i> by
                                    <a href="https://hasthemes.com/" rel="noopener" target="_blank">HasThemes</a> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->

        <!-- Begin Modal Area -->
        <div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-wrap row">
                            <div class="col-lg-6">
                                <div class="modal-img">
                                    <div class="swiper-container modal-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full" src="/pronia/assets/images/product/large-size/1-1-570x633.jpg" alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full" src="/pronia/assets/images/product/large-size/1-2-570x633.jpg" alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full" src="/pronia/assets/images/product/large-size/1-3-570x633.jpg" alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full" src="/pronia/assets/images/product/large-size/1-4-570x633.jpg" alt="Product Image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-5 pt-lg-0">
                                <div class="single-product-content">
                                    <h2 class="title">American Marigold</h2>
                                    <div class="price-box">
                                        <span class="new-price">$23.45</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-status">
                                            <a href="#">( 1 Review )</a>
                                        </div>
                                    </div>
                                    <div class="selector-wrap color-option">
                                        <span class="selector-title border-bottom-0">Color</span>
                                        <select class="nice-select wide border-bottom-0 rounded-0">
                                            <option value="default">Black & White</option>
                                            <option value="blue">Blue</option>
                                            <option value="green">Green</option>
                                            <option value="red">Red</option>
                                        </select>
                                    </div>
                                    <div class="selector-wrap size-option">
                                        <span class="selector-title">Size</span>
                                        <select class="nice-select wide rounded-0">
                                            <option value="medium">Medium Size & Poot</option>
                                            <option value="large">Large Size With Poot</option>
                                            <option value="small">Small Size With Poot</option>
                                        </select>
                                    </div>
                                    <p class="short-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipisic elit, sed do eiusmod
                                        tempo incid ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor
                                        in reprehenderit in voluptate
                                    </p>
                                    <ul class="quantity-with-btn">
                                        <li class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                            </div>
                                        </li>
                                        <li class="add-to-cart">
                                            <a class="btn btn-custom-size lg-size btn-pronia-primary" href="cart.html">Add to
                                                cart</a>
                                        </li>
                                        <li class="wishlist-btn-wrap">
                                            <a class="custom-circle-btn" href="wishlist.html">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </li>
                                        <li class="compare-btn-wrap">
                                            <a class="custom-circle-btn" href="compare.html">
                                                <i class="pe-7s-refresh-2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="service-item-wrap pb-0">
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="/pronia/assets/images/shipping/icon/car.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Free <br> Shipping</span>
                                            </div>
                                        </li>
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="/pronia/assets/images/shipping/icon/card.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Safe <br> Payment</span>
                                            </div>
                                        </li>
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="/pronia/assets/images/shipping/icon/service.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Safe <br> Payment</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>
    
    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->

    <script src="/pronia/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery.waypoints.js"></script>
    <script src="/pronia/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/pronia/assets/js/plugins/wow.min.js"></script>
    <script src="/pronia/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.nice-select.js"></script>
    <script src="/pronia/assets/js/plugins/parallax.min.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="/pronia/assets/js/plugins/tippy.min.js"></script>
    <script src="/pronia/assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="/pronia/assets/js/plugins/mailchimp-ajax.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.counterup.js"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="/pronia/assets/js/main.js"></script>

</body>
</html>