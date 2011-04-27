<?php
/*
Plugin Name: Real Fast Latest Comments
Plugin URI: http://agkamai.com/
Description: Lighter than others ;)
Author: Edmundo Hidalgo
Version: 1
Author URI: http://www.agkamai.com/
*/

function rflc_show_comments($comment_limit = 20, $show_trackbacks = false) {
	global $wpdb;
	//$comment_query = 'SELECT '. $wpdb->comments .'.comment_author, '. $wpdb->comments .'.comment_ID, '. $wpdb->posts .'.post_title, '. $wpdb->posts .'.ID FROM '. $wpdb->comments .' INNER JOIN '. $wpdb->posts .' ON '
	if(!$show_trackbacks) {
		$activity = $wpdb->get_results("SELECT $wpdb->comments.comment_content,
										$wpdb->comments.comment_date, $wpdb->comments.comment_author, 
										$wpdb->comments.comment_ID, $wpdb->posts.post_title, 
										$wpdb->posts.ID FROM $wpdb->comments INNER JOIN 
										$wpdb->posts ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE 
										$wpdb->comments.comment_approved = '1' AND $wpdb->comments.comment_type 
										NOT LIKE '%back%' ORDER BY $wpdb->comments.comment_date DESC
										LIMIT $comment_limit");
	} else {
		$activity = $wpdb->get_results("SELECT $wpdb->comments.comment_content,
										$wpdb->comments.comment_date, $wpdb->comments.comment_author, 
										$wpdb->comments.comment_ID, $wpdb->posts.post_title, 
										$wpdb->posts.ID FROM $wpdb->comments INNER JOIN 
										$wpdb->posts ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE 
										$wpdb->comments.comment_approved = '1' 
										ORDER BY $wpdb->comments.comment_date DESC
										LIMIT $comment_limit");
	}
	
	if($activity) {
		echo '<ul id="featconv">';
		foreach($activity as $comment) {
			echo '<li><strong>'.$comment->comment_author.'</strong> en <em><a href="'. get_permalink($comment->ID) .'#comment-'. $comment->comment_ID .'">'. $comment->post_title .'</a></em>';
			echo '<p>'.$comment->comment_content.'<br/><br/>';
			echo '<a href="'. get_permalink($comment->ID) .'#comment-'. $comment->comment_ID .'">» Responder</a></p></li>';
			
			//echo var_dump($comment);
		}
		echo '</ul>';
	}
}
?>