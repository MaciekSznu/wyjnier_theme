<footer class='contact-page-footer' id='section-contact'>
  <div class='contact-page-footer-wrapper'>
    <div class='contact-logo'>
      <img class='contact-logo--image' src="<?php bloginfo('template_url'); ?>/images/logos/white_logo_pl_500_140.svg" alt="Logo Wyjątkowe Nieruchomości">
    </div>
    <div class='contact-social'>
      <div class='contact-social--facebook'>
        <a class='contact-social--facebook--link' href='https://www.facebook.com/michal.bysiek' target='_blank' rel='noopener noreferrer'></a>
      </div>
      <div class='contact-social--phone'>
        <a class='contact-social--phone--link' href='tel:733-003-652'></a>
      </div>
      <div class='contact-social--instagram'>
        <a class='contact-social--instagram--link' href='https://www.instagram.com/michalbysiek' target='_blank' rel='noopener noreferrer'></a>
      </div>
    </div>
    <div class='contact-copyright'>
      <p class='contact-copyright--description'>Projekt i wykonanie <a class='contact-copyright--description-link' href='https://www.beeontheweb.pl' target='_blank' rel='noopener noreferrer'>BEEONTHEWEB</a></p>
      <p class='contact-copyright--description'>&#169; All rights reserved</p>
    </div>
  </div>
</footer>
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA3QLNwvqKmgX-zcRFCxLbBRn8SItRr7w&callback=initMap">
</script>
<?php wp_footer(); ?>

<script>
  // function initMap() {
  //   const office = { lat: 50.047606, lng: 19.954092 };
  //   const map = new google.maps.Map(document.querySelector('.contact-page__map'), {
  //     zoom: 15,
  //     center: office,
  //   });
  //   const marker = new google.maps.Marker({
  //     position: office,
  //     map: map,
  //     title: 'Wyjątkowe nieruchomości',
  //   });
  // }
</script>
</body>
</html>