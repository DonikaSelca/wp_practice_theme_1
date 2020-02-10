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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/js/bundle.js":
/*!*********************************!*\
  !*** ./src/assets/js/bundle.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/slider */ "./src/assets/js/components/slider.js");
/* harmony import */ var _components_slider__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_slider__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/navigation */ "./src/assets/js/components/navigation.js");
// Module Bundling




/***/ }),

/***/ "./src/assets/js/components/navigation.js":
/*!************************************************!*\
  !*** ./src/assets/js/components/navigation.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
 // Toggles the open class when scrolling over any jquery object with c-nav class that has class with children.
// In es6 if you use arrow function as a callback for an event you can't use "this", must use e.currentTarget.

jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-navigation').on('mouseenter', '.menu-item-has-children', function (e) {
  // Checks if we are hovering on a child or parent element and triggers click event to close other menus.
  if (!jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.currentTarget).parents('.sub-menu').length) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu > .menu-item.open').find('>a>.menu-button').trigger('click');
  }

  jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', function (e) {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.currentTarget).removeClass('open');
}); // Takes e.currentTarget(what was triggered/"this") {for screen reader}, and sets variables for it, as well as a tags(menu_link) and li tags(menu_item)

jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-navigation').on('click', '.menu .menu-button', function (e) {
  // prevents default behavior of browser on the event we clicked on. (In our case, clicking the button meant taking us to the page next to the button)
  e.preventDefault(); // Needed bc of event bubbling. We are running this function and the one below at the same time. So when we click on a menu item we're also clicking on the document.
  // This avoids running the document.click event when we click a button.

  e.stopPropagation(); // Thing that was clicked (icon/<button>)

  var menu_button = jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.currentTarget); // Direct parent of button (Title/<a> tag)

  var menu_link = menu_button.parent(); // Direct parent of <a> tag (Entire <li>)

  var menu_item = menu_link.parent(); //Toggles the open class and arias to show or not show screen reader info

  if (menu_item.hasClass('open')) {
    // Looks for menu_item and adds another element of menu_item through .find() and finds any menu_item with a class of .menu-item.open and removes the open class.
    // This closes submenus of the menu_item when we close the parent menu_item while also finding child <a> tags and toggling the attributes.
    menu_item.add(menu_item.find('.menu-item.open')).removeClass('open');
    menu_link.add(menu_item.find('a')).attr('aria-expanded', 'false');
    menu_button.find('.menu-button-show').attr('aria-hidden', 'false');
    menu_button.find('.menu-button-hide').attr('aria-hidden', 'true');
  } else {
    // Checks to see if any sibling menus_items are open and toggles them closed by targeting the buttons of the menu_item
    // and triggering the click event all over again and setting buttons to closed. Saves retyping attributes.
    menu_item.siblings('.open').find('>a>.menu-button').trigger('click');
    menu_item.addClass('open');
    menu_link.attr('aria-expanded', 'true');
    menu_button.find('.menu-button-show').attr('aria-hidden', 'true');
    menu_button.find('.menu-button-hide').attr('aria-hidden', 'false');
  }
}); // Closes any open nav menus when someone clicks outside menu by triggering the click event that closes a menu

jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).click(function (e) {
  // If we have any length greater than zero then there is a menu open and we should trigger click event to close it.
  if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu-item.open').length) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.menu>.menu-item.open>a>.menu-button').trigger('click');
  }
});

/***/ }),

/***/ "./src/assets/js/components/slider.js":
/*!********************************************!*\
  !*** ./src/assets/js/components/slider.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

console.log('donika 2');

/***/ }),

