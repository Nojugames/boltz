const gulp = require('gulp')
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps')
const concat = require('gulp-concat')
const terser = require('gulp-terser')
const purgecss = require('gulp-purgecss')
const purgecssWordpress = require('purgecss-with-wordpress')
const criticalCss = require('gulp-penthouse');
const critical = require('critical');

gulp.task('styles', function () {
    return gulp.src('scss/theme.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('dist/css'))
})

// This is the start of critical css, needs more work. Creating a php file to add css inline.
gulp.task('critical-css', function () {
    return gulp.src('dist/css/theme.css')
        .pipe(criticalCss({
            out: 'critical.php', // output file name
            url: 'https://noju.local', // url from where we want penthouse to extract critical styles
            width: 1400, // max window width for critical media queries
            height: 900, // max window height for critical media queries
            userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
        }))
        .pipe(gulp.dest('dist/php')) // destination folder for the output file
});

gulp.task('production', function () {
    return gulp.src('scss/theme.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(purgecss({
            content: ['**/*.php'],
            safelist: {
                standard: [ // ending with
                    ...purgecssWordpress.safelist,
                    'sub-menu',
                    'product',
                    'woocommerce-loop-product__title',
                ],
                deep: [/products-row$/,/sidebar$/,/offcanvas$/,/woocommerce$/],
                //greedy: [/yellow$/],
            },
            safelistPatterns: purgecssWordpress.safelistPatterns
        }))
        .pipe(gulp.dest('dist/css'))
})
gulp.task('purgecss', () => {
  return gulp.src('dist/css/theme.css')
      .pipe(purgecss({
        content: ['**/*.php'],
          safelist: purgecssWordpress.safelist,
          safelistPatterns: purgecssWordpress.safelistPatterns
      }))
      .pipe(gulp.dest('dist/purged/css'))
})
gulp.task('test', function () {
  return gulp.src('scss/theme.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('dist/css'))
    .pipe(sourcemaps.init())
    .pipe(concat('style.css'))
    .pipe(sourcemaps.write())
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist/css'));
})


gulp.task('critical', function (callback) {
    /*critical.generate({
        base: './',
        src: 'https://noju.local/',
        dest: 'dist/css',
        //ignore: ['@font-face'],
        dimensions: [{
            width: 320,
            height: 480
        },{
            width: 768,
            height: 1024
        },{
            width: 1280,
            height: 960
        }],
        minify: true
    });*/
    critical.generate({
        //inline: true,
        base: 'test/',
        src: 'http://noju.local/',
        target: {
            css: 'styles/mada.css'
        },

        width: 1300,
        height: 900,
    });
    callback();
});

// This is so lazy, but for now is okay yes
const filesToMove = [
    'node_modules/bootstrap/dist/js/**/*.*',
];

gulp.task('bsjs', function() {
    return gulp.src(filesToMove)
        .pipe(gulp.dest('./dist/js'));
});
// End of laziness

gulp.task('scripts', () => {
  return gulp.src('js/**/*.js')
    .pipe(terser())
    .pipe(concat('pack.js'))
    .pipe(gulp.dest('dist/js'))
})

gulp.task('watch', gulp.series('styles', () => {
  gulp.watch('scss/**/*.scss', gulp.series(['styles']))
  gulp.watch('js/**/*.js', gulp.series(['scripts']))
}))

gulp.task('default', gulp.series('watch'));