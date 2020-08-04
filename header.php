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
    <nav aria-label='primary' class='menu'>
      <ul class="menu__list">
        <li class="menu__list-item" style="border-color: #ccd3d1"><a href="<?php echo home_url(); ?>">home</a></li>
        <li class="menu__list-item">
          <a href="<?php echo home_url(); ?>/oferty">oferty</a>
        </li>
        <li class="menu__list-item">
          <a href="<?php echo home_url(); ?>/uslugi">usługi</a>
        </li><li class="menu__list-item">
          <a href="<?php echo home_url(); ?>/onas">o nas</a>
        </li>
        <li class="menu__list-item">
          <a href="<?php echo home_url(); ?>/kontakt">kontakt</a>
        </li>
      </ul>
    </nav>
  </header>
  <section class='menu__toggler'>
    <button class="hamburger-menu">
      <span class="hamburger-menu-line"></span>
    </button>
  </section>
