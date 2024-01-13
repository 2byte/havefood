<!-- Begin Modal Area -->
<div class="col-lg-6">
    <div class="modal-img">
        <div class="swiper-container modal-slider">
            <div class="swiper-wrapper">
                @foreach ($goods->preview_sizes as $preview)
                    <div class="swiper-slide">
                        <a href="#" class="single-img">
                            <img class="img-full" src="{{ $preview['big']['url'] }}" alt="Product Image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 pt-5 pt-lg-0">
    <div class="single-product-content">
        <h2 class="title">{{ $goods->name }}</h2>
        <div class="price-box">
            <span class="new-price">{{ $goods->price }} ₽</span>
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
            {{-- <div class="review-status">
        <a href="#">( 1 Review )</a>
      </div> --}}
        </div>
        <p class="short-desc">
            {{ $goods->description }}
        </p>

        <form id="form-goods-options">
            @foreach ($goods->option_tree as $option)

                @if (!$option->group)
                    <div class="selector-wrap">
                        <div class="selector-title h-auto w-md-50">
                            <div class="d-flex align-items-center mb-0 form-check" style="min-height: auto;">
                                <input class="form-check-input float-none" type="checkbox" id="opt-{{ $option->id }}"
                                    name="{{ $option->id }}" value="true">
                                <label class="form-check-label ms-2 pt-1"
                                    for="opt-{{ $option->id }}">{{ $option->name }} @if ($option->price_type->value == 'single')
                                        +
                                    @else
                                        =
                                    @endif <b>{{ $option->price }} ₽ </b></label>
                            </div>
                            <small class="text-muted">{{ $option->description }}</small>
                        </div>
                    </div>
                @endif

                @if ($option->group)
                    @if ($option->group_variant->value == 'radio')
                        <div class="selector-wrap">
                            <span class="selector-title border-bottom-0 h-auto">
                                {{ $option->name }} <br>
                                <small class="text-muted">
                                    {{ $option->description }}
                                </small>
                            </span>
                            <select name="{{ $option->id }}" class="nice-select wide border-bottom-0 rounded-0">
                                <option value="0">Сделайте выбор</option>
                                @foreach ($option->childs as $childOpt)
                                    <option value="{{ $childOpt->id }}">{{ $childOpt->name }} @if ($childOpt->price_type->value == 'single')
                                            +
                                        @else
                                            =
                                        @endif {{ $childOpt->price }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="selector-wrap">
                            <div class="selector-title h-auto">
                                <b>{{ $option->name }}</b>
                                <small class="text-muted">{{ $option->description }}</small>
                                @foreach ($option->childs as $childOpt)
                                    <div class="d-flex align-items-center form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="opt-{{ $childOpt->id }}"
                                            name="{{ $childOpt->id }}" value="true">
                                        <label class="form-check-label ms-2 pt-1"
                                            for="opt-{{ $childOpt->id }}">{{ $childOpt->name }} @if ($childOpt->price_type->value == 'single')
                                                +
                                            @else
                                                =
                                            @endif <b>{{ $childOpt->price }} ₽ </b></label>
                                    </div>
                                    <small class="text-muted">{{ $childOpt->description }}</small>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </form>

        <ul class="quantity-with-btn">
            <li class="d-flex align-items-center">Цена: <span id="price-order" class="ms-2">0</span> ₽</li>
            <li class="quantity">
                <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box" value="1" type="text">
                </div>
            </li>
            <li class="add-to-cart">
                <a class="btn btn-custom-size lg-size btn-pronia-primary" id="btn-add-cart">В корзину</a>
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
<!-- Modal Area End Here -->
