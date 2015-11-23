<?php 
/*
**Template Name: Brafton SMB
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
					<h1><div class="inner">Brafton <strong>SMB</strong></div></h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="template_section every_word">

					<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_1'); //see bones.php ?></h2>
							<div class="content_body">
								<?php 

									$word = get_field( 'why_brafton_smb'); 

									echo $word;

								?>
							</div>
						</div>

					</div>

				</div>

					<div class="template_section who gray_body">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_3'); //see bones.php ?></h2>
							<div class="content_body">
								<?php 

									$who = get_field( 'one_stop_shop'); 

									echo $who;

								?>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/websiteDesign.jpg" alt="Website Design" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/blogs.jpg" alt="Blogs" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/video.jpg" alt="Video" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/customGraphics.jpg" alt="Custom Graphics" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/contentDownloads.jpg" alt="Content Downloads" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/socialMedia.jpg" alt="Social Media" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/emails.jpg" alt="Emails" />
								</div>
								<div class="d-1of4 t-1of4 m-all img_container">
									<img src="http://www.brafton.com/wp-content/uploads/2015/11/landingPages.jpg" alt="Landing Pages" />
								</div>
								<div style="clear: both;"></div>
							</div>
						</div>

						</div>

					</div>

					<div class="template_section reasons">

						<div class="inner">

							<div class="content_container wrap">
								<h2><?php echo get_field('subhead_2'); //see bones.php ?></h2>
								<div class="content_body">
									
									<?php for ($i=1; $i<=4; $i++) { ?>

										<div class="reasons_inner d-all t-all m-all">

											<?php echo get_field( 'reason_' . $i ); ?>

										</div>

									<?php } //end for loop ?>

								</div>
							</div>
						</div>
					</div>

					<div class="template_section buzz gray_body">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_4'); //see bones.php ?></h2>
							<div class="content_body">
								<?php 

									$extra = get_field( 'no_extra_cost'); 

									echo $extra;

								?>
							</div>
						</div>

						</div>

					</div>

					<div class="template_section">

						<div class="inner">

						<div class="content_container wrap">
							<h2><?php echo get_field('subhead_5'); //see bones.php ?></h2>
							<div class="content_body">
								<?php 

									$customers = get_field( 'visitors_into_customers'); 

									echo $customers;

								?>
							</div>
						</div>

						</div>

					</div>

					<div class="template_section work_samples green_body">

						<div class="inner">

							<div class="content_container wrap">

								<div class="content_body">

								<?php $learn = get_field( 'work_samples' ); 

									echo $learn;

									?>

									<a class="client_cta request_demo"><h4>REQUEST A MEETING</h4><span>You'll hear from us within 48 business hours</span></a>

								</div>

								</div>

							</div>
						</div>

				<?php endwhile; endif; ?>

			</div>

			<div class="fixed-page-footer">

			<div onClick="ga('send', 'event', 'Request a Demo', 'Button Click', 'Request_A_Demo');" class="request_demo">
				Request A Demo
			</div>

			<div onClick="ga('send', 'event', 'Contact Us', 'Button Click', 'Contact_Us');" class="contact_us">
				Contact Us
			</div>

			<div onClick="ga('send', 'event', 'Ask A Marketer', 'Button Click', 'Ask_A_Marketer');" class="askamarketer">
				Ask A Marketer
			</div>
			</div>

			<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>

			<div class="popup_form landing_page_popup">
				<div class="popup_form_inner">
					<h2><strong>Request</strong> a demo</strong></h2>
					<?php get_template_part("marketoforms/request_demo_marketo_form"); ?>
				</div>
				<div class="popup_form_exit">X</div>

			</div>

			<div class="popup_form_shadow">
			</div>

<?php get_footer(); ?>
