<?php get_header(); ?>

		<div class="inner">

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

									<?php brafton_share( 'top' ); ?> 

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

									<?php
									
										$before_text = html_entity_decode( get_post_meta( $post->ID, 'downloadables_top_text', true ) );
										$product_id = get_post_meta( $post->ID, 'digioh_product_id', true );
										$account_id = 1252;

									?>

									<p class="downloadable-before"><?php echo $before_text; ?></p>


									<?php $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 

									if( $img ) { ?>

										<a class="pdflink" href="<?php echo $img['url']; ?>"> <div class="text">Download the Case Study (PDF)</div></a>

									<?php } //end img if statement ?>

									<?php

										// the content (pretty self explanatory huh)
										the_content();

									if( $img ) { ?>

										<a class="pdflink" href="<?php echo $img['url']; ?>"> <div class="text">Download the Case Study (PDF)</div></a>

									<?php } //end img if statement ?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php 
								//No comments on the standard page template
								//comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<div class="sidebar d-2of7 t-1of3 m-all">
							<?php dynamic_sidebar( "Case Study Testimonial Sidebar" ); ?>
						</div>


				</div>

			</div>

		</div>

<?php get_footer(); ?>
