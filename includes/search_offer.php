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
        <img class='search-form__button--icon' src="../wp-content/themes/wyjnier/images/icons/search.svg" alt="Search">
        szukaj
      </button>
    </form>
  </div>
</section>

<?php
    $query = search_query();
?>

<section class='investments'>
  <div class='investments__wrapper'>
  <?php if( $query->have_posts() ) :?>
    <?php while( $query->have_posts() ) : $query->the_post();?>
      <?php
        $main_image = get_field('zdjecie_glowne');
        $url = $main_image['url'];
        $summary = get_field('podsumowanie');
        $description = get_field('opis');
        $property = $description['nieruchomosc'];
      ?>
    <div class='investments__single-offer'>
      <div class='investments__single-offer--image' style="background-image: url(<?php echo esc_url($url); ?>)"></div>
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
        </div>
        <div class='show-offer'>
          <a href="<?php the_permalink() ?>">zobacz</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  <?php else : ?>
    W naszej bazie nie znaleźliśmy ofert jakich szukasz.
  <?php endif; ?>
  </div>
</section>
