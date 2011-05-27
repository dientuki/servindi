<?php get_header(); ?>

  <div id="content-wrap">
    <!-- content -->
    <div id="main">
      <?php  while(have_posts()): the_post(); ?>
      <div id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></h2>
        <div class="entry">
<?php echo rflc_show_comments(); ?>
          <p class="postmeta">
<?php if(function_exists('the_views')) { echo "Le&iacute;do: "; the_views(); echo "&nbsp;|&nbsp;"; } ?> 
<?php if (function_exists('author_exposed')){ author_exposed(); } else { the_author(); } ?>&nbsp;|&nbsp;
<?php the_category(', ') ?>&nbsp;|&nbsp;<?php the_time('m jS, Y') ?>&nbsp;|&nbsp;
<?php if(function_exists('wp_email')) { email_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php if(function_exists('wp_print')) { print_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php edit_post_link('Editar','','&nbsp;|&nbsp;'); ?><?php comments_popup_link('Sin comentarios &raquo;', 'Alguien opino &raquo;', '% comentarios &raquo;'); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
</p>
        </div>
      </div>
      <?php endwhile; ?>
	<div id="mas20">
	<h4>M&aacute;s noticias</h4>
	
	<?php if ($paged == 0) : $offset = 10; else: $offset = $paged*10; endif ?>

<?php
		$my_query = new WP_Query('posts_per_page=20&offset='.$offset); 
		while ($my_query->have_posts()) : $my_query->the_post(); 
	?>
	<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
	<?php endwhile; ?></div>
	
      <div class="navigation">
<?php // posts_nav_link() ?>
<div class="nav-previous"><?php previous_posts_link('Anterior') ?></div>
<div class="nav-next"><?php next_posts_link('Siguiente') ?></div>
      </div>

    </div>
    <!-- content End -->
	<?php get_sidebar(); ?>
  </div>
    <?php get_footer(); ?>
