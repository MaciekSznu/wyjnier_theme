<?php
  $summary = get_field('podsumowanie_inv');
  $description = get_field('opis_inv');
  $main_image = get_field('zdjecie_glowne_inv');
  $images = get_field('zdjecia_inv');
  $converted_date = (explode("-", $summary['termin_realizacji']));
?>

<section class='single-offer'>
    <div class='single-offer__gallery'>
      <div class='single-control-prev'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-left.svg" alt="Previous slide"></div>
      <div class='single-control-next'><img src="<?php bloginfo('template_url'); ?>/images/icons/chevron-right.svg" alt="Next slide"></div>
      <div class='single-offer-carousel'>
        <div class='single-offer-carousel--image first'>
          <img src="<?php echo $main_image; ?>" alt="<?php echo $main_image; ?>">
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
    <div class='single-offer__summary invest'>
      <div class='single-offer__summary-localization'>
        <p class='single-offer__summary-localization--city'><?php echo $summary['miasto'];?></p>
        <p class='single-offer__summary-localization--street'><?php echo $summary['dzielnica'];?></p>
      </div>
      <div class='single-offer__summary-data'>
        <p class='single-offer__summary-data--term'>Termin realizacji: <?php echo $converted_date[1] . " kwartał " . $converted_date[0];?> r.</p>
        <p class='single-offer__summary-data--flats'>Liczba mieszkań: <?php echo $summary['liczba_mieszkan'];?></p>
        <p class='single-offer__summary-data--area'>Powierzchnie: <?php echo number_format($summary['cena_min_m2'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max_m2'], 0, ',', ' ');?> m<sup>2</sup></p>
      </div>
      <div class='single-offer__summary-price'>
        <p class='single-offer__summary-price--total'>Ceny: <?php echo number_format($summary['cena_min'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max'], 0, ',', ' ');?> zł</p>
        <p class='single-offer__summary-price--square-meter'>Ceny m<sup>2</sup>: <?php echo number_format($summary['cena_min_m2'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max_m2'], 0, ',', ' ');?> zł/m<sup>2</sup></p>
      </div>
    </div>
    <div class='single-offer__description'>
      <h2 class='single-offer__description--title'><?php echo $summary['nazwa_inwestycji'];?></h2>
      <div class='single-offer__description--localization'>
        <p class='description'><?php echo $description;?></p>
      </div>

    </div>

    <?php get_template_part('includes/section', 'singleoffercontact'); ?>

  </section>