/* global module:true */
module.exports = function (grunt) {
  'use strict';

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    dirs: {
      js: 'js',
      css: 'css',
      img: 'img',
      sass: 'sass',
      fonts: 'fonts',
    },

    pkg: grunt.file.readJSON( 'package.json' ),

    concat: {
      dev: {
        files: {
          'assets/<%= dirs.js %>/<%= pkg.name %>.js': [
            'assets/<%= dirs.js %>/vendor/jquery/dist/jquery.js',
            'assets/<%= dirs.js %>/vendor/modernizr/modernizr.js',
            'assets/<%= dirs.js %>/vendor/jquery-validation/dist/jquery.validate.js',
            'assets/<%= dirs.js %>/vendor/jquery-cycle2/build/jquery.cycle2.js',
            'assets/<%= dirs.js %>/vendor/CanvasLoader/js/heartcode-canvasloader.js',
            'assets/<%= dirs.js %>/libs/**.js',
            'assets/<%= dirs.js %>/main.js',
            'assets/<%= dirs.js %>/modules/**.js',
          ]
        }
      }
    },

    uglify: {
    options: {
      mangle: true
    },
    build: {
      files: {
        'dist/<%= dirs.js %>/<%= pkg.name %>.min.js': ['assets/<%= dirs.js %>/<%= pkg.name %>.js']
      }
    }
    },

    copy: {
      build: {
        files: [
          { expand: true, cwd : 'assets/<%= dirs.img %>', src : ['*.jpg', '*.png'], dest : 'dist/<%= dirs.img %>' },
          { expand: true, cwd : 'assets/<%= dirs.img %>/sprite', src : ['**'], dest : 'dist/<%= dirs.img %>/sprite' },
          { expand: true, cwd : 'assets/<%= dirs.img %>/pins', src : ['*.jpg', '*.png'], dest : 'dist/<%= dirs.img %>/pins' },
          { expand: true, cwd : 'assets/<%= dirs.fonts %>', src : '**', dest : 'dist/<%= dirs.fonts %>' },
        ]
      }
    },

    clean: {
      build: ['dist']
    },

    rename: {
    build: {
      files: [
        {src: ['dist/<%= dirs.css %>/<%= pkg.name %>.css'], dest: 'dist/<%= dirs.css %>/<%= pkg.name %>.min.css'},
      ]
    }
  },

    compass: {
      dev: {
        options: {
          sassDir: 'assets/<%= dirs.sass %>',
          cssDir: 'assets/<%= dirs.css %>',
          imagesDir: 'assets/<%= dirs.img %>',
          fontsDir: 'assets/<%= dirs.fonts %>',
          relativeAssets: true,
          environment: 'development',
          outputStyle: 'expanded'
        }
      },
      build: {
        options: {
          sassDir: 'assets/<%= dirs.sass %>',
          cssDir: 'dist/<%= dirs.css %>',
          imagesDir: 'dist/<%= dirs.img %>',
          fontsDir: 'dist/<%= dirs.fonts %>',
          relativeAssets: true,
          environment: 'production',
          outputStyle: 'compressed'
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },
      files: '*.php',
      sass: {
        files: 'assets/<%= dirs.sass %>/**/*',
        tasks: [
          'compass:dev'
        ]
      },
      js: {
        files: ['<%= jshint.files %>'],
        tasks: [
          'jshint',
          'concat'
        ]
      },
    },

    jshint: {
      options: {
        'bitwise': true,
        'eqeqeq': true,
        'eqnull': true,
        'immed': true,
        'newcap': true,
        'esnext': true,
        'latedef': true,
        'noarg': true,
        'node': true,
        'undef': true,
        'browser': true,
        'trailing': true,
        'jquery': true,
        'curly': true,
        globals: {
          jQuery: true,
          console: true,
          alert: true,
          Mushi: true,
          google: true,
          CanvasLoader: true
        }
      },
      files: [
          'assets/<%= dirs.js %>/main.js',
          'assets/<%= dirs.js %>/modules/**.js'
      ]
    }

  });

  grunt.registerTask('default', 'watch');

  grunt.registerTask('build', [
    'clean:build',
    'copy:build',
    'compass:build',
    'rename:build',
    'uglify:build',
  ]);

};