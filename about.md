# Установка
```
composer install
npm install
```
Прописываем данные бд в .env и запускаем миграции

```
php artisan migrate
```

Заполним бд
```
php artisan db:seed
```

В бд выбираем любого пользователя который понравился и выставляем ему role = boss пароль от всех учеток password. Админ панель по адресу /gov

# Вкратце
Таблица с категориями товара goods_categories 
- id
- user_id
- name
- count_photos
- count_goods
- sortpos - индекс сортировки
- goods_type - тип товара App\Shop\Goods\Enums\Goods\GoodsType
- created_at
- updated_at

Тут думаю все ясно. Надо сделать компонент vue по созданию, редактированию, удалению и вывода списка категорий. Я создаю течтовую страницу vue на которой просто запускаю разрабатываемый компонент. Контроллер App\Http\Controllers\Admin\AdminIndexController метод goodsItem.

```
public function goodsItem(Request $request)
{
    return Inertia::render('GoodsItemTest', [
      'goods-id' => (int)$request->goods_id,
      'goods-load' => true
    ]);
}
```
`GoodsItemTest` это страница vue, находится resources/scripts/admin/Pages/GoodsItemTest.vue можно создать аналогичную тестовую страницу с запуском компонентов по работе с категориями товаров.

И так делаем компонент GoodsCategoryForm.vue кладем в resources/scripts/admin/Goods

Запускаем по аналогии resources/scripts/admin/Pages/GoodsItemTest.vue это может быть к примеру GoodsCategoryTest.vue

GoodsCategoryForm будет форма создания и редактирования категории.

# Api
Компоненты vue обращаются по api /api/gov*. используется класс resources/scripts/admin/libs/Api.js

```
Api('route', 'post|get', {param: param})
Обращение к /api/gov/different/get-goods-types за получением списка типов товара
Api('different/get-goods-types')
  .success((data) => {})
  .complete((ok, data) => {})
```

Я уже создал по адресу /gov/category-test
App\Http\Controllers\Admin\AdminIndexController::categoryTest
resources/scripts/admin/Pages/CategoryTest.vue
resources/scripts/admin/Goods/GoodsCategoryForm.vue
 с примерами и комментами
 
 можно также посмотреть /gov/goods-item-test и /gov/goods-item-test?goods_id=16 при редактировании формы