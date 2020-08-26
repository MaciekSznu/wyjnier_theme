<?php
  $query = investments_query();
?>

<section class='investments'>
  <div class='investments__wrapper'>
    <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne_inv');
        $url = $main_image['url'];
        $summary = get_field('podsumowanie_inv');
        $description = get_field('opis_inv');
        $property = $description['nieruchomosc'];
      ?>
    <div class='investments__single-offer'>
      <div class='investments__single-offer--image' style="background-image: url(<?php echo esc_url($url); ?>)"></div>
      <div class='investments__single-offer--description'>
        <div class='main-description'>
          <p class='main-description--city'><?php echo $summary['miasto'];?></p>
          <p class='main-description--street'><?php echo $summary['dzielnica'];?></p>
        </div>
        <div class='additional-description'>
          <p class='additional-description--type'><?php echo $summary['nazwa_inwestycji'];?></p>
          <div class='additional-description--prices'>
            <span class='description'>Ceny</span>
            <span class='description-value'><?php echo number_format($summary['cena_min'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max'], 0, ',', ' ');?> zł</span>
          </div>
          <div class='additional-description--prices-m2'>
            <span class='description'>Ceny m2</span>
            <span class='description-value'><?php echo number_format($summary['cena_min_m2'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max_m2'], 0, ',', ' ');?> zł</span>
          </div>
          <div class='additional-description--areas'>
            <span class='description'>Powierzchnie</span>
            <span class='description-value'><?php echo $summary['powierzchnia_min'];?> - <?php echo $summary['powierzchnia_max'];?> m<sup>2</sup></span>
          </div>
        </div>
        <div class='long-description'>
          <p class='long-description--text'><?php echo $property['opis'];?></p>
        </div>
        <div class='show-offer'>
          <a href="<?php the_permalink() ?>">zobacz</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  </div>
</section>