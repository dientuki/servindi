<?php
/*
Plugin Name: WP-Stats
Plugin URI: http://lesterchan.net/portfolio/programming.php
Description: Display your WordPress blog statistics. Ranging from general total statistics, some of my plugins statistics and top 10 statistics.
Version: 2.20
Author: Lester 'GaMerZ' Chan
Author URI: http://lesterchan.net
*/


/*  
	Copyright 2007  Lester Chan  (email : gamerz84@hotmail.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


### Create Text Domain For Translations
add_action('init', 'stats_textdomain');
function stats_textdomain() {
	load_plugin_textdomain('wp-stats', 'wp-content/plugins/stats');
}


### Function: WP-Stats Menu
add_action('admin_menu', 'stats_menu');
function stats_menu() {
	if (function_exists('add_submenu_page')) {
		add_submenu_page('index.php',  __('WP-Stats', 'wp-stats'),  __('WP-Stats', 'wp-stats'), 1, 'stats/stats.php', 'display_stats');
	}
	if (function_exists('add_options_page')) {
		add_options_page(__('Stats', 'wp-stats'), __('Stats', 'wp-stats'), 'manage_options', 'stats/stats-options.php');
	}
}


### Display WP-Stats Admin Page
function display_stats() {
	$stats_page = stats_page();
	echo "<div class=\"wrap\">\n$stats_page</div>\n";
}


### Function: Get Total Authors
function get_totalauthors($display = true) {
	global $wpdb;
	$totalauthors = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users WHERE user_activation_key = ''");
	if($display) {
		echo number_format($totalauthors);
	} else {
		return number_format($totalauthors);
	}
}


### Function: Get Total Posts
function get_totalposts($display = true) {
	global $wpdb;
	$totalposts = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish'");
	if($display) {
		echo number_format($totalposts);
	} else {
		return number_format($totalposts);
	}
}


### Function: Get Total Pages
function get_totalpages($display = true) {
	global $wpdb;
	$totalpages = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish'");
	if($display) {
		echo number_format($totalpages);
	} else {
		return number_format($totalpages);
	}
}


### Function: Get Total Comments
function get_totalcomments($display = true) {
	global $wpdb;
	$totalcomments = $wpdb->get_var("SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_approved = '1'");
	if($display) {
		echo number_format($totalcomments);
	} else {
		return number_format($totalcomments);
	}
}


### Function: Get Total Comments Poster
function get_totalcommentposters($display = true) {
	global $wpdb;
	$totalcommentposters = $wpdb->get_var("SELECT COUNT(DISTINCT comment_author) FROM $wpdb->comments WHERE comment_approved = '1'");
	if($display) {
		echo number_format($totalcommentposters);
	} else {
		return number_format($totalcommentposters);
	}
}


### Function: Get Total Links
function get_totallinks($display = true) {
	global $wpdb;
	$totallinks = $wpdb->get_var("SELECT COUNT(link_id) FROM $wpdb->links");
	if($display) {
		echo number_format($totallinks);
	} else {
		return number_format($totallinks);
	}
}


### Function: Get Recent Posts
function get_recentposts($mode = '', $limit = 10, $display = true) {
    global $wpdb, $post;
	$where = '';
	$temp = '';
	if(!empty($mode) && $mode != 'both') {
		$where = "post_type = '$mode'";
	} else {
		$where = '1=1';
	}
    $recentposts = $wpdb->get_results("SELECT $wpdb->posts.*, $wpdb->users.display_name, $wpdb->users.user_nicename FROM $wpdb->posts LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author WHERE user_activation_key = '' AND post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND post_password = '' ORDER  BY post_date DESC LIMIT $limit");
	if($recentposts) {
		foreach ($recentposts as $post) {
			$post_title = get_the_title();
			$post_date = get_the_time(get_option('date_format').' @ '.get_option('time_format'));
			$display_name = get_the_author();
			$temp .= "<li>$post_date - <a href=\"".get_permalink()."\" title=\"".sprintf(__('View post %s', 'wp-stats'), $post_title)."\">$post_title</a> ($display_name)</li>\n";
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-stats').'</li>';
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Recent Comments
function get_recentcomments($mode = '', $limit = 10, $display = true) {
    global $wpdb, $post;
	$where = '';
	$temp = '';
	if(!empty($mode) && $mode != 'both') {
		$where = "post_type = '$mode'";
	} else {
		$where = '1=1';
	}
    $recentcomments = $wpdb->get_results("SELECT $wpdb->posts.*, comment_date FROM $wpdb->posts INNER JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND post_password = '' ORDER  BY comment_date DESC LIMIT $limit");
	if($recentcomments) {
		foreach ($recentcomments as $post) {
			$post_title = get_the_title();
			$comment_author = htmlspecialchars(stripslashes($post->comment_author));
			$comment_date = get_the_time(get_option('date_format'));
			$temp .= "<li>$comment_date - $comment_author (<a href=\"".get_permalink()."\" title=\"".sprintf(__('View comments in post %s', 'wp-stats'), $post_title)."\">$post_title</a>)</li>\n";
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-stats').'</li>';
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Top Commented Posts
function get_mostcommented($mode = '', $limit = 10, $chars = 0, $display = true) {
    global $wpdb, $post;
	$where = '';
	$temp = '';
	if(!empty($mode) && $mode != 'both') {
		$where = "post_type = '$mode'";
	} else {
		$where = '1=1';
	}
    $mostcommenteds = $wpdb->get_results("SELECT $wpdb->posts.*, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT $limit");
	if($mostcommenteds) {
		if($chars > 0) {
			foreach ($mostcommenteds as $post) {
				$post_title = get_the_title();
				$comment_total = intval($post->comment_total);
				$temp .= "<li><a href=\"".get_permalink()."\" title=\"".sprintf(__('View comments in post %s', 'wp-stats'), $post_title)."\">".snippet_chars($post_title, $chars)."</a> - $comment_total ".__('comments', 'wp-stats')."</li>";
			}
		} else {
			foreach ($mostcommenteds as $post) {
				$post_title = get_the_title();
				$comment_total = intval($post->comment_total);
				$temp .= "<li><a href=\"".get_permalink()."\" title=\"".sprintf(__('View comments in post %s', 'wp-stats'), $post_title)."\">$post_title</a> - $comment_total ".__('comments', 'wp-stats')."</li>";
			}
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-stats').'</li>';
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Author Stats
function get_authorsstats($mode = '', $display = true) {
	global $wpdb, $wp_rewrite;
	$where = '';
	$temp = '';
	if(!empty($mode) && $mode != 'both') {
		$where = "post_type = '$mode'";
	} else {
		$where = '1=1';
	}
	$posts = $wpdb->get_results("SELECT COUNT($wpdb->posts.ID) AS 'posts_total', $wpdb->users.display_name, $wpdb->users.user_nicename FROM $wpdb->posts LEFT JOIN $wpdb->users ON $wpdb->users.ID = $wpdb->posts.post_author WHERE user_activation_key = '' AND $where AND post_status = 'publish' GROUP BY $wpdb->posts.post_author");
	if($posts) {
		$using_permalink = get_option('permalink_structure');
		$permalink = $wp_rewrite->get_author_permastruct();
		foreach ($posts as $post) {
				$post_author = strip_tags(stripslashes($post->user_nicename));
				$author_link = str_replace('%author%', $post_author, $permalink);
				$display_name = strip_tags(stripslashes($post->display_name));
				$posts_total = intval($post->posts_total);				
				if($using_permalink) {
					$temp .= "<li><a href=\"".get_option('home').$author_link."\" title=\"".sprintf(__('View posts posted by %s', 'wp-stats'), $display_name)."\">$display_name</a> ($posts_total)</li>\n";
				} else {
					$temp .= "<li><a href=\"".get_option('siteurl')."/?author_name=$post_author\" title=\"".sprintf(__('View posts posted by %s', 'wp-stats'), $display_name)."\">$display_name</a> ($posts_total)</li>\n";
				}
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-stats').'</li>';
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Comments' Members Stats
// Treshhold = Number Of Posts User Must Have Before It Will Display His Name Out
// 5 = Default Treshhold; -1 = Disable Treshhold
function get_commentmembersstats($threshhold = -1, $limit = 0, $display = true) {
	global $wpdb;
	$temp = '';
	$limit_sql = '';
	if($limit > 0) {
		$limit_sql = "LIMIT $limit";
	}
	$comments = $wpdb->get_results("SELECT comment_author, COUNT(comment_ID) AS 'comment_total' FROM $wpdb->comments INNER  JOIN $wpdb->posts ON $wpdb->comments.comment_post_ID = $wpdb->posts.ID WHERE comment_approved = '1' AND post_date < '".current_time('mysql')."' AND post_status = 'publish' AND post_password = '' GROUP BY comment_author ORDER BY comment_total DESC $limit_sql");
	if($comments) {
		foreach ($comments as $comment) {
				$comment_author = strip_tags(stripslashes($comment->comment_author));
				$comment_author_link = urlencode($comment_author);
				$comment_total = intval($comment->comment_total);
				$temp .= "<li><a href=\"".stats_page_link($comment_author_link)."\" title=\"".sprintf(__('View all comments posted by %s', 'wp-stats'), $comment_author)."\">$comment_author</a> ($comment_total)</li>\n";
				// If Total Comments Is Below Threshold
				if($comment_total <= $threshhold && $threshhold != -1) {
					return;
				}
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-stats').'</li>';
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Post Categories Stats
function get_postcats($display = true) {
	global $wpdb;
	$temp = '';
	$defaults = array('type' => 'post', 'style' => 'list', 'show_count' => 1);
	$categories = get_categories($defaults);
	if (empty($categories)){
		$temp .= '<li>'.__('No categories', 'wp-stats').'</li>';
	} else {
		$temp .= walk_category_tree($categories, 0, $defaults);
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Links Categories Stats
function get_linkcats($display = true) {
	global $wpdb;
	$temp = '';
	$cats = get_categories('type=link');
	if ($cats) {
		foreach ($cats as $cat) {
			$temp .= '<li>'.$cat->cat_name.' ('.$cat->count.")</li>\n";
		}
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Get Tags List
function get_tags_list($display = true) {
	global $wpdb;
	$temp = '';
	$tags = get_tags('orderby=count&order=DESC');
	if ($tags) {
		foreach ($tags as $tag) {
			$temp .= '<li><a href="'.clean_url(get_tag_link($tag->term_id)).'" title="'.sprintf(__('%s topics', 'wp-stats'), $tag->count).'">'.$tag->name.'</a> ('.$tag->count.")</li>\n";
		}
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}


### Function: Snippet Characters
if(!function_exists('snippet_chars')) {
	function snippet_chars($text, $length = 0) {
		$text = htmlspecialchars_decode($text);
		 if (strlen($text) > $length){       
			return htmlspecialchars(substr($text,0,$length)).'...';             
		 } else {
			return htmlspecialchars($text);
		 }
	}
}


### Function: HTML Special Chars Decode
if (!function_exists('htmlspecialchars_decode')) {
   function htmlspecialchars_decode($text) {
       return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
   }
}


### Function: Place Statistics Page In Content
add_filter('the_content', 'place_stats', '7');
function place_stats($content){
     $content = preg_replace( "/\[page_stats\]/ise", "stats_page()", $content); 
    return $content;
}


### Function: Stats Page
function stats_page_link($author, $page = 0) {
	$stats_url = get_option('stats_url');
	if($page > 1) {
		$page = "&amp;stats_page=$page";
	} else {
		$page = '';
	}
	if(strpos($stats_url, '?') !== false) {
		$stats_url = "$stats_url&amp;stats_author=$author$page";
	} else {
		$stats_url = "$stats_url?stats_author=$author$page";
	}
	return $stats_url;
}


### Function: Statistics Page
function stats_page() {
	global $wpdb, $post;			
	// Variables Variables Variables
	$comment_author = urldecode(strip_tags(stripslashes(trim($_GET['stats_author']))));
	$page = intval($_GET['stats_page']);
	$temp_stats = '';
	$temp_post = $post;
	$stats_mostlimit = intval(get_option('stats_mostlimit'));
	$stats_display = get_option('stats_display');

	// Default wp-stats.php Page
	if(empty($comment_author)) {
		// General Stats
		if($stats_display['total_stats'] == 1) {
			$temp_stats .= '<h2>'.__('General Stats', 'wp-stats').'</h2>'."\n";
			$temp_stats .= '<p><strong>'.__('Total Stats', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= '<li><strong>'.get_totalauthors(false).'</strong> '.__('authors to this blog.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.get_totalposts(false).'</strong> '.__('posts were posted.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.get_totalpages(false).'</strong> '.__('pages were created.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.wp_count_terms('post_tag').'</strong> '.__('tags were created.', 'wp-stats').'</li>'."\n";		
			$temp_stats .= '<li><strong>'.get_totalcomments(false).'</strong> '.__('comments were posted.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.get_totalcommentposters(false).'</strong> '.__('different nicknames were represented in the comments.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.get_totallinks(false).'</strong> '.__('links were added.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.wp_count_terms('category').'</strong> '.__('post categories were needed.', 'wp-stats').'</li>'."\n";
			$temp_stats .= '<li><strong>'.wp_count_terms('link_category').'</strong> '.__('link categories were needed.', 'wp-stats').'</li>'."\n";
			if(function_exists('akismet_spam_count')) {
				$temp_stats .= '<li><strong>'.number_format(get_option('akismet_spam_count')).'</strong> '.__('spam blocked.', 'wp-stats').'</li>'."\n";
			}
			// WP-Stats: General Stats Filter
			$temp_stats = apply_filters('wp_stats_page_general', $temp_stats);
			$temp_stats .= '</ul>'."\n";
		}

		// Plugin Stats
		$temp_stats .= '<h2>'.__('Plugins Stats', 'wp-stats').'</h2>'."\n";
				
		// WP-Stats: Plugins Stats Filter
		$temp_stats = apply_filters('wp_stats_page_plugins', $temp_stats);

		// Top Recent Stats
		$temp_stats .= '<h2>'.sprintf(__('Top %s Recent Stats', 'wp-stats'), $stats_mostlimit).'</h2>'."\n";

		// Recent Posts
		if($stats_display['recent_posts'] == 1) {
			$temp_stats .= '<p><strong>'.$stats_mostlimit.' '.__('Recent Posts', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_recentposts('post', $stats_mostlimit, false);
			$temp_stats .= '</ul>'."\n";
		}

		// Recent Comments
		if($stats_display['recent_commtents'] == 1) {
			$temp_stats .= '<p><strong>'.$stats_mostlimit.' '.__('Recent Comments', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_recentcomments('post', $stats_mostlimit, false);
			$temp_stats .= '</ul>'."\n";
		}

		// WP-Stats: Top Recent Stats Filter
		$temp_stats = apply_filters('wp_stats_page_recent', $temp_stats);

		// Top Most Stats
		$temp_stats .= '<h2>'.sprintf(__('Top %s Most/Highest Stats', 'wp-stats'), $stats_mostlimit).'</h2>'."\n";

		// Most Commented Post
		if($stats_display['commented_post'] == 1) {
			$temp_stats .= '<p><strong>'.$stats_mostlimit.' '.__('Most Commented Post', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_mostcommented('post', $stats_mostlimit, 0, false);
			$temp_stats .= '</ul>'."\n";
		}
		
		// WP-Stats: Top Most/Highest Stats Filter
		$temp_stats = apply_filters('wp_stats_page_most', $temp_stats);
		
		// Authors Stats
		$temp_stats .= '<h2>'.__('Authors Stats', 'wp-stats').'</h2>'."\n";

		// Authors
		if($stats_display['authors'] == 1) {
			$temp_stats .= '<p><strong>'.__('Authors', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ol>'."\n";
			$temp_stats .= get_authorsstats('post', false);
			$temp_stats .= '</ol>'."\n";
		}

		// WP-Stats: Authors Stats Filter
		$temp_stats = apply_filters('wp_stats_page_authors', $temp_stats);			

		// Comments' Members Stats
		$temp_stats .= '<h2>'.__('Comments\' Members Stats', 'wp-stats').'</h2>'."\n";

		// Comments' Member
		if($stats_display['comment_members'] == 1) {
			$temp_stats .= '<p><strong>'.__('Comment Members', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ol>'."\n";
			$temp_stats .= get_commentmembersstats(-1, 0, false);
			$temp_stats .= '</ol>'."\n";
		}

		// WP-Stats: Comments' Members Stats Filter
		$temp_stats = apply_filters('wp_stats_page_comments_members', $temp_stats);

		// Misc Stats
		$temp_stats .= '<h2>'.__('Misc Stats', 'wp-stats').'</h2>'."\n";

		// Post Categories
		if($stats_display['post_cats'] == 1) {
			$temp_stats .= '<p><strong>'.__('Post Categories', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_postcats(false);
			$temp_stats .= '</ul>'."\n";
		}

		// Link Categories
		if($stats_display['link_cats'] == 1) {
			$temp_stats .= '<p><strong>'.__('Link Categories', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_linkcats(false);
			$temp_stats .= '</ul>'."\n";
		}

		if($stats_display['tags_list'] == 1) {
			$temp_stats .= '<p><strong>'.__('Tags List', 'wp-stats').'</strong></p>'."\n";
			$temp_stats .= '<ul>'."\n";
			$temp_stats .= get_tags_list(false);
			$temp_stats .= '</ul>'."\n";
		}

		// WP-Stats: Plugin Misc Filter
		$temp_stats = apply_filters('wp_stats_page_misc', $temp_stats);

	// Displaying Comments Posted By User
	} else {
		// Stats URL
		$stats_url = get_option('stats_url');
		// Number Of Comments Per Page
		$perpage = 10;
		// Comment Author Link
		$comment_author_link = urlencode($comment_author);
		// Comment Author SQL
		$comment_author_sql = $wpdb->escape($comment_author);
		// Total Comments Posted By User
		$totalcomments = $wpdb->get_var("SELECT COUNT(comment_ID) FROM $wpdb->comments INNER  JOIN $wpdb->posts ON $wpdb->comments.comment_post_ID = $wpdb->posts.ID WHERE comment_author =  '$comment_author_sql' AND comment_approved = '1' AND post_date < '".current_time('mysql')."' AND post_status = 'publish' AND post_password = ''");
		// Checking $page and $offset
		if (empty($page) || $page == 0) { $page = 1; }
		if (empty($offset)) { $offset = 0; }
		// Determin $offset
		$offset = ($page-1) * $perpage;
		// Some Comments Stats
		if(($offset + $perpage) > $totalcomments) { $maxonpage = $totalcomments ; } else { $maxonpage = ($offset+$perpage); }
		if (($offset + 1) > ($totalcomments)) { $displayonpage = $totalcomments ; } else { $displayonpage = ($offset+1); }
		// Count Total Pages
		$totalpages = ceil($totalcomments/$perpage);
		// Getting The Comments
		$gmz_comments =  $wpdb->get_results("SELECT $wpdb->posts.*, $wpdb->comments.* FROM $wpdb->comments INNER  JOIN $wpdb->posts ON $wpdb->comments.comment_post_ID = $wpdb->posts.ID WHERE comment_author =  '$comment_author_sql' AND comment_approved = '1' AND post_date < '".current_time('mysql')."' AND post_status = 'publish' AND post_password = '' ORDER  BY comment_post_ID DESC, comment_date DESC  LIMIT $offset, $perpage");
		$temp_stats .= '<h2>'.__('Comments Posted By', 'wp-stats').' '.$comment_author.'</h2>';
		$temp_stats .= '<p>'.sprintf(__('Displaying <strong>%s</strong> To <strong>%s</strong> Of <strong>%s</strong> Comments', 'wp-stats'), $displayonpage, $maxonpage, $totalcomments).'</p>';


		// Get Comments
		if($gmz_comments) {
			foreach($gmz_comments as $post) {
				$comment_id = intval($post->comment_ID);
				$comment_author2 = htmlspecialchars(stripslashes($post->comment_author));
				$comment_date = mysql2date(sprintf(__('%s @ %s', 'wp-stats'), get_option('date_format'), get_option('time_format')), $post->comment_date);
				$comment_content = wpautop(stripslashes($post->comment_content));
				$post_date = get_the_time(sprintf(__('%s @ %s', 'wp-stats'), get_option('date_format'), get_option('time_format')));
				$post_title = get_the_title();

				// Check For Password Protected Post
				if(!empty($post->post_password) && stripslashes($_COOKIE['wp-postpass_'.COOKIEHASH]) != $post->post_password) {
					// If New Title, Print It Out
					if($post_title != $cache_post_title) {
						$temp_stats .= "<p><strong><a href=\"".get_permalink()."\" title=\"".__('Posted On', 'wp-stats')." $post_date\">".__('Protected', 'wp-stats').": $post_title</a></strong></p>";
						$temp_stats .= '<blockquote>'.__('Comments Protected', 'wp-stats').'</blockquote>';	
					}							
				} else {
					// If New Title, Print It Out
					if($post_title != $cache_post_title) {
						$temp_stats .= "<p><strong><a href=\"".get_permalink()."\" title=\"".__('Posted On', 'wp-stats')." $post_date\">$post_title</a></strong></p>";
					}
					$temp_stats .= "<blockquote>$comment_content <a href=\"".get_permalink()."#comment-$comment_id\" title=\"".sprintf(__('View the comment posted by %s', 'wp-stats'), $comment_author2)."\">Comment</a> ".__('Posted By', 'wp-stats')." <strong>$comment_author2</strong> ".__('On', 'wp-stats')." $comment_date</blockquote>";						
				}
				$cache_post_title = $post_title;
			}
		} else {
				$temp_stats .= "<p>$comment_author ".__('has not made any comments yet.', 'wp-stats')."</p>";
		}

		// If Total Pages Is More Than 1, Display Page Navigation
		if($totalpages > 1) {
			// Previous Page
			$temp_stats .= '<p>';
			$temp_stats .= '<span style="float: left">';
			if($page > 1 && ((($page*$perpage)-($perpage-1)) < $totalcomments)) {
				$temp_stats .= '<strong>&laquo;</strong> <a href="'.stats_page_link($comment_author_link, $page-1).'" title="&laquo; '.__('Previous Page', 'wp-stats').'">'.__('Previous Page', 'wp-stats').'</a>';
			} else {
				$temp_stats .= '&nbsp;';
			}
			$temp_stats .= '</span>';
			// Next Page
			$temp_stats .= '<span style="float: right">';
			if($page >= 1 && ((($page*$perpage)+1) <  $totalcomments)) {
				$temp_stats .= '<a href="'.stats_page_link($comment_author_link, $page+1).'" title="'.__('Next Page', 'wp-stats').' &raquo;">'.__('Next Page', 'wp-stats').'</a> <strong>&raquo;</strong>';
			} else {
				$temp_stats .= '&nbsp;';
			}
			$temp_stats .= '</span>';
			$temp_stats .= '</p>';
			// Pages
			$temp_stats .= '<br style="clear: both" />';
			$temp_stats .= '<p align="center">';
			$temp_stats .= sprintf(__('Pages (%s)', 'wp-stats'), $totalpages).': ';
			if ($page >= 4) {
				$temp_stats .= '<strong><a href="'.stats_page_link($comment_author_link).'" title="'.__('Go to First Page', 'wp-stats').'">&laquo; '.__('First', 'wp-stats').'</a></strong> ... ';
			}
			if($page > 1) {
				$temp_stats .= ' <strong><a href="'.stats_page_link($comment_author_link, $page-1).'" title="&laquo; '.__('Go to Page', 'wp-stats').' '.($page-1).'">&laquo;</a></strong> ';
			}
			for($i = $page - 2 ; $i  <= $page +2; $i++) {
				if ($i >= 1 && $i <= $totalpages) {
					if($i == $page) {
						$temp_stats .= "<strong>[$i]</strong> ";
					} else {
						$temp_stats .= '<a href="'.stats_page_link($comment_author_link, $i).'" title="'.__('Page', 'wp-stats').' '.$i.'">'.$i.'</a> ';
					}
				}
			}
			if($page < $totalpages) {
				$temp_stats .= ' <strong><a href="'.stats_page_link($comment_author_link, $page+1).'" title="'.__('Go to Page', 'wp-stats').' '.($page+1).' &raquo;">&raquo;</a></strong> ';
			}
			if (($page+2) < $totalpages) {
				$temp_stats .= ' ... <strong><a href="'.stats_page_link($comment_author_link, $totalpages).'" title="'.__('Go to Last Page', 'wp-stats').'">'.__('Last', 'wp-stats').' &raquo;</a></strong>';
			}
			$temp_stats .= '</p>';
		}
		$temp_stats .= '<p><strong>&laquo;&laquo;</strong> <a href="'.$stats_url.'">'.__('Back To Stats Page', 'wp-stats').' </a></p>';
	} // End If
	
	// Assign Back $post
	$post = $temp_post;

	// Output Stats Page
	return $temp_stats;
}


### Function: Stats Option
add_action('activate_stats/stats.php', 'stats_init');
function stats_init() {
	global $wpdb;
	$stats_display = array('total_stats'  => 1, 'email'  => 1, 'polls' => 1, 'ratings' => 1, 'views' => 1, 'useronline' => 1, 'recent_posts' => 1, 'recent_commtents' => 1, 'commented_post' => 1, 'emailed_most' => 1, 'rated_highest' => 1, 'rated_most' => 1, 'viewed_most' => 1, 'authors' => 1, 'comment_members' => 1, 'post_cats' => 1, 'link_cats' => 1);  
	add_option('stats_mostlimit', '10', 'Stats Most Limit');
	add_option('stats_display', $stats_display, 'Stats To Display');
	add_option('stats_url', get_option('siteurl').'/stats/', 'Stats URL');
}
?>