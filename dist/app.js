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
var contactForm = document.querySelector('#contact-form');
var emailRegEx = /\S+@\S+\.\S+/;
var phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;
contactForm.addEventListener('submit', function (e) {
  var errors = [];

  if (inputName.value.trim() == "" || inputName.value == null) {
    inputName.parentNode.classList.add('incorrect');
    errors.push('name error');
  } else {
    inputName.parentNode.classList.remove('incorrect');
  }

  ;

  if (!emailRegEx.test(inputEmail.value)) {
    inputEmail.parentNode.classList.add('incorrect');
    errors.push('mail error');
  } else {
    inputEmail.parentNode.classList.remove('incorrect');
  }

  ;

  if (!phoneRegEx.test(inputPhone.value)) {
    inputPhone.parentNode.classList.add('incorrect');
    errors.push('phone error');
  } else {
    inputPhone.parentNode.classList.remove('incorrect');
  }

  ;

  if (inputMessage.value.trim() == "" || inputMessage.value == null) {
    inputMessage.parentNode.classList.add('incorrect');
    errors.push('message error');
  } else {
    inputMessage.parentNode.classList.remove('incorrect');
  }

  ;

  if (errors.length > 0) {
    e.preventDefault();
  }
});

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