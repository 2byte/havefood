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
                    <a href="{{ url('#') }}" data-bs-toggle="modal" data-bs-target="#quickModal" data-goods-id="{{ $item->id }}">
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
          
          <div class="preloader-activate preloader-active open_tm_preloader">
              <div class="preloader-area-wrap">
                  <div class="spinner d-flex justify-content-center align-items-center h-100">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                  </div>
              </div>
          </div>
          
          <div id="content-ajax"></div>
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
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
  
  run() {
    this.formHandler()
    
    return calc;
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

const viewGoodsModal = document.getElementById('quickModal');

const preloaderToggle = () => {
  const preloadWrap = document.querySelector('#quickModal .preloader-activate');
  
  if (preloadWrap.classList.contains('loaded')) {
    preloadWrap.classList.remove('loaded');
    preloadWrap.classList.add('preloader-active');
  } else {
    preloadWrap.classList.add('loaded');
    preloadWrap.classList.remove('preloader-active');
  }
}

let amountOrder = 0;

const calc = (goodsData, options) => {
  
  const mapOptions = options.map((option) => {
    return option.childs ? [option, option.childs] : option
  }).flat(2);
    
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
    amountOrder = amount
  })
  
  return calc;
}

const clickAddCart = () => {
  document.querySelector('.add-to-cart').addEventListener('click', function (event) {
    event.preventDefault()
    confirm(`Оформить заказ на сумму ${amountOrder}`)
  });
}

viewGoodsModal.addEventListener('show.bs.modal', function (event) {
  preloaderToggle()
  
  const eventElem = event.relatedTarget;
  
  const elemForPaste = viewGoodsModal.querySelector('#content-ajax')
  
  $.ajax({
    url: '/ajax/get-goods-html-body-modal',
    method: 'get',
    data: {id: eventElem.getAttribute('data-goods-id')},
    dataType: 'json'
  })
  .done((res) => {
    
    elemForPaste.innerHTML = res.data.modal_body;
    
    addGoodsQuantityButtons();
    
    calc(res.data.goods, res.data.options).run()
    
    clickAddCart()
  })
  .fail((jqXHR, textStatus) => {
    console.log(jqXHR)
    alert('error')
  }).always(() => {
    preloaderToggle()
  })
  
})
</script>
<!-- Modal Area End Here -->