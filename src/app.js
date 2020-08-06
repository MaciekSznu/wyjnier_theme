'use strict';

// const clickPreventDefault = (target, callback) => {
//   target.addEventListener('click', (e) => {
//     e.preventDefault();
//     return callback(e)
//   });
// };

const click = (target, callback) => {
  target.addEventListener('click', (e) => {
    return callback(e)
  });
};

const hamburgerButton = document.querySelector('.hamburger-menu');
const mobileMenu = document.querySelector('.main-menu');

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
