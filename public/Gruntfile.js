module.exports = function(grunt) {
	grunt.initConfig({
		// requirejs: {
		// 	compile: {
		// 		options: {
		// 			almond: true,
		// 			baseUrl: '.',
		// 			out: "js/app.min.js",
		// 			name: "js/main",
		// 			mainConfigFile: 'js/main.js',
		// 			include: ['node_modules/requirejs/require']
		// 		}
		// 	}
		// },
		stylus: {
			compile: {
				files: {
					'css/main.css': [
						'bower_components/normalize.styl/normalize',
						'bower_components/bootstrap/dist/css/bootstrap.css',
						'stylus/main.styl'
					]
				}
			}
		},
		watch: {
			stylesheets: {
				files: 'stylus/main.styl',
				tasks: 'stylus',
				options: {
					interrupt: true,
					event: ['changed']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-stylus');

	grunt.registerTask('cssVigilar', ['watch']);
	grunt.registerTask('cssmin', ['stylus']);
	// grunt.registerTask('runapp', ['stylus', 'requirejs']);
};