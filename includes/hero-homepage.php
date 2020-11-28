<section class='hero' id='section-hero'>
  <div class='hero-control-prev'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-left.svg" alt="Previous slide"></div>
  <div class='hero-control-next'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-right.svg" alt="Next slide"></div>
  <div class='hero-carousel'>
  <?php
    //$posts = get_posts( array(
      //'numberposts' => -1,
      //'post_type' => 'oferty',
      //'meta_key' => 'promowanie',
      //'meta_value' => 1,
    //) );
  ?>
  <?php
    // foreach ( $posts as $post ) :
      //$main_image = get_field('zdjecie_glowne');
      //$main_image_big = str_replace('_max', '_raw', $main_image);
      //$summary = get_field('podsumowanie');
      echo "
        <div class='hero-image-wrapper'>
          <picture>
            <source class='hero-image' srcset='https://static.esticrm.pl/public/images/offers/5701/3376210/24014089_raw.jpg' media='(min-width: 1024px)'>
            <img class='hero-image' src='https://static.esticrm.pl/public/images/offers/5701/3376210/24014089_raw.jpg' alt=''>
          </picture>
          <a href=''>
          <div class='hero-image-description-wrapper'>
            <div class='hero-image-description'>
              <p class='hero-image-description--city'>miasto i ulica</p>
              <p class='hero-image-description--price'>cena zł</p>
            </div>
          </div>
          </a>
        </div>";
    //endforeach;
  ?>
  </div>
</section>