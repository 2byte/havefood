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
              Все
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a id="bestseller-tab" data-bs-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="false">
              Лучшие
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a id="latest-tab" data-bs-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">
              Последние
            </a>
          </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
            <div class="product-item-wrap row">
              
              @foreach ($goods as $item)
              <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="product-item">
                  @if (!is_null($item->small_preview))
                  <div class="product-img">
                    <a href="{{ url('#') }}" data-bs-toggle="modal" data-bs-target="#quickModal">
                      <img class="primary-img" src="{{ $item->small_preview }}" alt="Product Images">
                      {{--<img class="primary-img" src="/pronia/assets/images/product/medium-size/1-1-270x300.jpg" alt="Product Images">
                      <img class="secondary-img" src="/pronia/assets/images/product/medium-size/1-2-270x300.jpg" alt="Product Images">--}}
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
                  @endif
                  <div class="product-content">
                    <a class="product-name" href="shop.html">{{ $item->name }}</a>
                    {{ $item->short_desc }}
                    <div class="price-box pb-1">
                      <span class="new-price">{{ $item->price }} ₽</span>
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
              @endforeach
              
              {{--<div class="col-xl-3 col-md-4 col-sm-6">
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
              </div>--}}
            </div>
          </div>

          <div class="tab-pane fade" id="bestseller" role="tabpanel" aria-labelledby="bestseller-tab">
          </div>

          <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
          </div>
          
        </div>
        
        {{ $goods->links() }}
      </div>
    </div>
  </div>
</div>

<!-- Product Area End Here -->