<?php get_header(); ?>

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

		
									<div class="alignright"><?php the_post_thumbnail('medium'); ?></div>

									<?php the_content(); ?>

								</section> <?php // end article section ?>

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
							<aside>
								<?php 
								
									$theID = get_the_ID();

									switch ($theID) {

										case '73007':
										     get_template_part('marketoforms/speaking_googles_resource_marketo_form');
											break;
										case '54325':
											get_template_part('marketoforms/fueling_fb_resource_marketo_form');
											break;
										case '54726':
				                            get_template_part('marketoforms/driving_search_resource_marketo_form');
											break;
										case '54278':
				                          	get_template_part('marketoforms/six_tips_resource_marketo_form');
											break;
										case '55189':
				                            get_template_part('marketoforms/how_to_use_resource_marketo_form');
				 							break;
										case '58255':
				                            get_template_part('marketoforms/ultimate_infographic_resource_marketo_form');
											break;
										case '60727':
				                            get_template_part('marketoforms/video_marketing_resource_marketo_form');
											break;
										case '63488':
				                            get_template_part('marketoforms/youtube_marketing_resource_marketo_form');
											break;
										case '68438':
				                            get_template_part('marketoforms/content_authorship_resource_marketo_form');
											break;
										case '69141':
				                            get_template_part('marketoforms/penguin_proofing_resource_marketo_form');
											break;
										case '70371':
				                             get_template_part('marketoforms/landing_page_triangle_resource_marketo_form');
											break;
										case '72230':
				                             get_template_part('marketoforms/seven_common_resource_marketo_form');
											break;
										case '72465':
											get_template_part('marketoforms/seventy_eight_resource_marketo_form');
											break;
										case '74086':
											get_template_part('marketoforms/marketers_guide_resource_marketo_form');
											break;
										case '74650':
											get_template_part('marketoforms/reduce_reuse_resource_marketo_form');	
											break;																					        break;
										case '77611':
											get_template_part('marketoforms/content_seo_marketo_form');		
											break;
										case '79046':
											get_template_part('marketoforms/holiday_marketing_marketo_form');
											break;
										case '79983':
											get_template_part('marketoforms/content_social_resource_marketo_form');
											break;
										case '82560':
											get_template_part('marketoforms/brand_awareness_marketo_form');
											break;
										case '82754':
											get_template_part('marketoforms/content_goals_seo_marketo_form');
											break;
										default:
											get_template_part('resource_marketo_form');
											break;
									}

								?>

							</aside>
						</div>


				</div>

			</div>

<?php get_footer(); ?>
