# Users
## Добавление полей
- role (boss, admin, manager, courier, user)

# Стикеры user_goods_stickers
- id
- name
- user_id
- created_at
- updated_at

# Категории goods_categories
- id
- user_id
- name
- count_photo
- count_goods
- created_at
- updated_at

# Глобальные опции для выбора при создании товара
## Таблица goods_options 
- id
- user_id
- name
- goods_type
- price
- count_photo
- created_at
- updated_at

# Товар goods
- id
- user_id
- category_id
- name
- description
- options (JSON)
    - name
    - description
    - count_photo
    - price
- variants (JSON)
    - name
    - description
    - size
    - count_photo
    - price
- price
- sticker
- count_photo
- type (pizza, halfpizza, burger, other)
- created_at
- updated_at