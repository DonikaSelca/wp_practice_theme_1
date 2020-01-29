import $ from 'jquery';

// Toggles the open class when scrolling over anything jquery obhect with c-nav class that has class with children children.
$('.c-navigation').on('mouseenter', '.menu-item-has-children', (e) => {
// Checks if we are hovering on a child or parent element
  if(!$(e.currentTarget).parents('.sub-menu').length){
    $('.menu > .menu-item.open').find('>a>.menu-button').trigger('click');
  }
  $(e.currentTarget).addClass('open');
}).on('mouseleave', '.menu-item-has-children', (e) => {
  $(e.currentTarget).removeClass('open');
})

// Takes e.currentTarget(what was triggered/"this") {for screen reader}, and sets variables for it, as well as a tags(menu_link) and li tags(menu_item)
$('.c-navigation').on('click', '.menu .menu-button', (e)=>{
  e.preventDefault();
  e.stopPropagation();
  let menu_button = $(e.currentTarget);
  let menu_link = menu_button.parent();
  let menu_item = menu_link.parent();
  //Toggles the open class and arias to show or not show screen reader info
  if(menu_item.hasClass('open')){
    menu_item.add(menu_item.find('.menu-item.open')).removeClass('open');
    menu_link.add(menu_item.find('a')).attr('aria-expanded', 'false');
    menu_button.find('.menu-button-show').attr('aria-hidden', 'false');
    menu_button.find('.menu-button-hide').attr('aria-hidden', 'true');
  } else {
    // Checks to see if any other menus_items are open and toggles them closed by targeting the buttons of the menu_item
    // and triggering the click event all over again and setting buttons to closed. Saves retyping attributes.
    menu_item.siblings('.open').find('>a>.menu-button').trigger('click');
    menu_item.addClass('open');
    menu_link.attr('aria-expanded', 'true');
    menu_button.find('.menu-button-show').attr('aria-hidden', 'true');
    menu_button.find('.menu-button-hide').attr('aria-hidden', 'false');
  }
})

$(document).click((e)=>{
  if($('.menu-item.open').length) {
    $('.menu>.menu-item.open>a>.menu-button').trigger('click');
  }
})
