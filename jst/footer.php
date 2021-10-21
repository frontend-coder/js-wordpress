<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jstheme
 */
 global $jst_options;
?>

<!-- Footer -->
<footer class="footer">

  <div class="wrapper">
    <div class="footer__block">

      <a href="index.html" class="logo noise">
        <p class="logo__icon"><?php bloginfo('name'); ?></p>
        <p class="logo__desc"><?php bloginfo('description'); ?></p>
      </a>
      <ul class="social">
        <?php $socials_link = $jst_options[global_sortable];
           foreach($socials_link as $social=> $link) {
          $icon_social = ''; 
                   $svg = '';
            $class = '';
  if($social == 'VK Link') {
  $icon_social = '<span>Vk</span>'; 
  $svg = '<svg  width="21" height="18"><use xlink:href="#vk"/></svg>'; 
  $class = 'social__icon_vk';
} elseif($social == 'FB Link') {
  $icon_social = '<span>Fb</span>'; 
   $svg = '<svg  width="14" height="17"><use xlink:href="#facebook"/></svg>'; 
$class = 'social__icon_fb';
  }
elseif($social == 'TW Link') {
  $icon_social = '<span>Tw</span>'; 
 $svg = '<svg  width="18" height="15"><use xlink:href="#twitter"/></svg>'; 
$class = 'social__icon_tw';
}
elseif($social == 'Instagram Link') {
  $icon_social = '';
  $class= 'social__icon_inst';
 $svg = '<svg width="16" height="16"><use xlink:href="#instagram"/></svg>'; 
}
// если ссылки нет: одной или нескольких
 if($link) { ?>
        <li class="social__item">
          <?php echo $icon_social; ?>
          <a class="social__icon <?php echo $class; ?>" target="_blank" href="<?php echo $link; ?>">
            <?php echo $svg; ?>
          </a>
        </li>
        <?php
}
}
   ?>



        <!-- <li class="social__item">
          <span>Vk</span>
          <a class="social__icon social__icon_vk" href="#">
            <svg width="21" height="18">
              <use xlink:href="#vk" />
            </svg>
          </a>
        </li>
        <li class="social__item">
          <span>Fb</span>
          <a class="social__icon social__icon_fb" href="#">
            <svg width="14" height="17">
              <use xlink:href="#facebook" />
            </svg>
          </a>
        </li>
        <li class="social__item">
          <span>Tw</span>
          <a class="social__icon social__icon_tw" href="#">
            <svg width="18" height="15">
              <use xlink:href="#twitter" />
            </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__icon social__icon_inst" href="#">
            <svg width="16" height="16">
              <use xlink:href="#instagram" />
            </svg>
          </a>
        </li>
     -->
      </ul>


      <p class="footer__special">Разработка и сопровоздение сайтов </p>
    </div>
    <nav class="guide">
      <p class="guide__title">Карта сайта</p>

      <?php wp_nav_menu( array(
  'theme_location' => 'menu-footer',
  'menu_id' =>'nav_footer_one',
  'menu_class' =>'nav_footer_two',
)); ?>



      <!-- <ul>
        <li class="active"><a href="#">Главная</a></li>
        <li><a href="index.html">О компании</a></li>
        <li><a href="cases.html">Кейсы</a></li>
        <li><a href="reviews.html">Отзывы</a></li>
        <li><a href="news.html">Новости</a></li>
      </ul> -->
    </nav>
    <div class="serv">
      <p class="serv__title">Услуги</p>
      <?php wp_nav_menu( array(
  'theme_location' => 'menu-footer-two',
  'menu_id' =>'nav_footer_two',
  'menu_class' =>'nav_footer_two',
)); ?>



      <!--       
      <ul>
        <li><a href="service.html">Корпоративная практика, M&A</a></li>
        <li><a href="service.html">Информационные технологии / TMT</a></li>
        <li><a href="service.html">Интеллектуальная собственность</a></li>
        <li><a href="service.html">Government <br>Relations</a></li>
        <li><a href="service.html">Интернет-бизнес и цифровая экономика</a></li>
        <li><a href="#">Коммерческая практика</a></li>
      </ul> -->
    </div>
    <div class="contact">
      <p class="contact__title">Контакты</p>
      <ul class="contact__list">
        <?php $contact_adress = $jst_options['contact_adress'];
          if ($contact_adress) { ?>

        <li class="contact__item">
          <svg width="20" height="25">
            <use xlink:href="#pin" />
          </svg>
          <p class="contact__text contact__text_address"> <?php echo esc_attr( $contact_adress ); ?> </p>
        </li>
        <?php } ?>

        <li class="contact__item">
          <svg width="21" height="21">
            <use xlink:href="#phone" />
          </svg>
          <div class="contact__phones">

            <?php $footer_phones = $jst_options['footer-multitext'];
