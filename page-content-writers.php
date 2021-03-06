<?php 
/*
**Template Name: Content Writers
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
					<h1><div class="inner">Content <strong>Writers</strong></div></h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="template_section every_word">

					<div class="inner">

						<div class="content_container wrap">
							<h2><strong><?php echo get_field('subhead_1'); //see bones.php ?></strong></h2>
							<h2><?php echo get_field('subhead_2');  ?></h2>
							<div class="content_body">
								<?php 

									$word = get_field( 'every_word'); 

									echo $word;

								?>
							</div>
						</div>

					</div>

				</div>

					<div class="template_section gray_body who">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_3') ); //see bones.php ?></h2>
							<div class="content_body">
								<?php 

									$who = get_field( 'who_are'); 

									echo $who;

								?>
							</div>
						</div>

						</div>

					</div>

					<div class="template_section buzz">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_4') ); //see bones.php ?></h2>
							<div class="content_body">

								<?php for($i=1; $i<=4; $i++) { ?>

									<?php 
									$testimonial = get_field( 'testimonial_' . $i ); ?>

										<div class="d-all t-all m-all testimonial">

										<?php if ($testimonial) { ?>
											<div class="testimonial_inner">
												<p>
													<?php echo $testimonial; ?>
												</p>

												<div class="author">
													<?php echo get_field( 'author_' . $i ); ?> 
												</div>

												<?php $src = get_field( 'testimonial_' . $i . '_image' )['url']; ?>

												<div class="company_logo">
													<img src="<?php echo $src; ?>"/> 
												</div>
													

											</div>


										<?php } ?>

										</div>

								<?php } //end for loop ?>
							</div>
						</div>

						</div>

					</div>

					<div class="template_section reasons gray_body">

						<div class="inner">

							<div class="content_container wrap">
								<h2><?php bold_first_word( get_field('subhead_5') ); //see bones.php ?></h2>
								<div class="content_body">
									
									<?php for ($i=1; $i<=3; $i++) { ?>

										<div class="reasons_inner d-all t-all m-all">

											<?php echo get_field( 'reason_' . $i ); ?>

										</div>

									<?php } //end for loop ?>

								</div>
							</div>
						</div>
					</div>

					<div class="template_section team">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_6') ); //see bones.php ?></h2>
							<div class="content_body">
								<?php

									$posts = get_posts( 'include=73046,75111,75437' );

									foreach($posts as $post) {
										setup_postdata( $post );

										switch ($post->ID) {
											case 73046:
												$title = 'Our day-to-day';
												break;

											case 75111:
												$title = 'Researchers';
												break;

											case 75437:
												$title = 'Writers';
												break;	

											default:
												$title = '';
												break;
										}

										?>

										<div class="d-1of3 t-1of3 m-all team_inner">
											<h4><strong><?php echo $title; ?></strong></h4>
												<div class="image_container">
													<?php echo get_the_post_thumbnail( $post->ID ); ?>
												</div>
											<a class="button" href="<?php the_permalink(); ?>">Learn More</a>
										</div>

								<?php } //end foreach loop 

									wp_reset_postdata();
								?>
							</div>
						</div>
						</div>
					</div>

					<div class="template_section learn_more green_body">

						<div class="inner">

						<div class="content_container wrap">
							<h2><strong>Learn more</strong> about real results</h2>
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

			<?php get_template_part( "footer-includes/fixed_footer" ); ?>

<?php get_footer(); ?>
