// TODO :: add arrow navigation

var BackgroundGallery = ( function ( $ ) {

  var _imgs, _slideIndex = 1;

  var init = () => {
    // console.log('INIT :: BG GALLERY');
    _selectEls();
    _startSlideshow();
  };

  var _selectEls = () => {
    _imgs = $( '.bg-gallery-img' );
  };

  var _startSlideshow = () => {
    _showImg( _slideIndex );
  };

  var _showImg = ( n ) => {
    var i, len = _imgs.length;
    for( i = 0; i < len; i++ ) {
      $( _imgs[ i ] ).removeClass( 'show' );
    }
    _slideIndex++;
    if( _slideIndex > _imgs.length ) { _slideIndex = 1; }
    $( _imgs[ _slideIndex - 1 ] ).addClass( 'show' );
    setTimeout( _showImg, 5000 );
  };

  module.exports = {
    init: init
  };

} )( jQuery );
