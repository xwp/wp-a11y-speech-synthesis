/*global jQuery, wp, SpeechSynthesisUtterance, speechSynthesis, console */

(function( a11y, $ ) {
	'use strict';

	var utterance = null, originalSpeak;

	if ( 'undefined' === typeof SpeechSynthesisUtterance && 'undefined' === typeof speechSynthesis ) {
		if ( 'undefined' !== typeof console && 'undefined' !== typeof console.warn ) {
			console.warn( 'Accessibility (a11y) Speech Synthesis not supported by this browser.' );
		}
		return;
	}

	originalSpeak = a11y.speak;

	/**
	 * Update the ARIA live notification area text node using speechSynthesis.
	 *
	 * @since 4.2.0
	 * @since 4.3.0 Introduced the 'ariaLive' argument.
	 *
	 * @param {String} message  The message to be announced by Assistive Technologies.
	 * @param {String} ariaLive Optional. The politeness level for aria-live. Possible values:
	 *                          polite or assertive. Default polite.
	 * @returns {void}
	 */
	a11y.speak = function speak( message, ariaLive ) {
		var messageText;

		// Clear any current utterance.
		if ( utterance ) {
			speechSynthesis.cancel( utterance );
		}

		// Prevent speaking markup in message.
		messageText = $( '<p>' ).html( message ).text();

		// Speak message with TTS.
		utterance = new SpeechSynthesisUtterance( messageText );
		speechSynthesis.speak( utterance );

		// Call original.
		originalSpeak.call( a11y, message, ariaLive );
	};

})( wp.a11y, jQuery );
