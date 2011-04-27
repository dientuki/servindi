<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="generator" content="SERVINDI + WordPress <?php bloginfo('version');?>" />
<meta name="description" content="Servindi es un sitio web especializado en promover el diálogo intercultural sobre temas de interes indigena y ecológico" />
<meta name="keywords" content="intercultural,indigena, ecologico, peru" />
<meta name="verify-v1" content="Y1JplJKmZ8mxw0v1ktGz7mdb63V6cqHBiUKIupLPApg=" />

<style type="text/css" media="screen">
@import url(  <?php bloginfo('stylesheet_url'); ?> );
@import url(  style.css );
</style>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="wp-content/themes/verde/print.css" media="print" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<title>Servindi <?php wp_title(); ?></title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="contenedor">

	<div id="front">
	
		<div align="center" id="cabecera">
			<div id="arealogo">
			<h1 class="rotulo">SERVINDI</h1>
			</div>
			<div id="arealema">
			<h1>Comunicaci&oacute;n intercultural para un mundo m&aacute;s humano y diverso
			</h1>
			</div>
		</div>
		
		<div id="columnas">
		
			<div id="columna1">
			
				<div id="buscar">
				<form method=GET action="http://www.google.com/search">
				<input type="hidden" name="ie" value="UTF-8">
				<input type="hidden" name="sitesearch" value="www.servindi.org">
				<input type="hidden" name="domains" value="www.servindi.org">
				<table width="400"  border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				<td width="22%" align="right" valign="middle"><!-- SiteSearch Google -->
				<a href="http://www.google.com/">
				<img src="http://www.google.com/logos/Logo_25wht.gif" alt="Google" width="75" height="32"
				border="0"></a>
				<!-- SiteSearch Google --></td>
				<td width="78%" align="center" valign="middle">
				<input type=text name=q size=31 maxlength=255 value="">
				<input type=submit name=btnG value="Buscar">
				</td>
				</tr>
				</table>
				</form>
				</div>
				
				<div id="contenido">
					<?php 
					if(!is_home()) {
					echo '<div id="volver">';
					echo '<small>';
					echo '&nbsp;&nbsp;<a href="http://www.servindi.org/">&laquo; Volver a la página principal</a>';
					echo '</small>';
					//echo '<hr size="1" />';
					echo '</div>';
					} 
					?> 
					
				<!-- The Loop -->
				<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
				
					<div class="post">
<?php if(is_home()) { ?>
<span class="fecha"><?php the_date('','',''); ?> <?php the_time() ?></span>
<?php } ?> 
					<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
						<div class="encategoria"><small>
						<?php 
						if(!is_page()) {
						_e("clasificado en:"); ?> 
						<?php the_category() ?>.
						<?php 
						edit_post_link();
						}
						?>
						</small></div>
					
						<div class="texto">
						<?php the_content('<br/><br/>Continuar leyendo ...<br/><br/>'); ?> <?php wp_link_pages(); ?>
						
						
						<!-- <span id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
						Enlace Permanente</a></span> -->
						
							<div class="comentarios">
							<?php comments_popup_link(__('Agrega un Comentario'), __('1 Comentario'), __('% Comentarios')); ?>
							</div>
						</div>
					
						<!--
						<?php trackback_rdf(); ?>
						-->
						
						<?php comments_template(); ?>
						
					</div>
				<?php endforeach; else: ?>
				
					<p><?php _e('Disculpe, No existen post que correspondan con su busqueda.'); ?></p>
				
				<?php endif; ?>
				<!-- Fin de The Loop -->
				
				<div class="navegador">
				<?php posts_nav_link(' &#8212; ', __('&laquo; P&aacute;gina anterior'), __('Siguiente p&aacute;gina &raquo;')); ?>
				</div>
					
				</div>
			
			</div>
		
			<?php get_sidebar(); ?>
		
		</div>
		
		<div align="center" id="pie">Servindi.org es un sitio web especializado en promover el di&aacute;logo intercultural sobre temas de inter&eacute;s ind&iacute;gena y ecol&oacute;gico<br />
		<p>
		Las ediciones son de responsabilidad propia y no compromete la opinión de ninguna organización indígena local, nacional o internacional.
		Las opiniones contenidas en los artículos firmados son de exclusiva responsabilidad de sus autores. Servindi no comparte necesariamente la opinión de los artículos con autoría.
		</p>
		<p>
		<!-- Creative Commons License -->
		<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.5/"><img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.gif" /></a><br />
		<!-- /Creative Commons License -->
		
		<!--
		
		<rdf:RDF xmlns="http://web.resource.org/cc/"
		xmlns:dc="http://purl.org/dc/elements/1.1/"
		xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
		<Work rdf:about="">
		<dc:type rdf:resource="http://purl.org/dc/dcmitype/Interactive" />
		<license rdf:resource="http://creativecommons.org/licenses/by-nc-sa/2.5/" />
		</Work>
		
		<License rdf:about="http://creativecommons.org/licenses/by-nc-sa/2.5/">
		<permits rdf:resource="http://web.resource.org/cc/Reproduction" />
		<permits rdf:resource="http://web.resource.org/cc/Distribution" />
		<requires rdf:resource="http://web.resource.org/cc/Notice" />
		<requires rdf:resource="http://web.resource.org/cc/Attribution" />
		<prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />
		<permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />
		<requires rdf:resource="http://web.resource.org/cc/ShareAlike" />
		</License>
		
		</rdf:RDF>
		
		-->
		
		<a href="http://creativecommons.org/licenses/by-nc-sa/2.5/">Los contenidos de este sitio se encuentran bajo licencia : Reconocimiento al autor, Sin fin de lucro, Compartir igual </a><br />
		
		<a href="http://www.servindi.org/feed" title="Sindique las noticias usando RSS">Sindique las noticias ( <abbr title="Really Simple Syndication">RSS</abbr>)</a> | Desarrollado por <a href="http://www.backd.com/">backdraft</a> | Administrado por <a href="http://diego.lermagomez.com">Diego Lerma</a><br />
<!-- <a id="mws4525688" href="http://webstats.motigo.com/">
<img width="18" height="18" border="0" alt="Free counter and web stats" src="http://m1.webstats.motigo.com/n.gif?id=AEUOeAbZiEWp4QOOEZfeiNGQTWwA" /></a>
<script type="text/javascript" src="http://m1.webstats.motigo.com/c.js?id=4525688"></script>
--></p></div>	
</div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1726914-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>