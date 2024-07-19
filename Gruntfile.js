const sass = require("sass-embedded");
const autoprefixer = require("autoprefixer");
const pixrem = require("pixrem");

module.exports = function (grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),
    sass: {
      options: {
        implementation: sass,
        sourceMap: true,
      },
      dist: {
        files: {
          "./style.css": "./src/scss/style.scss",
          "./style.css?ver=6.6": "./src/scss/style.scss",
        },
      },
    },
    postcss: {
      options: {
        map: false,
        processors: [pixrem(), autoprefixer()],
      },
      dist: {
        src: "./style.{css,css?ver=6.6}",
      },
    },
    watch: {
      sass: {
        files: ["./src/scss/**/*.scss"],
        tasks: ["sass", "postcss"],
      },
    },
  });

  // Load the grunt plugins
  grunt.loadNpmTasks("grunt-sass");
  grunt.loadNpmTasks("@lodder/grunt-postcss");
  grunt.loadNpmTasks("grunt-contrib-watch");

  // Default task(s).
  grunt.registerTask("default", ["sass", "postcss"]);
};
