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

//documentReady(homePageSlider, singleOfferSlider);
