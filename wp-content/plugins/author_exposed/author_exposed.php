<?php
/*
Plugin Name: Autor Exposed
Plugin URI: http://colorlightstudio.com/2008/03/14/wordpress-plugin-author-exposed/
Description: Simple and elegant way to get more information about author.
Version: 1.0
Author: Igor Penjivrag
Author URI: http://colorlightstudio.com
*/

/*  Copyright 2008  Igor Penjivrag  (email : igor@colorlightstudio.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function author_exposed() {
	global $authordata;
	$nick = get_the_author();

// Gravatar Photo

	$mail = get_the_author_email();
	$gravatar = 'http://www.gravatar.com/avatar.php?gravatar_id=' .md5($mail);

// Get ID for hidden DIV

	$div_id = 'a'.get_the_ID();

// Hidden DIV output

	$author_posts_link = get_author_posts_url($authordata->ID, $authordata->user_nicename );

	$hidden_div = '<span id="'.$div_id.'" class="mydiv" style="display:none;"><img src="'.$gravatar.'" alt="gravatar" /><span class="ae_close"><a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">close</a></span><span class="ae_top"><b>Author: '.get_the_author().'</b></span>
		<span class="ae_body"><b>Name</b>: '.get_the_author_firstname().' '.get_the_author_lastname().'<br /><b>Email:</b> '.get_the_author_email().'<br /><b>Site:</b> <a href="'.get_the_author_url().'">'.get_the_author_url().'</a><br /></span><span class="ae_about"><b>About:</b> '.get_the_author_description().'</span><span class="ae_body"><a href="'.$author_posts_link.'">See Authors Posts</a> ('.get_the_author_posts().')</span></span>';
	
// Show it

	echo ('<a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">'.$nick.'</a>'.$hidden_div);

}


// Add JavaScript and Styles to header

	add_action('wp_head', 'add_head');
	function add_head() {
	echo '<script type="text/javascript" src="'.get_option(siteurl).'/wp-content/plugins/author_exposed/javascript/skripta.js"></script><link rel="stylesheet" href="'.get_option('siteurl').'/wp-content/plugins/author_exposed/css/ae_style.css" type="text/css" />';
}

?>