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
?>

<section class='single-offer'>
    <div class='single-offer__gallery'>
      <!-- <div class='single-offer__gallery--image'></div>
      <div class='single-offer__gallery--image'></div>
      <div class='single-offer__gallery--image'></div>
      <div class='single-offer__gallery--image'></div> -->
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
        <p class='single-offer__summary-data--rooms'><?php echo $summary['pokoje'];?></p>
        <p class='single-offer__summary-data--year'><?php echo $summary['rok_budowy'];?></p>
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
      <div class='single-offer__description--info'>
        <h3 class='title'><?php echo $information['tytul'];?></h3>
        <p class='description'><?php echo $information['opis'];?></p>
      </div>
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
    </div>

    <?php get_template_part('includes/section', 'singleoffercontact'); ?>

  </section>