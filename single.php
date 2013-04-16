<?php get_header(); ?>

<!--content-->
<div id="content">
		
	<div id="left-col">
			

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				
					<div class="post-head">
					
						<H1><?php the_title(); ?></H1>
					
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

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'optimizare' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Tags: ',' , '); ?>

					</div><!--post-entry end-->
	

				<?php comments_template( '', TRUE ); ?>

<?php endwhile; ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

</div> <!--content end-->
	              <div class="clear"></div>
</div>
<!--wrapper end-->

<?php get_footer(); ?>
