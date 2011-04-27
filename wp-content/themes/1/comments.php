<?php // Do not delete these lines
 if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_'.$cookiehash] != $post->post_password) { // and it doesn't match the cookie
?><p>Esta entrada esta protegida</p><?php return; }
}
  /* This variable is for alternating comment background */
  $oddcomment = "espar";
?><!-- You can start editing here. -->
<?php if ($comments) : ?>
<div id="comentarios">
 <a name="comments"></a><h2><?php comments_number('Sin respuestas','Una respuesta','% respuestas' );?></h2>
 <ol style="text-align:left">
 <?php $contador = 0;
 foreach ($comments as $comment) :
 $contador++; ?>
  <li class="<?=$oddcomment;?>" style="border-bottom:2px solid #e3e3e3; margin-bottom:10px;">
   <a name="comment-<?php comment_ID() ?>"><?php echo "# " .$contador; ?></a><cite><?php comment_author_link() ?></cite> dice: <?php edit_comment_link('(Editar respuesta)','',''); ?><br />   <span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="Comentario en SERVINDI <?php comment_time() ?>"><?php comment_date('F jS, Y') ?> a las <?php comment_time(); ?></a> </span>
   <?php comment_text() ?>
  </li>
  <?php /* Changes every other comment to a different class */ 
   if("espar" == $oddcomment) {$oddcomment="esimpar";}
   else { $oddcomment="espar"; }
  ?>
 <?php endforeach; /* end for each comment */ ?>
 </ol>
</div>
 <?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post->comment_status) : ?>
  <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <p class="nocomments">Ya no se permiten m&aacute;s comentarios.</p>
 <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div id="nueva-respuesta">
<a name="respond"></a><h2>Dar tu opini&oacute;n</h2>
<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
<p><label for="author">Tu nombre:</label><br />
<input type="text" name="author" id="author" class="styled" value="<?php echo $comment_author; ?>" size="22" tabindex="1" style="border:1px solid #e3e3e3; padding:3px" /></p>
<p><label for="email">E-mail</label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" style="border:1px solid #e3e3e3; padding:3px"/> (no ser&aacute; publicado)</p>
<p><label for="url">Direcci&oacute;n web:</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" style="border:1px solid #e3e3e3; padding:3px"/></p>
<div id="xhtml-tags"><strong>XHTML:</strong><br />
Para escribir tu entrada puedes usar estas etiquetas: <?php echo allowed_tags(); ?></div>
<p><textarea name="comment" id="comment" cols="45" rows="10" tabindex="4" style="border:1px solid #e3e3e3; padding:3px;"></textarea>
</p><?php if ('none' != get_settings("comment_moderation")) { ?>
<?php } ?>
<p><br /><input name="submit" type="submit" id="submit" tabindex="5" value="Mandar comentario" /></p>
<!-- <div class="comentario-advertencia"><strong>A tener en cuenta:</strong><br /> El comentario enviado deber&aacute; ser revisado por uno de nuestros moderadores para que sea publicado.<br />Este proceso no debe tardar m&aacute;s de 24 horas.</div> -->
</form>
</div>
<?php // if you delete this the sky will fall on your head
endif; ?>