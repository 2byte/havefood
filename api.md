# Карта
## /api/gov
Имя роута gov.api.*

## /api/gov/categories  - работа с категориями товаров
Возвращает список категорий

## /api/gov/different разное
- /api/gov/different/get-goods-types Возвращает типы товаров

## /api/gov/categories - работа с категориями товаров
- /api/categories/store - создание, редактирование категории товара POST
- /api/categories/delete - удаление каткатегории товара POST
- /api/categories/sort - удаление каткатегории товара POST

## /api/gov/goods - работа с товарами
- /api/gov/goods/store - создание, редактирование товара POST
- POST /api/gov/goods/get - получение товара
  - {id} - получить один товара
  - {type\_list} - получить список товаров default=singleGoods
  - {...} - дополнительные параметры для фильтра
  
- /api/gov/goods/delete - удаление товара
  - {id} - id товара

## /api/gov/option - Работа с опциями товаров
- POST /api/gov/goods/option/get получение дерева опций в отсортированном виде
  - Поля
  - {source} - источник
    - goodsId
    - optionId
    - presonal
    - all
  - {value} - значение для источника
    - id модели если goodsId или optionId

- POST /api/gov/goods/option/first
  - {id}

## /api/gov/option/attach
- {option_id}
- {goods_id}

## /api/gov/option/delete
- {id}

## /api/gov/option/sort
- {option_id}
- {goods_id}
- {type} - up|down

## /api/gov/file
- POST /api/gov/file/upload
  - model
  - files[]
- POST /api/gov/file/get
  - relate_type
  - relate_id
- POST /api/gov/file/get/previews
  - relate_type
  - relate_id
- POST /api/gov/file/delete
  - id

## GET /api/local/auth-boss
  Авторизация api боссом