<?php get_header(); ?>

<!--content-->
<DIV id="content">
		
	<DIV id="left-col">
			

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				
					<DIV class="post-head">
					
						<H1><?php the_title(); ?></H1>
					
					</DIV><!--post-heading end-->

			<DIV class="meta-data">
			
			<?php the_time(__ ( 'j M y', 'optimizare')); ?> under <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'optimizare' ), __( '1 Comment', 'optimizare' ), __( '% Comments', 'optimizare' ) ); ?>
			
			</DIV><!--meta data end-->

			<div class="post-entry">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'optimizare' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Tags: ',' , '); ?>

					</div><!--post-entry end-->
	

				<?php comments_template( '', TRUE ); ?>

<?php endwhile; ?>

</DIV> <!--left-col end-->

<?php get_sidebar(); ?>

</DIV> <!--content end-->
	              <div class="clear"></div>
</DIV>
<!--wrapper end-->

<?php get_footer(); ?>
