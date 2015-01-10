<?php
/**
 * Plugin Name: Accessibility (a11y) Speech Synthesis
 * Plugin URI: https://github.com/xwp/wp-a11y-speech-synthesis
 * Description: Make your browser speak when <code>wp.a11y.speak()</code> is called. Requires a browser that <a href="http://caniuse.com/#feat=speech-synthesis">supports <code>speechSynthesis</code></a> (currently Chrome and Safari).
 * Version: 0.1
 * Author:  Weston Ruter, XWP
 * Author URI: https://xwp.co/
 * License: GPLv2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: a11y-speech-synthesis
 * Domain Path: /languages
 *
 * Copyright (c) 2015 XWP (https://xwp.co/)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

if ( version_compare( phpversion(), '5.3', '>=' ) ) {
	require_once __DIR__ . '/php/class-plugin-base.php';
	require_once __DIR__ . '/php/class-plugin.php';
	$class_name = '\A11ySpeechSynthesis\Plugin';
	$GLOBALS['a11y_speech_synthesis_plugin'] = new $class_name();
} else {
	/** Show error message. */
	function a11y_speech_synthesis_php_version_error() {
		printf( '<div class="error"><p>%s</p></div>', esc_html__( 'Accessibility (a11y) Speech Synthesis plugin error: Your version of PHP is too old to run this plugin. You must be running PHP 5.3 or higher.', 'a11y-speech-synthesis' ) );
	}
	if ( defined( 'WP_CLI' ) ) {
		WP_CLI::warning( __( 'AcAccessibility (a11y) Speech Synthesis plugin error: Your PHP version is too old. You must have 5.3 or higher.', 'a11y-speech-synthesis' ) );
	} else {
		add_action( 'admin_notices', 'a11y_speech_synthesis_php_version_error' );
	}
}
