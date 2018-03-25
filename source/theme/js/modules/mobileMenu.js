var MobileMenu = ( function ($) {

  var _toggleBtn;
  var _hamburg;
  var _menu;

  var init = function () {
    console.log('INIT MOBILE MENU');
    _selectEls();
    _addListeners();
  };

  var _selectEls = function() {
    _toggleBtn = $('.mobile-menu-toggle');
    _hamburg = $('.hamburger');
    _menu = $('.mobile-menu');
  };

  var _addListeners = function() {
    _toggleBtn.on('click', function() {
      _hamburg.toggleClass('expanded');
      if(_menu.hasClass('menu-hide')) {
        _menu.css({'height': 'auto'});
        _menu.removeClass('menu-hide').addClass('menu-show');
      } else {
        _menu.addClass('menu-hide').removeClass('menu-show');
        setTimeout(function() {
          _menu.css({'height': 0});
        }, 250);
      }
    });
  };

  module.exports = {
    init: init
  };

})(jQuery);
