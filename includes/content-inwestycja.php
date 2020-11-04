<?php
  $summary = get_field('podsumowanie_inwestycji');
  $description = get_field('opis_inv');
  $localization = $description['lokalizacja'];
  $property = $description['nieruchomosc'];
  $information = $description['informacje'];
  $main_image = get_field('zdjecie_glowne_inv');
  $url = $main_image['url'];
  $alt = $main_image['alt'];
  $images = get_field('zdjecia_inv');
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
  <div class='single-offer__summary invest'>
    <div class='single-offer__summary-localization'>
      <p class='single-offer__summary-localization--city'><?php echo $summary['miasto'];?> -&nbsp;<?php echo $summary['dzielnica_inwestycji'];?></p>
    </div>
    <div class='single-offer__summary-data'>
      <p class='single-offer__summary-data--area'>Powierzchnie: <?php echo $summary['powierzchnia_min'];?> - <?php echo $summary['powierzchnia_max'];?> m<sup>2</sup></p>
      <p class='single-offer__summary-data--total'>Ceny: <?php echo number_format($summary['cena_min'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max'], 0, ',', ' ');?> zł</p>
      <p class='single-offer__summary-data--square-meter'>Ceny m<sup>2</sup>: <?php echo number_format($summary['cena_min_m2'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max_m2'], 0, ',', ' ');?> zł/m<sup>2</sup></p>
    </div>
  </div>
  <div class='single-offer__description'>
    <h2 class='single-offer__description--title'><?php echo $summary['nazwa_inwestycji'];?></h2>
    <div class='single-offer__description--localization'>
      <?php if( !empty($localization['tytul'])): ?>
      <h3 class='title'><?php echo $localization['tytul'];?></h3>
      <?php endif; ?>
      <?php if( !empty($localization['opis'])): ?>
      <p class='description'><?php echo $localization['opis'];?></p>
      <?php endif; ?>
    </div>
    <div class='single-offer__description--property'>
      <?php if( !empty($property['tytul'])): ?>
      <h3 class='title'><?php echo $property['tytul'];?></h3>
      <?php endif; ?>
      <?php if( !empty($property['opis'])): ?>
      <p class='description'><?php echo $property['opis'];?></p>
      <?php endif; ?>
    </div>
    <?php if( !empty($information)): ?>
      <div class='single-offer__description--info'>
        <h3 class='title'><?php echo $information['tytul'];?></h3>
        <p class='description'><?php echo $information['opis'];?></p>
      </div>
    <?php endif; ?>
  </div>

  <?php get_template_part('includes/section', 'singleoffercontact'); ?>

</section>