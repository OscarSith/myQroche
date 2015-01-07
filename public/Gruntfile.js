module.exports = function(grunt) {
	grunt.initConfig({
		requirejs: {
			compile: {
				options: {
					almond: true,
					baseUrl: '.',
					out: "js/app.min.js",
					name: "index",
					mainConfigFile: 'index.js',
					include: ['node_modules/requirejs/require']
				}
			}
		},
		stylus: {
			compile: {
				files: {
					'css/main.css': [
						'bower_components/normalize.styl/normalize',
						'bower_components/bootstrap/dist/css/bootstrap.css',
						'stylus/main.styl',
						'bower_components/selectize/dist/css/selectize.default.css',
						'bower_components/pikaday/css/pikaday.css'
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
		},
		cssmin: {
			combine: {
				dest: 'css/main.css',
				src: [
					'css/main.css',
					'bower_components/selectize/dist/css/selectize.default.css',
					'bower_components/pikaday/css/pikaday.css'
				]
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-stylus');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-requirejs');

	grunt.registerTask('cssVigilar', ['watch']);
	grunt.registerTask('styl', ['stylus']);
	grunt.registerTask('cssm', ['cssmin']);
	grunt.registerTask('app', ['requirejs']);
	grunt.registerTask('runapp', ['cssm', 'requirejs']);
};