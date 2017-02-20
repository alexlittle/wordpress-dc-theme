<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

				tha_footer_before(); ?>
				<footer id="colophon" role="contentinfo" class="span12">
					<div class="row">
						<div class="span4">
							<h4>Contact Us</h4>
							<ul>
								<li><a href="mailto:alex@digital-campus.org">alex@digital-campus.org</a></li>
							</ul>
						</div>
						<div class="span4">
							<h4>About Us</h4>
							<ul>
								<li><a href="/about/our-team/">Team</a></li>
								<li><a href="/privacy/">Privacy</a></li>
							</ul>
						</div>
						<div class="span4">
							<h4>Follow Us</h4>
							<ul>
								<li><a class="rss" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/rss.png"/>RSS</a></li>
								<li><a href="https://github.com/DigitalCampus/"><img src="<?php bloginfo('template_url'); ?>/img/github-icon.png"/>GitHub</a></li>
								<li><a href="https://twitter.com/digicampusteam" rel="nofollow"  title="Follow us on twitter."><img src="<?php bloginfo('template_url'); ?>/img/twitter.png"/>@digicampusteam</a></li>
								<li><a href="https://www.youtube.com/user/digitalcampusteam" rel="nofollow"  title="Our YouTube channel."><img src="<?php bloginfo('template_url'); ?>/img/youtube.png"/>YouTube</a></li>
							</ul>
						</div>
					</div>
				</footer><!-- #colophon -->
				<?php tha_footer_after(); ?>
			</div><!-- #page -->
		</div><!-- .container -->
	<!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
	<?php wp_footer(); ?>
	</body>
	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-3609005-7']);
		  _gaq.push(['_setDomainName', '.digital-campus.org']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */