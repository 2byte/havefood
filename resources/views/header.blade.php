<!-- Begin Main Header Area -->
<header class="main-header-area">
    <div class="header-top bg-pronia-primary d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="header-top-left">
                        <span class="pronia-offer">Внимание акция! Скидка на все продукты 25%</span>
                    </div>
                </div>
                {{-- <div class="col-6">
                    <div class="header-top-right">
                        <ul class="dropdown-wrap">
                            <li class="dropdown">
                                <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="currencyButton"
                                    data-bs-toggle="dropdown" aria-label="currency" aria-expanded="false">
                                    Рубли
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="currencyButton">
                                    <li><a class="dropdown-item" href="#">GBP</a></li>
                                    <li><a class="dropdown-item" href="#">ISO</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButton"
                                    data-bs-toggle="dropdown" aria-label="language" aria-expanded="false">
                                    Русский
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageButton">
                                    <li><a class="dropdown-item" href="#">French</a></li>
                                    <li><a class="dropdown-item" href="#">Italian</a></li>
                                    <li><a class="dropdown-item" href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="header-middle py-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="header-middle-wrap position-relative">

                        <div class="row flex-nowrap justify-start align-items-center">
                            <a href="/" class="header-logo">
                                <img src="/assets/images/logo.png" alt="Header Logo">
                            </a>

                            <div class="fs-3" style="color:#abd373;">MoreCrabov.Ru</div>
                        </div>
                        <div class="header-contact d-none d-lg-flex">
                            <i class="pe-7s-call"></i>
                            <a href="tel://+00-123-456-789">+00 123 456 789</a>
                        </div>

                        <div class="header-right">
                            <ul>
                                <li>
                                    <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </li>
                                <li class="dropdown d-none d-lg-block">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button"
                                        id="settingButton" data-bs-toggle="dropdown" aria-label="setting"
                                        aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="settingButton">
                                        <li><a class="dropdown-item" href="">Мой аккаунт</a></li>
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Вход | регистрация</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                                <li class="minicart-wrap me-3 me-lg-0">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <i class="pe-7s-shopbag"></i>
                                        <span class="quantity">3</span>
                                    </a>
                                </li>
                                <li class="mobile-menu_wrap d-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                        <i class="pe-7s-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class="drop-holder">
                                    <a href="/">Главная</a>
                                    {{-- <ul class="drop-menu">
                                        <li>
                                            <a href="index.html">Home One</a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">Home Two</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                {{-- <li class="megamenu-holder">
                                    <a href="shop.html">Shop</a>
                                    <ul class="drop-menu megamenu">
                                        <li>
                                            <span class="title">Shop Layout</span>
                                            <ul>
                                                <li>
                                                    <a href="shop.html">Shop Default</a>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-fullwidth.html">Shop Grid Fullwidth</a>
                                                </li>
                                                <li>
                                                    <a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-fullwidth.html">Shop List Fullwidth</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span class="title">Product Style</span>
                                            <ul>
                                                <li>
                                                    <a href="single-product-variable.html">Single Product Variable</a>
                                                </li>
                                                <li>
                                                    <a href="single-product-group.html">Single Product Group</a>
                                                </li>
                                                <li>
                                                    <a href="single-product.html">Single Product Default</a>
                                                </li>
                                                <li>
                                                    <a href="single-product-affiliate.html">Single Product
                                                        Affiliate</a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sale.html">Single Product Sale</a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky.html">Single Product Sticky</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span class="title">Product Related</span>
                                            <ul>
                                                <li>
                                                    <a href="my-account.html">My Account</a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html">Login | Register</a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">Shopping Cart</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">Compare</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">Checkout</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li class="drop-holder">
                                    <a href="blog.html">Блог</a>
                                    <ul class="drop-menu">
                                        <li>
                                            <a href="blog-listview.html">Рецепты</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail.html">Видео</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">О нас</a>
                                </li>
                                {{-- <li class="drop-holder">
                                    <a href="#">Pages</a>
                                    <ul class="drop-menu">
                                        <li>
                                            <a href="faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="404.html">Error 404</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="contact.html">Контакты</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-sticky py-4 py-lg-0">
        <div class="container">
            <div class="header-nav position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-6">
                        <div class="row flex-nowrap justify-start align-items-center">
                            <a href="index.html" class="header-logo">
                                <img src="/assets/images/logo3.png" alt="Header Logo">
                            </a>
                            <div class="fs-3" style="color:#abd373;">MoreCrabov.Ru</div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="main-menu">
                            <nav class="main-nav">
                                <ul>
                                    <li class="drop-holder">
                                        <a href="/">Главная</a>
                                        {{-- <ul class="drop-menu">
                                            <li>
                                                <a href="index.html">Home One</a>
                                            </li>
                                            <li>
                                                <a href="index-2.html">Home Two</a>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    {{-- <li class="megamenu-holder">
                                        <a href="shop.html">Shop</a>
                                        <ul class="drop-menu megamenu">
                                            <li>
                                                <span class="title">Shop Layout</span>
                                                <ul>
                                                    <li>
                                                        <a href="shop.html">Shop Default</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-grid-fullwidth.html">Shop Grid Fullwidth</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-fullwidth.html">Shop List Fullwidth</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-left-sidebar.html">Shop List Left
                                                            Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-list-right-sidebar.html">Shop List Right
                                                            Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span class="title">Product Style</span>
                                                <ul>
                                                    <li>
                                                        <a href="single-product-variable.html">Single Product
                                                            Variable</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product-group.html">Single Product Group</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">Single Product Default</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product-affiliate.html">Single Product
                                                            Affiliate</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product-sale.html">Single Product Sale</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product-sticky.html">Single Product Sticky</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span class="title">Product Related</span>
                                                <ul>
                                                    <li>
                                                        <a href="my-account.html">My Account</a>
                                                    </li>
                                                    <li>
                                                        <a href="login-register.html">Login | Register</a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html">Shopping Cart</a>
                                                    </li>
                                                    <li>
                                                        <a href="wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li>
                                                        <a href="compare.html">Compare</a>
                                                    </li>
                                                    <li>
                                                        <a href="checkout.html">Checkout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li class="drop-holder">
                                        <a href="blog.html">Блог</a>
                                        <ul class="drop-menu">
                                            <li>
                                                <a href="blog-listview.html">Рецепты</a>
                                            </li>
                                            <li>
                                                <a href="blog-detail.html">Видео</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">О нас</a>
                                    </li>
                                    {{-- <li class="drop-holder">
                                        <a href="#">Pages</a>
                                        <ul class="drop-menu">
                                            <li>
                                                <a href="faq.html">FAQ</a>
                                            </li>
                                            <li>
                                                <a href="404.html">Error 404</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li>
                                        <a href="contact.html">Контакты</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="header-right">
                            <ul>
                                <li>
                                    <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </li>
                                <li class="dropdown d-none d-lg-block">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button"
                                        id="stickysettingButton" data-bs-toggle="dropdown" aria-label="setting"
                                        aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="stickysettingButton">
                                        <li><a class="dropdown-item" href="my-account.html">Личный кабинет</a></li>
                                        <li><a class="dropdown-item" href="login-register.html">Вход & регистрация</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                                <li class="minicart-wrap me-3 me-lg-0">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <i class="pe-7s-shopbag"></i>
                                        <span class="quantity">0</span>
                                    </a>
                                </li>
                                <li class="mobile-menu_wrap d-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                        <i class="pe-7s-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('menu.mobile_menu')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content modal-bg-dark">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away"
                        data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-search">
                        <span class="searchbox-info">Начните набирать и нажмите Enter для поиска или Esc для
                            выхода.</span>
                        <form action="#" class="hm-searchbox">
                            <input type="text" name="Search..." value="Search..."
                                onblur="if(this.value==''){this.value='Search...'}"
                                onfocus="if(this.value=='Search...'){this.value=''}" autocomplete="off">
                            <button class="search-btn" type="submit" aria-label="searchbtn">
                                <i class="pe-7s-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-body">
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4 class="mb-0">Корзина</h4>
                    <a href="#" class="button-close"><i class="pe-7s-close" data-tippy="Close"
                            data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                            data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
                </div>
                <div class="fs-5 d-none" id="notice-empty">Нет товаров</div>
                <ul class="minicart-list">

                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Итого</span>
                <span class="ammount">0</span>
            </div>
            <div class="group-btn_wrap d-grid gap-2">
                <a href="{{ route('home.goods.order') }}" class="btn btn-dark">Оформить заказ</a>
            </div>
        </div>
    </div>
    <div class="global-overlay"></div>
</header>
<!-- Main Header Area End Here -->
