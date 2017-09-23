<!-- DO NOT EDIT THIS FILE; it is auto-generated from readme.txt -->
# Accessibility (a11y) Speech Synthesis

Make your browser speak when wp.a11y.speak() is called.

**Contributors:** [xwp](https://profiles.wordpress.org/xwp), [westonruter](https://profiles.wordpress.org/westonruter)  
**Tags:** [a11y](https://wordpress.org/plugins/tags/a11y), [speech](https://wordpress.org/plugins/tags/speech), [tts](https://wordpress.org/plugins/tags/tts)  
**Requires at least:** 4.2  
**Tested up to:** trunk  
**Stable tag:** trunk (master)  
**License:** [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html)  

[![Build Status](https://travis-ci.org/xwp/wp-a11y-speech-synthesis.svg?branch=master)](https://travis-ci.org/xwp/wp-a11y-speech-synthesis) [![Built with Grunt](https://cdn.gruntjs.com/builtwith.svg)](http://gruntjs.com) 

## Description ##

Make your browser speak when <code>wp.a11y.speak()</code> is called. Requires a browser that <a href="http://caniuse.com/#feat=speech-synthesis">supports <code>speechSynthesis</code></a> (which all currently do except for IE11).

This is useful for development to simulate what a user experiences when using a screen reader.

## Changelog ##

### 0.2.0 ###
* Fixed: Pass `ariaLive` param to original `wp.a11y.speak()`.
* Fixed: Prevent reading markup in message.
* Fixed: Stop speaking any previous utterance before speaking the next one to emulate `clear()`.
* Updated: Refactor JS script registration to better swap out and wrap core's `wp-a11y` script.
* Updated: Simplified plugin to the bare minimum required PHP.

### 0.1.0 ###
Initial release


