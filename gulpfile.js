var gulp         = require('gulp')
  , concat       = require('gulp-concat')
  , watch        = require('gulp-watch')
  , uglify       = require('gulp-uglify')
  , minifyCSS    = require('gulp-minify-css')
  , sass         = require('gulp-sass')
  , livereload   = require('gulp-livereload')
  , plumber      = require('gulp-plumber')
  , gutil        = require('gulp-util')
  , autoprefixer = require('gulp-autoprefixer')
  , server;


/**
 * Paths
 */

var paths = {
  styles: {
    base: './path/to/style/base',
    dest: './path/to/style/dest'
  },
  scripts: {
    base: './path/to/script/base',
    dest: './path/to/script/dest',
  }
}


/**
 * CONCAT
 */

var css = [
  paths.styles.base + '/mixins.scss',
  paths.styles.base + '/*.scss',
];

var js = [
  paths.scripts.base + '/libs/*.js',
  paths.scripts.base + '/modules/*.js',
  paths.scripts.base + '/snippets/*.js'
];


/**
 * Error handling
 */

var onError = function (err) {  
  gutil.beep();
  gutil.log(gutil.colors.white(err.plugin), gutil.colors.red(err.message));
};


/**
 * CSS
 */

gulp.task('styles', function() {

  gulp.src(css)
    .pipe(concat("style.css"))
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sass())
    .pipe(autoprefixer("last 1 version", "> 1%", "ie 8", "ie 7"))
    .pipe(minifyCSS())
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(livereload());

});


/**
 * JS
 */

gulp.task('scripts', function() {

  gulp.src(js)
    .pipe(concat('compiled.js'))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(livereload());

});


/**
 * Watch
 */

gulp.task('watch', function(){

  gulp.watch(paths.styles.base + '/*.scss', ['styles']);
  gulp.watch(paths.scripts.base + '/**/*.js', ['scripts']);

});


/**
 * Default
 */

gulp.task('default', function() {

  server = livereload();
  gulp.start('styles', 'scripts', 'watch');

});