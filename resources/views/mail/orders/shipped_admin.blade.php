<x-mail::message>
# Получен заказа морекрабов

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

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Система
{{ config('app.name') }} {{ config('mail.from.address')}}
</x-mail::message>
