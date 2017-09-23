/* eslint-env node */
/* jshint node:true */

module.exports = function( grunt ) {
	'use strict';

	grunt.initConfig( {

		pkg: grunt.file.readJSON( 'package.json' ),

		// JavaScript linting with JSHint.
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'*.js'
			]
		},

		// Build a deploy-able plugin
		copy: {
			build: {
				src: [
					'a11y-speech-synthesis.js',
					'a11y-speech-synthesis.php',
					'readme.txt'
				],
				dest: 'build',
				expand: true,
				dot: true
			}
		},

		// Clean up the build
		clean: {
			build: {
				src: [ 'build' ]
			}
		},

		// Shell actions
		shell: {
			options: {
				stdout: true,
				stderr: true
			},
			readme: {
				command: 'cd ./dev-lib && ./generate-markdown-readme' // Generate the readme.md
			}
		},

		// Deploys a git Repo to the WordPress SVN repo
		wp_deploy: {
			deploy: {
				options: {
					plugin_slug: '<%= pkg.name %>',
					build_dir: 'build'
				}
			}
		}

	} );

	// Load tasks
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-shell' );
	grunt.loadNpmTasks( 'grunt-wp-deploy' );

	// Register tasks
	grunt.registerTask( 'default', [
		'jshint'
	] );

	grunt.registerTask( 'readme', [
		'shell:readme'
	] );

	grunt.registerTask( 'dev', [
		'default',
		'readme'
	] );

	grunt.registerTask( 'build', [
		'default',
		'readme',
		'copy'
	] );

	grunt.registerTask( 'deploy', [
		'build',
		'wp_deploy',
		'clean'
	] );

};
