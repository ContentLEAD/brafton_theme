<?php 
/*
**Template Name: Business Model Landing Page
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
					
					<?php 

						$header = get_field( "h1" ); 

						$pieces = explode(' ', $header);

						$last_word = array_pop($pieces);

						$first_words = implode(' ', $pieces);

					?>

					<h1><?php echo $first_words; ?> <strong><?php echo $last_word; ?></strong></h1>
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

			<div class="fixed-page-footer">
				<div class="contact_us">
					<a href="/contact">Contact Us</a>
				</div>
			</div>


<?php get_footer(); ?>
