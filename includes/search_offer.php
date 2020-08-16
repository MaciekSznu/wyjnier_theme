<?php

$is_search = count($_GET);

$types = get_terms([
  'taxonomy' => 'rodzaje',
  'hide_empty' => true,
]);

$transactions = get_terms([
  'taxonomy' => 'transakcje',
  'hide_empty' => true,
]);

?>

<section class='search'>
  <div class='search-wrapper'>
    <form class='search-form' action="<?php echo home_url('/oferty'); ?>">
      <div class='search-form-selects-wrapper'>
        <div class='single-select-wrapper'>
          <select class='search-form__property' name="rodzaj" id="property">
            <option class='search-form__property--item' value=''>Wybierz nieruchomość</option>
            <?php foreach($types as $type): ?>
            <option
            class='search-form__property--item'
              <?php if( isset($_GET['rodzaj']) && ($_GET['rodzaj'] == $type->slug) ): ?>
                  selected
                <?php endif; ?>
                value="<?php echo $type->slug;?>"><?php echo $type->name; ?></option>
            <?php endforeach; ?>
          </select>
          <div class='select-arrow'></div>
        </div>
        <div class='single-select-wrapper'>
          <select class='search-form__transaction' name="transakcja" id="transaction">
            <option class='search-form__transaction--item' value=''>Wybierz transakcję</option>
            <?php foreach($transactions as $transaction): ?>
            <option
            class='search-form__property--item'
              <?php if( isset($_GET['transakcja']) && ($_GET['transakcja'] == $transaction->slug) ): ?>
                  selected
                <?php endif; ?>
                value="<?php echo $transaction->slug;?>"><?php echo $transaction->name; ?></option>
            <?php endforeach; ?>
          </select>
        <div class='select-arrow'></div>
        </div>
      </div>
      <button class='search-form__button' type='submit'>
        <img class='search-form__button--icon'src="../wp-content/themes/wyjnier/images/icons/search.svg" alt="Search">
        szukaj
      </button>
    </form>
  </div>
</section>

<?php
    $query = search_query();
?>

<section class='investments'>
  <!-- <h2 class='investments__title'>Wyjątkowe nieruchomości w Krakowie</h2> -->
  <div class='investments__wrapper'>
  <?php if( $query->have_posts() ) :?>
    <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne');
        $summary = get_field('podsumowanie');
        $description = get_field('opis');
        $property = $description['nieruchomosc'];
        $main_image_src = wp_get_attachment_image_src( $main_image, 'offer-small' );
      ?>
    <div class='investments__single-offer'>
      <div class='investments__single-offer--image' style="background-image: url(<?php echo $main_image_src[0]; ?>)"></div>
      <div class='investments__single-offer--description'>
        <div class='main-description'>
          <p class='main-description--city'><?php echo $summary['miasto'];?></p>
          <p class='main-description--street'><?php echo $summary['ulica'];?></p>
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
          <div class='additional-description--price'>
            <span class='description-icon'></span>
            <span class='description-value'><?php echo number_format($summary['cena'], 0, ',', ' ');?> zł</span>
          </div>
        </div>
        <div class='long-description'>
          <p class='long-description--text'><?php echo $property['opis'];?></p>
          <!-- <p class='long-description--text'>W pobliżu znajdują się restauracje, puby, sklep spożywczy, piekarnię czy przystanki tramwajowe i autobusowe.</p>
          <p class='long-description--text'>Na dachu budynku do dyspozycji mieszkańców są dwa rozległe tarasy widokowe, z których można podziwiać panoramę Krakowa.</p> -->
        </div>
        <div class='show-offer'>
          <a href="<?php the_permalink() ?>">zobacz</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="pagination">
    <!-- pagination code -->
      <?php
        echo paginate_links( array(
          'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
          'total'        => $query->max_num_pages,
          'current'      => max( 1, get_query_var( 'paged' ) ),
          'format'       => '?paged=%#%',
          'show_all'     => false,
          'type'         => 'plain',
          'end_size'     => 2,
          'mid_size'     => 1,
          'prev_next'    => true,
          'prev_text'    => sprintf( '<i></i> %1$s', __( 'Prev', 'text-domain' ) ),
          'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
          'add_args'     => false,
          'add_fragment' => '',
        ) );
      ?>
    </div>

  <?php wp_reset_postdata(); ?>
  <?php else : ?>
    There are no results
  <?php endif; ?>
  </div>
</section>

