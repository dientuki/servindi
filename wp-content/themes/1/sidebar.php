<div class="sidebar">
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
	<?php if ( get_option("servindi_audio") <> "" ){ ?>
	<div>
		<h2 class="widgettitle"><a href="http://www.servindi.org/category/multimedia/audios/resumen-noticias-semanal" style="color: #88AC0B;">Resumen semanal!</a></h2>
		<div class="textwidget" align="center">
<h3>Edici&oacute;n internacional</h3>
			<object type="application/x-shockwave-flash" data="http://www.servindi.org/wp-content/plugins/audio-player/assets/player.swf" width="220" height="24" id="audioplayer1">
			<param name="movie" value="http://www.servindi.org/wp-content/plugins/audio-player/assets/player.swf" />
			<param name="FlashVars" value="playerID=1&amp;bg=0xf8f8f8&amp;leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xcccccc&amp;rightbghover=0x999999&amp;righticon=0x666666&amp;righticonhover=0xffffff&amp;text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0x9FFFB8&amp;soundFile=<?php echo urlencode(get_option("servindi_audio")); ?>" />
			<param name="quality" value="high" />
			<param name="menu" value="false" />
			<param name="bgcolor" value="#FFFFFF" />
			</object><br />
			<a href="<?php echo get_option("servindi_audio"); ?>" target="_blank">Descargar</a>
		</div>
		<div class="textwidget" align="center">
<h3>Edici&oacute;n Per&uacute;</h3>
			<object type="application/x-shockwave-flash" data="http://www.servindi.org/wp-content/plugins/audio-player/assets/player.swf" width="220" height="24" id="audioplayer1">
			<param name="movie" value="http://www.servindi.org/wp-content/plugins/audio-player/assets/player.swf" />
			<param name="FlashVars" value="playerID=1&amp;bg=0xf8f8f8&amp;leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xcccccc&amp;rightbghover=0x999999&amp;righticon=0x666666&amp;righticonhover=0xffffff&amp;text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0x9FFFB8&amp;soundFile=<?php echo urlencode(get_option("servindi_nacional")); ?>" />
			<param name="quality" value="high" />
			<param name="menu" value="false" />
			<param name="bgcolor" value="#FFFFFF" />
			</object><br />
			<a href="<?php echo get_option("servindi_nacional"); ?>" target="_blank">Descargar</a>
		</div>
	</div>
	<?php  } ?>
	<div>
		<a href="http://www.servindi.org/seccion/actualidad/articulos-en-ingles"><img src="http://www.servindi.org/img//2010/09/Cdr_Ingles.png" border="0" width="280" height="120" /></a>
	</div>
		<div>		<h2 class="widgettitle"><center>Bagua</center></h2>		<div class="textwidget">			<center><a href="http://bagua.servindi.org/"><img src="http://servindi.org/img/bagua.jpg"/></a></center>		</div>	</div>	
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
	<?php  } ?>			<div>		<h3 class="widgettitle"><center>Cumbre Continental de Comunicadores y Comunicadoras Ind&iacute;genas del Abya Yala</center>	</h3>		<div class="textwidget">			<center><a href="http://www.cccia-2010.com/"><img src="http://servindi.org/img/cumbre-de-comunicadores.jpg"/></a></center>		</div>	</div>		
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
