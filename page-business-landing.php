<?php 
/*
**Template Name: Business Model Landing Page
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
				
					<h1><?php bold_last_word( get_field( "h1" ) ); //see bones.php ?></strong></h1>
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

					<div class="template_section learn_more green_body">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field( 'learn_more_subhead' ) ); ?></h2>
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
					Contact Us
				</div>
			</div>

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
