<?php get_header(); ?>
<div class="d-all tagbar">
	<div class="inner">
		<?php blog_tagbar(); //see functions.php ?>
	</div>
</div>
<div class="inner">
	<div id="content">
		<article itemscope itemtype="http://schema.org/<?php if(in_category('blog')) echo 'Blog'; else echo 'Article'; ?>" id="single" class="d-all row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

				$author = brafton_author_data( get_the_ID() ); ?>


				<div class="d-all blog_header" style="overflow: visible">
					<?php //If this is a video post, change things around a bit
					//Or, if it's a twit, echo the twit custom field
					//SEE- just above the_content();

					$video_shortcode = get_post_meta( $post->ID, 'video_shortcode', true) ;

					$brafton_video = get_post_meta( $post->ID, 'brafton_video', true ) ;

					$twit_src = get_post_meta( $post->ID, 'twit_image_code', true) ;

					//If it is neither twit nor video, output the featured image

					if( $video_shortcode == '' && $brafton_video == '' && $twit_src == '' && !has_tag( 'slideshare' )  ) {
						$size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
						<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img';?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
					<?php } ?>

					<div id="topinfo">
						<div class="title_info_container">
						<h1 itemprop="name headline"><?php the_title(); ?></h1>
					

						<?php if( $video_shortcode == '' && $brafton_video == '' && $twit_src == ''  && !has_tag( 'slideshare' ) ) { ?>

							<div class="author-cat-time-container">

								<div class="meta-wrapper">
									
									<time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y'); ?></time>

									<div class="read_cat_container">
										<div class="readtime">
											<img src="/wp-content/themes/brafton/library/images/blog-images/time.png"/>
											<span><?php echo readtime(); //see brafton.php ?></span>
										</div>	
										<div class="subcategory">
											<?php subcategory_links(); ?>
										</div>
									</div>

								</div>	
								
							</div>	

						<?php } //end twit conditional ?>	
						
						</div>
					</div>
				</div>

				<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
				<div class="d-all row">

					<div id="inner-content" class="wrap cf">
						<section class="entry-content d-3of4 t-3of4 m-all cf" itemprop="articleBody">

								<?php if( $video_shortcode  ) { ?>
									<div class="single-twit-or-video video">
										<?php
											echo do_shortcode( $video_shortcode );
										?>
									</div>
								<?php
								} elseif( $twit_src ) { ?>
									<div class="single-twit-or-video twit">
										<img src="<?php echo $twit_src; ?>" />
									</div>
								<?php 
								} elseif( $brafton_video ) { ?>
									<?php
											echo do_shortcode( $brafton_video );
										?>
								<?php } ?>
								<?php the_content(); ?>
									<?php if( function_exists( 'brafton_share' )) brafton_share( 'bottom' ); ?>

									<?php related_posts(); ?>

									
									<footer class="meta">
										<?php if(get_the_author() != 'Editorial') { ?>
										<div class="boilerplate">
											<div class="bio">
												<div class="author_avatar_container">
													<a href="<?php echo $author['url']; ?>" class="user"><?php echo get_avatar($author['ID']); ?></a>
												</div>
												<div class="description">
													<?php echo $author['description']; ?>
												</div>
											</div>

											<div class="author_meta">

												<a href="<?php echo $author['url']; ?>" title="View <?php echo $author['name']; ?>'s Profile" class="authorprofile"><img src="/wp-content/themes/brafton/library/images/blog-images/auth_profile.png"/></a>
												<div class="icons small">
													<?php if( $author['linkedin'] ) echo "<a href='".$author['linkedin']."' class='cube linkedin'></a>"; ?> 
													<?php if( $author['twitter'] ) echo "<a href='http://www.twitter.com/".$author['twitter']."' class='cube twitter'></a>"; ?> 
													<?php if( $author['facebook'] ) echo "<a href='http://www.facebook.com/".$author['facebook']."' class='cube facebook'></a>"; ?> 
													<?php if( $author['googleplus_id'] ) echo "<a href='https://plus.google.com/".$author['googleplus_id']."?rel=author' class='cube gplus'></a>"; ?></div>
												</div>

											</div>
									<?php } ?>
									</footer>
									<?php do_action('after_post_content'); ?>

									<div id="comments">
										<div class="arrow_to_infinity"></div>
										<h1>What say you?</h1>
										<?php comments_template(); ?>
									</div>
							</section>
							
						<div class="sidebar d-1of4 t-1of4 m-all">
							<?php
								if (get_post_meta( $post->ID, 'selected_ebook_ad', true ) ) { ?>

								<li class="widget widget_text">
									<?php echo do_shortcode('[ebook-ad]'); ?>
								</li>

							<?php } elseif ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Single Sidebar" ) ) { ?>
								<p>Add Widgets to the Post Sidebar</p>
							<?php } ?>

							<li class="widget widget_text">

								<div class="catcher">
									<!--catcher-->
								</div>

								<div class="scrolly">

									<?php
										
										if (get_post_meta( $post->ID, 'selected_ad', true ) ) { ?>
											
										<?php echo do_shortcode('[advertisement]'); ?>

									<?php } elseif ( in_category( array( 220,48 ) ) ) { ?>
										
										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Content Marketing');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Writing.png" />
										</div>
									
									<?php } elseif( in_category( array( 221,120 ) ) ) { ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Writing');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Writing.png" />
										</div>
									
									<?php } elseif( in_category( array( 148,219 ) ) ) { ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Analytics');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Analytics.png" />
										</div>
									
									<?php } elseif( in_category( array( 222,125,223,177 ) ) ) { ?>
										
										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Video');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Video.png" />
										</div>
									
									<?php } elseif( in_category( array( 224,120 ) ) ) { ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Graphics');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Graphics.png" />
										</div>
										
									<?php } elseif( in_category( array( 225,5 ) ) ) { ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Social');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Social.png" />
										</div>
										
									<?php } elseif( in_category( array( 202,50 ) ) ) { ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'SEO');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_SEO.png" />
										</div>

									<?php } else {  ?>

										<div onClick="ga('send', 'event', 'CTA', 'Click', 'Content Marketing');" class="request_demo">
											<img src="/wp-content/themes/brafton/library/images/blog-images/new-ctas/cta_Writing.png" />
										</div>

									<?php } ?>

								</div>

								<div class="catcher">
									    <!--catcher-->
									</div>

							</li>
						
						</div>
					</div>

				<?php endwhile; endif; ?>
		</article><!-- End #single -->
	</div>
</div>

<div class="inner">
	<section class="entry-content d-3of4 t-3of4 m-all cf">
		<div class="bottom-cta d-all">
			<div class="bottom-cta-container">
				<a href="http://www.brafton.com/resources/content-social-join-party-thats-right-business"><div class="ourlatestfooter">
				</div></a>

				<div class="marketzine">
					<div class="marketzine-form">
						<?php echo do_shortcode ('[contact-form-7 id="54255" title="Newsletter Signup"]'); ?>
					</div>
				</div>

				<div class="askamarketer">
				</div>
			</div>
		</div>	
	</section>
</div>

<!--This is the popup form that goes along with the "Like what you read" CTA-->

<!--<div class="popup_form">
	<div class="popup_form_inner">
		<h2>Get the <strong>Content Marketzine</strong></h2>
		<?php // echo do_shortcode( '[contact-form-7 id="54255" title="Newsletter Signup"]'); ?>
	</div>
	<div class="popup_form_exit">X</div>

</div> -->


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

<form id="mktoForm_1337"></form>


<?php get_footer(); ?>