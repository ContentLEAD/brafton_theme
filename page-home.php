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

							<div class="copy d-1of2 t-1of2 m-all">

								<?php

								for($i=1; $i<=8; $i++) {

									$object = get_field_object( 'service_' . $i );

									//Start a new column after 4 services

									if( $i==5) { ?>
										</div>
										<div class="copy d-1of2 t-1of2 m-all">
									<?php } ?>

									<div class="item">
										<div class="sprite_container">
											<div class="<?php echo $object["label"] ?> sprite"></div>
										</div>
										<div class="copy_inner">
											<div class="service_title"><?php echo $object["label"] ?></div>
											<div class="text">
												<?php echo $object["value"] ?>
											</div>
										</div>
									</div>
								<?php } //end for loop ?>

							</div>
						</div>

					</div>

					<div class="template_section clients gray_body">

						<div class="content_container wrap">
							<h2>Just ask these guys - <strong>Client List</strong></h2>
							<div class="content_body">

							</div>
						</div>


					</div>

					<div class="template_section latest_blogs">

						<div class="content_container wrap">
							<h2>Our Latest <strong>Blogs</strong></h2>
							<div class="content_body">

								<!-- FIRST COLUMN -->

								<div class="d-1of2 t-all m-all">

									<?php 

										$news = new WP_Query('category_name=news&posts_per_page=1');

										if( $news->have_posts() ) : while( $news->have_posts() ) : $news->the_post(); ?>
											<div class="homepage_article news_homepage_article">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></a>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<a href="<?php home_url(); ?>/news" title="Explore Our Newsroom" class="cat">News</a>
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>
										
										<div class="sidebar_arrow_to_infinity"></div>
										
										<?php 

											$blog = new WP_Query('category_name=blog&posts_per_page=1');

											if( $blog->have_posts() ) : while( $blog->have_posts() ) : $blog->the_post(); ?>
												<div class="homepage_article blog_homepage_article">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></a>
													<div class="article-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<div class="time-tag">
															<a href="<?php home_url(); ?>/blog" title="Check out our newest blogs" class="cat">Blog</a>
															<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
														</div>
													</div>
												</div>
										<?php endwhile; endif; ?>

								</div>

								<!-- SECOND COLUMN -->

								<div class="d-1of2 t-all m-all">

									<?php 
 
										$community = new WP_Query('tag=brafton-community&posts_per_page=1');

										if( $community->have_posts() ) : while( $community->have_posts() ) : $community->the_post(); ?>
											<div class="homepage_article news_homepage_article">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></a>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<a href="<?php home_url(); ?>/news" title="Explore Our Newsroom" class="cat">Brafton Community</a>
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>
										
										<div class="sidebar_arrow_to_infinity"></div>
										
										<?php 

											$videos = new WP_Query('tag=videos&posts_per_page=1');

											if( $videos->have_posts() ) : while( $videos->have_posts() ) : $videos->the_post(); ?>
												<div class="homepage_article blog_homepage_article">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></a>
													<div class="article-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<div class="time-tag">
															<a href="<?php home_url(); ?>/blog" title="Check out our newest blogs" class="cat">Video</a>
															<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
														</div>
													</div>
												</div>
										<?php endwhile; endif; wp_reset_query(); ?>

								</div>

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
