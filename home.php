<?php 
/*
**Template Name: Homepage Template
*/

get_header(); ?>

<?php putRevSlider( "home" ) ?>

			<div id="content">

				<div class="homepage_container">

					<div class="template_section welcome">

						<div class="content_container wrap">
							<h2><strong>Welcome</strong> to Brafton</h2>
							<div class="content_body">

							</div>
						</div>

					</div>

					<div class="template_section clients gray_body">


					</div>

					<div class="template_section latest_blogs">

						<div class="content_container wrap">
							<h2>Our Latest <strong>Blogs</strong></h2>
							<div class="content_body">

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
								</div>
							</div>
						</div>

					</div>


				</div>


			</div>


<?php get_footer(); ?>
