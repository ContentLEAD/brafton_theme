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
		<noscript>Please enable JavaScript!
          <META HTTP-EQUIV="Refresh" CONTENT="0;URL=<?php echo get_permalink(); ?>">
        </noscript>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta name="google-site-verification" content="S7JTvnasyJGSMb9aNhZ9UyL-_7DJIxOOliBzevQisCY" />
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
