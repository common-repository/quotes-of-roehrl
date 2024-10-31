<?php
/**
 * @package Quotes-of-Roehrl
 * @version 1.0.0
 */
/*
Plugin Name: Quotes of Roehrl
Plugin URI: http://autobahn81.com/
Description: Walter Roehrl is a legendary german rally and racing driver. He is a living legend. When activated this plugin shows you randomly a quote of Walter Roehrl in the upper right of your admin screen on every page.
Author: Autobahn 81
Version: 1.0.0
Author URI: http://autobahn81.com/
*/

function get_roehrl_quote() {
	/** These are the famous quotes of to walter roehrl */
	$lyrics = "You can't treat a car like a human being - a car needs love.
	In Rally sport it is important that the car has a good handling...
	...you should find a balance between under- and oversteering... with the tendency to drift...
	When accelerating the tears of emotion have to run off horizontally to the ear.
	For me driving starts when I steer the car with the throttle pedal instead of the wheel.
	Good drivers have dead flies on the side windows.
	For everything over 8 minutes I don't wear a helmet. (Röhrl about the <a href=\"http://en.wikipedia.org/wiki/Nordschleife\">Nordschleife</a>)
	A trained monkey could win with the audi quattro.
	Drifting is the art, holding an instable system stable.
	When you see the tree you crash into you have understeered, when you only hear it you have oversteered.";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function roehrl_quotes() {
	$chosen = get_roehrl_quote();
	echo "<p id='roehrl'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'roehrl_quotes');

// We need some CSS to position the paragraph
function roehrl_css() {

	echo "
	<style type='text/css'>
	#roehrl {
		position: absolute;
		top: 9em;
		margin: 0;
		padding: 0;
		right: 15px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'roehrl_css');
?>
