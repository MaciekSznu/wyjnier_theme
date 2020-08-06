<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wyjątkowe nieruchomości</title>
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
