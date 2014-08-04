
<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'optimizare' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'optimizare' ); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<!--loop starts here-->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'optimizare' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<?php the_time(__ ( 'j M y', 'optimizare')); ?> under <?php the_category(', '); ?> 
			
			<?php
				if(comments_open()){
			?>
					|
			<?php 
					comments_popup_link( __( 'Leave a comment', 'optimizare' ), __( '1 Comment', 'optimizare' ), __( '% Comments', 'optimizare' ) ); 
				}
			?>
			</div><!--meta data end-->

<div class="post-entry">

			<?php the_content( __( '', 'optimizare' ) ); ?>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'optimizare' ), 'after' => '' ) ); ?>
			
	
	<!--clear float--><div class="clear"></div>
				
				
</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

</div> <!--post end-->

<?php endwhile; // End the loop. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'optimizare' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'optimizare' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
	
