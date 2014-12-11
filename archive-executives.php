<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

									<?php brafton_share( 'top' ); ?>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

											<?php $i = 1; ?>

											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
												<?php if($i == 4) { ?>
												<div class="d-1of3 t-1of3 m-all exec_container last">
												<?php } else { ?>
												<div class="d-1of3 t-1of3 m-all exec_container">
												<?php } ?>
													<?php the_post_thumbnail(); ?>
													<div class="exec_info">
														<div class="exec_name"><?php the_title(); ?></div>
														<div class="exec_summary">
															<?php $summary = get_post_meta( $post->ID, 'exec_summary', true); 
																echo $summary;
															?>
															<span class="seemore">Read More...</span>
														</div>
													</div>
												</div>
												<div class="exec_info_onclick">
													<div class="exec_summary_onclick">
														<div class="exec_title_onclick">
															<div class="exec_name"><?php the_title(); ?></div>
														</div>
														<?php $hover_img = get_post_meta( $post->ID, 'exec_hover_img', true); ?>
														<img src="<?php echo $hover_img ?>"/>
														<div class="exec_content_onclick">
															<?php the_content(); ?>
														</div>
														<div class="exec_exit">
															X
														</div>
													</div>
												</div>

											<?php $i++;
																			wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
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

				</div>

			</div>

<?php get_footer(); ?>
