/*!
 * test Gruntfile
 * @author shooga
 */
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
 
  	


	grunt.initConfig({ 

		pkg: grunt.file.readJSON('package.json'), 

		sass: {
			dist: {

				files: {
					'style.css': 'css/sass/style.scss'
				}
			}
		},

		postcss:{
     		options: {
     			map: true,
     			processors: [
      				require('autoprefixer')({browsers: ['last 10 version']})
   				]
     		},

     		dist:{
     			
       			files:{
          			'style.css':'style.css'
        		}
      		}
      	},

		watch: {
			options: {
        		livereload: false,
    		},
			sass: {
			files: 'css/sass/*.scss',
			tasks: ['sass', 'postcss']
			}
		},
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-postcss');

	grunt.registerTask('default',['watch']);

};