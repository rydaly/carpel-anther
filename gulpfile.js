'use strict';

const dir = {
    src: 'source/',
    build: 'public/wp-content/themes/carpelanther/'
  },

  // Gulp and plugins
  gulp = require( 'gulp' ),
  gutil = require( 'gulp-util' ),
  newer = require( 'gulp-newer' ),
  imagemin = require( 'gulp-imagemin' ),
  sass = require( 'gulp-sass' ),
  postcss = require( 'gulp-postcss' ),
  deporder = require( 'gulp-deporder' ),
  concat = require( 'gulp-concat' ),
  stripdebug = require( 'gulp-strip-debug' ),
  uglify = require( 'gulp-uglify' ),
  browserify = require( 'browserify' ),
  babelify = require( 'babelify' ),
  source = require( 'vinyl-source-stream' ),
  sourcemaps = require('gulp-sourcemaps'),
  buffer = require( 'vinyl-buffer' );

// Browser-sync
var browsersync = false;

// PHP settings
const php = {
  src: dir.src + 'theme/**/*.php',
  build: dir.build
};

// copy PHP files
gulp.task( 'php', () => {
  return gulp.src( php.src )
    .pipe( newer( php.build ) )
    .pipe( gulp.dest( php.build ) )
    .pipe( browsersync ? browsersync.reload( { stream: true } ) : gutil.noop() );
} );

// image settings
const images = {
  src: dir.src + 'theme/images/**/*',
  build: dir.build + 'images/'
};

// image processing
gulp.task( 'images', () => {
  return gulp.src( images.src )
    .pipe( newer( images.build ) )
    .pipe( imagemin() )
    .pipe( gulp.dest( images.build ) );
} );

// CSS settings
var styles = {
  src: dir.src + 'theme/sass/style.scss',
  watch: dir.src + 'theme/sass/**/*',
  build: dir.build,
  sassOpts: {
    outputStyle: 'nested',
    imagePath: images.build,
    precision: 3,
    errLogToConsole: true
  },
  processors: [
    require( 'postcss-assets' )( {
      loadPaths: [ 'images/' ],
      basePath: dir.build,
      baseUrl: '/wp-content/themes/carpelanther/'
    } ),
    require( 'autoprefixer' )( {
      browsers: [ 'last 2 versions', '> 2%' ]
    } ),
    require( 'css-mqpacker' ),
    require( 'cssnano' )
  ]
};

// CSS processing
gulp.task( 'styles', [ 'images' ], () => {
  return gulp.src( styles.src )
    .pipe( sass( styles.sassOpts ) )
    .pipe( postcss( styles.processors ) )
    .pipe( gulp.dest( styles.build ) )
    .pipe( browsersync ? browsersync.reload( { stream: true } ) : gutil.noop() );
} );

// JavaScript settings
const js = {
  src: dir.src + 'theme/js/main.js',
  build: dir.build + 'js/',
  filename: 'main.js'
};

// JavaScript processing
gulp.task( 'js', () => {
  return browserify( { entries: [ js.src ] } )
    .transform( babelify )
    .bundle()
    .pipe( source( js.filename ) )
    .pipe( buffer() )
    // .pipe( stripdebug() )
    .pipe( sourcemaps.init({ loadMaps: true }) )
    .pipe( uglify() )
    .pipe( sourcemaps.write('./') )
    .pipe( gulp.dest( js.build ) )
    .pipe( browsersync ? browsersync.reload( { stream: true } ) : gutil.noop() );
} );

// Copy other files
const itemsToCopy = [
  // static theme files
  {
    src: [ dir.src + 'theme/screenshot.png' ],
    dest: dir.build
  },
  // static base files
  {
    src: [
      dir.src + 'humans.txt',
      dir.src + 'robots.txt',
      dir.src + 'wp-config.php',
      dir.src + '.htaccess'
    ],
    dest: 'public/'
  },
  // standalone js files
  {
    src: [ dir.src + 'theme/js/customizer.js' ],
    dest: dir.build + 'js/'
  },
  // fonts
  {
    src: [ dir.src + 'theme/fonts/**/*' ],
    dest: dir.build + 'fonts/'
  }
];

gulp.task( 'copy', () => {
  return itemsToCopy.forEach( ( obj ) => {
    return gulp.src( obj.src )
      .pipe( gulp.dest( obj.dest ) );
  } );
} );

// Browsersync options
const syncOpts = {
  host: 'localhost',
  port: 6789,
  proxy: {
    target: "carpelanther.dev"
  },
  open: true,
  notify: true,
  ghostMode: false,
  ui: false
};

// browser-sync
gulp.task( 'browsersync', () => {
  if( browsersync === false ) {
    browsersync = require( 'browser-sync' ).create();
    browsersync.init( syncOpts );
  }
} );

// watch for file changes
gulp.task( 'watch', [ 'browsersync' ], () => {
  // page changes
  gulp.watch( php.src, [ 'php' ], browsersync ? browsersync.reload() : {} );
  // image changes
  gulp.watch( images.src, [ 'images' ] );
  // CSS changes
  gulp.watch( styles.watch, [ 'styles' ] );
  // JavaScript main changes
  gulp.watch( js.src, [ 'js' ] );
} );

// run all tasks
gulp.task( 'build', [ 'copy', 'php', 'styles', 'js', 'images' ] );

// default task
gulp.task( 'default', [ 'build', 'watch' ] );
