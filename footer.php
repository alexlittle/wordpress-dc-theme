	<?php $options = get_option('optimizare_options'); ?>
		<!--footer-->
		<div style="clear:both;"></div>
		<div id="footer">
			<div id="footer-content">
				<div class="footer-col">
					<h4>Contact Us</h4>
					<ul>
						<li><a href="mailto:alex@digital-campus.org">alex@digital-campus.org</a></li>
					</ul>
				</div>
				
				<div class="footer-col">
					<h4>About Us</h4>
					<ul>
						<li><a href="/team/">Team</a></li>
						<li><a href="/team/advisory-board/">Advisory Board</a></li>
						<li><a href="/privacy/">Privacy</a></li>
					</ul>
				</div>
				
				<div class="footer-col">
					<h4>Follow Us</h4>
					<ul>
						<li><a class="rss" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/feed-icon-28x28.png"/>RSS</a></li>
						<li><a href="https://github.com/DigitalCampus/"><img src="<?php bloginfo('template_url'); ?>/images/github-icon.png"/>GitHub</a></li>
						<?php if($options['twitter_url'] <> '') : ?><li><a href="<?php echo($options['twitter_url']); ?>" rel="nofollow"  title="Follow us on twitter.">Twitter</a></li><?php endif; ?>
					</ul>
				</div>
				<div style="clear:both"></div>
				<div id="footer-info">		
					Digital Campus Ltd is a not-for-profit company registered in England & Wales (Company No. 7629751). &copy; <?php echo date('Y'); ?> <?php echo($options['footer_text']); ?>
				</div>
			</div>
		</div>
</div>
<!--wrapper end-->

	
	
	<?php wp_footer(); ?>
	
</body>

</html>
