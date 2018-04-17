require( './modules/navigation' );
require( './modules/skip-link-focus-fix' );
var BackgroundGallery = require( './modules/bgImageGallery' );

// var Nav = require( './modules/nav' );
// var MobileMenu = require( './modules/mobileMenu' );

jQuery( document ).ready( function ( $ ) {
  // Nav.init();
  // MobileMenu.init();
  BackgroundGallery.init();
} );
