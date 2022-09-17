{{--<ul class="nav justify-content-center">
  @foreach ($categories as $category)
  <li class="nav-item">
    <a @class(['nav-link', 'active' => $category->id == request('category_id')]) @if ($category->id == request('category_id')) aria-current="page" @endif href="route('home.index', $category->id)">{{ $category->name }} <span class="bagde badge-secondary">{{ $category->count_goods }}</span></a>
  </li>
  @endforeach
</ul>--}}