'use strict';

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

/* FORMM VALIDATION */
const inputName = document.querySelector('#input-name');
const inputEmail = document.querySelector('#input-email');
const inputPhone = document.querySelector('#input-phone');
const inputMessage = document.querySelector('#input-message');
const submit = document.querySelector('.contact-form--input-submit');
const mainContactForm = document.querySelector('#main-contact-form');
const emailRegEx = /\S+@\S+\.\S+/;
const phoneRegex = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

// mainContactForm.addEventListener('input', () => {
//   checkInputs();
// });

// const checkInputs = () => {
//   if (inputName.value.trim() !== "" && emailRegEx.test(inputEmail.value) && inputMessage.value.trim() !== "") {
//     submit.style.borderWidth = '2px';
//     submit.disabled = false;
//   } else {
//     submit.style.borderWidth = '1px';
//     submit.disabled = true;
//   }
// }

mainContactForm.onsubmit = () => {
  if (inputName.value.trim() !== "" && emailRegEx.test(inputEmail.value) && phoneRegEx.test(inputPhone.value) && inputMessage.value.trim() !== "") {
    submit.style.borderWidth = '2px';
    return true;
  } else {
    submit.style.borderWidth = '1px';
    return false;
  }
  // ify dla każdego pola ze amianą treści paceholdera jesli jest nie wypełnione lub niepoiprawnie wypełnione
}