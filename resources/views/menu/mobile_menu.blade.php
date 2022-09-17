<div class="mobile-menu_wrapper" id="mobileMenu">
  <div class="offcanvas-body">
    <div class="inner-body">
      <div class="offcanvas-top">
        <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
      </div>
      <div class="header-contact offcanvas-contact">
        <i class="pe-7s-call"></i>
        <a href="tel://+00-123-456-789">+00 123 456 789</a>
      </div>
      <div class="offcanvas-user-info">
        <ul class="dropdown-wrap">
          <li class="dropdown dropdown-left">
            <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
              English
            </button>
            <ul class="dropdown-menu" aria-labelledby="languageButtonTwo">
              <li><a class="dropdown-item" href="#">French</a></li>
              <li><a class="dropdown-item" href="#">Italian</a></li>
              <li><a class="dropdown-item" href="#">Spanish</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <button class="btn btn-link dropdown-toggle ht-btn usd-dropdown" type="button" id="currencyButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
              USD
            </button>
            <ul class="dropdown-menu" aria-labelledby="currencyButtonTwo">
              <li><a class="dropdown-item" href="#">GBP</a></li>
              <li><a class="dropdown-item" href="#">ISO</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="pe-7s-users"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
              <li><a class="dropdown-item" href="{{ url('dashboard') }}">Личный кабинет</a></li>
              <li><a class="dropdown-item" href="{{ url('login') }}">Вход & регистрация</a></li>
            </ul>
          </li>
          <li>
            <a href="wishlist.html">
              <i class="pe-7s-like"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="offcanvas-menu_area">
        <nav class="offcanvas-navigation">
          <ul class="mobile-menu">
                        <li>
              <a href="#about">
                <span class="mm-text">О нас</span>
              </a>
            </li>
            <li>
              <a href="#contacts">
                <span class="mm-text">Контакты</span>
              </a>
            </li>
            <li>
              <a href="#zones-dilivery">
                <span class="mm-text">Зоны доставки</span>
              </a>
            </li>
            <li class="menu-item-has-children">
              <a href="#">
                <span class="mm-text">Категории товаров
                  <i class="pe-7s-angle-down"></i>
                </span>
              </a>
              <ul class="sub-menu">
                @foreach (getGoodsCategories() as $category)
                <li>
                  <a href="{{ url('/?category_id='. $category->id) }}">
                    <span class="mm-text">{{ $category->name }} ({{ $category->count_goods }})</span>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>