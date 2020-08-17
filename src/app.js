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

/* FORM VALIDATION */
const inputName = document.querySelector('#input-name');
const inputEmail = document.querySelector('#input-email');
const inputPhone = document.querySelector('#input-phone');
const inputMessage = document.querySelector('#input-message');
const contactForm = document.querySelector('#contact-form');
const emailRegEx = /\S+@\S+\.\S+/;
const phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

contactForm.addEventListener('submit', (e) => {
  let errors = [];
  if (inputName.value.trim() == "" || inputName.value == null) {
    inputName.parentNode.classList.add('incorrect');
    errors.push('name error');
  } else {
    inputName.parentNode.classList.remove('incorrect');
  };
  if (!emailRegEx.test(inputEmail.value)) {
    inputEmail.parentNode.classList.add('incorrect');
    errors.push('mail error');
  } else {
    inputEmail.parentNode.classList.remove('incorrect');
  };
  if (!phoneRegEx.test(inputPhone.value)) {
    inputPhone.parentNode.classList.add('incorrect');
    errors.push('phone error');
  } else {
    inputPhone.parentNode.classList.remove('incorrect');
  };
  if (inputMessage.value.trim() == "" || inputMessage.value == null) {
    inputMessage.parentNode.classList.add('incorrect');
    errors.push('message error');
  } else {
    inputMessage.parentNode.classList.remove('incorrect');
  };
  if (errors.length > 0) {
    e.preventDefault();
  }
});

/* MAP */
function initMap() {
  const office = { lat: 50.047606, lng: 19.954092 };
  const map = new google.maps.Map(document.querySelector('.contact-page__map'), {
    zoom: 15,
    center: office,
  });
  const marker = new google.maps.Marker({
    position: office,
    map: map,
    title: 'Wyjątkowe nieruchomości',
  });
}

const displayMap = () => {
  const mapContainer = document.querySelector('.contact-page__map');
  mapContainer ? initMap() : null;
}

documentReady(displayMap);