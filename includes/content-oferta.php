<?php
  $summary = get_field('podsumowanie');
  $description = get_field('opis');
  $main_image = get_field('zdjecie_glowne');
  $images = get_field('zdjecia');
  $rooms = str_replace(' ', '', $summary['pokoje']);
  $rooms_last_integer = $rooms[strlen($rooms) - 1];
  $main_image_small = str_replace('_max', '_std', $main_image);
?>

<section class='single-offer'>
    <div class='single-offer__gallery'>
      <div class='single-control-prev'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-left.svg" alt="Previous slide"></div>
      <div class='single-control-next'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-right.svg" alt="Next slide"></div>
      <div class='single-offer-carousel'>
        <div class='single-offer-carousel--image first'>
        <picture>
          <source srcset="<?php echo $main_image; ?>" media="(min-width: 768px)">
          <img src="<?php echo $main_image_small; ?>" alt="<?php echo $main_image_small; ?>">
        </picture>
        </div>
        <?php
          if ( !empty($images)) {
            foreach ( $images as $image ) :
              if ( !empty($image) && $image != null) {
                $image_small = str_replace('_max', '_std', $image);
                echo "
                  <div class='single-offer-carousel--image'>
                    <picture>
                      <source srcset='" . $image . "' media='(min-width: 768px)'>
                      <img src='" . $image_small . "' alt='" . $image_small . "'>
                    </picture>
                  </div>";
              }
            endforeach;
          }
        ?>
      </div>
    </div>
    <div class='single-offer__summary'>
      <div class='single-offer__summary-price'>
        <p class='single-offer__summary-price--total'><?php echo number_format($summary['cena'], 2, ',', ' ');?> zł</p>
        <p class='single-offer__summary-price--square-meter'><?php echo number_format($summary['cena_m2'], 2, ',', ' ');?> zł/m<sup>2</sup></p>
      </div>
      <div class='single-offer__summary-localization'>
        <p class='single-offer__summary-localization--city'><?php echo $summary['miasto'];?></p>
        <p class='single-offer__summary-localization--street'><?php echo $summary['etykieta_ulicy'] . ' ' . $summary['ulica'];?></p>
      </div>
      <div class='single-offer__summary-data'>
        <p class='single-offer__summary-data--area'><?php echo number_format($summary['powierzchnia'], 2, ',', ' ');?> m<sup>2</sup></p>
          <?php if(!empty($summary['pokoje']) && $rooms == 1)
            echo
            "<p class='single-offer__summary-data--rooms'>" . $rooms . " pokój</p>"
          ?>
          <?php if(!empty($summary['pokoje']) && $rooms > 1 && $rooms_last_integer > 1 && $rooms_last_integer < 5)
            echo
            "<p class='single-offer__summary-data--rooms'>" . $rooms . " pokoje</p>"
          ?>
          <?php if(!empty($summary['pokoje']) && $rooms > 1 && $rooms_last_integer == 1 || $rooms_last_integer > 4)
            echo
            "<p class='single-offer__summary-data--rooms'>" . $rooms . " pokoi</>"
          ?>
        <?php if( !empty($summary['rok_budowy']))
          echo
            "<p class='single-offer__summary-data--year'>" . $summary['rok_budowy'] . " r.</p>"
        ?>
      </div>
    </div>
    <div class='single-offer__description'>
      <h2 class='single-offer__description--title'><?php echo $description['tytul'];?></h2>
      <div class='single-offer__description--property'>
        <p class='description'><?php echo $description['opis'];?></p>
      </div>
    </div>

    <?php get_template_part('includes/section', 'singleoffercontact'); ?>

  </section>