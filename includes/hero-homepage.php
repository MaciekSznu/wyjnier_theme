<section class='hero' id='section-hero'>

  <?php
    $main_image = get_field('zdjecie_glowne');
    $main_image_src = wp_get_attachment_image_src( $main_image, 'offer-large' );
    $summary = get_field('podsumowanie');
    $posts_id_array = array(69,77,78);
  ?>
  <?php
    foreach ( $posts_id_array as $post_id ) :
      echo "
        <div class='hero-image-wrapper'>
          <img class='hero-image' src=" . wp_get_attachment_image_src( get_field('zdjecie_glowne', $post_id), 'offer-large' )[0] . " alt='lalala'>
          <div class='hero-image-description-wrapper'>
            <div class='hero-image-description'>
              <p class='hero-image-description--city'>" . get_field('podsumowanie', $post_id)['miasto'] . " " . get_field('podsumowanie', $post_id)['ulica'] . "</p>
              <p class='hero-image-description--price'>" . number_format(get_field('podsumowanie', $post_id)['cena'], 2, ',', ' ') . " zł</p>
            </div>
          </div>
        </div>";
    endforeach;
  ?>
</section>