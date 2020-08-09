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


/* MENUS */

add_theme_support('menus');

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

// CUSTOM SEARCH

function search_query(){

  // paginacja
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    // 'posts_per_page' => 0 - zero oznacza unlimited
  // 'relation' => 'AND' - wyszukiwanie musi spełniać wszystkie warunki jednocześnie
  $args = [
    'paged' => $paged,
    'post_type' => 'oferty',
    'posts_per_page' => 3,
    'tax_query' => [],
    'meta_query' => [
      'relation' => 'AND',
    ],
  ];

  // dodajemy keyword do wyszukiwania jesli jest podane i nie jest pustym stringiem

  //dodajemy rodzaj do wyszukiwania w
  if( isset($_GET['rodzaj']) )
  {
    if(!empty($_GET['rodzaj']))
    {
      $args['tax_query'][] = [
        'taxonomy' => 'rodzaje',
        'field' => 'slug',
        'terms' => array( sanitize_text_field($_GET['rodzaj']) ),
      ];
    }
  }

  if( isset($_GET['transakcja']) )
  {
    if(!empty($_GET['transakcja']))
    {
      $args['tax_query'][] = [
        'taxonomy' => 'transakcje',
        'field' => 'slug',
        'terms' => array( sanitize_text_field($_GET['transakcja']) ),
      ];
    }
  }
  return new WP_Query($args);
}

function new_offers_query(){

    // 'posts_per_page' => 0 - zero oznacza unlimited
  // 'relation' => 'AND' - wyszukiwanie musi spełniać wszystkie warunki jednocześnie
  $args = [
    'post_type' => 'oferty',
    'posts_count' => 3,
    'tax_query' => [],
  ];
  return new WP_Query($args);
}