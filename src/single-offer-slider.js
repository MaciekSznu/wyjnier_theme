'use strict';


const singleOfferSelector = document.querySelector('.single-offer-carousel');

const singleOfferSlider =
  new Siema({
    selector: singleOfferSelector,
    loop: true,
    perPage: {
      768: 2,
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
}, 3000);