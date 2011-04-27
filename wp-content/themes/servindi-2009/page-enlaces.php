<?php
 /* Template Name: Enlaces */
	get_header(); ?>
  <div id="content-wrap">
    <!-- content -->
    <div id="main">
      <?php the_post(); ?>
      <div id="post-<?php the_ID(); ?>">
      	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></h2>
      	<div class="entry">
      		<?php $args = array('title_li' => 'til', 'title_before' => '', 'title_after' => '');?>
      		<?php //wp_list_bookmarks( $args ); ?> 
      		<?php $bookmarks = get_bookmarks(); ?>
      		
      		<ul class="bookmarks">
      		<?php foreach ($bookmarks as $bookmark):?>
      			<li><a href="<?php echo $bookmark->link_url;?>" title="<?php echo $bookmark->link_description; ?>"><?php echo $bookmark->link_name;?></a></li>
      		<?php endforeach?>
      		</ul>
      	</div>
      </div>
    </div>
    <!-- content End -->
    <?php get_sidebar(); ?>
  </div>
    <?php get_footer(); ?>