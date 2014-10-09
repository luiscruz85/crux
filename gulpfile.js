var gulp = require('gulp'),
    minifycss = require('gulp-cssmin'),
    autoprefixer = require('gulp-autoprefixer'),
    //notify = require('gulp-notify'),
    compass = require('gulp-compass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    cache = require('gulp-cache')
    cmq = require('gulp-combine-media-queries'),
    svgmin = require('gulp-svgmin');

gulp.task('scripts', function() {
    return gulp.src([
            'app/assets/js/libs/global/*.js',
            'app/assets/js/libs/frontend/*.js',
            'app/assets/js/scripts.js'
        ])
        .pipe(concat('main.js'))
        .pipe(gulp.dest('public_html/js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('public_html/js'));
});
gulp.task('styles', function(){
    return gulp.src('app/assets/scss/main.scss')
        .pipe(compass({
            css: 'public_html/css',
            sass: 'app/assets/scss',
            image: 'app/assets/img',
            font: 'public_html/font',
            require: ['semantic-ui-sass']
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('public_html/css'))
        .pipe(cmq())
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('public_html/css/'));
});

gulp.task('admin-scripts', function() {
    return gulp.src([
            'app/assets/js/libs/global/*.js',
            'app/assets/js/libs/admin/*.js',
            'app/assets/js/admin.js'
        ])
        .pipe(concat('admin.js'))
        .pipe(gulp.dest('public_html/js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('public_html/js'));
});
gulp.task('admin-styles', function(){
    return gulp.src('app/assets/scss/admin.scss')
        .pipe(compass({
            css: 'public_html/css',
            sass: 'app/assets/scss',
            image: 'app/assets/img',
            font: 'public_html/font',
            require: ['semantic-ui-sass']
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('public_html/css'))
        .pipe(cmq())
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('public_html/css/'));
});

gulp.task('images', function() {
    return gulp.src('app/assets/img/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest('public_html/img'));
});
gulp.task('svg', function(){
    return gulp.src('app/assets/svg/**/*')
        .pipe(cache(svgmin()))
        .pipe(gulp.dest('public_html/svg/'));
});

gulp.task('watch', function () {
    gulp.watch('app/assets/scss/*.scss', ['styles']);
    gulp.watch(['app/assets/js/*.js', 'app/assets/js/libs/frontend/*.js'], ['scripts']);
});

gulp.task('admin-watch', function () {
    gulp.watch('app/assets/scss/*.scss', ['admin-styles']);
    gulp.watch('app/assets/js/*.js', ['admin-scripts']);
});


gulp.task('default', ['styles', 'scripts', 'watch']);
gulp.task('admin',['admin-styles','admin-scripts','admin-watch']);

gulp.task('default', ['styles', 'scripts', 'watch']);
