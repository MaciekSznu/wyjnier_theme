<?php

// SCRIPTS AND STYLES
function scripts(){
  wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
  wp_enqueue_style('style');

  wp_enqueue_script('jquery');

  wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
  wp_enqueue_script('app');

}
add_action('wp_enqueue_scripts', 'scripts');

// MENU
// function wyjnier_register_theme_menu() {
//   register_nav_menu( 'primary', 'Main Navigation Menu' );
// }
// add_action( 'init', 'wyjnier_register_theme_menu' );
add_theme_support('menus');

/* MENUS */

register_nav_menus(
  array(
    'main-menu' => 'Top Menu Location',
    'footer-menu' => 'Footer Menu Location'
  )
);