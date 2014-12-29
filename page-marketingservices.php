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

					<div class="services_section brafton_offers">

						<div class="content_container wrap">
							<div class="content_body">
								<?php $offer = get_field( 'brafton_offers' ); 

								echo $offer;

								?>
							</div>
						</div>

					</div>

					<div class="services_section link_graphics">

						<!-- grpahics go here-->

					</div>

					<div class="services_section our_marketing_services">

						<div class="content_container wrap">
							<h2>Our Marketing <strong>Services</strong></h2>
							<div class="content_body">
								<?php $services = get_field( 'our_marketing_services' ); 

								echo $services;

								?>
							</div>
						</div>

					</div>

					<div class="services_section learn_more">

						<div class="content_container wrap">
							<h2><strong>Learn more</strong> about real results</h2>
							<div class="content_body">
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