foreach($footer_phones as $phone) {
  if($phone) {
  ?>
            <a href="tel:<?php echo str_replace(array( " ", "(", ")", "-"), "", $phone); ?>"
              class="contact__text contact__text_phone"><?php echo esc_attr( $phone) ; ?></a>
            <?php }
           } ?>






          </div>
        </li>
        <li class="contact__item">
          <svg width="25" height="19">
            <use xlink:href="#mail" />
          </svg>
          <?php $contact_mail = $jst_options['contact_email_vslid'];
          if ($contact_mail) { ?>
          <p class="contact__text contact__text_mail"><?php echo esc_attr( $contact_mail); ?></p>
          <?php } ?>
        </li>
      </ul>
    </div>
    <div class="subscribe">
      <p class="subscribe__title">Подписаться на рассылку новостей</p>
      <form action="#" class="subscribe__form" id="popupSubscribe">
        <input type="text" name="email" class="subscribe__input" placeholder="Ваш email">
        <button class="subscribe__btn btn" data-submit>Подписаться</button>
      </form>
      <div class="control">
        <div class="language">
          <ul>
            <li class="lang-item active">
              <a href="#">Ru</a>
            </li>
            <li class="lang-item">
              <a href="#">En</a>
            </li>
          </ul>
        </div>
        <div class="control__wrap">
          <a href="#enter" class="control__enter popup-link-1">
            <svg class="control__icon" width="19" height="17">
              <use xlink:href="#login" />
            </svg>
            Вход
          </a>
          <a style="display: none;" href="cabinet.html" class="control__enter control__enter_cab">
            <svg class="control__icon" width="16" height="16">
              <use xlink:href="#user" />
            </svg>
            Личный кабинет
          </a>
          <a href="#reg" class="control__reg noise popup-link-2">Регистрация</a>
        </div>
      </div>
    </div>

    <?php $footer_editor_copyright = $jst_options['footer-editor-copyright'];
          if ($footer_editor_copyright) { ?>

    <div class="footer__copy"><?php echo $footer_editor_copyright;  ?></div>
    <?php } ?>

  </div>
</footer><!-- End footer -->
<!-- #colophon -->
</div><!-- #page -->


<!-- MODAL WINDOWS-->

<!-- Call me -->
<div id="call" class="callme mfp-hide">
  <h4 class="login__title modal-title">Отправьте заявку</h4>
  <p class="login__question modal-text">И наши специалисты свяжутся с вами!</p>
  <form action="#" id="popupOrder" class="log callme-form">

    <div class="log__group">
      <label>Имя</label>
      <input type="text" name="name_mod" class="log__input">
    </div>

    <div class="log__group show-pass">
      <label>Телефон</label>
      <input type="tel" name="tel" class="log__input">
    </div>

    <div class="log__btn">
      <input id="send" type="submit" data-submit value="Отправить" class="btn" />
    </div>
  </form>
</div>