/***/ 0:
/*!***************************************!*\
  !*** multi ./src/assets/js/bundle.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/practice-theme-1/wp-content/themes/practice-theme-1/src/assets/js/bundle.js */"./src/assets/js/bundle.js");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9idW5kbGUuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9jb21wb25lbnRzL25hdmlnYXRpb24uanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9jb21wb25lbnRzL3NsaWRlci5qcyIsIndlYnBhY2s6Ly8vZXh0ZXJuYWwgXCJqUXVlcnlcIiJdLCJuYW1lcyI6WyIkIiwib24iLCJlIiwiY3VycmVudFRhcmdldCIsInBhcmVudHMiLCJsZW5ndGgiLCJmaW5kIiwidHJpZ2dlciIsImFkZENsYXNzIiwicmVtb3ZlQ2xhc3MiLCJwcmV2ZW50RGVmYXVsdCIsInN0b3BQcm9wYWdhdGlvbiIsIm1lbnVfYnV0dG9uIiwibWVudV9saW5rIiwicGFyZW50IiwibWVudV9pdGVtIiwiaGFzQ2xhc3MiLCJhZGQiLCJhdHRyIiwic2libGluZ3MiLCJkb2N1bWVudCIsImNsaWNrIiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6IjtRQUFBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTtRQUNBOzs7UUFHQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTtRQUNBO1FBQ0EsMENBQTBDLGdDQUFnQztRQUMxRTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBLHdEQUF3RCxrQkFBa0I7UUFDMUU7UUFDQSxpREFBaUQsY0FBYztRQUMvRDs7UUFFQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0EseUNBQXlDLGlDQUFpQztRQUMxRSxnSEFBZ0gsbUJBQW1CLEVBQUU7UUFDckk7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQSwyQkFBMkIsMEJBQTBCLEVBQUU7UUFDdkQsaUNB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bkIsQ0FBRCxFQUFLO0FBQ3JCO0FBQ0EsTUFBR0YsNkNBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCSyxNQUF4QixFQUFnQztBQUM5QkwsaURBQUMsQ0FBQyxzQ0FBRCxDQUFELENBQTBDTyxPQUExQyxDQUFrRCxPQUFsRDtBQUNEO0FBQ0YsQ0FMRCxFOzs7Ozs7Ozs7OztBQy9DQWUsT0FBTyxDQUFDQyxHQUFSLENBQVksVUFBWixFOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ0FBLHdCIiwiZmlsZSI6ImJ1bmRsZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGdldHRlciB9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yID0gZnVuY3Rpb24oZXhwb3J0cykge1xuIFx0XHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcbiBcdFx0fVxuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xuIFx0fTtcblxuIFx0Ly8gY3JlYXRlIGEgZmFrZSBuYW1lc3BhY2Ugb2JqZWN0XG4gXHQvLyBtb2RlICYgMTogdmFsdWUgaXMgYSBtb2R1bGUgaWQsIHJlcXVpcmUgaXRcbiBcdC8vIG1vZGUgJiAyOiBtZXJnZSBhbGwgcHJvcGVydGllcyBvZiB2YWx1ZSBpbnRvIHRoZSBuc1xuIFx0Ly8gbW9kZSAmIDQ6IHJldHVybiB2YWx1ZSB3aGVuIGFscmVhZHkgbnMgb2JqZWN0XG4gXHQvLyBtb2RlICYgOHwxOiBiZWhhdmUgbGlrZSByZXF1aXJlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnQgPSBmdW5jdGlvbih2YWx1ZSwgbW9kZSkge1xuIFx0XHRpZihtb2RlICYgMSkgdmFsdWUgPSBfX3dlYnBhY2tfcmVxdWlyZV9fKHZhbHVlKTtcbiBcdFx0aWYobW9kZSAmIDgpIHJldHVybiB2YWx1ZTtcbiBcdFx0aWYoKG1vZGUgJiA0KSAmJiB0eXBlb2YgdmFsdWUgPT09ICdvYmplY3QnICYmIHZhbHVlICYmIHZhbHVlLl9fZXNNb2R1bGUpIHJldHVybiB2YWx1ZTtcbiBcdFx0dmFyIG5zID0gT2JqZWN0LmNyZWF0ZShudWxsKTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yKG5zKTtcbiBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KG5zLCAnZGVmYXVsdCcsIHsgZW51bWVyYWJsZTogdHJ1ZSwgdmFsdWU6IHZhbHVlIH0pO1xuIFx0XHRpZihtb2RlICYgMiAmJiB0eXBlb2YgdmFsdWUgIT0gJ3N0cmluZycpIGZvcih2YXIga2V5IGluIHZhbHVlKSBfX3dlYnBhY2tfcmVxdWlyZV9fLmQobnMsIGtleSwgZnVuY3Rpb24oa2V5KSB7IHJldHVybiB2YWx1ZVtrZXldOyB9LmJpbmQobnVsbCwga2V5KSk7XG4gXHRcdHJldHVybiBucztcbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAwKTtcbiIsIi8vIE1vZHVsZSBCdW5kbGluZ1xuaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcbmltcG9ydCAnLi9jb21wb25lbnRzL3NsaWRlcic7XG5pbXBvcnQgJy4vY29tcG9uZW50cy9uYXZpZ2F0aW9uJztcbiIsImltcG9ydCAkIGZyb20gJ2pxdWVyeSc7XG5cbi8vIFRvZ2dsZXMgdGhlIG9wZW4gY2xhc3Mgd2hlbiBzY3JvbGxpbmcgb3ZlciBhbnkganF1ZXJ5IG9iamVjdCB3aXRoIGMtbmF2IGNsYXNzIHRoYXQgaGFzIGNsYXNzIHdpdGggY2hpbGRyZW4uXG4vLyBJbiBlczYgaWYgeW91IHVzZSBhcnJvdyBmdW5jdGlvbiBhcyBhIGNhbGxiYWNrIGZvciBhbiBldmVudCB5b3UgY2FuJ3QgdXNlIFwidGhpc1wiLCBtdXN0IHVzZSBlLmN1cnJlbnRUYXJnZXQuXG4kKCcuYy1uYXZpZ2F0aW9uJykub24oJ21vdXNlZW50ZXInLCAnLm1lbnUtaXRlbS1oYXMtY2hpbGRyZW4nLCAoZSkgPT4ge1xuLy8gQ2hlY2tzIGlmIHdlIGFyZSBob3ZlcmluZyBvbiBhIGNoaWxkIG9yIHBhcmVudCBlbGVtZW50IGFuZCB0cmlnZ2VycyBjbGljayBldmVudCB0byBjbG9zZSBvdGhlciBtZW51cy5cbiAgaWYoISQoZS5jdXJyZW50VGFyZ2V0KS5wYXJlbnRzKCcuc3ViLW1lbnUnKS5sZW5ndGgpe1xuICAgICQoJy5tZW51ID4gLm1lbnUtaXRlbS5vcGVuJykuZmluZCgnPmE+Lm1lbnUtYnV0dG9uJykudHJpZ2dlcignY2xpY2snKTtcbiAgfVxuICAkKGUuY3VycmVudFRhcmdldCkuYWRkQ2xhc3MoJ29wZW4nKTtcbn0pLm9uKCdtb3VzZWxlYXZlJywgJy5tZW51LWl0ZW0taGFzLWNoaWxkcmVuJywgKGUpID0+IHtcbiAgJChlLmN1cnJlbnRUYXJnZXQpLnJlbW92ZUNsYXNzKCdvcGVuJyk7XG59KVxuXG4vLyBUYWtlcyBlLmN1cnJlbnRUYXJnZXQod2hhdCB3YXMgdHJpZ2dlcmVkL1widGhpc1wiKSB7Zm9yIHNjcmVlbiByZWFkZXJ9LCBhbmQgc2V0cyB2YXJpYWJsZXMgZm9yIGl0LCBhcyB3ZWxsIGFzIGEgdGFncyhtZW51X2xpbmspIGFuZCBsaSB0YWdzKG1lbnVfaXRlbSlcbiQoJy5jLW5hdmlnYXRpb24nKS5vbignY2xpY2snLCAnLm1lbnUgLm1lbnUtYnV0dG9uJywgKGUpPT57XG4gIC8vIHByZXZlbnRzIGRlZmF1bHQgYmVoYXZpb3Igb2YgYnJvd3NlciBvbiB0aGUgZXZlbnQgd2UgY2xpY2tlZCBvbi4gKEluIG91ciBjYXNlLCBjbGlja2luZyB0aGUgYnV0dG9uIG1lYW50IHRha2luZyB1cyB0byB0aGUgcGFnZSBuZXh0IHRvIHRoZSBidXR0b24pXG4gIGUucHJldmVudERlZmF1bHQoKTtcbiAgLy8gTmVlZGVkIGJjIG9mIGV2ZW50IGJ1YmJsaW5nLiBXZSBhcmUgcnVubmluZyB0aGlzIGZ1bmN0aW9uIGFuZCB0aGUgb25lIGJlbG93IGF0IHRoZSBzYW1lIHRpbWUuIFNvIHdoZW4gd2UgY2xpY2sgb24gYSBtZW51IGl0ZW0gd2UncmUgYWxzbyBjbGlja2luZyBvbiB0aGUgZG9jdW1lbnQuXG4gIC8vIFRoaXMgYXZvaWRzIHJ1bm5pbmcgdGhlIGRvY3VtZW50LmNsaWNrIGV2ZW50IHdoZW4gd2UgY2xpY2sgYSBidXR0b24uXG4gIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gIC8vIFRoaW5nIHRoYXQgd2FzIGNsaWNrZWQgKGljb24vPGJ1dHRvbj4pXG4gIGxldCBtZW51X2J1dHRvbiA9ICQoZS5jdXJyZW50VGFyZ2V0KTtcbiAgLy8gRGlyZWN0IHBhcmVudCBvZiBidXR0b24gKFRpdGxlLzxhPiB0YWcpXG4gIGxldCBtZW51X2xpbmsgPSBtZW51X2J1dHRvbi5wYXJlbnQoKTtcbiAgLy8gRGlyZWN0IHBhcmVudCBvZiA8YT4gdGFnIChFbnRpcmUgPGxpPilcbiAgbGV0IG1lbnVfaXRlbSA9IG1lbnVfbGluay5wYXJlbnQoKTtcbiAgLy9Ub2dnbGVzIHRoZSBvcGVuIGNsYXNzIGFuZCBhcmlhcyB0byBzaG93IG9yIG5vdCBzaG93IHNjcmVlbiByZWFkZXIgaW5mb1xuICBpZihtZW51X2l0ZW0uaGFzQ2xhc3MoJ29wZW4nKSl7XG4gICAgLy8gTG9va3MgZm9yIG1lbnVfaXRlbSBhbmQgYWRkcyBhbm90aGVyIGVsZW1lbnQgb2YgbWVudV9pdGVtIHRocm91Z2ggLmZpbmQoKSBhbmQgZmluZHMgYW55IG1lbnVfaXRlbSB3aXRoIGEgY2xhc3Mgb2YgLm1lbnUtaXRlbS5vcGVuIGFuZCByZW1vdmVzIHRoZSBvcGVuIGNsYXNzLlxuICAgIC8vIFRoaXMgY2xvc2VzIHN1Ym1lbnVzIG9mIHRoZSBtZW51X2l0ZW0gd2hlbiB3ZSBjbG9zZSB0aGUgcGFyZW50IG1lbnVfaXRlbSB3aGlsZSBhbHNvIGZpbmRpbmcgY2hpbGQgPGE+IHRhZ3MgYW5kIHRvZ2dsaW5nIHRoZSBhdHRyaWJ1dGVzLlxuICAgIG1lbnVfaXRlbS5hZGQobWVudV9pdGVtLmZpbmQoJy5tZW51LWl0ZW0ub3BlbicpKS5yZW1vdmVDbGFzcygnb3BlbicpO1xuICAgIG1lbnVfbGluay5hZGQobWVudV9pdGVtLmZpbmQoJ2EnKSkuYXR0cignYXJpYS1leHBhbmRlZCcsICdmYWxzZScpO1xuICAgIG1lbnVfYnV0dG9uLmZpbmQoJy5tZW51LWJ1dHRvbi1zaG93JykuYXR0cignYXJpYS1oaWRkZW4nLCAnZmFsc2UnKTtcbiAgICBtZW51X2J1dHRvbi5maW5kKCcubWVudS1idXR0b24taGlkZScpLmF0dHIoJ2FyaWEtaGlkZGVuJywgJ3RydWUnKTtcbiAgfSBlbHNlIHtcbiAgICAvLyBDaGVja3MgdG8gc2VlIGlmIGFueSBzaWJsaW5nIG1lbnVzX2l0ZW1zIGFyZSBvcGVuIGFuZCB0b2dnbGVzIHRoZW0gY2xvc2VkIGJ5IHRhcmdldGluZyB0aGUgYnV0dG9ucyBvZiB0aGUgbWVudV9pdGVtXG4gICAgLy8gYW5kIHRyaWdnZXJpbmcgdGhlIGNsaWNrIGV2ZW50IGFsbCBvdmVyIGFnYWluIGFuZCBzZXR0aW5nIGJ1dHRvbnMgdG8gY2xvc2VkLiBTYXZlcyByZXR5cGluZyBhdHRyaWJ1dGVzLlxuICAgIG1lbnVfaXRlbS5zaWJsaW5ncygnLm9wZW4nKS5maW5kKCc+YT4ubWVudS1idXR0b24nKS50cmlnZ2VyKCdjbGljaycpO1xuICAgIG1lbnVfaXRlbS5hZGRDbGFzcygnb3BlbicpO1xuICAgIG1lbnVfbGluay5hdHRyKCdhcmlhLWV4cGFuZGVkJywgJ3RydWUnKTtcbiAgICBtZW51X2J1dHRvbi5maW5kKCcubWVudS1idXR0b24tc2hvdycpLmF0dHIoJ2FyaWEtaGlkZGVuJywgJ3RydWUnKTtcbiAgICBtZW51X2J1dHRvbi5maW5kKCcubWVudS1idXR0b24taGlkZScpLmF0dHIoJ2FyaWEtaGlkZGVuJywgJ2ZhbHNlJyk7XG4gIH1cbn0pXG5cbi8vIENsb3NlcyBhbnkgb3BlbiBuYXYgbWVudXMgd2hlbiBzb21lb25lIGNsaWNrcyBvdXRzaWRlIG1lbnUgYnkgdHJpZ2dlcmluZyB0aGUgY2xpY2sgZXZlbnQgdGhhdCBjbG9zZXMgYSBtZW51XG4kKGRvY3VtZW50KS5jbGljaygoZSk9PntcbiAgLy8gSWYgd2UgaGF2ZSBhbnkgbGVuZ3RoIGdyZWF0ZXIgdGhhbiB6ZXJvIHRoZW4gdGhlcmUgaXMgYSBtZW51IG9wZW4gYW5kIHdlIHNob3VsZCB0cmlnZ2VyIGNsaWNrIGV2ZW50IHRvIGNsb3NlIGl0LlxuICBpZigkKCcubWVudS1pdGVtLm9wZW4nKS5sZW5ndGgpIHtcbiAgICAkKCcubWVudT4ubWVudS1pdGVtLm9wZW4+YT4ubWVudS1idXR0b24nKS50cmlnZ2VyKCdjbGljaycpO1xuICB9XG59KVxuIiwiY29uc29sZS5sb2coJ2RvbmlrYSAyJyk7XG4iLCJtb2R1bGUuZXhwb3J0cyA9IGpRdWVyeTsiXSwic291cmNlUm9vdCI6IiJ9