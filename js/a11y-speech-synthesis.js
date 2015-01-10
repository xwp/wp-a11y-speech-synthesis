/*global wp, jQuery, SpeechSynthesisUtterance, speechSynthesis, console */

jQuery(function() {
	var a11y = wp.a11y;

	if ( 'undefined' === typeof SpeechSynthesisUtterance && 'undefined' === typeof speechSynthesis ) {
		if ( 'undefined' !== typeof console && 'undefined' !== typeof console.warn ) {
			console.warn( 'Accessibility (a11y) Speech Synthesis not supported by this browser.' );
		}
		return;
	}

	a11y.originalSpeak = a11y.speak;

	/**
	 * Wrap wp.a11y.speak() with a method that will speak the message using speechSynthesis.
	 *
	 * @param message
	 */
	a11y.speak = function( message ) {
		var utterance = new SpeechSynthesisUtterance( message );
		speechSynthesis.speak( utterance );
		return a11y.originalSpeak.call( a11y, message );
	};

});
