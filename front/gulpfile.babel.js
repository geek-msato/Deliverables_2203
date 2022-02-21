import gulp from 'gulp';
import sass from 'gulp-sass';
import parcel from 'gulp-parcel';
import webserver from 'gulp-webserver';
import plumber from 'gulp-plumber';
import postcss from 'gulp-postcss';
import cssnano from 'gulp-cssnano';
import changed from 'gulp-changed';
import eslint from 'gulp-eslint';
import imagemin from 'gulp-imagemin';
import sourcemaps from 'gulp-sourcemaps';
import gulpif from 'gulp-if';
import gutil from 'gutil';
import csscomb from 'gulp-csscomb';
import postcssReporter from 'postcss-reporter';
import stylelint from 'stylelint';
import pngquant from 'imagemin-pngquant';
import mozjpeg from 'imagemin-mozjpeg';
import bulkSass from 'gulp-sass-bulk-import';
import del from 'del';

const paths = {
  sass: [
    './src/sass/**/*.scss',
    '!./src/sass/**/_*.scss',
    '!./src/sass/_**/*.scss',
  ],
  scripts: [
    './src/script/**/*.js',
    '!./src/script/**/_*.js',
    '!./src/script/_**/*.js',
  ],
};

import minimist from 'minimist';

const envOption = {
  string: 'env',
  default: {
    env: process.env.NODE_ENV || 'development',
  },
};
const options = minimist(process.argv.slice(2), envOption);
const isProd = options.env === 'production';

gulp.task('server', () => {
  return gulp.src('../wp/wp-content/themes/deliv_2203/').pipe(
    webserver({
      host: 'localhost',
      livereload: true,
    }),
  );
});

gulp.task('lint-styles', (cb) => {
  return gulp.src('src/sass/**/*.scss').pipe(
    postcss(
      [
        stylelint({
          extends: '@geekcojp/stylelint-config',
        }),
        postcssReporter({
          clearMessages: true,
        }),
      ],
      {
        syntax: require('postcss-scss', cb),
      },
    ),
  );
});

gulp.task('sass', (cb) => {
  const processors = [
    require('postcss-import'),
    require('postcss-flexbugs-fixes'),
    require('tailwindcss'),
    require('autoprefixer'),
  ];
  return gulp
    .src(paths.sass)
    .pipe(gulpif(!isProd, sourcemaps.init()))
    .pipe(plumber())
    .pipe(bulkSass())
    .pipe(
      sass({
        outputStyle: 'expanded',
      }),
    )
    .pipe(postcss(processors).on('error', gutil.log))
    .pipe(csscomb())
    .pipe(gulpif(!isProd, sourcemaps.write()))
    .pipe(
      gulpif(
        isProd,
        cssnano({
          discardComments: {
            removeAll: true,
          },
          reduceIdents: false,
          zindex: false,
        }),
      ),
    )
    .pipe(gulp.dest('../wp/wp-content/themes/deliv_2203/assets/'), cb);
});

gulp.task('lint-scripts', (cb) => {
  return gulp
    .src('src/script/**/*.ts')
    .pipe(eslint())
    .pipe(eslint.format(), cb);
});

gulp.task('parcel', (cb) => {
  return gulp
    .src(paths.scripts, {
      read: false,
    })
    .pipe(
      gulpif(
        !isProd,
        parcel({
          source: 'parcel',
        }),
      ),
    )
    .pipe(
      gulpif(
        isProd,
        parcel(
          {
            cache: false,
            minify: true,
          },
          {
            source: 'parcel',
          },
        ),
      ),
    )
    .pipe(gulp.dest('../wp/wp-content/themes/deliv_2203/assets'), cb);
});

gulp.task('assets', (cb) => {
  return gulp
    .src('src/assets/**/*')
    .pipe(plumber())
    .pipe(changed('../wp/wp-content/themes/deliv_2203/assets/'))
    .pipe(
      imagemin([
        pngquant({
          quality: [0.65, 0.8],
          speed: 1,
          floyd: 0,
        }),
        mozjpeg({
          quality: 85,
          progressive: true,
        }),
        imagemin.svgo(),
        imagemin.optipng(),
        imagemin.gifsicle(),
      ]),
    )
    .pipe(gulp.dest('../wp/wp-content/themes/deliv_2203/assets/'), cb);
});

gulp.task('delete', cb => {
  return del(['.cache/', '.tmp-gulp-compile-**/'], cb);
});

gulp.task('watch', (cb) => {
  gulp.watch(['src/sass/**/*.scss'], gulp.task('lint-styles'));
  gulp.watch(['src/sass/**/*.scss'], gulp.task('sass'));
  gulp.watch(['src/script/**/*.js'], gulp.task('lint-scripts'));
  gulp.watch(['src/script/**/*.js'], gulp.task('parcel'));
  gulp.watch(['src/assets/**/*'], gulp.task('assets'));
  cb();
});

gulp.task(
  'build',
  gulp.series(
    gulp.parallel(
      'sass',
      'lint-styles',
      'lint-scripts',
      'parcel',
      'assets',
      'delete',
    ),
  ),
);

gulp.task('default', gulp.series(gulp.parallel('server', 'watch')));
