# Users
## Добавление полей
- role (boss, admin, manager, courier, user)

# Стикеры user_goods_stickers
- id
- user_id
- name
- created_at
- updated_at

# Категории goods_categories
- id
- user_id
- name
- count_photos
- count_goods
- sortpos
- goods_type
- created_at
- updated_at

# Глобальные опции для выбора при создании товара
## Таблица goods_default_options
- id
- option_id - id опции в списке всех опций
- user_id - пользователь создавший дефлотную опцию
- name - имя опции для внутреннего использования
- description - описание опции для внутреннего использования
- updated_at
- created_at

## Таблица goods_options
- id 
- user_id - пользователь создавший опцию
- parent_id - айди опции которая является группой опций
- group - tinyint (1 - группа, 0 - опция) если это опция группа
- group_variant - enum(checkbox, radio) тип опций в группе выбор одного или нескольких вариантов сразу.
- name - (имя опции / группы)
- description - (Описание)
- note - примечание для админов
- goods_type (common, pizza, halfpizza, burger) тип товара
- price - decimal - цена
- price_type - enum(goods, single) - тип цены, goods первоначальная цена товара, single + к стоимости товара
- sortpos - индекс для сортировки
- count_photos - количество фото
- default - tinyint метка опции по умолчанию
- hidden - скрыта
- updated_at
- created_at

## Таблица goods_ref_options
Справочник опций принадлежащих к товарам
- id
- goods_id - товар
- option_id - опция
- own_user_id - владелец опции
- set_user_id - пользователь установивший опцию
- sortpos - индекс сортировки
- goods_type (common, pizza, halfpizza, burger) тип товара
- created_at
- updated_at

# Товар goods
- id
- user_id - пользователь создавший товар
- category_id - категория
- name - имя товара
- description - описание
- price - цена
- sticker - стикер (новинка, хит, бонус и т.д.)
- count_photos - количество фото
- goods_type (pizza, halfpizza, burger, other) тип товара
- hidden - скрыт (допустим нет в наличии пока)
- created_at
- updated_at

# Файлы, изображения (Создана только миграция)
## files
- id
- user_id
- relate_id
- relate_type
- filename
- type - enum(img, file)
- size_img_x
- size_img_y
- filesize
- sortpos
- created_at
- updated_at

Размер изображение 300х300 600х600

Хранение файлов, изображений. Каждая модель может иметь файл, связь один ко многим полиморфная. 
Имеется UploadTrait trait использующихся в моделях которые могут иметь файлы.

Имя файла
$filename = uniqid('', true) .'.ext'

хранение файлов
/static/files/{$model->uploadDir}/{user_id}/{$namefile}

Загрузка файлов осуществляется с помощью ajax. Файлы отправляется по api /api/gov/file/upload.

Обработка изображения: вырезания белого фона, создание размеров 300x300 и 600x600. Далее в базу пишутся поля user_id, filename, size_img_x, size_img_y, relate_type все больше ничего. 
filename в бд составляется {user_id}_$filename
relate_type имя модели в данном случаи определенный алиас Model::MORPH
relate_id = 0

Удаление загруженных файлов по апи /api/gov/file/delete?id={id} (проверка на владельца user_id)

helper реализации пути к файлу для шаблона assetModel($modelItem)
```
function assetModel($modelItem) {
  return assets('static/files/'. $modelItem->uploadDir .'/'. $modelItem->user_id .'/'. str_replac('_', '/', $modelItem->filename);
}
```