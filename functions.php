<?php

// SCRIPTS AND STYLES
function scripts(){
  wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
  wp_enqueue_style('style');

  wp_register_script('app', get_template_directory_uri() . '/dist/app.js', [], 1, true);
  wp_enqueue_script('app');
  
  if ( is_front_page() ) :
    wp_register_script('siema', 'https://cdn.jsdelivr.net/npm/siema@1.5.1/dist/siema.min.js', [], 1, true);
    wp_enqueue_script('siema');
    wp_register_script('homepageslider', get_template_directory_uri() . '/dist/home-page-slider.js', false, 1, true);
    wp_enqueue_script('homepageslider');
  endif;

  if ( is_singular('oferty') || is_singular('inwestycje')) :
    wp_register_script('siema', 'https://cdn.jsdelivr.net/npm/siema@1.5.1/dist/siema.min.js', [], 1, true);
    wp_enqueue_script('siema');
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
    'supports' => array('title', 'custom-fields', 'tags'),
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

/* OFFER SEARCH */
function search_query(){

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $args = [
    'paged' => $paged,
    'post_type' => 'oferty',
    'posts_per_page' => 50,
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

/* INVESTMENT POST TYPE */
function investment_post_type() {
  $args = array(
    'labels' => array(
      'name' => 'Inwestycje',
      'singular_name' => 'Inwestycja',
    ),
    'menu_icon' => 'dashicons-plus-alt',
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'custom-fields'),
  );

  register_post_type('inwestycje', $args);
}
add_action('init', 'investment_post_type');

/* POSTS ON MAIN PAGE */
function new_offers_query(){
  $args = [
    'post_type' => 'oferty',
    'post_count' => 3,
    'tax_query' => [],
  ];
  return new WP_Query($args);
}

/* POSTS ON IVESTMENT PAGE */
function investments_query(){
  $args = [
    'post_type' => 'inwestycje',
    'post_count' => 50,
    'posts_per_page' => 50,
    'tax_query' => [],
  ];
  return new WP_Query($args);
}

/* MENU ITEM ADDING CURRENT MENU CLASS */
function add_current_nav_class($classes, $item) {

  global $post;

  $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

  if (isset( $id )){

      $current_post_type = get_post_type_object(get_post_type($post->ID));

      $ancestor_slug = $current_post_type->rewrite['slug'];

      $ancestors = explode('/',$ancestor_slug);
      $parent = array_pop($ancestors);

      $menu_slug = strtolower(trim($item->url));

      $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

      if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
          $classes[] = 'current-menu-item';
      }
      
      foreach ( $ancestors as $ancestor ) {
          if (strpos($menu_slug,$ancestor) !== false) {
              $classes[] = 'current-page-ancestor';
          }
      }
  }
  return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

/* CUSTOM IMAGES SIZES */
add_image_size('offer-small', 768, 522, false);
add_image_size('offer-medium', 1024, 576, false);
add_image_size('offer-large', 1920, false);


// ESTI API
// OFERTY
function get_offers_from_esti(){
  $company = '5701';
  $token = '2f9670d05e';
  $status = '3,7,99';
  $offers = [];
  $results = wp_remote_retrieve_body( wp_remote_get('https://app.esticrm.pl/apiClient/offer/list?company=' . $company . '&token=' . $token . '&status=' . $status));

  $results = json_decode($results);

  $offers[] = $results->data;

  foreach ($offers[0] as $offer) {
    $offer_slug = sanitize_title($offer->portalTitle . '-' . $offer->id);
    $offer_title = sanitize_title($offer->portalTitle);
    $existing_offer = get_page_by_path($offer_slug, 'OBJECT', 'oferty');

    // Transakcje
    $transaction_type = $offer->transaction = 131 ? 'Sprzedaż' : 'Wynajem';
    $transaction_type_tags = array(
      $transaction_type,
    );

    // Rodzaje
    $property_code = $offer->mainTypeId;
    if(in_array($property_code, array(1, 6, 12, 13, 14, 15, 48, 50, 52, 53, 54, 55, 56, 65))){
      $property_type = 'Domy';
    }
    else if($property_code == 2 ){
      $property_type = 'Mieszkania';
    }
    else if($property_code == 3 ){
      $property_type = 'Działki';
    }
    else if(in_array($property_code, array(4, 7, 8, 9, 21, 22, 25, 27, 28, 38, 39, 40, 41, 41, 43, 44, 45, 46, 47, 66, 67, 71, 72, 79, 80))){
      $property_type = 'Lokale';
    }
    else {
      $property_type = 'Pozostałe';
    }
    $property_type_tags = array(
      $property_type,
    );

    if($existing_offer === null) {
      $inserted_offer = wp_insert_post([
        'post_name' => $offer_slug,
        'post_title' => $offer_title,
        'post_type' => 'oferty',
        'post_status' => 'publish',
      ]);
      if($inserted_offer) {
        wp_set_object_terms($inserted_offer, $transaction_type_tags, 'transakcje');
        wp_set_object_terms($inserted_offer, $property_type_tags, 'rodzaje');
      }
  
      if(is_wp_error($inserted_offer)) {
        continue;
      }
      
      // Custom Fields
      $main_image = (!empty($offer->pictures[0]) ? $offer->pictures[0] : '');
      $image_01 = (!empty($offer->pictures[1]) ? $offer->pictures[1] : null);
      $image_02 = (!empty($offer->pictures[2]) ? $offer->pictures[2] : null);
      $image_03 = (!empty($offer->pictures[3]) ? $offer->pictures[3] : null);
      $image_04 = (!empty($offer->pictures[4]) ? $offer->pictures[4] : null);
      $image_05 = (!empty($offer->pictures[5]) ? $offer->pictures[5] : null);
      $image_06 = (!empty($offer->pictures[6]) ? $offer->pictures[6] : null);
      $image_07 = (!empty($offer->pictures[7]) ? $offer->pictures[7] : null);
      $image_08 = (!empty($offer->pictures[8]) ? $offer->pictures[8] : null);

      $opis = array(
        'field_5f7cb14fbc50c' => $offer->portalTitle,
        'field_5f7cb169bc50d' => $offer->descriptionWebsite,
      );
      update_field('field_5f2da3f1954be', $opis, $inserted_offer);

      $lead_image = array(
        'field_5f30ea32c11f8' => $main_image,
      );
      update_field('field_5f30ea32c11f8', $main_image, $inserted_offer);

      $images = array(
        'field_5f3189a0eecde' => $image_01,
        'field_5f3189d2eecdf' => $image_02,
        'field_5f3189faeece0' => $image_03,
        'field_5f318a0eeece1' => $image_04,
        'field_5f318a28eece2' => $image_05,
        'field_5f318a3feece3' => $image_06,
        'field_5f318a50eece4' => $image_07,
        'field_5f318a62eece5' => $image_08,
      );
      update_field('field_5f318979eecdd', $images, $inserted_offer);

      $summary = array(
        'field_5f2da029250e4' => $offer->price,
        'field_5f7d6523f705c' => $offer->pricePermeter,
        'field_5f2da0b6250e6' => $offer->locationCityName,
        'field_5f7d688fb363d' => $offer->locationStreetType,
        'field_5f2da0e1250e7' => $offer->locationStreetName,
        'field_5f2da106250e8' => $offer->areaTotal,
        'field_5f2da128250e9' => $offer->apartmentRoomNumber,
        'field_5f2da14e250ea' => $offer->buildingYear,
        'field_5f301d5b56ced' => $offer->apartmentBathroomNumber,
        'field_5f3022e442ee8' => $offer->typeName,
      );
      update_field('field_5f2d9fa0250e3', $summary, $inserted_offer);

      update_field('field_5f7ec1e88aa5b', $offer->updateDate, $inserted_offer);

    } else {

      $existing_offer_id = $existing_offer->ID;
      $existing_offer_timestamp = get_field('data_aktualizacji', $existing_offer_id);

      if($offer->updateDate >= $existing_offer_timestamp) {

        wp_set_object_terms($existing_offer_id, $transaction_type_tags, 'transakcje');
        wp_set_object_terms($existing_offer_id, $property_type_tags, 'rodzaje');

        $main_image = (!empty($offer->pictures[0]) ? $offer->pictures[0] : '');
        $image_01 = (!empty($offer->pictures[1]) ? $offer->pictures[1] : '');
        $image_02 = (!empty($offer->pictures[2]) ? $offer->pictures[2] : '');
        $image_03 = (!empty($offer->pictures[3]) ? $offer->pictures[3] : '');
        $image_04 = (!empty($offer->pictures[4]) ? $offer->pictures[4] : '');
        $image_05 = (!empty($offer->pictures[5]) ? $offer->pictures[5] : '');
        $image_06 = (!empty($offer->pictures[6]) ? $offer->pictures[6] : '');
        $image_07 = (!empty($offer->pictures[7]) ? $offer->pictures[7] : '');
        $image_08 = (!empty($offer->pictures[8]) ? $offer->pictures[8] : '');
  
        $opis = array(
          'field_5f7cb14fbc50c' => $offer->portalTitle,
          'field_5f7cb169bc50d' => $offer->descriptionWebsite,
        );
        update_field('field_5f2da3f1954be', $opis, $existing_offer_id);
  
        $lead_image = array(
          'field_5f30ea32c11f8' => $main_image,
        );
        update_field('field_5f30ea32c11f8', $main_image, $existing_offer_id);
  
        $images = array(
          'field_5f3189a0eecde' => $image_01,
          'field_5f3189d2eecdf' => $image_02,
          'field_5f3189faeece0' => $image_03,
          'field_5f318a0eeece1' => $image_04,
          'field_5f318a28eece2' => $image_05,
          'field_5f318a3feece3' => $image_06,
          'field_5f318a50eece4' => $image_07,
          'field_5f318a62eece5' => $image_08,
        );
        update_field('field_5f318979eecdd', $images, $existing_offer_id);
  
        $summary = array(
          'field_5f2da029250e4' => $offer->price,
          'field_5f7d6523f705c' => $offer->pricePermeter,
          'field_5f2da0b6250e6' => $offer->locationCityName,
          'field_5f7d688fb363d' => $offer->locationStreetType,
          'field_5f2da0e1250e7' => $offer->locationStreetName,
          'field_5f2da106250e8' => $offer->areaTotal,
          'field_5f2da128250e9' => $offer->apartmentRoomNumber,
          'field_5f2da14e250ea' => $offer->buildingYear,
          'field_5f301d5b56ced' => $offer->apartmentBathroomNumber,
          'field_5f3022e442ee8' => $offer->typeName,
        );
        update_field('field_5f2d9fa0250e3', $summary, $existing_offer_id);

        update_field('field_5f7ec1e88aa5b', $offer->updateDate, $existing_offer_id);
      }
    }
  }
}
if(!wp_next_scheduled('update_offer_list')) {
  wp_schedule_event(time(), 'daily', 'get_offers_from_esti');
}
add_action('wp_ajax_nopriv_get_offers_from_esti', 'get_offers_from_esti');
add_action('wp_ajax_get_offers_from_esti', 'get_offers_from_esti');
