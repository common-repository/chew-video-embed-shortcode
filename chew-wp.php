<?php
/*
Plugin Name: Chew - Video Embed Shortcode
Plugin URI: http://chew.tv/chew-wp
Description: Chew is a Live and VOD platform for Artists, DJs and Labels. With this plugin you can embed Chew videos, live_events and channels into Wordpress with one simple shortcode. eg. [chew video="XXXXXXXXXX"height="500px" width="300px" autoplay="yes"] To embed live events or channels switch video="XXXXXXXXX" with either: live_event="XXXXXXXXXX" channel="channelname".
Version: 0.3
Author: Ben Bowler
Author URI: http://chew.tv
*/

/*
Chew Embed Shortcode by Ben Bowler
Based on the demo by Paul McKnight at http://www.reallyeffective.co.uk

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

// Register shortcode
add_shortcode("chew", "chew_player");

function chew_player($atts) {
	extract( shortcode_atts( array( // Array of defaults
		'video' => '',
		'live_event' => '',
		'channel' => '',
		'width' => '600px',
		'height' => '400px',
		'autoplay' => 'no',
	), $atts ) );

	// Create embed code
	if($video != '') {
		$output = "<iframe src=\"http://chew.tv/embed/video/{$video}/?autoplay={$autoplay}\" height=\"{$height}\" width=\"{$width}\" allowfullscreen=\"\" frameborder=\"0\"></iframe>";
	} elseif($live_event != '') {
		$output = "<iframe src=\"http://chew.tv/embed/live_event/{$live_event}/?autoplay={$autoplay}\" height=\"{$height}\" width=\"{$width}\" allowfullscreen=\"\" frameborder=\"0\"></iframe>";
	} elseif($channel != '') {
		$output = "<iframe src=\"http://chew.tv/embed/channel/{$channel}/?autoplay={$autoplay}\" height=\"{$height}\" width=\"{$width}\" allowfullscreen=\"\" frameborder=\"0\"></iframe>";
	} else {
		$output = "<strong>Chew Embed Plugin Error: video, live_event or channel must be specified</strong>";
	}
	//send back text to calling function
	return $output;
}