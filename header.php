<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/logos/favicon.png"/>
  <title>Wyjątkowe Nieruchomości - Kraków, Zakopane, Kurorty.</title>
  <meta name="title" content="Wyjątkowe Nieruchomości - Kraków, Zakopane, Kurorty.">
  <meta name="description" content="Wyjątkowe Nieruchomości - tutaj znajdziesz wyjątkowe oferty nieruchomości z Krakowa, Zakopanego oraz nadmorskich i górskich kurortów.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://wyjatkowenieruchomosci.pl/">
  <meta property="og:title" content="Wyjątkowe Nieruchomości - Kraków, Zakopane, Kurorty.">
  <meta property="og:description" content="Wyjątkowe Nieruchomości - tutaj znajdziesz wyjątkowe oferty nieruchomości z Krakowa, Zakopanego oraz nadmorskich i górskich kurortów.">
  <meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/logos/wyjatkowe_nieruchomosci.jpg">
  <meta name="format-detection" content="telephone=no">
  <?php wp_head(); ?>
</head>
<body>
<header class='header'>
    <h1 class='logo'>
      <a href="<?php echo home_url(); ?>">
        <img class='logo__image' src="<?php bloginfo('template_url'); ?>/images/logos/white_logo_pl_500_140.svg" alt="Logo Wyjątkowe Nieruchomości">
      </a>
    </h1>
      <?php wp_nav_menu(
        array(
          'theme_location' => 'main-menu',
          'container' => 'nav',
          'menu_class' => 'main-menu',
        )
      ); ?>
  </header>
  <div class='menu__toggler'>
    <button class="hamburger-menu">
      <span class="hamburger-menu-line"></span>
    </button>
  </div>
  <div class='phone-cta'>
    <a class='phone-cta--link' href='tel:733-003-652'>
      <img class='phone-cta--link-icon' src="<?php bloginfo('template_url'); ?>/images/icons/phone-square-contact.svg" alt="Zadzwoń do nas">
    </a>
  </div>
