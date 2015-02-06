<?php get_header();

/*************************************************
Authentication gateway to view webinar**********
**************************************************/

$registered = false; //assume user has not signed up for webinar

//ONLY enter this page to the db if they haven't registered on this page before...

$current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//parse url in case link was sent from Marketo link

$url = strtok($current_page,'?'); 

if( $url == $_COOKIE[ 'Registered1' ]) {
	$the_ID = get_the_ID();
	$success = $wpdb->insert(
		'brftn_registrations',
		array(
			'user_name' => $_COOKIE[ 'Name' ],
			'type' => 'webinar',
			'post_title' => get_the_title( $the_ID )
		)
	);
} 


//check all results for whether any entries match title of current webinar, set $registered to true, if so
if ( $_COOKIE[ 'Name' ] ) {
	$registrations = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT post_title FROM brftn_registrations WHERE user_name = '" . $_COOKIE[ 'Name' ] . "'" ) );
	//print_r($registrations);
	foreach ( $registrations as $registration ) {
		//echo "Checking registrations...currently: " . $registration . "<br />";
		if( $registration == get_the_title( get_the_ID() ) ) {

			$registered = true;
			break;
		}
	}
}

 ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

										<div class="d-5of7 t-2of3 m-all">

											<?php if( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() ) ) { ?>
													<?php if( $registered != true ) { ?>
															<?php brafton_share( 'top' ); ?>
															<h3><strong>Sign Up on the Right to View this Webinar</strong></h3>

													<?php }else{ ?>
															<?php brafton_share( 'top' ); ?>
													
														<?php } ?>
													
													<?php

														if( $registered == true ) {
															$sublime_text = get_post_meta( get_the_ID(), 'sublime_vid_shortcode', true );
															if ( $sublime_text )
																echo do_shortcode( $sublime_text );
															else
																echo get_post_meta( get_the_ID(), 'embed_code', true );
														}else if ( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() )) {
															echo "<span id='webinar-preview'>";
															the_post_thumbnail();
															echo "</span>";
														}else{
															the_post_thumbnail();
														}
													?>
											
													<?php the_content(); ?>
												<?php }else if( has_term( 'twitter-chats', 'event-type', get_the_ID() ) || has_term( 'pre-chat', 'event-type', get_the_ID() ) ) {
													brafton_share( 'top' );
													echo '<span class="twitter-event-img">';
													the_post_thumbnail();
													echo '</span>';
													the_content();
												} ?>
										</div>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php 
								//No comments on the standard page template
								//comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<div class="sidebar d-2of7 t-1of3 m-all">
							<?php if( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() )) {
								echo '<h2 class="webinar_form_headline"><strong>Sign up</strong> to view this webinar!';
								
								echo'</h2>';
								get_template_part('marketoforms/webinar_marketo_form');
							} else if ( has_term( 'twitter-chats', 'event-type', get_the_ID() ) || has_term( 'pre-chat', 'event-type', get_the_ID() ) ) { 
								echo '<iframe src="http://fuel.brafton.com/BRTwitteriFrame.html" width=375 height=675></iframe>';
							} ?>
						</div>


				</div>

			</div>

<?php get_footer(); ?>
