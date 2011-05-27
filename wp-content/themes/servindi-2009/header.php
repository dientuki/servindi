<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php bloginfo('name'); ?><?php wp_title(); ?> | <?php bloginfo('description'); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="google-site-verification" content="S8QHdKZgy1zXXoaOVyV6v-9F9QVuzigL_XsUKOueXTE" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<meta name="description" content="Servindi es un sitio web especializado en promover el di&aacute;logo intercultural sobre temas de interes ind&iacute;gena y ecol&oacute;gico" />
	<meta name="keywords" content="intercultural,indigena, ecologico, peru, servindi, Servicios en Comunicacion Intercultural Servindi" />
	<meta http-equiv="Cache-Control" content ="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="Diego Lerma" />
	<meta name="language" content="es" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="SERVINDI en RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="SERVINDI en Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body>
<div id="wraper">
	<div id="nav"><ul><li class="page_item"><a href="<?php bloginfo('url'); ?>">Inicio</a></li>
			<?php // wp_list_pages('depth=1&title_li='); ?>
			<li class="page_item page-item-1125"><a href="http://www.servindi.org/comentarios" title="Últimos comentarios">&Uacute;ltimos comentarios</a></li>
			<li class="page_item page-item-20"><a href="http://www.servindi.org/nosotros" title="&iquest;Quiénes somos?">&iquest;Qui&eacute;nes somos?</a></li>
			<li class="page_item page-item-31"><a href="http://www.servindi.org/contacto" title="Contacto">Contacto</a></li>
		</ul>
	</div>

<!-- header photo -->
<div id="cabecera">
	<h1 id="logo-text"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('description'); ?></a></h1>
	<?php get_search_form()?>
	<a class="logo" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
</div>
<!-- header photo end -->

<!-- menu -->
<div class="menu">
	<ul>
	<?php $categorias = get_categories('&hide_empty=0&parent=0'); foreach($categorias as $cat):?>
			<li>
				<a href="<?php echo get_category_link($cat->cat_ID); ?>" title="<?php echo $cat->category_description; ?>"><?php echo $cat->cat_name; ?></a>
				
				<?php $padre =  get_categories("child_of=" . $cat->cat_ID); if ( count($padre) > 0 ): ?>
				<ul>
					<?php foreach ($padre as $hijo):?>
					<li><a href="<?php echo get_category_link($hijo->cat_ID); ?>" title="<?php echo $hijo->category_description ?>"><?php echo $hijo->cat_name ?></a></li>
					<?php endforeach;?>
				</ul>
				<?php endif; ?>
			</li>
	<?php endforeach;?>
		<li><a href="<?php bloginfo('url'); ?>/galeria">Galeria</a></li>
		<li><a href="<?php bloginfo('url'); ?>/enlaces">Enlaces</a></li>
	</ul>	
</div>
<!-- menu end -->
<div align="center"><div style="background-color: #009B00; color: White; font-size: 13pt; font-weight: bold; width:870px;">Comunicaci&oacute;n intercultural para un mundo m&aacute;s humano y diverso</div></div>
