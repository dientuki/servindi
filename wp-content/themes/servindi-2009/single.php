<?php get_header(); ?>

<div id="content-wrap">
	<!-- content -->
	<div id="main">

	<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="entry">
			<?php the_content(); ?>
				<p class="postmeta">
				<?php if(function_exists('the_views')) { echo "Le&iacute;do: "; the_views(); echo "&nbsp;|&nbsp;"; } ?>
				<?php if (function_exists('author_exposed')){ author_exposed(); } else { the_author(); } ?>
					&nbsp;|&nbsp;
					<?php the_category(', ') ?>
					&nbsp;|&nbsp;
					<?php the_time('m jS, Y') ?>
					&nbsp;|&nbsp;
					<?php if(function_exists('wp_email')) { email_link(); echo "&nbsp;|&nbsp;"; } ?>
					<?php if(function_exists('wp_print')) { print_link(); echo "&nbsp;|&nbsp;"; } ?>
					<?php edit_post_link('Editar','','&nbsp;|&nbsp;'); ?>
					<?php comments_popup_link('Sin comentarios &raquo;', 'Alguien opino &raquo;', '% comentarios &raquo;'); ?>
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
				</p>
			</div>
		</div>
		<?php endwhile; ?>

		<?php comments_template(); ?>
	</div>
	<!-- content End -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
