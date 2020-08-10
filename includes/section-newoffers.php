<?php
    $query = new_offers_query()
?>

<section class='new-offers'>
  <h2 class='new-offers__title'>Najnowsze oferty</h2>
  <div class='new-offers__wrapper'>
  <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne');
        $main_image_src = wp_get_attachment_image_src( $main_image, 'offer-small' );
        $summary = get_field('podsumowanie');
      ?>
    <div class='new-offers__single-offer'>
      <div class='new-offers__single-offer--image' style="background-image: url(<?php echo $main_image_src[0]; ?>)"></div>
      <div class='new-offers__single-offer--description'>
        <div class='main-description'>
          <p class='main-description--city'><?php echo $summary['miasto'];?></p>
          <p class='main-description--price'><?php echo number_format($summary['cena'], 0, ',', ' ');?> zł</p>
        </div>
        <div class='additional-description'>
          <p class='additional-description--type'><?php echo $summary['nieruchomosc'];?></p>
          <?php if(substr($summary['pokoje'], 0, -7) > 0)
             echo
              "<div class='additional-description--rooms'>
                <span class='description-icon'></span>
                <span class='description-value'>" . substr($summary['pokoje'], 0, -7) . "</span>
              </div>"
          ?>
          <?php if($summary['lazienki'] > 0)
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
          <!-- <div class='additional-description--ground-area'>
            <span class='description-icon'></span>
            <span class='description-value'>1 500 m<sup>2</sup></span>
          </div> -->
        </div>
        <div class='show-offer'>
          <a href="./single-offer.html" target='_blank' rel='noopener noreferrer'>zobacz</a>
        </div>
      </div>
    </div>
    <?php  endwhile;
      wp_reset_postdata();
    ?>
  </div>
</section>