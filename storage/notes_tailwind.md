
## Произвольные варианты
### Применить к родительском классу и 3-му элементу его потомка
<li class="[&:nth-child(3)]:underline">{item}</li>
<li class="lg:[&:nth-child(3)]:hover:underline">{item}</li> 

<hr>
<div class="[&_p]:mt-4">
Если вам нужны пробелы в селекторе, вы можете использовать подчеркивание. Например, этот произвольный модификатор выбирает все элементы p внутри элемента, в который вы добавили класс:

### Правила at
<div class="flex [@supports(display:grid)]:grid">
<button type="button" class="[@media(any-hover:hover){&:hover}]:opacity-100">

### Создание своих классов
```
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer utilities {
  .content-auto {
    content-visibility: auto;
  }
}

<div class="lg:content-auto"> <!-- ... --> </div>
```
### Выражения
```
/* prose-headings:hover:underline */
.prose-headings\:hover\:underline:hover :is(:where(h1, h2, h3, h4, th)) {
  text-decoration: underline;
}

/* hover:prose-headings:underline */
.hover\:prose-headings\:underline :is(:where(h1, h2, h3, h4, th)):hover {
  text-decoration: underline;
}
```

### Краткий справочник
Modifier	CSS
hover	&:hover
focus	&:focus
focus-within	&:focus-within
focus-visible	&:focus-visible
active	&:active
visited	&:visited
target	&:target
first	&:first-child
last	&:last-child
only	&:only-child
odd	&:nth-child(odd)
even	&:nth-child(even)
first-of-type	&:first-of-type
last	&:last-child
only	&:only-child
odd	&:nth-child(odd)
even	&:nth-child(even)
first-of-type	&:first-of-type
last-of-type	&:last-of-type
only-of-type	&:only-of-type
empty	&:empty
disabled	&:disabled
enabled	&:enabled
checked	&:checked
indeterminate	&:indeterminate
default	&:default
required	&:required
valid	&:valid
invalid	&:invalid
in-range	&:in-range
out-of-range	&:out-of-range
placeholder-shown	&:placeholder-shown
autofill	&:autofill
read-only	&:read-only
open	&[open]
before	&::before
after	&::after
first-letter	&::first-letter
first-line	&::first-line
marker	&::marker
selection	&::selection
file	&::file-selector-button
backdrop	&::backdrop
placeholder	&::placeholder
sm	@media (min-width: 640px)
md	@media (min-width: 768px)
lg	@media (min-width: 1024px)
xl	@media (min-width: 1280px)
2xl	@media (min-width: 1536px)
dark	@media (prefers-color-scheme: dark)
portrait	@media (orientation: portrait)
landscape	@media (orientation: landscape)
motion-safe	@media (prefers-reduced-motion: no-preference)
motion-reduce	@media (prefers-reduced-motion: reduce)
contrast-more	@media (prefers-contrast: more)
contrast-less	@media (prefers-contrast: less)
print	@media print

### Фокус когда он или потомок в фокусе
focus-within (:focus-within)

target (:target) когда совпадает ид совпадает с якорем в ссылке

### модификаторы 
:first (:first-child) - первый потомок 
:last (:last-child) - последний потомок
:only (:only-child) - единственный потомок
odd:
even:
empty:
indeterminate неопределённое состояние

### !important в html
!class-name будет !importimportant

### Раскрывающийся элемент
```
<details open>
    <summary>Title</summary>
    <div></div>
</details>
```