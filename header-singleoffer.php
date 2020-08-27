<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/logos/favicon.png"/>
  <title><?php wp_title( '', true, 'right' ); ?></title>
  <meta name="description" content="Wyjątkowe Nieruchomości - tutaj znajdziesz wyjątkowe oferty nieruchomości z Krakowa, Zakopanego oraz nadmorskich i górskich kurortów.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://wyjatkowenieruchomosci.pl/">
  <meta property="og:title" content="<?php wp_title( '', true, 'right' ); ?>">
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
  <section class='menu__toggler'>
    <button class="hamburger-menu">
      <span class="hamburger-menu-line"></span>
    </button>
  </section>
