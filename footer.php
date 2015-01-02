			<footer class="footer d-all t-all m-all" role="contentinfo">
				<?php if( is_post_type_archive( 'executives' ) || is_page(73683) || is_page(4233) || is_page(59438) || is_page(4231) ) { ?>
					



					<div id="top-footer">
						<nav role="navigation">
							<?php wp_nav_menu(array(
		    					'container' => '',                              // remove nav container
		    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
		    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
		    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
		    					'theme_location' => 'footer-links',             // where it's located in the theme
		    					'before' => '',                                 // before the menu
			        			'after' => '',                                  // after the menu
			        			'link_before' => '',                            // before each link
			        			'link_after' => '',                             // after each link
			        			'depth' => 0,                                   // limit the depth of the nav
		    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
								)
							); 

							?>
						</nav>

						<div class="footer-cta-container d-all t-all">
							<div class="footer-social-icons">
								<a rel="nofollow" href="http://www.linkedin.com/company/290802" class="cube footer-linkedin" title="Connect with Brafton on LinkedIn"></a>
								<a rel="nofollow" href="https://www.twitter.com/Brafton" class="cube footer-twitter" title="Follow Brafton on Twitter"></a>
								<a rel="nofollow" href="https://www.facebook.com/Brafton" class="cube footer-facebook" title="Like Brafton on Facebook"></a>
								<a rel="nofollow" href="https://plus.google.com/114039629718111030960" class="cube footer-gplus" title="Add Brafton to your circles on Google+"></a>
								<a rel="nofollow" href="http://www.pinterest.com/brafton" class="cube footer-pinterest" title="Check out Brafton's boards on Pinterest"></a>
								<a rel="nofollow" href="http://www.youtube.com/user/BraftonCustomNews" class="cube footer-youtube" title="Subscribe to Brafton on YouTube"></a>
								<a rel="nofollow" href="http://old.brafton.com/feed " class="cube footer-rss" title="Subscribe to Brafton's RSS feed"></a>
								<div class="follow-us">FOLLOW US</div>
							</div>
							<div class="footer-contact-us">
								<a href="/contact">CONTACT US</a>
							</div>
						</div>


					</div>

				<?php } ?>

				<div id="inner-footer" class="wrap cf">

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<?php if( is_single() ) { ?>
			<script>
				//scroll cta jquery

				jQuery(document).ready( function($) {
					$(".scrolly").followFrom(700);
				});
			</script>
		<?php } ?>

	</body>

</html> <!-- end of site. what a ride! -->
