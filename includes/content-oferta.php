<?php
  $summary = get_field('podsumowanie');
  $description = get_field('opis');
  $localization = $description['lokalizacja'];
  $property = $description['nieruchomosc'];
  $information = $description['informacje'];
  $list = $description['lista'];
  $custom_list = $list['opis'];
  $custom_list = substr($custom_list, 0, strlen($custom_list));
  $custom_list = str_replace( '<br />', '|', $custom_list);
  $items = explode( '|' , $custom_list );
  $main_image = get_field('zdjecie_glowne');
  $url = $main_image['url'];
  $alt = $main_image['alt'];
  $images = get_field('zdjecia');
  $rooms = str_replace(' ', '', $summary['pokoje']);
  $rooms_last_integer = $rooms[strlen($rooms) - 1];
?>

<section class='single-offer'>
    <div class='single-offer__gallery'>
      <div class='single-control-prev'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-left.svg" alt="Previous slide"></div>
      <div class='single-control-next'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-right.svg" alt="Next slide"></div>
      <div class='single-offer-carousel'>
        <div class='single-offer-carousel--image first'>
          <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>">
        </div>
        <?php
          if ( !empty($images)) {
            foreach ( $images as $image ) :
              if ( !empty($image['url'])) {
                $image_url = $image['url'];
                $image_alt = $image['alt'];
                echo "<div class='single-offer-carousel--image'>";
                echo "<img src='" . esc_url($image_url) . "' alt='" . $image_alt . "'>";
                echo "</div>";
              }
            endforeach;
          }
        ?>
      </div>
    </div>
    <div class='single-offer__summary'>
      <div class='single-offer__summary-price'>
        <p class='single-offer__summary-price--total'><?php echo number_format($summary['cena'], 2, ',', ' ');?> zł</p>
        <p class='single-offer__summary-price--square-meter'><?php echo number_format(($summary['cena'] / $summary['powierzchnia']), 2, ',', ' ');?> zł/m<sup>2</sup></p>
      </div>
      <div class='single-offer__summary-localization'>
        <p class='single-offer__summary-localization--city'><?php echo $summary['miasto'];?></p>
        <p class='single-offer__summary-localization--street'><?php echo $summary['ulica'];?></p>
      </div>
      <div class='single-offer__summary-data'>
        <p class='single-offer__summary-data--area'><?php echo $summary['powierzchnia'];?> m<sup>2</sup></p>
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
      <div class='single-offer__description--localization'>
        <h3 class='title'><?php echo $localization['tytul'];?></h3>
        <p class='description'><?php echo $localization['opis'];?></p>
      </div>
      <div class='single-offer__description--property'>
        <h3 class='title'><?php echo $property['tytul'];?></h3>
        <p class='description'><?php echo $property['opis'];?></p>
      </div>
      <?php if( !empty($information)): ?>
        <div class='single-offer__description--info'>
          <h3 class='title'><?php echo $information['tytul'];?></h3>
          <p class='description'><?php echo $information['opis'];?></p>
        </div>
      <?php endif; ?>
      <?php if( !empty($list)): ?>
        <div class='single-offer__description--list'>
          <h3 class='title'><?php echo $list['tytul'];?></h3>
          <ul class='list'>
            <?php
              if (count($items) > 1) {
                foreach ( $items as $item ) :
                  echo "<li class='list-item'>$item</li>";
                endforeach;
              }
            ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>

    <?php get_template_part('includes/section', 'singleoffercontact'); ?>

  </section>