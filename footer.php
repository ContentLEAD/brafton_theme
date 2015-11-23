			<footer class="footer d-all t-all m-all" role="contentinfo">
				<?php //if( is_post_type_archive( 'executives' ) || is_page(73683) || is_page(4233) || is_page(59438) || is_page(4231) || is_page(53375) ) { ?>
					



					<div id="top-footer">

						<div class="inner">

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
						</div>
						</div>
					</div>

				<?php //} ?>

				<div id="inner-footer" class="wrap cf">

					<div class="inner">

						<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

		<!--AdRoll Script-->
		<script type="text/javascript">
		adroll_adv_id = "MTCK3W5IHNAQRJJ3DEXSJJ";
		adroll_pix_id = "BGFXYQ2CXVDQFKQ75IAACL";
		(function () {
		var oldonload = window.onload;
		window.onload = function(){
		   __adroll_loaded=true;
		   var scr = document.createElement("script");
		   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
		   scr.setAttribute('async', 'true');
		   scr.type = "text/javascript";
		   scr.src = host + "/j/roundtrip.js";
		   ((document.getElementsByTagName('head') || [null])[0] ||
		    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
		   if(oldonload){oldonload()}};
		}());
		</script>


		<!--Crazy egg script-->

		<?php if(is_home() || is_page(73683) || is_page(4231) || is_page(4226)) { ?>

		<script type="text/javascript">
		setTimeout(function(){var a=document.createElement("script");
		var b=document.getElementsByTagName("script")[0];
		a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0026/2755.js?"+Math.floor(new Date().getTime()/3600000);
		a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
		</script>

		<?php } ?>

		<?php if( is_single() ) { ?>
			<script>
				$(document).ready(function() {
				  function isScrolledTo(elem) {
				    var docViewTop = $(window).scrollTop(); //num of pixels hidden above current screen
				    var docViewBottom = docViewTop + $(window).height();
				    var elemTop = $(elem).offset().top; //num of pixels above the elem
				    var elemBottom = elemTop + $(elem).height();
				    console.log("Elem Bottom: "+elemBottom);
				    console.log("Return: "+ (elemTop <= docViewTop));
				    return ((elemTop <= docViewTop || elemTop >= docViewTop));
				  }
				  var catcher = $('.catcher');
				  var sticky = $('.scrolly');
				  var footer = $('.footer-cta-container');
				  var footTop = footer.offset().top;
				  var lastStickyTop = sticky.offset().top;
				  $(window).scroll(function() {
				    if(isScrolledTo(sticky)) {
				      sticky.css('position','fixed');
				      sticky.css('top','25px');
				    }
				    var stopHeight = catcher.offset().top + catcher.height();
				    var stickyFoot = sticky.offset().top + sticky.height();
				       
				    if(stickyFoot > footTop -10){
				      console.log("Top of Footer");
				      sticky.css({
				        position:'absolute',
				        top: (footTop - 140) - sticky.height()
				      });
				    } else {
				      if ( stopHeight > sticky.offset().top) {
				        console.log("Default position");
				        sticky.css('position','absolute');
				        sticky.css('top',stopHeight);
				      }
				    }
				  });
				}); 
			</script>
		<?php } ?>

	</body>

</html> <!-- end of site. what a ride! -->
