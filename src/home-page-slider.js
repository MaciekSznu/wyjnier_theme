"use strict";

const mainPageSelector = document.querySelector(".hero-carousel");

let homePageSliderInterval = setInterval(() => {
  homePageSlider.next();
}, 3500);

const homePageSlider = new Siema({
  selector: mainPageSelector,
  loop: true,
  duration: 750,
  easing: "ease-out",
  onChange() {
    clearInterval(homePageSliderInterval);
    homePageSliderInterval = setInterval(() => homePageSlider.next(), 3500);
  },
});

const prev = document.querySelector(".hero-control-prev");
const next = document.querySelector(".hero-control-next");
prev.addEventListener("click", () => homePageSlider.prev());
next.addEventListener("click", () => homePageSlider.next());
