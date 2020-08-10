'use strict';

const click = (target, callback) => {
  target.addEventListener('click', (e) => {
    return callback(e)
  });
};

const hamburgerButton = document.querySelector('.hamburger-menu');
const mobileMenu = document.querySelector('.menu-main-menu-container');

const showMobileMenu = () => {
  mobileMenu.classList.toggle('visible');
};

const hamburgerActive = () => {
  hamburgerButton.classList.toggle('hamburger-active');
};

hamburgerButton.addEventListener('click', (e) => {
  showMobileMenu();
  hamburgerActive();
});
