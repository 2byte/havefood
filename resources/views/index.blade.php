@extends('main_layout')

@section('content')
<!-- Begin Slider Area -->
<div class="slider-area">

    <!-- Main Slider -->
    <div class="swiper-container main-slider swiper-arrow with-bg_white">
        <div class="swiper-wrapper">
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="/pronia/assets/images/slider/bg/1-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">10% скидка</span>
                                    <h2 class="title">Индейка с овощами гриль</h2>
                                    <p class="short-desc">
                                        Пастрами из индейки, овощи-гриль, кубики брынзы, моцарелла, томатный соус
                                    </p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary" href="shop.html">Заказать сейчас</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">
                                            <img src="/pronia/assets/images/slider/inner-img/2.png" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide animation-style-01">
                <div class="slide-inner style-1 bg-height" data-bg-image="/pronia/assets/images/slider/bg/1-2.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                <div class="slide-content text-black">
                                    <span class="offer">35% скидка</span>
                                    <h2 class="title">Миу-пицца с пепперони и сюрприз</h2>
                                    <p class="short-desc">
                                        Пикантная пепперони, смесь сыров чеддер и пармезан, моцарелла, соус альфредо
                                    </p>
                                    <div class="btn-wrap">
                                        <a class="btn btn-custom-size xl-size btn-pronia-primary" href="shop.html">Заказать сейчас</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                <div class="inner-img">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">
                                            <img src="/pronia/assets/images/slider/inner-img/2.png" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination d-md-none"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Shipping Area -->
<div class="shipping-area section-space-top-100">
    <div class="container">
        <div class="shipping-bg">
            <div class="row shipping-wrap">
                <div class="col-lg-4 col-md-6">
                    <div class="shipping-item">
                        <div class="shipping-img">
                            <img src="/pronia/assets/images/shipping/icon/car.png" alt="Shipping Icon">
                        </div>
                        <div class="shipping-content">
                            <h2 class="title">Бесплатная доставка</h2>
                            <p class="short-desc mb-0">
                                При заказе на сумму от 700 рублей
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="shipping-item">
                        <div class="shipping-img">
                            <img src="/pronia/assets/images/shipping/icon/card.png" alt="Shipping Icon">
                        </div>
                        <div class="shipping-content">
                            <h2 class="title">Безопасная оплата</h2>
                            <p class="short-desc mb-0">
                                С наши платежными шлюзами
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="shipping-item">
                        <div class="shipping-img">
                            <img src="/pronia/assets/images/shipping/icon/service.png" alt="Shipping Icon">
                        </div>
                        <div class="shipping-content">
                            <h2 class="title">Лучший сервис</h2>
                            <p class="short-desc mb-0">
                                Дружественный и удобный
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shipping Area End Here -->

@stop