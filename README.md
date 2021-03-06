# js-wordpress

Выполняю посадку шаблона, скачаного в интернете на WordPress + Woocommerce. Для меня это сложная работа, потому что я не просто создаю тему под WordPress, а и адаптирую тему под поддержку плагина Woocommerce.

## Необходимые плагины

1. Classic Editor
2. Cyr to Lat enhanced
3. Query Monitor
4. Show Current Template
5. WooCommerce

## Стартовая тема

Была создана стартовая тема с сайта https://underscores.me/ c поддержкой WooCommerce. 

## Как подключить стили страницы, привязаные к определенному шаблону 

```
wp_register_style( 'jst-vendor', get_template_directory_uri() .'/assets/css/vendor.min.css' , array('jst-mainstyle'),
_S_VERSION );
wp_register_script( 'jst-svgsprite', get_template_directory_uri() . '/assets/img/svg-sprite/svg-sprite.js', array(),
_S_VERSION, false );


if(is_page_template('template_home.php')) {
wp_enqueue_style( 'jst-vendor' );
wp_enqueue_script( 'jst-svgsprite' );
}
```

## Этапы выполнения работы

1. шаг Создание файлов шаблонов страниц и кастомных постов записей
2. шаг Разобраться с информацией, которая должна выводится в каждый шаблон темы
3. шаг Разобраться с перечнем файлов стилей, скриптов, которые подключены верстальником, подключение Options Panel.
4. шаг Подключение скриптов и стилей, повесить стили на тег body, создание динамических меню, создание формы поиска по указанному дзайну  
5. шаг Настройка вывода глобальных настроек Options Panel блока социальных сетей, слайдера шаблона главной страницы, опций и меню в подвале шаблона 
6. шаг
7. шаг
8. шаг Создание шаблона одиночной записи Услуги, создание страницы заказа конкретной Услуги, создание категорий для кастомного типа записи Услуги
9. шаг Создание шаблона архива услуг, навигация по категориям кастомного поста Услуг, создание шаблона одиночной записи кастомного типа записи Новости, создание сайдбара для шаблона Новости, создание кнопок поделится, создание шаблона архива Новостей,  
10. шаг Оптимизация настройки шаринга в социальные сети, создание шаблона для страниц таксономий кастомного типа записи Новости, создание шаблона для страниц категорий кастомного типа записи Новости, создание двух виджетов, которые выводят перечень категорий для КТЗ Новости и банера с ссылкой
17. шаг Подключил файлы кастомные, в которых буду писать функции для woocommerce, создал 2 файла для оформления витрины магазина, создал и подключил сайдбар, он будет выводить виджеты на страницы магазина. 
   
## Посадка части шаблона на woocommerce

1. Файл шаблона archive-product.php - отвечает за формирование страницы магазина shop
2. Файл шаблона content-product.php - отвечает за формирование страницы магазина shop Выводит только одну тумбу товара на странице и все содержимую информцию об одном товаре
2. Создать отдельный файл woocommerce.php, чтобы прописывать в этом файле кастомные функции, отключать внедренные функции по умолчанию. Они должны запускаться при активации плагина. 
3. Подключить файл к теме.






## Связаться по вопросам создания сайта под ключ:
<br>

[![facebook](https://img.shields.io/badge/-Facebook-1877F2?style=for-the-badge&logo=Figma&logoColor=eeffff)](https://www.facebook.com/frontendercode)
[![Telegram](https://img.shields.io/badge/-Telegram-26A5E4?style=for-the-badge&logo=Telegram&logoColor=eeffff)](https://t.me/frontendcoder)
[![Instagram](https://img.shields.io/badge/-Instagram-E4405F?style=for-the-badge&logo=Instagram&logoColor=eeffff)](https://www.instagram.com/frontendercode/?hl=ru)
[![GitHub](https://img.shields.io/badge/-GitHub-181717?style=for-the-badge&logo=GitHub&logoColor=eeffff)](https://github.com/frontend-coder)



[![Portfolio](https://img.shields.io/badge/-Портфолио-181717?style=for-the-badge&logo=Internet-Archive&logoColor=eeffff)](https://frontend-coder.github.io)

