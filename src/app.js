'use strict';

const click = (target, callback) => {
  target.addEventListener('click', (e) => {
    return callback(e)
  });
};

const documentReady = (callbackFunc) => {
  if (document.readyState !== 'loading') {
    // Document is already ready, call the callback directly
    callbackFunc();
  } else if (document.addEventListener) {
    // All modern browsers to register DOMContentLoaded
    document.addEventListener('DOMContentLoaded', callbackFunc);
  } else {
    // Old IE browsers
    document.attachEvent('onreadystatechange', function() {
      if (document.readyState === 'complete') {
        callbackFunc();
      }
    });
  }
}



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
const phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

// mainContactForm.onsubmit = () => {
//   if (inputName.value.trim() == "") {
//     inputName.placeholder = 'Proszę podać imię';
//     inputName.classList.add('incorrect');
//   };
//   if (!emailRegEx.test(inputEmail.value)) {
//     inputEmail.placeholder = 'Proszę podać poprawny adres email';
//     inputEmail.classList.add('incorrect');
//   };
//   if (!phoneRegEx.test(inputPhone.value)) {
//     inputPhone.placeholder = 'Proszę podać poprawny nr telefonu';
//     inputPhone.classList.add('incorrect');
//   };
//   if (inputMessage.value.trim() == "") {
//     inputMessage.placeholder = 'Proszę uzupełnić treść wiadomości';
//     inputMessage.classList.add('incorrect');
//   };
//   if (inputName.value.trim() !== "" && emailRegEx.test(inputEmail.value) && phoneRegEx.test(inputPhone.value) && inputMessage.value.trim() !== "") {
//     return true;
//   } else {
//     return false;
//   }
// };

// mainContactForm.oninput = () => {
//   if (inputName.value.trim() !== "" && emailRegEx.test(inputEmail.value) && phoneRegEx.test(inputPhone.value) && inputMessage.value.trim() !== "") {
//     submit.style.borderWidth = '2px';
//   } else {
//     submit.style.borderWidth = '1px';
//   }
// };

/* SLIDERS */
const singleOfferSelector = document.querySelector('.single-offer__gallery');
const width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
const mediaTabletPortraitWidth = 768;
const mediaTabletLandscapeWidth = 1024;

const singleOfferSlider = () => {
  if (singleOfferSelector) {
    if (width < mediaTabletPortraitWidth) {
      new Siema({
        selector: '.single-offer__gallery',
        loop: true,
      });
    } else if (width >= mediaTabletPortraitWidth && width <= mediaTabletLandscapeWidth) {
      new Siema({
        selector: '.single-offer__gallery',
        loop: true,
        perPage: 2,
      });
    } else if (width > mediaTabletLandscapeWidth && width <= 1280) {
      new Siema({
        selector: '.single-offer__gallery',
        loop: true,
        perPage: 3,
      });
    } else if (width > 1280) {
      new Siema({
        selector: '.single-offer__gallery',
        loop: true,
        perPage: 4,
      });
    }
  } else {null};
}

documentReady(singleOfferSlider);
