<?php 
/*
**Template Name: Content Writers
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
					<h1>Content <strong>Writers</strong></h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="template_section every_word">

						<div class="content_container wrap">
							<h2><strong>Every word counts.</strong></h2>
							<h2>Our writers deliver results</h2>
							<div class="content_body">
								<?php 

									$word = get_field( 'every_word'); 

									echo $word;

								?>
							</div>
						</div>

					</div>

					<div class="template_section gray_body who">

						<div class="content_container wrap">
							<h2><strong>Who</strong> are Brafton's writers?</h2>
							<div class="content_body">
								<?php 

									$who = get_field( 'who_are'); 

									echo $who;

								?>
							</div>
						</div>

					</div>

					<div class="template_section buzz">

						<div class="content_container wrap">
							<h2><strong>The buzz</strong> on our content writers</h2>
							<div class="content_body">
								<?php for($i=1; $i<=4; $i++) { ?>

									<div class="d-1of4 t-1of2 m-all testimonial">
										<div class="testimonial_inner">
											<p>
												<?php echo get_field( 'testimonial_' . $i ); ?>
											</p>

											<div class="author">
												<?php echo get_field( 'author_' . $i ); ?> 
											</div>

											<?php $src = get_field( 'testimonial_' . $i . '_image' )['url']; ?>

											<div class="company_logo">
												<img src="<?php echo $src; ?>"/> 
											</div>
												

										</div>

									</div>

								<?php } //end for loop ?>
							</div>
						</div>

					</div>

					<div class="template_section reasons gray_body">

						<div class="content_container wrap">
							<h2><strong>Here's 3 reasons why</strong> you'll golf clap for our writers</h2>
							<div class="content_body">
								
								<?php for ($i=1; $i<=3; $i++) { ?>

									<div class="reasons_inner d-all t-all m-all">

										<?php echo get_field( 'reason_' . $i ); ?>

									</div>

								<?php } //end for loop ?>

							</div>
						</div>

					</div>

					<div class="template_section team">

						<div class="content_container wrap">
							<h2><strong>Meet</strong> the team</h2>
							<div class="content_body">
								<?php

									$posts = get_posts( 'include=73046' );
									//be sure to add the rest of the posts when pushing to production...

									foreach($posts as $post) {
										setup_postdata( $post );

										switch ($post->ID) {
											case 73046:
												$title = 'Our day-to-day';
												break;
											
											default:
												$title = '';
												break;
										}

										?>

										<div class="d-1of4 t-1of4 m-all team_inner">
											<h4><strong><?php echo $title; ?></strong></h4>
											<?php echo get_the_post_thumbnail( $post->ID ); ?>
											<a class="button" href="<?php the_permalink(); ?>">Learn More</a>
										</div>

								<?php } //end foreach loop 

									wp_reset_postdata();
								?>
							</div>
						</div>

					</div>

					<div class="template_section learn_more green_body">

						<div class="content_container wrap">
							<h2><strong>Learn more</strong> about real results</h2>
							<div class="content_body">

								<div class="cta_image d-1of2 t-1of3 m-all">
									<?php 

										$link = get_field( 'cta_link' );
										$image = get_field( 'client_cta' );

										$src = $image['url'];

									?>

									<a href="<?php echo $link; ?>">
										<img src="<?php echo $src; ?>"/>
									</a>


								</div>
								<div class="learn_more_text d-1of2 t-2of3 m-all">
									<?php $learn = get_field( 'learn_more' ); 

									echo $learn;

									?>
									<a class="client_cta" href="/case-studies">More Client Examples</a>
								</div>

							</div>
						</div>

					</div>

				<?php endwhile; endif; ?>

			</div>

			<div class="fixed-page-footer">
				<div class="d-1of3 t-1of3 m-all wrapper">
					<div class="contact_us">
						See Examples
					</div>
				</div>

				<div class="d-1of3 t-1of3 m-all wrapper">
					<div class="contact_us">
						Contact Us
					</div>
				</div>

				<div class="d-1of3 t-1of3 m-all wrapper">
					<div class="askamarketer">
						Ask A Marketer
					</div>
				</div>
			</div>

			<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
			<form id="mktoForm_1337"></form>

			<div class="popup_form landing_page_popup">
				<div class="popup_form_inner">
					<h2>Schedule a meeting to see <strong>client examples</strong></h2>
					<?php get_template_part("marketoforms/landing_page_marketo_form"); ?>
				</div>
				<div class="popup_form_exit">X</div>

			</div>

			<div class="popup_form_shadow">
			</div>

<?php get_footer(); ?>
