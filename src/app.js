'use strict';

/* BASE FUNCTIONS */
const click = (target, callback) => {
  target.addEventListener('click', (e) => {
    return callback(e)
  });
};

/* BURGER MENU */
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

// COOKIE BANNER
const cookieBanner = document.querySelector('.cookie-banner');
const closeButton = document.querySelector('.close');

if (localStorage.getItem('cookieSeen') != 'shown') {
  cookieBanner.classList.remove('hidden');
  localStorage.setItem('cookieSeen', 'shown');
}

closeButton.addEventListener('click', (e) => {
  cookieBanner.classList.add('hidden');
});
