<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<meta name="description" content="Servindi es un sitio web especializado en promover el dialogo intercultural sobre temas de interes indigena y ecologico" />
<meta name="keywords" content="intercultural,indigena, ecologico, peru, servindi, <?php get_tags(1); ?>" />
<meta http-equiv="Cache-Control" content ="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta name="robots" content="index,follow" />
<meta name="author" content="Diego Lerma" />
<meta name="language" content="es" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="SERVINI en RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="SERVINDI en Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>
</head>
<body>
<div id="wraper">
  <?php get_header(); ?>

  <div id="content-wrap">
    <!-------------content ---------------->
    <div id="main">
      <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
      <div id="post-<?php the_ID(); ?>">
        <h2> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a> </h2>
        <div class="entry">
<?php the_content('Seguir leyendo...'); ?>
		  <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<p class="postmeta">
<?php if(function_exists('the_views')) { the_views(); echo "&nbsp;|&nbsp;"; } ?> 
<?php if (function_exists('author_exposed')){ author_exposed(); } else { the_author(); } ?>&nbsp;|&nbsp;
<?php the_category(', ') ?>&nbsp;|&nbsp;<?php the_time('m jS, Y') ?>&nbsp;|&nbsp;
<?php if(function_exists('wp_email')) { email_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php if(function_exists('wp_print')) { print_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php edit_post_link('Editar','','&nbsp;|&nbsp;'); ?><?php comments_popup_link('Sin comentarios &raquo;', 'Alguien opino &raquo;', '% comentarios &raquo;'); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); 
// echo "&nbsp;|&nbsp;";
 } ?>
</p>
<?php comments_template(); ?>
          
        </div>
      </div>
      <?php endwhile; ?>
      <div class="navigation">
<?php // posts_nav_link(); ?>
			<div class="nav-previous"><?php previous_posts_link('Anterior') ?></div>
	    <div class="nav-next"><?php next_posts_link('Siguiente') ?></div>
      </div>
      <?php else : ?>
      <div class="post">
        <h2><?php _e('No encontrado'); ?></h2>
      </div>
      <?php endif; ?>
    </div>
    <!-------------content End ---------------->
    <?php get_sidebar(); ?>
  </div>
  <div id="footer-wrap">
    <?php get_footer(); ?>
  </div>
</div>
</body>
</html>