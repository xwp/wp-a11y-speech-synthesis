<?php
/**
 * Main plugin bootstrap file.
 */

namespace A11ySpeechSynthesis;

class Plugin extends Plugin_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
		parent::__construct();
	}

	/**
	 * Initialize.
	 *
	 * @action after_setup_theme
	 */
	function init() {
		add_action( 'wp_default_scripts', array( $this, 'register_scripts' ), 11 );
	}

	/**
	 * Register script.
	 *
	 * @param \WP_Scripts $scripts
	 * @action wp_default_scripts, 11
	 */
	public function register_scripts( \WP_Scripts $scripts ) {
		$handle = 'a11y-speech-synthesis';
		$src = $this->dir_url . 'js/a11y-speech-synthesis.js';
		$deps = array( 'jquery' );
		$scripts->add( $handle, $src, $deps );

		$scripts->registered['wp-a11y']->deps[] = $handle;
	}
}
