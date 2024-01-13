<x-mail::message>
# Вы заказали на сайте {{ config('app.name') }}

Имя: **{{ $order['buyer']['name'] }}** <br>
Email: **{{ $order['buyer']['email'] }}** <br>
Телефон: **{{ $order['buyer']['phone'] }}** <br>
Адрес доставки: **{{ $order['buyer']['address'] }}** <br>
Комментарий: **{{ $order['buyer']['notes'] }}** <br>
<br>

<x-mail::table>
| Товары        | Кол-во        | Цена  |
| ------------- |:-------------:| --------:|
@foreach ($order['goods'] as ['goodsData' => $goodsItem])
| {{ $goodsItem['name'] }} | x {{ $goodsItem['count'] }} | {{ $goodsItem['total_amount'] }} ₽ |
@endforeach
</x-mail::table>

Итого **{{ $order['meta']['total_amount'] }}** ₽

Ваш заказ в обработке. Ожидайте, мы скоро с вами свяжемся!

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Спасибо,<br>
{{ config('app.name') }} {{ config('mail.from.address')}}
</x-mail::message>
