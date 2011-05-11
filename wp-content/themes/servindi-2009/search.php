<?php get_header(); ?>

  <div id="content-wrap">
    <!-- content -->
    <div id="main">
      <?php if(have_posts()): ?>
      <?php $bandera = false;
	  while(have_posts()): the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="<?php echo ($bandera)?"espar":"esimpar"; ?>">
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></h2>
        <div class="entry">
<?php the_content('Seguir leyendo...'); ?>
          <p class="postmeta">
<?php if(function_exists('the_views')) { echo "Le&iacute;do: "; the_views(); echo "&nbsp;|&nbsp;"; } ?> 
<?php if (function_exists('author_exposed')){ author_exposed(); } else { the_author(); } ?>&nbsp;|&nbsp;
<?php the_category(', ') ?>&nbsp;|&nbsp;<?php the_time('m jS, Y') ?>&nbsp;|&nbsp;
<?php if(function_exists('wp_email')) { email_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php if(function_exists('wp_print')) { print_link(); echo "&nbsp;|&nbsp;"; } ?>
<?php edit_post_link('Editar','','&nbsp;|&nbsp;'); ?><?php comments_popup_link('Sin comentarios &raquo;', 'Alguien opino &raquo;', '% comentarios &raquo;'); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); 
//echo "&nbsp;|&nbsp;"; 
} ?>
</p>
        </div>
      </div>
      <?php 
	  $bandera = ($bandera)?false:true;
	  endwhile;
?>
	
      <div class="navigation">
<?php // posts_nav_link() ?>
<div class="nav-previous"><?php previous_posts_link('Anterior') ?></div>
<div class="nav-next"><?php next_posts_link('Siguiente') ?></div>
      </div>

      <?php else : ?>
      <div class="post">
        <h2>No hay datos</h2>
      </div>
      <?php endif; ?>
    </div>
    <!-- content End -->
	<?php get_sidebar(); ?>
  </div>
    <?php get_footer(); ?>
