<?php get_header(); ?>

		<div class="inner">

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php 

								$original = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original'); 
								$large = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
								$medium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); 

							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

									<?php brafton_share( 'top' ); ?>
								<div id="topmeta" class="d-all t-all m-all">
									<div id="actions" class="d-all t-all m-all">
										<a href="<?php echo $original[0]; ?>" class="download button padder" itemprop="contentURL">Download</a>
										<a href="#instructions" class="embed button padder">Embed</a>
									</div>
								</div>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
											<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
											<?php the_content(); ?>
											<div class="d-all t-all m-all infographic-container">
												<?php if( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?>
													<a href="<?php echo $original[0]; ?>" title="View the Full Size Version of: <?php echo $post->post_title; ?>" class="inline infographic"><?php the_post_thumbnail("large", array("alt" => "$post->post_excerpt", "title" => "$post->post_excerpt", 'itemprop' => 'image', 'data-url' => $original[0])); ?></a>
												<?php endif; ?>
											</div>
											<div id="embed">
												<h4><a name="instructions">Want to embed our infographic on your website?</a></h4>
												<h5>Simple Link</h5>
												<pre class="brush: html; auto-links:false; gutter:false; toolbar: false">&lt;a href="<?php the_permalink(); ?>" title="View Brafton's Infographic: <?php echo $pTitle; ?>" target="_blank"&gt;Brafton Infographic: <?php echo $pTitle; ?>&lt;/a&gt;</pre>
												<h5>Full Size (<?php echo $original[2]."x".$original[1]?>)</h5>
												<pre class="brush: html; auto-links:false; gutter:false; toolbar: false">&lt;a href="<?php the_permalink(); ?>?utm_source=infographic&utm_medium=referral&utm_content=full&utm_campaign=<?php echo basename(get_permalink()); ?>" title="View Brafton's Infographic: <?php echo $pTitle; ?>" target="_blank"&gt;&lt;img src="<?php echo $original[0]; ?>" alt="Brafton's Infographic: <?php echo $pTitle; ?>" height="<?php echo $original[2]; ?>" width="<?php echo $original[1]; ?>" /&gt;&lt;/a&gt;</pre>

												<h5>Large Size (<?php echo $large[2]."x".$large[1]?>)</h5>
												<pre class="brush: html; auto-links:false; gutter:false; toolbar: false">&lt;a href="<?php the_permalink(); ?>?utm_source=infographic&utm_medium=referral&utm_content=large&utm_campaign=<?php echo basename(get_permalink()); ?>" title="View Brafton's Infographic: <?php echo $pTitle; ?>" target="_blank"&gt;&lt;img src="<?php echo $large[0]; ?>" alt="Brafton's Infographic: <?php echo $pTitle; ?>" height="<?php echo $large[2]; ?>" width="<?php echo $large[1]; ?>" /&gt;&lt;/a&gt;</pre>

												<h5>Medium Size (<?php echo $medium[2]."x".$medium[1]?>)</h5>
												<pre class="brush: html; auto-links:false; gutter:false; toolbar: false">&lt;a href="<?php the_permalink(); ?>?utm_source=infographic&utm_medium=referral&utm_content=medium&utm_campaign=<?php echo basename(get_permalink()); ?>" title="View Brafton's Infographic: <?php echo $pTitle; ?>" target="_blank"&gt;&lt;img src="<?php echo $medium[0]; ?>" alt="Brafton's Infographic: <?php echo $pTitle; ?>" height="<?php echo $medium[2]; ?>" width="<?php echo $medium[1]; ?>" /&gt;&lt;/a&gt;</pre>

												<h5>Thumbnail Size (<?php echo $thumb[2]."x".$thumb[1]?>)</h5>
												<pre class="brush: html; auto-links:false; gutter:false; toolbar: false">&lt;a href="<?php the_permalink(); ?>?utm_source=infographic&utm_medium=referral&utm_content=thumbnail&utm_campaign=<?php echo basename(get_permalink()); ?>" title="View Brafton's Infographic: <?php echo $pTitle; ?>" target="_blank"&gt;&lt;img src="<?php echo $thumb[0]; ?>" alt="Brafton's Infographic: <?php echo $pTitle; ?>" height="<?php echo $thumb[2]; ?>" width="<?php echo $thumb[1]; ?>" /&gt;&lt;/a&gt;</pre>
											</div>
									<?php 
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
								//No comments...
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

		</div>

<?php get_footer(); ?>