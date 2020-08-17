<section class='contact-page'>
  <h2 class='contact-page__title'>Kontakt</h2>
  <div class='contact-page__content-wrapper'>
    <div class='contact-page__map'>mapa</div>
    <div class='contact-page__content'>
      <h3 class='contact-page__content--title'>Wyjątkowe nieruchomości</h3>
      <p class='contact-page__content--adress'>
        <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/map-marker-alt-black.svg" alt="Wyślij email">
        ul. Solna 1/28
      </p>
      <p class='contact-page__content--adress'>30-527 Kraków</p>
      <p class='contact-page__content--phone'>
        <a class='contact-page__content--phone-link' href='tel:733-003-652'>
          <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/phone-square-about.svg" alt="Zadzwoń do nas">
          733-003-652
        </a>
      </p>
      <p class='contact-page__content--email'>
        <a class='contact-page__content--email-link' href='mailto: biuro@wyjatkowenieruchomosci.pl'>
          <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/envelope-square-about.svg" alt="Wyślij email">
          biuro@wyjatkowenieruchomosci.pl
        </a>
      </p>
      <h4 class='contact-page__content--subtitle'>Napisz do nas</h4>
      <div class='contact-form-wrapper'>
        <?php
          $imie = $_POST['imie'];
          $formemail = $_POST['email'];
          $formtelefon = $_POST['telefon'];
          $formmessage = $_POST['message'];
          $to = 'msznurawa@gmail.com';
          $subject = 'Wiadomość z formularza kontaktowego Wyjątkowe Nieruchomości';
          $message = "Imię: $imie\n Email: $formemail\n Telefon: $formtelefon\n Wiadomość: $formmessage";
          if ($_POST['submit']) {
            if (mail($to, $subject, $message, $formemail)) {
              echo '<p>Twoja wiadomośc została wysłana</p>';
            } else {
              echo '<p>Coś poszło nie tak, spróbuj raz jeszcze</p>';
            }
          }
        ?>
        <form id='contact-form' class='contact-form' method='post'>
          <div class="input-wrapper">
            <input id='input-name' class='contact-form--input-name' type="text" name="imie" aria-required="true" aria-invalid="false" placeholder="Twoje Imię (wymagane)">
          </div>
          <div class="input-wrapper">
            <input id='input-email' class='contact-form--input-email' type="email" name="email" aria-required="true" aria-invalid="false" placeholder="Twój E-mail (wymagane)">
          </div>
          <div class="input-wrapper">
            <input id='input-phone' class='contact-form--input-phone' type="tel" name="telefon" aria-required="true" aria-invalid="false" placeholder="Twój Telefon (wymagane)">
          </div>
          <div class="input-wrapper">
            <textarea id='input-message' class='contact-form--input-message' type="text" name="message" aria-required="true" aria-invalid="false" placeholder="Wiadomość (wymagane)"></textarea>
          </div>
          <input class='contact-form--input-submit' type="submit" value="Wyślij wiadomość">
        </form>
      </div>
    </div>
  </div>
</section>