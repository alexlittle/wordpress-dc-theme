<?php get_header(); ?>

		<!--content-->
		<div id="content">
		
			<div id="left-col">
			

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="post-head">

					<?php if (! is_front_page() ) { ?>	
						<h1><?php the_title(); ?></h1>
					<?php } ?>				
					
				</div><!--post-heading end-->
					
					<div class="post-entry">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'optimizare' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->
					
					


<?php endwhile; ?>
</div> <!--left-col end-->

<?php get_sidebar(); ?>

</div> <!--content end-->
	                        <div class="clear"></div>
</div>
<!--wrapper end-->
<?php get_footer(); ?>
