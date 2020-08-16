'use strict';

const mainPageSelector = document.querySelector('.hero-carousel');

const homePageSlider = new Siema({
        selector: mainPageSelector,
        loop: true,
        duration: 750,
        easing: 'ease-out',
      });

const prev = document.querySelector('.hero-control-prev');
const next = document.querySelector('.hero-control-next');
prev.addEventListener('click', () => homePageSlider.prev());
next.addEventListener('click', () => homePageSlider.next());

setInterval(() => {
  homePageSlider.next();
}, 4000);