<!-- Login -->
<div id="enter" class="login mfp-hide">
  <h4 class="login__title modal-title">Войдите в свой аккаунт</h4>
  <p class="login__question modal-text">Еще нет учетной записи? <span><a href="#reg"
        class="popup-link-2 link-more">Зарегистрируйтесь сейчас</a></span>, это займет не более минуты</p>
  <form action="#" id="log" class="log">

    <span class="modal-сaution">Такого аккаунта не существует</span>
    <span class="modal-сaution">Неверный E-mail или пароль</span>

    <div class="log__group">
      <label>Email</label>
      <input type="email" name="email_mod" class="log__input">
    </div>

    <div class="log__group show-pass">
      <label>Пароль</label>
      <input id="password" type="password" name="password_mod" class="log__input">
      <span class="log__eye password-eye" data-target="#password">
        <svg width="34" height="22">
          <use xlink:href="#eye" />
        </svg>
      </span>
    </div>
    <div class="log__wrap">
      <div class="log__group check">
        <input id="check" type="checkbox" name="remember" value="remember">
        <label for="check">Запомнить пароль</label>
      </div>
      <a href="#recovery" class="popup-link-1 log__forget">Забыли пароль?</a>
    </div>
    <div class="log__btn">
      <input id="entry" type="submit" data-submit value="Войти" class="btn" />
    </div>
  </form>
  <div class="var">
    <p class="var__text">Или войдите в систему с помощью</p>
    <ul class="var__list">
      <li>
        <a href="#" class="var__link var__link_goo">
          <svg width="14" height="14">
            <use xlink:href="#google" />
          </svg>
        </a>
      </li>
      <li>
        <a href="#" class="var__link var__link_vk">
          <svg width="18" height="18">
            <use xlink:href="#vk" />
          </svg>
        </a>
      </li>
      <li>
        <a href="#" class="var__link var__link_fb">
          <svg width="16" height="16">
            <use xlink:href="#facebook" />
          </svg>
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Forget password -->
<div id="recovery" class="recovery mfp-hide">
  <div class="forget">
    <p class="forget__title modal-subtitle">Забыли пароль?</p>
    <p class="forget__text modal-text">Введите ваш Email. Вам будет выслан проверочный код. После получения кода
      подтверждения вы сможете выбрать новый пароль для своей учетной записи.</p>
    <form action="#" id="recover" class="log">

      <span class="modal-сaution">Пароль был отправлен на ваш Email</span>
      <span class="modal-сaution">Пользователя с таким Email не существует</span>

      <div class="log__group">
        <label>Email</label>
        <input type="email" name="email_mod" class="log__input">
      </div>
      <div class="log__btn">
        <input id="pass" type="submit" data-submit value="Отправить пароль" class="btn" />
      </div>
    </form>
    <a href="#enter" class="popup-link-1 link-more">
      <svg width="18" height="20">
        <use xlink:href="#nav-right" />
      </svg>
      Назад
    </a>
  </div>
  <!---------------------- Сonfirmation code ---------------------->
  <div class="confirm">
    <p class="confirm__title  modal-subtitle">Введите код подтверждения</p>

    <form action="#" id="key" class="log">

      <span class="modal-сaution">Неверный код</span>

      <div class="log__group">
        <label>Код подтверждения</label>
        <input type="text" name="confirm" class="log__input">
      </div>
      <div class="log__btn">
        <input id="confirm" type="submit" data-submit value="Подтвердить" class="btn" />
      </div>
    </form>
    <a href="#enter" class="popup-link-1 link-more">
      <svg width="18" height="20">
        <use xlink:href="#nav-right" />
      </svg>
      Назад
    </a>
  </div>

  <!---------------------- New password ---------------------->
  <div class="new-pass">
    <p class="new-pass__title  modal-subtitle">Придумайте новый пароль</p>
    <p class="new-pass__text modal-text">Пароль должен содержать не менее 9 символов</p>

    <form action="#" id="create" class="log">

      <span class="modal-сaution">Вы успешно сменили пароль</span>

      <div class="log__group show-pass">
        <label>Новый пароль</label>
        <input id="new-pass" type="password" name="password_mod" class="log__input">
        <span class="log__eye password-eye" data-target="#new-pass">
          <svg width="34" height="22">
            <use xlink:href="#eye" />
          </svg>
        </span>
      </div>
      <div class="log__group show-pass">
        <label>Подтвердите пароль</label>
        <input id="confirm-pass" type="password" name="password_mod" class="log__input">
        <span class="log__eye password-eye" data-target="#confirm-pass">
          <svg width="34" height="22">
            <use xlink:href="#eye" />
          </svg>
        </span>
      </div>
      <div class="log__wrap">
        <div class="log__btn">
          <input type="submit" id="conf" data-submit value="Подтвердить" class="btn" />
        </div>
        <a href="#enter" class="popup-link-1 log__enter">Войти</a>
      </div>
    </form>
    <a href="#enter" class="popup-link-1 link-more">
      <svg width="18" height="20">
        <use xlink:href="#nav-right" />
      </svg>
      Назад
    </a>
  </div>

