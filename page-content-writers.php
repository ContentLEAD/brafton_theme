<?php 
/*
**Template Name: Content Writers
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
					<h1>Content Writers</h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

					<div class="template_section who">

						<div class="content_container wrap">
							<h2><strong>Who</strong> are Brafton's writers?</h2>
							<div class="content_body">

							</div>
						</div>

					</div>

					<div class="template_section reasons gray_body">

						<div class="content_container wrap">
							<h2><strong>Here's 3 resons why</strong> you'll golf clap for our writers</h2>
							<div class="content_body">

							</div>
						</div>

					</div>

					<div class="template_section buzz">

						<div class="content_container wrap">
							<h2><strong>The buzz</strong> on our content writers</h2>
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
								<div class="learn_more_text d-1of2 t-1of2 m-all">
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
