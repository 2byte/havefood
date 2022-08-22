# Карта
## /api/gov
Имя роута gov.api.*

## /api/gov/categories  - работа с категориями товаров
Возвращает список категорий

## /api/gov/different разное
- /api/gov/different/get-goods-types Возвращает типы товаров

## /api/gov/goods - работа с товарами
- /api/gov/goods/store - создание, редактирование товара POST
- /api/gov/goods/get - получение товара
  - get param {id}
- /api/gov/goods/options/get получение опций товара
  - get param {goods_id}

## /api/gov/file
- POST /api/gov/file/upload
  - {files[]}