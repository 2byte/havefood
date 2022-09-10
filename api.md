# Карта
## /api/gov
Имя роута gov.api.*

## /api/gov/categories  - работа с категориями товаров
Возвращает список категорий

## /api/gov/different разное
- /api/gov/different/get-goods-types Возвращает типы товаров

## /api/gov/goods - работа с товарами
- /api/gov/goods/store - создание, редактирование товара POST
- POST /api/gov/goods/get - получение товара
  - {id} - получить один товара
  - {type\_list} - получить список товаров default=singleGoods
  - {...} - дополнительные параметры для фильтра
  
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