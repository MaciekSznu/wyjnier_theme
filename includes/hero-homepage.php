<section class='hero' id='section-hero'>
  <div class='hero-control-prev'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-left.svg" alt="Previous slide"></div>
  <div class='hero-control-next'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-right.svg" alt="Next slide"></div>
  <div class='hero-carousel'>
  <?php
    $posts = get_posts( array(
      'numberposts' => -1,
      'post_type' => 'oferty',
      'meta_key' => 'promowanie',
      'meta_value' => 1,
    ) );
  ?>
  <?php
    foreach ( $posts as $post ) :
      $main_image = get_field('zdjecie_glowne');
      $url = $main_image['url'];
      $alt = $main_image['alt'];
      $summary = get_field('podsumowanie');
      echo "
        <div class='hero-image-wrapper'>
          <img class='hero-image' src=" . esc_url($url) . " alt='" . esc_attr($alt) . "'>
          <a href=" . get_permalink() . ">
          <div class='hero-image-description-wrapper'>
            <div class='hero-image-description'>
              <p class='hero-image-description--city'>" . $summary['miasto'] . " " . $summary['ulica'] . "</p>
              <p class='hero-image-description--price'>" . number_format($summary['cena'], 2, ',', ' ') . " zł</p>
            </div>
          </div>
          </a>
        </div>";
    endforeach;
  ?>
  </div>
</section>