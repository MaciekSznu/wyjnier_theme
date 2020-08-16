'use strict';


const singleOfferSelector = document.querySelector('.single-offer-carousel');

const singleOfferSlider =
  new Siema({
    selector: singleOfferSelector,
    loop: true,
    perPage: {
      768: 2,
      1024: 3,
      1280: 4,
    },
    duration: 750,
    easing: 'ease-out',
  });

const prev = document.querySelector('.single-control-prev');
const next = document.querySelector('.single-control-next');
prev.addEventListener('click', () => singleOfferSlider.prev());
next.addEventListener('click', () => singleOfferSlider.next());

setInterval(() => {
  singleOfferSlider.next();
}, 4000);