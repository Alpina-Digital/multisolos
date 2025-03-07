const localPath = '/solarvolt/'; // Caminho a seguir em localhost

const gulp = require('gulp');
const path = require('path');
const sass = require('gulp-sass')(require('sass-embedded'));
const sassGlob = require('gulp-sass-glob');
const browserSync = require('browser-sync');
const order = require('gulp-order');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const connect = require('gulp-connect-php');
const purgecss = require('gulp-purgecss');
const wp = require('purgecss-with-wordpress');
const sort = require('gulp-sort');
const replace = require('gulp-replace'); // Importando o gulp-replace para substituição de caminhos

// paths js
const utilJsPath = 'node_modules/codyhouse-framework/main/assets/js/util.js'; //Onde fica o util.js do módulo do Cody 
const componentsJsPath = ['cody/**/*.js', 'frontend/**/*.js', '!**/@old/**']; //Pasta onde ficam os arquivos .js do Cody e do tema
const scriptsJsPath = 'assets/js'; //Pasta onde ficarão os .js finais

// paths scss/css
const scssFilesPath = ['cody/**/*.scss', 'frontend/**/*.scss', '!**/@old/**']; //Pasta onde ficam os .scss do Cody
const cssFolder = 'assets/css'; //Pasta onde ficarão os .css finais

function reload(done) {
  browserSync.reload();
  done();
}

/* Tarefas do Gulp watch */

// Tarefa para compilar os SCSS
gulp.task('sass', function () {
  return gulp.src(scssFilesPath)
    .pipe(replace(/(['"])(\.\.\/)+base\1/g, "'cody/base'"))  // Substitui qualquer '../base' por 'cody/base'
    .pipe(sassGlob({ sassModules: true }))
    .pipe(sass({
      includePaths: [
        path.resolve(__dirname, 'cody', 'base'),
      ],
      quietDeps: true,
      quiet: true,
      silenceDeprecations: ['legacy-js-api', 'global-builtin']
    }).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(concat('style.css'))
    .pipe(gulp.dest(cssFolder))
    .pipe(browserSync.reload({
      stream: true
    }));
});

//Tarefa para remover classes não utilizadas do CSS
gulp.task('purgecss', function () {
  return gulp.src(cssFolder + '/style.css')
    .pipe(purgecss({
      content: ['**/*.php', '!**/@old/**', scriptsJsPath + '/scripts.min.js'],
      safelist: {
        standard: [
          ...wp.safelist,
          '.is-hidden', '.is-visible'
        ],
        deep: [],
        greedy: []
      },
      defaultExtractor: content => content.match(/[\w-/:%@]+(?<!:)/g) || []
    }))
    .pipe(cleanCSS())
    .pipe(gulp.dest(cssFolder));
});

// Tarefa que combina todos os .js em um só
gulp.task('scripts', function () {
  return gulp.src([utilJsPath, ...componentsJsPath])
    .pipe(order([utilJsPath, ...componentsJsPath], { base: './' }))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(scriptsJsPath))
    .pipe(browserSync.reload({
      stream: true
    }))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(scriptsJsPath))
    .pipe(browserSync.reload({
      stream: true
    }));
});

//Tarefa para ligar o live server
// gulp.task('serve', function () {
//   connect.server({}, function () {
//     browserSync({
//       proxy: 'localhost' + localPath,
//       notify: false
//     });
//   });
// });

gulp.task('watch', gulp.series(['sass', 'purgecss', 'scripts'], function () {
  gulp.watch('**/*.php', gulp.series([reload, 'sass', 'purgecss']));
  gulp.watch(['cody/**/*.scss', 'frontend/**/*.scss'], gulp.series(['sass', 'purgecss']));
  gulp.watch(componentsJsPath, gulp.series(['scripts']));
}));
