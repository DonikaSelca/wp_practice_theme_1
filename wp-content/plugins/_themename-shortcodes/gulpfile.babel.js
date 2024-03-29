// Main Compiling File
import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

// yargs allows us to create arguments to use in the command
// line when we run a task and then we can use these arguments in a gulp task.
const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ['src/assets/scss/bundle.scss'],
    dest: 'dist/assets/css'
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png.svg.gif}',
    dest: 'dist/assets/images'
  },
  scripts: {
    src: ['src/assets/js/bundle.js'],
    dest: 'dist/assets/js'
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}**/*'],
    dest: 'dist/assets'
  },
  package: {
    src: ['**/*', '!DS_Store', '!node_modules{,/**}', '!packaged{,/**}', '!src{,/**}', '!.babelrc', '!.gitignore', '!gulpfile.babel.js', '!package.json', '!package-lock.json' ],
    dest: 'packaged'
  }
}

// Done needs to be called to let gulp know we are done with our task
// export const is the new gulp.task (how to create a task in gulp, which is now directly exported)

// Deletes the dist folder. If there is a file in src that gets deleted it stays in dist, so
// dumping the entire folder and recompiling is best practice.

// If your function returns a Javascript promise(like 'del' does), you don't need to call the done function
// Function looks different bc in es6 if function is one line we don't need curly braces and return keyword.
export const clean = () => del(['dist']);

// Compiling styles:
export const styles = () => {
  // Returns a representation of the file(a stream)
  return gulp.src(paths.styles.src)
    // Matches sourcefiles with minified or compiled files as opposed to what is in the bundle.
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    // .pipe transforms the file somehow and spits it back out. On the next line the sass is compiled with error handling for a callback.
    .pipe(sass().on('error', sass.logError))
    // If we are in production clean the CSS. (minify and cleaning takes up a lot of processing power so we set a
    // production flag via yargs and gulp-if to only execute cleanCSS if in production)
    .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
    // Everything between sourcemaps.init and .write have to be compatible with gulp-sourcemaps
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    // .pipe combined with gulp.dest saves the transformed file to a particular location.
    .pipe(gulp.dest(paths.styles.dest))
}

// Task that minifies images
export const images = () => {
  return gulp.src(paths.images.src)
  .pipe(gulpif(PRODUCTION, imagemin()))
  .pipe(gulp.dest(paths.images.dest));
}

// Watches files for changes and restarts the server automatically
export const watch = () => {
  // ('path of files to watch (* = all files and folders ending in .scss)', 'task to run when a change happens')
  gulp.watch(['src/assets/scss/**/*.scss', 'includes/**/*.scss'], styles);
  gulp.watch(['src/assets/js/**/*.js', 'includes/**/*.js'], scripts);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.other.src, copy);
}

// Copies files outside of css, js and images from src/assets to dist/assets folder
export const copy = () => {
  return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest));
}

export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(named())
        // Webpack works with loaders that transpile
        .pipe(webpack({
          module: {
            rules: [{
              // Checks to see if file is a javascript file and if it uses loader
		          test: /\.js$/,
			        use: {
                loader: 'babel-loader',
			          options: {
                  // Preset must match preset declared in .babelrc and package.json
                  presets: ['@babel/preset-env']
				        }
			        }
		        }]
          },
          // After module traspiles js files it bundles them into a long hashtag.
	        output: {
            // The output creates a replacement so it's easier to locate.
            // Vinyl-named allows us to create a dynamic placeholder that comes from the file in the array
	          filename: '[name].js'
          },
          externals: {
            // looks for an external library and asigns jquery to the global object jQuery.
            // This way the whole jQuery library isn't taking up room in our package.
            // Check wp enqueue scripts functions to see if 3rd party JS Lib or default scripts are included in Core.
            jquery: 'jQuery'
          },
          // Webpack provides easy way to add your sourcemaps
	        devtool: !PRODUCTION ? 'inline-source-map' : false,
          // Webpack created a mode option for production vs development which automatically minifies js
          mode: PRODUCTION ? 'production' : 'development'
	      }))
	      .pipe(gulp.dest(paths.scripts.dest));
}

// Creates a zip file for packaged production
export const compress = () => {
  return gulp.src(paths.package.src, {base: '../'})
    // Replaces _themename and _pluginname with what the name key is in the object in package.json
    .pipe(replace('_pluginname', info.name))
    .pipe(replace('_themename', info.theme))
    // Allows us to have a dynamic placeholder in the zipped file. Now we can reuse files and functions as a template for new themes
    .pipe(zip(`${info.theme}-${info.name}.zip`))
    .pipe(gulp.dest(paths.package.dest));
}

// Cleans dist folder and reruns gulp compiling tasks with watch
export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), watch);
// gulp.series runs a series of tasks and waits for one to finish before starting another
// gulp.parallel runs a series of tasks at the same time.
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));
// Connects to scripts in package.json
export const bundle = gulp.series(build, compress);

export default dev;
