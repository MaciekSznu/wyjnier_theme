<?php

// SCRIPTS AND STYLES
function scripts(){
  wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
  wp_enqueue_style('style');

  wp_enqueue_script('jquery');

  wp_register_script('siema', get_template_directory_uri() . '/dist/siema.min.js', ['jquery'], 1, true);
  wp_enqueue_script('siema');

  wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
  wp_enqueue_script('app');
  
  if ( is_front_page() ) :
    wp_register_script('homepageslider', get_template_directory_uri() . '/dist/home-page-slider.js', false, 1, true);
    wp_enqueue_script('homepageslider');
  endif;

  if ( is_singular('oferty') ) :
    wp_register_script('singleofferslider', get_template_directory_uri() . '/dist/single-offer-slider.js', false, 1, true);
    wp_enqueue_script('singleofferslider');
  endif;

  if ( is_page('kontakt') ) :
    wp_register_script('contact', get_template_directory_uri() . '/dist/contact.js', false, 1, true);
    wp_enqueue_script('contact');
  endif;

}
add_action('wp_enqueue_scripts', 'scripts');


/* MENUS */
add_theme_support('menus');

register_nav_menus(
  array(
    'main-menu' => 'Top Menu Location',
  )
);

/* OFFER POST TYPE */
function offer_post_type() {
  $args = array(
    'labels' => array(
      'name' => 'Oferty',
      'singular_name' => 'Oferta',
    ),
    'menu_icon' => 'dashicons-plus-alt',
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'custom-fields'),
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
    'hierarchical' => false,
  );

  register_taxonomy('transakcje', array('oferty'), $args);
}
add_action( 'init', 'offer_transactions_taxonomy');

/* CUSTOM SEARCH */
function search_query(){

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $args = [
    'paged' => $paged,
    'post_type' => 'oferty',
    'posts_per_page' => 3,
    'tax_query' => [],
    'meta_query' => [
      'relation' => 'AND',
    ],
  ];

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


/* POSTS ON MAIN PAGE */
function new_offers_query(){
  $args = [
    'post_type' => 'oferty',
    'posts_count' => 3,
    'tax_query' => [],
  ];
  return new WP_Query($args);
}

/* MENU ITEM ADDING CURRENT MENU CLASS */
function add_current_nav_class($classes, $item) {

  // Getting the current post details
  global $post;

  // Get post ID, if nothing found set to NULL
  $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

  // Checking if post ID exist...
  if (isset( $id )){

      // Getting the post type of the current post
      $current_post_type = get_post_type_object(get_post_type($post->ID));

      // Getting the rewrite slug containing the post type's ancestors
      $ancestor_slug = $current_post_type->rewrite['slug'];

      // Split the slug into an array of ancestors and then slice off the direct parent.
      $ancestors = explode('/',$ancestor_slug);
      $parent = array_pop($ancestors);

      // Getting the URL of the menu item
      $menu_slug = strtolower(trim($item->url));

      // Remove domain from menu slug
      $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

      // If the menu item URL contains the post type's parent
      if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
          $classes[] = 'current-menu-item';
      }
      
      // If the menu item URL contains any of the post type's ancestors
      foreach ( $ancestors as $ancestor ) {
          if (strpos($menu_slug,$ancestor) !== false) {
              $classes[] = 'current-page-ancestor';
          }
      }
  }
  // Return the corrected set of classes to be added to the menu item
  return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

/* CUSTOM IMAGES SIZES */
add_image_size('offer-small', 768, 522, false);
add_image_size('offer-medium', 1024, 576, false);
add_image_size('offer-large', 1920, false);
