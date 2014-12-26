<?php 
/*
**Template Name: Business Model Landing Page
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<?php $header_img = get_field( 'header_image_src' ); ?>
					<img src="<?php echo $header_img; ?>">
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="business_model_container">

					<div class="business_section what_is">

						<div class="content_container wrap">
							<h2><strong>What</strong> is <?php the_title(); ?></h2>
							<div class="content_body">
								<?php $what = get_field( 'what_is_content' ); 

								echo $what;

								?>
							</div>
						</div>

					</div>

					<div class="business_section why_you_need">

						<div class="content_container wrap">
							<h2><strong>Why</strong> you need <?php the_title(); ?></h2>
							<div class="content_body">
								<?php $why = get_field( 'why_you_need_content' ); 

								echo $why;

								?>
							</div>
						</div>

					</div>

					<div class="business_section how_it_works">

						<div class="content_container wrap">
							<h2><strong>How</strong> <?php the_title(); ?> works</h2>
							<div class="content_body">
								<?php $how = get_field( 'how_it_works' ); 

								echo $how;

								?>
							</div>
						</div>

					</div>

					<div class="business_section learn_more">

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
