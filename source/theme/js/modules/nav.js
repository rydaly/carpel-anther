var Nav = ( function ( $ ) {

  var _triggerPoint = 200;
  var _delta = 40;
  var _userScrolled = false;
  var _domEls = {};
  var _prevScroll = 0;
  var _curScroll = 0;

  $( window ).scroll( function () {
    _userScrolled = true;
  } );

  var init = function () {
    console.log('INIT NAV');
    _selectEls();
    _addListeners();
  };

  var _selectEls = function () {
    _domEls.headerGhost = $( 'header.ghost' );
    _domEls.headerEl = $( 'header.primary' );
    _domEls.searchBar = $( 'header.primary' ).find( '.search-bar' );
  };

  var _addListeners = function () {
    setInterval( function () {
      if( _userScrolled ) {
        _checkScroll();
        _userScrolled = false;
      }
    }, 50 );
  };

  var _checkScroll = function () {
    _curScroll = $( window ).scrollTop();

    // be sure they've scrolled more than delta before showing / hiding
    if( Math.abs( _prevScroll - _curScroll ) <= _delta ) {
      return;
    }

    if( _curScroll > _triggerPoint && _curScroll >= _prevScroll ) {
      _domEls.headerEl.addClass( 'collapsed' );
      _domEls.headerGhost.addClass( 'collapsed' );
    } else {
      _domEls.headerEl.removeClass( 'collapsed' );
      _domEls.headerGhost.removeClass( 'collapsed' );
    }

    _prevScroll = _curScroll;
  };

  module.exports = {
    init: init
  };

} )( jQuery );
