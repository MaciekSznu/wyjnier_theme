<?php
    $query = new_offers_query()
?>

<section class='new-offers'>
  <h2 class='new-offers__title'>Najnowsze oferty</h2>
  <div class='new-offers__wrapper'>
  <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne');
        $summary = get_field('podsumowanie');
        $rooms = str_replace(' ', '', $summary['pokoje']);
        $property_name = $summary['nieruchomosc'];
        $short_property_name = explode(" ", $property_name)[0];
      ?>
    <div class='new-offers__single-offer'>
      <div class='new-offers__single-offer--image' style="background-image: url(<?php echo $main_image; ?>)"></div>
      <div class='new-offers__single-offer--description'>
        <div class='main-description'>
          <p class='main-description--city'><?php echo $summary['miasto'];?></p>
          <p class='main-description--price'><?php echo number_format($summary['cena'], 0, ',', ' ');?> zł</p>
        </div>
        <div class='additional-description'>
          <p class='additional-description--type'><?php echo $short_property_name;?></p>
          <?php if(!empty($rooms))
             echo
              "<div class='additional-description--rooms'>
                <span class='description-icon'></span>
                <span class='description-value'>" . $rooms . "</span>
              </div>"
          ?>
          <?php if(!empty($summary['lazienki']))
             echo
              "<div class='additional-description--bathrooms'>
                <span class='description-icon'></span>
                <span class='description-value'>" . $summary['lazienki'] . "</span>
              </div>";
          ?>
          <div class='additional-description--area'>
            <span class='description-icon'></span>
            <span class='description-value'><?php echo $summary['powierzchnia'];?> m<sup>2</sup></span>
          </div>
        </div>
        <div class='show-offer'>
          <a href="<?php the_permalink() ?>">zobacz</a>
        </div>
      </div>
    </div>
    <?php  endwhile;
      wp_reset_postdata();
    ?>
  </div>
</section>