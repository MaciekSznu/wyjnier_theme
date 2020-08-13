'use strict';

/* BASE FUNCTIONS */
const click = (target, callback) => {
  target.addEventListener('click', (e) => {
    return callback(e)
  });
};

const documentReady = (callbackFunc) => {
  if (document.readyState !== 'loading') {
    callbackFunc();
  } else if (document.addEventListener) {
    document.addEventListener('DOMContentLoaded', callbackFunc);
  } else {
    document.attachEvent('onreadystatechange', function () {
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

const isNameCorrect = () => {
  if (inputName.value.trim() == "") {
        inputName.placeholder = 'Proszę podać imię';
        inputName.classList.add('incorrect');
  };
}

const isEmailCorrect = () => {
  if (!emailRegEx.test(inputEmail.value)) {
        inputEmail.placeholder = 'Proszę podać poprawny adres email';
        inputEmail.classList.add('incorrect');
  };
}

const isPhoneCorrect = () => {
  if (!phoneRegEx.test(inputPhone.value)) {
        inputPhone.placeholder = 'Proszę podać poprawny nr telefonu';
        inputPhone.classList.add('incorrect');
  };
}

const isMessageCorrect = () => {
  if (inputMessage.value.trim() == "") {
        inputMessage.placeholder = 'Proszę uzupełnić treść wiadomości';
        inputMessage.classList.add('incorrect');
  };
}

const enableForm = () => {
  if (inputName.value.trim() !== ""
      && emailRegEx.test(inputEmail.value)
      && phoneRegEx.test(inputPhone.value)
      && inputMessage.value.trim() !== "") {
        submit.style.borderWidth = '2px';
        submit.disabled = false;
        return true;
      } else {
        submit.style.borderWidth = '1px';
        submit.disabled = true;
        return false;
      };
};

const formValidate = () => {
  if (mainContactForm) {
    mainContactForm.oninput = () => {
      enableForm();
    }
    mainContactForm.onsubmit = () => {
      isNameCorrect();
      isEmailCorrect();
      isPhoneCorrect();
      isMessageCorrect();
    }
  } else {
    null
  };
};

/* SLIDERS */
const singleOfferSelector = document.querySelector('.single-offer__gallery');
const width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
const mediaTabletPortraitWidth = 768;
const mediaTabletLandscapeWidth = 1024;
const mediaDesktopWidth = 1280;

const singleOfferSlider = () => {
  if (singleOfferSelector) {
    if (width < mediaTabletPortraitWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
      });
    } else if (width >= mediaTabletPortraitWidth && width <= mediaTabletLandscapeWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 2,
      });
    } else if (width > mediaTabletLandscapeWidth && width < mediaDesktopWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 3,
      });
    } else if (width >= mediaDesktopWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 4,
      });
    }
  } else {
    null
  };
};

const mainPageSelector = document.querySelector('.hero');

const homePageSlider = () => {
  if (mainPageSelector) {
    new Siema({
      selector: mainPageSelector,
      loop: true,
    });
  } else {
    null
  };
};

// autoplay - umieścić to w jakimś ifie
// setInterval(() => {
//   homePageSlider.next();
// }, 3000);
// setInterval(() => {
//   singleOfferSlider.next();
// }, 3000);

documentReady(homePageSlider, singleOfferSlider);

// dodać id ofert dla których ma się coś na home page wyświetlać
// dodać strzałki
// dodac pozycjonowanie obrazków
// dodać stylowanie obrazka na homepage - nie popsuć pozostałych hero
