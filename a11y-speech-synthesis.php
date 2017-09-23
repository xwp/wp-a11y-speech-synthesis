<?php
/**
 * Plugin Name: Accessibility (a11y) Speech Synthesis
 * Plugin URI: https://github.com/xwp/wp-a11y-speech-synthesis
 * Description: Make your browser speak when <code>wp.a11y.speak()</code> is called via TTS (text-to-speech).
 * Version: 0.2.0
 * Author: Weston Ruter, XWP
 * Author URI: https://make.xwp.co/
 * License: GPLv2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: a11y-speech-synthesis
 * Domain Path: /languages
 *
 * Copyright (c) 2017 XWP (https://xwp.co/)
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

/**
 * Register a11y-speech-synthesis script.
 *
 * @param WP_Scripts $scripts Scripts.
 */
function a11y_speech_synthesis_register_scripts( WP_Scripts $scripts ) {
	$original_handle = 'wp-a11y-original';
	$handle = 'wp-a11y';

	$original_script = $scripts->registered[ $handle ];
	$scripts->remove( $handle );
	$scripts->registered[ $original_handle ] = $original_script;

	$src = plugin_dir_url( __FILE__ ) . 'a11y-speech-synthesis.js';
	$deps = array( $original_handle );
	$ver = '0.2.0';
	$scripts->add( $handle, $src, $deps, $ver, $original_script->args );
}

add_action( 'wp_default_scripts', 'a11y_speech_synthesis_register_scripts' );
