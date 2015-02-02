<?php 
/*
**Template Name: Business Model/About Us Landing Page
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
				
					<h1><?php bold_last_word( get_field( "h1" ) ); //see bones.php ?></h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="business_model_container">

					<div class="template_section what_is">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_1') ); //see bones.php ?></h2>
							<div class="content_body">
								<?php $what = get_field( 'what_is_content' ); 

								echo $what;

								?>
							</div>
						</div>

					</div>

					<div class="template_section why_you_need gray_body">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_2') ); ?></h2>
							<div class="content_body">
								<?php $why = get_field( 'why_you_need_content' ); 

								echo $why;

								?>
							</div>
						</div>

					</div>

					<div class="template_section how_it_works">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_3') ); ?></h2>
							<div class="content_body">
								<?php $how = get_field( 'how_it_works' ); 

								echo $how;

								?>
							</div>
						</div>

					</div>

					<?php

					//Only display this next section if you want a "Meet the team" CTA

					if( get_field('meet_the_team_cta') ) { 

					?>
						<div class="template_section team gray_body">

							<div class="content_container wrap">
								<h2><?php bold_first_word( get_field('meet_the_team_header') ); ?></h2>
								<div class="content_body">
									<?php

									for( $i=1; $i<=3; $i++) {

										$post_id = get_field( 'team_id_' . $i );
										$title = get_field( 'team_title_' . $i );

										$posts = get_posts( array(
												'include' => $post_id,
												'post_type' => array('post','downloadables')
											) );
									


										if($post_id != '') {

										foreach($posts as $post) {
											setup_postdata( $post );

											?>

											<div class="d-1of3 t-1of3 m-all team_inner">
												<h5><strong><?php echo $title; ?></strong></h5>
													<div class="image_container">
														<?php echo get_the_post_thumbnail( $post->ID ); ?>
													</div>
												<a class="button" href="<?php the_permalink(); ?>">Learn More</a>
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

					<?php } //end meet team conditional ?>

					<div class="template_section learn_more green_body">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field( 'learn_more_subhead' ) ); ?></h2>
							<div class="content_body">
								<div class="cta_image d-1of2 t-1of3 m-all">
									<?php 

										$selected_cta = get_field( 'cta_choice' );

										if( $selected_cta == 'Case Study' ) {
											$link = get_field( 'case_study' );
										} elseif(  $selected_cta == 'Testimonial' ) {
											$link = get_field( 'testimonial' );
										}
										
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


				</div>

				<?php endwhile; endif; ?>

			</div>

			<div class="fixed-page-footer">

					<div class="contact_us">
						Request a Demo
					</div>

					<div class="contact_us">
						Contact Us
					</div>

					<div class="askamarketer">
						Ask A Marketer
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
