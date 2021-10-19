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






## Связаться по вопросам создания сайта под ключ:
<br>

[![facebook](https://img.shields.io/badge/-Facebook-1877F2?style=for-the-badge&logo=Figma&logoColor=eeffff)](https://www.facebook.com/frontendercode)
[![Telegram](https://img.shields.io/badge/-Telegram-26A5E4?style=for-the-badge&logo=Telegram&logoColor=eeffff)](https://t.me/frontendcoder)
[![Instagram](https://img.shields.io/badge/-Instagram-E4405F?style=for-the-badge&logo=Instagram&logoColor=eeffff)](https://www.instagram.com/frontendercode/?hl=ru)
[![GitHub](https://img.shields.io/badge/-GitHub-181717?style=for-the-badge&logo=GitHub&logoColor=eeffff)](https://github.com/frontend-coder)



[![Portfolio](https://img.shields.io/badge/-Портфолио-181717?style=for-the-badge&logo=Internet-Archive&logoColor=eeffff)](https://frontend-coder.github.io)