</div>

<!-- Registration -->
<div id="reg" class="reg mfp-hide">
  <h4 class="reg__title modal-title">Регистрация нового аккаунта</h4>
  <p class="reg__question modal-text">Уже есть аккаунт? <span><a href="#enter"
        class="popup-link-1 link-more">Войдите</a></span></p>

  <form action="#" id="regist" class="log">

    <span class="modal-сaution">Пароль должен содержать не менее 9 символов</span>
    <span class="modal-сaution">Пользователь с таким адресом электронной почты уже существует</span>

    <div class="log__group">
      <label>Имя</label>
      <input type="text" name="name_mod" class="log__input">
    </div>
    <div class="log__group">
      <label>Email</label>
      <input type="email" name="email_mod" class="log__input">
    </div>
    <div class="log__group">
      <label>Телефон</label>
      <input type="tel" name="tel_mod" class="log__input">
    </div>
    <div class="log__group show-pass">
      <label>Пароль</label>
      <input id="reg-pass" type="password" name="password_mod" class="log__input">
      <span class="log__eye password-eye" data-target="#reg-pass">
        <svg width="34" height="22">
          <use xlink:href="#eye" />
        </svg>
      </span>
    </div>
    <div class="log__wrap">

      <div class="log__btn">
        <input id="do-reg" type="submit" data-submit value="Зарегистрироваться" class="btn" />
      </div>
      <div class="log__group check">
        <input id="rem" type="checkbox" name="remember" value="remember">
        <label for="rem">Запомнить пароль</label>
      </div>
    </div>
  </form>
  <div class="var">
    <p class="var__text">Или войдите в систему с помощью</p>
    <ul class="var__list">
      <li>
        <a href="#" class="var__link var__link_goo">
          <svg width="14" height="14">
            <use xlink:href="#google" />
          </svg>
        </a>
      </li>
      <li>
        <a href="#" class="var__link var__link_vk">
          <svg width="18" height="18">
            <use xlink:href="#vk" />
          </svg>
        </a>
      </li>
      <li>
        <a href="#" class="var__link var__link_fb">
          <svg width="16" height="16">
            <use xlink:href="#facebook" />
          </svg>
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Subscribe news -->
<div id="sub" class="sub mfp-hide">
  <p class="sub__thank">Спасибо!</p>
  <p class="sub__text">Вы успешно подписались на нашу новостную рассылку</p>
</div>

<!-- Order -->
<div id="taken" class="sub mfp-hide">
  <p class="sub__thank">Спасибо!</p>
  <p class="sub__text">Ваша заявка принята. Наши специалисты свяжутся с вами в ближайшее время.</p>
</div>

<!-- Message -->
<div id="callback" class="sub mfp-hide">
  <p class="sub__thank">Спасибо за отзыв!</p>
  <p class="sub__text">Ваше мнение очень важно для нас. Спасибо, что уделили нам время</p>
</div>

<!-- End modal -->


<!-- Loader for form -->
<div id="form-loader">
  <img src="img/eclipse.svg">
</div>






<?php wp_footer(); ?>

</body>

</html>