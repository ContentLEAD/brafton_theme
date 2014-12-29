<?php 
/*
**Template Name: Marketing Services Page
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/marketingservices.png">
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="services_container">

					<div class="business_section brafton_offers">

						<div class="content_container wrap">
							<div class="content_body">
								<strong>Brafton Offers</strong>
								<?php $offer = get_field( 'brafton_offers' ); 

								echo $offer;

								?>
							</div>
						</div>

					</div>

					<div class="business_section link_graphics">
						<div class="link_graphics_inner">

								<?php

								//WP query for all children of business model
								//get permalinks and set the sprite as featured image
								//then add case studies manually for 9th item

									for($i=0; $i<9; $i++) { ?>

									<div class="d-1of3 t-1of3 m-all img_container"></div>

								<?php

									}

								?>

						</div>

					</div>

					<div class="business_section our_marketing_services">

						<div class="content_container wrap">
							<h2>Our Marketing <strong>Services</strong></h2>
							<div class="content_body">
								<?php $services = get_field( 'our_marketing_services' ); 

								echo $services;

								?>
							</div>
						</div>

					</div>

					<div class="business_section learn_more">

						<div class="content_container wrap">
							<h2><strong>Learn more</strong> about real results</h2>
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
							<div class="learn_more_text d-1of2 t-1of3 m-all">
								<?php $learn = get_field( 'learn_more' ); 

								echo $learn;

								?>
							</div>
						</div>

					</div>


				</div>

				<?php endwhile; endif; ?>

			</div>


<?php get_footer(); ?>
