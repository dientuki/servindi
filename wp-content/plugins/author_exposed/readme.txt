=== Author Exposed ===
Contributors: clsigor
Tags: author, info
Requires at least: 2.0
Tested up to: 2.3.3
Stable tag: 1.0

Simple and elegant way to show author info (full name, website, description ...)

== Description ==


This plugin does the same thing as the the_author tag, displays the author name, however this one is linked to a hidden div(layer). Once you click on the author name the hidden div will show up together with the author details (taken from
author profile page) plus the gravatar photo if the author have one. If not, the default gravatar photo would be used.

*   Plugin is xhtml,css valid.
*   Tested in FF, Opera, IE6/7 and Safari.
*   Comes with separate css file for easier modification.


== Installation ==

Installation is simple and should not take you more than 2 minutes.

1. Upload whole `author_exposed` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php if (function_exists('author_exposed')) {author_exposed();} ?>` inside the loop, where you want the author link to appear.



== Documentation ==

Full documentation can be found at [Color Light Studio](http://colorlightstudio.com/2008/03/14/wordpress-plugin-author-exposed/)