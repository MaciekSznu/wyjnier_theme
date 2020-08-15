/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

/* BASE FUNCTIONS */

var click = function click(target, callback) {
  target.addEventListener('click', function (e) {
    return callback(e);
  });
};

var documentReady = function documentReady(callbackFunc) {
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
};
/* BURGER MENU */


var hamburgerButton = document.querySelector('.hamburger-menu');
var mobileMenu = document.querySelector('.menu-main-menu-container');

var showMobileMenu = function showMobileMenu() {
  mobileMenu.classList.toggle('visible');
};

var hamburgerActive = function hamburgerActive() {
  hamburgerButton.classList.toggle('hamburger-active');
};

hamburgerButton.addEventListener('click', function (e) {
  showMobileMenu();
  hamburgerActive();
});
/* FORMM VALIDATION */

var inputName = document.querySelector('#input-name');
var inputEmail = document.querySelector('#input-email');
var inputPhone = document.querySelector('#input-phone');
var inputMessage = document.querySelector('#input-message');
var submit = document.querySelector('.contact-form--input-submit');
var mainContactForm = document.querySelector('#main-contact-form');
var emailRegEx = /\S+@\S+\.\S+/;
var phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

var isNameCorrect = function isNameCorrect() {
  if (inputName.value.trim() == "") {
    inputName.placeholder = 'Proszę podać imię';
    inputName.classList.add('incorrect');
  }

  ;
};

var isEmailCorrect = function isEmailCorrect() {
  if (!emailRegEx.test(inputEmail.value)) {
    inputEmail.placeholder = 'Proszę podać poprawny adres email';
    inputEmail.classList.add('incorrect');
  }

  ;
};

var isPhoneCorrect = function isPhoneCorrect() {
  if (!phoneRegEx.test(inputPhone.value)) {
    inputPhone.placeholder = 'Proszę podać poprawny nr telefonu';
    inputPhone.classList.add('incorrect');
  }

  ;
};

var isMessageCorrect = function isMessageCorrect() {
  if (inputMessage.value.trim() == "") {
    inputMessage.placeholder = 'Proszę uzupełnić treść wiadomości';
    inputMessage.classList.add('incorrect');
  }

  ;
};

var enableForm = function enableForm() {
  if (inputName.value.trim() !== "" && emailRegEx.test(inputEmail.value) && phoneRegEx.test(inputPhone.value) && inputMessage.value.trim() !== "") {
    submit.style.borderWidth = '2px';
    submit.disabled = false;
    return true;
  } else {
    submit.style.borderWidth = '1px';
    submit.disabled = true;
    return false;
  }

  ;
};

var formValidate = function formValidate() {
  if (mainContactForm) {
    mainContactForm.oninput = function () {
      enableForm();
    };

    mainContactForm.onsubmit = function () {
      isNameCorrect();
      isEmailCorrect();
      isPhoneCorrect();
      isMessageCorrect();
    };
  } else {
    null;
  }

  ;
};
/* SLIDERS */


var singleOfferSelector = document.querySelector('.single-offer__gallery');
var width = window.innerWidth > 0 ? window.innerWidth : screen.width;
var mediaTabletPortraitWidth = 768;
var mediaTabletLandscapeWidth = 1024;
var mediaDesktopWidth = 1280;

var singleOfferSlider = function singleOfferSlider() {
  if (singleOfferSelector) {
    if (width < mediaTabletPortraitWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true
      });
    } else if (width >= mediaTabletPortraitWidth && width <= mediaTabletLandscapeWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 2
      });
    } else if (width > mediaTabletLandscapeWidth && width < mediaDesktopWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 3
      });
    } else if (width >= mediaDesktopWidth) {
      new Siema({
        selector: singleOfferSelector,
        loop: true,
        perPage: 4
      });
    }
  } else {
    null;
  }

  ;
};

var mainPageSelector = document.querySelector('.hero');

var homePageSlider = function homePageSlider() {
  if (mainPageSelector) {
    new Siema({
      selector: mainPageSelector,
      loop: true
    });
  } else {
    null;
  }

  ;
}; // autoplay - umieścić to w jakimś ifie
// setInterval(() => {
//   homePageSlider.next();
// }, 3000);
// setInterval(() => {
//   singleOfferSlider.next();
// }, 3000);


documentReady(homePageSlider, singleOfferSlider); // dodać strzałki
// dodac pozycjonowanie obrazków
// poprawić pozycjonowanie obrazków na homepage - działa obecnie od 1280px

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************!*\
  !*** multi ./src/app.js ./src/app.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\bysiek\wordpress\wp-content\themes\wyjnier\src\app.js */"./src/app.js");
module.exports = __webpack_require__(/*! C:\Wordpress\Xampp\htdocs\bysiek\wordpress\wp-content\themes\wyjnier\src\app.scss */"./src/app.scss");


/***/ })

/******/ });