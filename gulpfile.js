let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');


let plumber = require('gulp-plumber');
let rename = require('gulp-rename');
let sass = require('gulp-sass');
let autoprefixer = require('gulp-autoprefixer');


let JS_SOURCE = 'undefined';
let JS_DEST = 'undefined';
let JS_OUTPUT_FILE = 'main.js';
let SCSS_SOURCE = 'src/scss';
let CSS_SOURCE = 'src/css';
let CSS_DEST = 'dist/css';

gulp.task('css', function() {
  gulp.src(SCSS_SOURCE + '/**/*.scss')
    .pipe(plumber({
      errorHandler: function(error) {
        console.log(error.message);
        generator.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest(CSS_DEST + '/'))
    .pipe(gulp.dest(CSS_SOURCE + '/'))
});

gulp.task('minify-css', () => {
  // Folder with files to minify
  return gulp.src(CSS_SOURCE + '/style.css')
  //The method pipe() allow you to chain multiple tasks together 
  //I execute the task to minify the files
 .pipe(cleanCSS())
 //I define the destination of the minified files with the method dest
 .pipe(rename('style.min.css'))
 .pipe(gulp.dest(CSS_DEST + '/'));
});

gulp.task('default', function() {
  gulp.watch(JS_SOURCE + '/**/*.js', ['javascript']);
  gulp.watch(SCSS_SOURCE + '/**/*.scss', ['css']);
  gulp.watch('./src/css/style.css', ['minify-css']);
});