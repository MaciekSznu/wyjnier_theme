<?php
  $query = investments_query();
?>

<?php
function cutstring($string, $delimeter) {
  if (mb_strlen($string) > $delimeter || $string == '')
  {
    $words = preg_split('/\s/', $string);
    $output = '';
    $i = 0;

    while (1)
    {
      $length = mb_strlen($output)+mb_strlen($words[$i]);
      if ($length > $delimeter)
      {
        break;
      }
      else {
        $output .= " " . $words[$i];
        $i++;
      }
    }
    $output .= " ...";
  }
  else {
    $output = $string;
  }
  return $output;
}
?>

<section class='investments'>
  <div class='investments__wrapper'>
    <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne_inv');
        $summary = get_field('podsumowanie_inv');
        $description = get_field('opis_inv');
      ?>
    <div class='investments__single-offer'>
      <div class='investments__single-offer--image' style="background-image: url(<?php echo $main_image; ?>)"></div>
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
            <span class='description'>Ceny m<sup>2</sup></span>
            <span class='description-value'><?php echo number_format($summary['cena_min_m2'], 0, ',', ' ');?> - <?php echo number_format($summary['cena_max_m2'], 0, ',', ' ');?> zł</span>
          </div>
          <div class='additional-description--areas'>
            <span class='description'>Powierzchnie</span>
            <span class='description-value'><?php echo str_replace(".", ",",$summary['powierzchnia_min']);?> - <?php echo str_replace(".", ",",$summary['powierzchnia_max']);?> m<sup>2</sup></span>
          </div>
        </div>
        <div class='long-description'>
          <p class='long-description--text'><?php echo cutstring($description, 360);?></p>
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