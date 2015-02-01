<?php 
/*
**Template Name: Homepage Template
*/

get_header(); ?>

<?php putRevSlider( "home" ) ?>

<!-- "Subnav" -->
<ul class="slider-subnav">
	<li><a class="d-1of5 t-1of5" href="/business-model/content-marketing">Content Marketing</a></li>
	<li><a class="d-1of5 t-1of5" href="/about-brafton/content-writers">Writing</a></li>
	<li><a class="d-1of5 t-1of5" href="/business-model/video-marketing">Video</a></li>
	<li><a class="d-1of5 t-1of5" href="/business-model/infographic-marketing">Graphics</a></li>
	<li><a class="d-1of5 t-1of5" href="/business-model/search-engine-optimization">SEO</a></li>
</ul>

			<div id="content">

				<div class="homepage_container">

					<div class="template_section">

						<div class="content_container welcome wrap">
							<h1><strong>Brafton</strong> content marketing</h1>
							<div class="content_body">

							<div class="copy d-1of2 t-1of2 m-all">

								<?php

								/*This is a bit messy, but the order of these pages is important...*/

								//I need to make vars, to0 hard to switch around id's constantly*/

								$cm = 73683;
								$cw = 4231;
								$vid = 58827;
								$graph = 54153;
								$seo = 1714;
								$soc = 1661;
								$analytics = 53375;

								$page_order = array($cm, $vid, $seo, $analytics, /*second column*/ $cw, $graph, $soc);

								$i = 0;

								foreach($page_order as $p_order) {

									$pages = get_pages("include=" . $p_order);

									foreach($pages as $page) { 

										/*The field name corresponds with the slug of the page to be
										linked to, so we can have access to both the attributes of the 
										custom field and also permalink*/

										$slug = $page->post_name;

										//var_dump( $slug );

										$object = get_field_object( $slug );

										//var_dump( $object );

										//Start a new column after 4 services

										if( $i==4) { ?>
											</div>
											<div class="copy d-1of2 t-1of2 m-all">
										<?php } ?>

										<div class="item">
											<div class="sprite_container">
												<a href="<?php echo get_page_link($page->ID); ?>">
													<div class="<?php echo $object["label"] ?> sprite"></div>
												</a>
											</div>
											<div class="copy_inner">
												<div class="service_title"><?php echo $object["label"] ?></div>
												<div class="text">
													<?php echo $object["value"] ?>
												</div>
											</div>
										</div>
									
										<?php 

										$i++;

									} //end inner loop 

								} //end outer loop

								//Then, manually add "clients"

								?>

								<div class="item">
									<div class="sprite_container">
										<a href="/case-studies">
											<div class="case-studies sprite"></div>
										</a>
									</div>
									<div class="copy_inner">
										<div class="service_title">Customers</div>
										<div class="text">
											<?php echo get_field( 'client_service' ); ?>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>

					<!-- NOT APPROVED YET

					<div class="template_section clients gray_body">

						<div class="content_container wrap">
							<h2>Just ask these guys - <strong>Client List</strong></h2>
							<div class="content_body">

							</div>
						</div>


					</div>-->

					<div class="template_section latest_blogs gray_body">

						<div class="content_container wrap">
							<h2>Our Latest <strong>Blogs</strong></h2>
							<div class="content_body">

								<!-- FIRST COLUMN -->

								<div class="d-1of2 t-all m-all">

									<?php 

										$news = new WP_Query('category_name=news&posts_per_page=1');

										if( $news->have_posts() ) : while( $news->have_posts() ) : $news->the_post(); ?>
											<div class="homepage_article news_homepage_article">
												<div class="news-headline-container black">
													<a href="<?php the_permalink(); ?>">
														<div class="news-headline">News</div>
														<?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?>
													</a>
												</div>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>
										
										<div class="sidebar_arrow_to_infinity"></div>
										
										<?php 

											$blog = new WP_Query('category_name=blog&posts_per_page=1');

											if( $blog->have_posts() ) : while( $blog->have_posts() ) : $blog->the_post(); ?>
											
											<div class="homepage_article news_homepage_article">
												<div class="news-headline-container blue">
													<a href="<?php the_permalink(); ?>">
														<div class="news-headline">Blog</div>
														<?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?>
													</a>
												</div>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>

										<div class="sidebar_arrow_to_infinity"></div>

								</div>

								<!-- SECOND COLUMN -->

								<div class="d-1of2 t-all m-all">

									<?php 
 
										$community = new WP_Query('tag=community&posts_per_page=1');

										if( $community->have_posts() ) : while( $community->have_posts() ) : $community->the_post(); ?>
											<div class="homepage_article news_homepage_article">
												<div class="news-headline-container green">
													<a href="<?php the_permalink(); ?>">
														<div class="news-headline">Community</div>
														<?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?>
													</a>
												</div>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; ?>
										
										<div class="sidebar_arrow_to_infinity"></div>
										
										<?php 

											$videos = new WP_Query('tag=videos&posts_per_page=1');

											if( $videos->have_posts() ) : while( $videos->have_posts() ) : $videos->the_post(); ?>
											<div class="homepage_article news_homepage_article">
												<div class="news-headline-container red">
													<a href="<?php the_permalink(); ?>">
														<div class="news-headline">Video</div>
														<?php the_post_thumbnail(array(9999, 85), array('alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?>
													</a>
												</div>
												<div class="article-title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													<div class="time-tag">
														<time datetime="<?php the_time('c'); ?>"><?php the_time('n.d.Y') ?></time>
													</div>
												</div>
											</div>
										<?php endwhile; endif; wp_reset_query(); ?>

										<div class="sidebar_arrow_to_infinity"></div>

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

										$selected_cta = get_field( 'cta_choice' );

										if( $selected_cta == 'Case Study' ) {
											$link = get_field( 'case_study' );
										} elseif(  $selected_cta == 'Testimonial' ) {
											$link = get_field( 'testimonial' );
										}
										
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

									<a class="client_cta" href="/contact">Request A Demo</a>
								</div>
							</div>
						</div>

					</div>


				</div>


			</div>


<?php get_footer(); ?>
