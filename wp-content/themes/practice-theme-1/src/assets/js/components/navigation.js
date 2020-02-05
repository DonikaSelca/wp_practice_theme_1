import $ from 'jquery';

// Toggles the open class when scrolling over any jquery object with c-nav class that has class with children.
// In es6 if you use arrow function as a callback for an event you can't use "this", must use e.currentTarget.
$('.c-navigation').on('mouseenter', '.menu-item-has-children', (e) => {
// Checks if we are hovering on a child or parent element and triggers click event to close other menus.
  if(!$(e.currentTarget).parents('.sub-menu').length){
    $('.menu > .menu-item.open').find('>a>.menu-button').trigger('click');
  }
  $(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', (e) => {
  $(e.currentTarget).removeClass('open');
})

// Takes e.currentTarget(what was triggered/"this") {for screen reader}, and sets variables for it, as well as a tags(menu_link) and li tags(menu_item)
$('.c-navigation').on('click', '.menu .menu-button', (e)=>{
  // prevents default behavior of browser on the event we clicked on. (In our case, clicking the button meant taking us to the page next to the button)
  e.preventDefault();
  // Needed bc of event bubbling. We are running this function and the one below at the same time. So when we click on a menu item we're also clicking on the document.
  // This avoids running the document.click event when we click a button.
  e.stopPropagation();
  // Thing that was clicked (icon/<button>)
  let menu_button = $(e.currentTarget);
  // Direct parent of button (Title/<a> tag)
  let menu_link = menu_button.parent();
  // Direct parent of <a> tag (Entire <li>)
  let menu_item = menu_link.parent();
  //Toggles the open class and arias to show or not show screen reader info
  if(menu_item.hasClass('open')){
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
})

// Closes any open nav menus when someone clicks outside menu by triggering the click event that closes a menu
$(document).click((e)=>{
  // If we have any length greater than zero then there is a menu open and we should trigger click event to close it.
  if($('.menu-item.open').length) {
    $('.menu>.menu-item.open>a>.menu-button').trigger('click');
  }
})
