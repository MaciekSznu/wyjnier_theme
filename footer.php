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
        <a class='contact__content--cta-link' href='mailto: biuro@wyjatkowenieruchomosci.pl'>
          <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/envelope-square.svg" alt="Wyślij email">
          biuro@wyjatkowenieruchomosci.pl
        </a>
      </div>
      <p class='contact__content'>
        <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/map-marker-alt.svg" alt="Wyślij email">
        ul. Solna 1
      </p>
      <p class='contact__content'>30-527 Kraków</p>
    </div>
    <div class='contact-footer-menu-wrapper'>
      <p class='footer-menu-title'>menu</p>
      <nav aria-label='secondary' class='footer-menu'>
        <ul class="footer-menu__list">
          <li class="footer-menu__list-item"><a href="<?php echo home_url(); ?>">home</a></li>
          <li class="footer-menu__list-item">
            <a href="<?php echo home_url(); ?>/oferty">oferty</a>
          </li>
          <li class="footer-menu__list-item">
            <a href="<?php echo home_url(); ?>/uslugi">usługi</a>
          </li><li class="footer-menu__list-item">
            <a href="<?php echo home_url(); ?>/onas">o nas</a>
          </li>
          <li class="footer-menu__list-item">
            <a href="<?php echo home_url(); ?>/kontakt">kontakt</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class='contact-footer-form-wrapper'>
      <form class='contact-form'>
        <input class='contact-form--input-name' type="text" name="imie" aria-required="true" aria-invalid="false" placeholder="Twoje Imię (wymagane)">
        <input class='contact-form--input-email' type="email" name="email" aria-required="true" aria-invalid="false" placeholder="Twój E-mail (wymagane)">
        <input class='contact-form--input-phone' type="tel" name="telefon" aria-required="true" aria-invalid="false" placeholder="Twój Telefon (wymagane)">
        <textarea class='contact-form--input-message' type="text" name="message" aria-invalid="false" placeholder="Twoja wiadomość"></textarea>
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