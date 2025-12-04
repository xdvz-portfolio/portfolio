const path = require('path');
const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const precss = require('precss');
const concat = require('gulp-concat');
const autoprefixer = require('autoprefixer');
const deleteFile = require('gulp-delete-file');
const cssnano = require('cssnano');
const replace = require('gulp-replace');
const uglify = require('gulp-uglify');
const glob = require('glob');
const nunjucks = require('gulp-nunjucks');
const nj = require('nunjucks');
const sitemap = require('gulp-sitemap');

const files = {
    fontsPath: 'src/fonts/**/*',
    imgPath: 'src/img/**/*',
    jsonPath: 'src/json/**/*',
    scssPath: 'src/scss/main.scss',
    scssAllPath: 'src/scss/**/*.scss',
    // htmlPath: 'src/templates/*.html',
    // htmlAnswerPath: 'src/templates/answer/*.html',
    // htmlAllPath: 'src/templates/**/*.html',
    jsPath: 'src/js/*.js',
    jsAllPath: 'src/js/**/*.js',
    // publicHtmlPaths: 'public/*.html',
    // publicHtmlAllPaths: 'public/**/*.html',
    // publicHtmlAnswerPaths: 'public/answer/*.html',
    jsLibPaths: function () {
        let values = [];
        glob('src/js/_includes/*.js', {sync: true}).forEach((file) => {
           values.push(file);
        });
        return values;
    }(),
    // htmlPaths: function () {
    //     let values = [];
    //     glob('public/*.html', {sync: true}).forEach((file) => {
    //        values.push(file);
    //     });
    //     return values;
    // }(),
    // htmlAnswerPaths: function () {
    //     let values = [];
    //     glob('public/answer/*.html', {sync: true}).forEach((file) => {
    //        values.push(file);
    //     });
    //     return values;
    // }()
};

// function siteMap() {
//     return src(files.publicHtmlAllPaths, { read: false })
//         .pipe(sitemap({
//             siteUrl: 'https://mb.ru'
//         }))
//         .pipe(dest(path.join(__dirname, 'public')));
// }

function cleanJs() {
    return src(path.join(__dirname, 'public/js/*'))
        .pipe(deleteFile({
            deleteMatch: true
        }));
}

function cleanCss() {
    return src(path.join(__dirname, 'public/css/*'))
        .pipe(deleteFile({
            deleteMatch: true
        }));
}

// function htmlTask() {
//     return src(files.htmlPath)
//         .pipe(nunjucks.compile())
//         .pipe(dest(path.join(__dirname, 'public')));
// }

// function htmlAnswerTask() {
//     return src(files.htmlAnswerPath)
//         .pipe(nunjucks.compile({}, {env: new nj.Environment(new nj.FileSystemLoader(path.join(__dirname, 'src/templates')))}))
//         .pipe(dest(path.join(__dirname, 'public/answer')));
// }

function scssTask(){
    return src(files.scssPath)
        .pipe(sourcemaps.init())
        // .pipe(sass({outputStyle: 'expanded'}))
        .pipe(sass())
        .pipe(postcss([ precss, autoprefixer, cssnano ]))
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(dest(path.join(__dirname, 'public/css'))
        );
}

function jsTask(){
    return src(files.jsLibPaths.concat(files.jsPath))
        .pipe(sourcemaps.init())
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(path.join(__dirname, 'public/js'))
        );
}

function fontsTask() {
    return src(files.fontsPath)
        .pipe(dest(path.join(__dirname, 'public/fonts'))
        );
}

function imgTask() {
    return src(files.imgPath)
        .pipe(dest(path.join(__dirname, 'public/img'))
        );
}

function jsonTask() {
    return src(files.jsonPath)
        .pipe(dest(path.join(__dirname, 'public/json'))
        );
}

// function extractTask() {
//   return src(path.join(__dirname, 'src/*.css'))
//     .pipe(postcss([precss, autoprefixer]))
//     .pipe(concat('app.css'))
//     .pipe(sourcemaps.write('.'))
//     .pipe(dest(path.join(__dirname, 'dist')));
// }

var cbString = new Date().getTime();

// function cacheBustTask(){
//     return src([files.publicHtmlPaths])
//         .pipe(replace(/cb=\d+/g, 'cb=' + cbString))
//         .pipe(dest('public'));
// }

// function cacheBustAnswerTask(){
//     return src([files.publicHtmlAnswerPaths])
//         .pipe(replace(/cb=\d+/g, 'cb=' + cbString))
//         .pipe(dest(path.join(__dirname, 'public/answer')));
// }

function watchTask(){
    watch([files.scssAllPath, files.jsAllPath],
        series(
            parallel(scssTask, jsTask, imgTask, jsonTask, fontsTask),
        )
    );
}

exports.default = series(
    parallel(scssTask, jsTask, imgTask, jsonTask, fontsTask),
    watchTask
);
