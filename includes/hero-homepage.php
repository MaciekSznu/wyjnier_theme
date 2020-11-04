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
      $main_image_big = str_replace('_max', '_raw', $main_image);
      $summary = get_field('podsumowanie');
      echo "
        <div class='hero-image-wrapper'>
          <picture>
            <source class='hero-image' srcset='" . $main_image_big . "' media='(min-width: 1024px)'>
            <img class='hero-image' src='" . $main_image . "' alt='" . $main_image . "'>
          </picture>
          <a href=" . get_permalink() . ">
          <div class='hero-image-description-wrapper'>
            <div class='hero-image-description'>
              <p class='hero-image-description--city'>" . $summary['miasto'] . ", " . $summary['ulica'] . "</p>
              <p class='hero-image-description--price'>" . number_format($summary['cena'], 0, '', ' ') . " zł</p>
            </div>
          </div>
          </a>
        </div>";
    endforeach;
  ?>
  </div>
</section>