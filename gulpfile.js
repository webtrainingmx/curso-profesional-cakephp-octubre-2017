const gulp = require('gulp');
const sass = require('gulp-sass');
const util = require('util');
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');

// SASS Compilation Tasks
gulp.task('sass', () => {
    return gulp.src('./src/Frontend/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(rename('all-styles.css'))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./webroot/css'));
});

gulp.task('watch', () => {
    // Watch for changes on SASS files
    watch('./src/Frontend/scss/**/*.scss', (file) => {
        util.log('SCSS file changed: ', file.path);
        gulp.start('sass', () => {
        });

    }).on('error', function (error) {
        util.log(util.colors.red('Error'), error.message);
    });
});

gulp.task('build', ['sass']);

gulp.task('dev', ['sass', 'watch']);
