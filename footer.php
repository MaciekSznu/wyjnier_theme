<footer class='contact' id='section-contact'>
    <div class='contact-adress-wrapper'>
      <div class='contact__content-logo'>
        <img class='logo__image' src="<?php bloginfo('template_url'); ?>/images/logos/white_logo_pl_500_140.svg" alt="Logo Wyjątkowe Nieruchomości">
      </div>
      <div class='contact__content--cta'>
        <a class='contact__content--cta-link' href='tel:733-003-652'>
          <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/phone-square-contact.svg" alt="Zadzwoń do nas">
          733-003-652
        </a>
      </div>
      <div class='contact__content--cta'>
        <a class='contact__content--cta-link' href='mailto:biuro@wyjatkowenieruchomosci.pl'>
          <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/envelope-square.svg" alt="Wyślij email">
          biuro@wyjatkowenieruchomosci.pl
        </a>
      </div>
      <p class='contact__content'>
        <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/map-marker-alt.svg" alt="Wyślij email">
        ul. Solna 1/28
      </p>
      <p class='contact__content'>30-527 Kraków</p>
    </div>
    <div class='contact-footer-menu-wrapper'>
      <p class='footer-menu-title'>menu</p>
      <?php wp_nav_menu(
        array(
          'theme_location' => 'footer-menu',
          'container' => 'nav',
          'menu_class' => 'footer-menu',
        )
      ); ?>
    </div>
    <div class='contact-footer-form-wrapper'>
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
    <div class='contact-footer-copyright'>
      <p class='contact-footer-copyright--description'>Projekt i wykonanie <a class='contact-footer-copyright--description-link' href='https://www.beeontheweb.pl' target='_blank' rel='noopener noreferrer'>BEEONTHEWEB</a></p>
      <p class='contact-footer-copyright--description'>&#169; All rights reserved</p>
    </div>
  </footer>

<?php wp_footer(); ?>

</body>
</html>