<footer class='contact' id='section-contact'>
  <div class='contact-adress-wrapper'>
    <div class='contact__content-logo'>
      <img class='logo__image' src="<?php bloginfo('template_url'); ?>/images/logos/white_logo_pl_500_140.svg" alt="Logo Wyjątkowe Nieruchomości">
    </div>
    <div class='contact__content-wrapper'>
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
    </div>
    <div class='contact__content-wrapper'>
      <p class='contact__content'>
        <img class='contact-icon' src="<?php bloginfo('template_url'); ?>/images/icons/map-marker-alt.svg" alt="Wyślij email">
        ul. Solna 1/28
      </p>
      <p class='contact__content'>30-527 Kraków</p>
    </div>
  </div>
  <div class='contact-footer-copyright'>
    <p class='contact-footer-copyright--description'>Projekt i wykonanie <a class='contact-footer-copyright--description-link' href='https://www.beeontheweb.pl' target='_blank' rel='noopener noreferrer'>BEEONTHEWEB</a></p>
    <p class='contact-footer-copyright--description'>&#169; All rights reserved</p>
  </div>
</footer>

<?php get_template_part('includes/content', 'cookiebanner'); ?>

<?php wp_footer(); ?>

</body>
</html>