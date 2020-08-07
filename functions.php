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

/* CUSTOM POST TYPES */
function offer_post_type() {
  $args = array(
    'labels' => array(
      'name' => 'Oferty',
      'singular_name' => 'Oferta',
    ),
    // icon form wordpress dashicons
    'menu_icon' => 'dashicons-plus-alt',
    // hierarchical true - post works as a page, false - post works as a blogpost
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'custom-fields'),
    // 'rewrite' => array('slug' => 'cars'),
  );

  register_post_type('oferty', $args);
}
add_action('init', 'offer_post_type');

function offer_property_taxonomy(){
  $args = array(
    'labels' => array(
      'name' => 'Rodzaje',
      'singular_name' => 'Rodzaj',
    ),
    'public' => true,
    // hierarchical true - works as a category, false - works as a tag
    'hierarchical' => false,
  );

  register_taxonomy('rodzaje', array('oferty'), $args);
}
add_action( 'init', 'offer_property_taxonomy');

function offer_transactions_taxonomy(){
  $args = array(
    'labels' => array(
      'name' => 'Transakcje',
      'singular_name' => 'Transakcja',
    ),
    'public' => true,
    // hierarchical true - works as a category, false - works as a tag
    'hierarchical' => false,
  );

  register_taxonomy('transakcje', array('oferty'), $args);
}
add_action( 'init', 'offer_transactions_taxonomy');