@extends('main_layout')

@section('content')
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
                {{--<div class="review-status">
                  <a href="#">( 1 Review )</a>
                </div>--}}
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
                      <input class="form-check-input float-none" type="checkbox" id="opt-{{ $option->id }}" name="{{ $option->id }}" value="true">
                      <label class="form-check-label ms-2 pt-1" for="opt-{{ $option->id }}">{{ $option->name }} @if($option->price_type->value == 'single') + @else = @endif <b>{{ $option->price }} ₽ </b></label>
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
                        @foreach ($option->childs as $childOpt)
                        <option value="{{ $childOpt->id }}">{{ $childOpt->name }} @if($childOpt->price_type->value == 'single') + @else = @endif {{ $childOpt->price }}</option>
                        @endforeach
                      </select>
                    </div>
                    @else
                      @foreach ($option->childs as $childOpt)
                        <div class="selector-wrap">
                          <div class="selector-title h-auto">
                            <b>{{ $option->name }}</b>
                            <div class="d-flex align-items-center form-check mb-0">
                            <input class="form-check-input" type="checkbox" id="opt-{{ $childOpt->id }}" name="{{ $childOpt->id }}" value="true">
                            <label class="form-check-label ms-2 pt-1" for="opt-{{ $childOpt->id }}">{{ $childOpt->name }} @if($childOpt->price_type->value == 'single') + @else = @endif <b>{{ $childOpt->price }} ₽ </b></label>
                            </div>
                            <small class="text-muted">{{ $childOpt->description }}</small>
                          </div>
                        </div>
                      @endforeach
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
                  <a class="btn btn-custom-size lg-size btn-pronia-primary" href="cart.html">В корзину</a>
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

<script>
const goodsData = {{ Js::from($goods->getAttributes()) }};
const optionsData = {{ Js::from($goods->options) }};

const mapOptions = optionsData.map((option) => {
  return option.childs ? [option, option.childs] : option
}).flat(2);

class CalcGoodsOrder {
  
  priceGoods = 0
  amount = 0;
  count = 1;
  
  formElem
  form = null;
  mapOptions = []
  goodsData = {}
  formItems = []
  cbListenerAmount = null
  
  constructor(formElem, goodsData, mapOptions) {
    this.formElem = formElem
    this.mapOptions = mapOptions
    this.goodsData = goodsData
    this.addFormListener(this.formHandler)
  }
  
  findOption(id) {
    return this.mapOptions.find((item) => item.id == id)
  }
  
  // calc price a goods
  formHandler() {
    this.amount = 0;
    this.form = new FormData(this.formElem);
    
    this.priceGoods = +this.goodsData.price;
    
    for (const key of this.form.keys()) {
      // single option
      if (this.form.get(key) == 'true') {
        this.amount += +this.findOption(key).price
      } else {
        // Option of group
        const optionTarget = this.findOption(this.form.get(key))
        if (optionTarget.price_type == 'single') {
          this.amount += +this.findOption(this.form.get(key)).price
        } else {
          this.priceGoods = +this.findOption(this.form.get(key)).price
        }
      }
    }
    
    this.amount += this.priceGoods;
    
    if (this.count > 1) {
      this.amount *= this.count
    }
    
    if (this.cbListenerAmount) {
      this.cbListenerAmount(this.amount)
    }
  }
  
  multiplyOnQuantity(count) {
    this.count = count
    
    this.formHandler();
  }
  
  listenerAmount(cb) {
    this.cbListenerAmount = cb
  }
  
  addFormListener(cb) {
    const formItems = [
      ...this.formElem.querySelectorAll('input'),
      ...this.formElem.querySelectorAll('select')
    ];
    
    this.formItems = formItems;
    
    formItems.forEach((item) => {
      item.addEventListener('change', (ev)  => {
        cb.call(this);
      })
    })
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const modal = new bootstrap.Modal('#quickModal')
  
  modal.show()
  
  const calc = new CalcGoodsOrder(document.getElementById('form-goods-options'), goodsData, mapOptions);
  
  const inputQuantityGoods = document.querySelector('.cart-plus-minus-box')
  
  const multiplyPrice = () => {
    calc.multiplyOnQuantity(inputQuantityGoods.value);
  }
  
  inputQuantityGoods.addEventListener('change', function (env) {
      multiplyPrice();
  });
  
  document.querySelector('.cart-plus-minus > .inc').addEventListener('click', (ev) => {
    multiplyPrice();
  })
  document.querySelector('.cart-plus-minus > .dec').addEventListener('click', (ev) => {
    multiplyPrice();
  })
  
  calc.listenerAmount((amount) => {
    document.getElementById('price-order').textContent = amount
  })
})
</script>
@stop