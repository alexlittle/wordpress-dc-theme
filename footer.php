	<?php $options = get_option('optimizare_options'); ?>
		<!--footer-->
		<div style="clear:both;"></div>
		<div id="footer">
			
			<div id="footer-info">		
				
				<span id="copyright">Copyright <?php echo date('Y'); ?> <?php echo($options['footer_text']); ?> | Powered by<a href="http://www.wordpress.com"> WordPress</a> and <a href="http://www.optimizaresite.org/" title="Optimizare">Optimizare</a></span>
				<span id="follow-us">Follow us: <a class="rss" href="<?php bloginfo('rss2_url'); ?>">RSS</a> <?php if($options['twitter_url'] <> '') : ?> | <a href="<?php echo($options['twitter_url']); ?>" rel="nofollow"  title="Follow me on twitter.">Twitter</a> <?php endif; ?></span>	
			</div>
		
		</div>
		
</div>
<!--wrapper end-->

	
	
	<?php wp_footer(); ?>
	
</body>

</html>
