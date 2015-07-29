<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="noindex">

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

<script type="text/javascript">

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3367751-1', 'auto');
  ga('send', 'pageview');

</script>

    <script type="text/javascript">
        document.write(unescape("%3Cscript src='" + document.location.protocol + "//munchkin.marketo.net/munchkin.js' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script type="text/javascript">
	  jQuery(document).ready(function($) {
	    $(".scroll").click(function(event) {
	    event.preventDefault();
	    $('html,body').animate( { scrollTop:$(this.hash).offset().top } , 1000);
	    } );
	  } );
	</script>

    <script>Munchkin.init('447-XFF-352');</script>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div class="inner">

					<p class="full_logo logo"><a href="<?php echo home_url(); ?>" title="Return to Homepage"><img src="/wp-content/themes/brafton/library/images/logos/full_logo.png" alt="Brafton Logo" /></a></p>
					<p class="mobile_logo logo"><a href="<?php echo home_url(); ?>" title="Return to Homepage"><img src="/wp-content/themes/brafton/library/images/logos/mobile_logo.png" alt="Brafton Logo" /></a></p>


					<nav role="navigation">
						<a href="#" id="nav-toggle"><span></span></a>
						<?php wp_nav_menu(array(
    					'container' => false,                           // remove nav container
    					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					'theme_location' => 'main-nav',                 // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>
					
				</div>

			</header>

			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<?php 
					$image = get_field( 'background_image' );
				?>

				<div id="social-landing" style="background-image: url('<?php echo $image; ?>');">

					<div class="overlay">

						<div class="inner">

							<div class="title">
								<h1><?php the_title(); ?></h1>
							</div>

							<div class="content">

								<div class="content_body">
									<?php the_content(); ?>
								</div>

								<div class="form">
									<?php 
								
									$theID = get_the_ID();

									switch ($theID) {

										case '84601':
										    get_template_part('marketoforms/social_ad_marketo_form');
											break;
										case '84810':
											get_template_part('marketoforms/social_ad_content_for_social_marketo_form');
											break;
									}
									?>
								</div>

							</div>

							<div class="learn">
								<a href="#learnmore" class="scroll"><img src="http://brafton.com/wp-content/themes/brafton/library/images/learnMore_arrow.png" alt="" /></a>
							</div>

						</div>

					</div>

				</div>

				<?php 
					$content1 = get_field( 'content_1');  ?>

				<?php if ($content1) { ?>

				<div id="learnmore" class="template_section">

					<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_1'); ?></h2>
							<div class="content_body">
								<?php 

									echo $content1;

								?>
							</div>
						</div>

					</div>

				</div>

				<?php } ?>

				<?php 
					$learn = get_field( 'learn_more');  ?>

				<?php if ($learn) { ?>

				<div class="template_section learn_more green_body">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field( 'learn_more_subhead' ) ); ?></h2>
							<div class="content_body">
								<div class="cta_image d-1of2 t-1of3 m-all">
									<?php 
										$link = get_field( 'image_link' );
										$src = get_field( 'client_cta' );
									?>

									<a href="<?php echo $link; ?>">
										<img src="<?php echo $src; ?>"/>
									</a>

								</div>
								<div class="learn_more_text d-1of2 t-2of3 m-all">
									<?php  

									echo $learn;

									?>

									<a class="client_cta" href="/case-studies">More Client Examples</a>
								</div>
							</div>
						</div>

						</div>

					</div>

				<?php } ?>

				<?php 
					$content2 = get_field( 'content_2');  ?>

				<?php if ($content2) { ?>

				<div id="learnmore" class="template_section">

					<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_2'); ?></h2>
							<div class="content_body">
								<?php 

									echo $content2;

								?>
							</div>
						</div>

					</div>

				</div>

				<?php } ?>

			</div>

		</div>

		<?php
			//Only display this next section if you want a "Meet the team" CTA
					if( get_field('meet_the_team_cta') ) { 

					?>
						<div class="template_section team gray_body">

							<div class="inner">

							<div class="content_container wrap">
								<h2><?php bold_first_word( get_field('meet_the_team_header') ); ?></h2>
								<div class="content_body">
									<?php

									for( $i=1; $i<=3; $i++) {

										$post_id = get_field( 'team_id_' . $i );
										$title = get_field( 'team_title_' . $i );

										$posts = get_posts( array(
												'include' => $post_id,
												'post_type' => array('post','downloadables','infographic','case_studies','webinar')
											) );
									


										if($post_id != '') {

										foreach($posts as $post) {
											setup_postdata( $post );

											?>

											<div class="d-1of3 t-1of3 m-all team_inner">
												<h5><strong><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></strong></h5>
													<div class="image_container">
														<?php echo get_the_post_thumbnail( $post->ID ); ?>
													</div>
											</div>

										<?php 

											} //end foreach loop 

										wp_reset_postdata();

										} //end conditional

									} //end for loop


									?>
								</div>
							</div>
							</div>
						</div>

					<?php } //end meet team conditional ?>

		<?php endwhile; endif; ?>

		<div class="fixed-page-footer">

				<div onClick="ga('send', 'event', 'Request a Demo', 'Button Click', 'Request_A_Demo');" class="request_demo">
					Request A Demo
				</div>

				<div onClick="ga('send', 'event', 'Contact Us', 'Button Click', 'Contact_Us');" class="contact_us">
					Contact Us
				</div>

				<div onClick="ga('send', 'event', 'Ask A Marketer', 'Button Click', 'Ask_A_Marketer');" class="askamarketer">
					Ask A Marketer
				</div>
		</div>

		<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>

		<div class="popup_form landing_page_popup">
			<div class="popup_form_inner">
				<script src="//app-sj04.marketo.com/js/forms2/js/forms2.min.js"></script>
				<center><form id="mktoForm_1392"></form></center>
				<script>MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1392);</script>
			</div>
			<div class="popup_form_exit">X</div>

		</div>

		<div class="popup_form_shadow">
		</div>

<?php get_footer(); ?>