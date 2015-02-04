<?php get_header(); ?>
	<div id="content">
		<article itemscope itemtype="http://schema.org/<?php if(in_category('blog')) echo 'Blog'; else echo 'Article'; ?>" id="single" class="d-all row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

				$author = brafton_author_data( get_the_ID() ); ?>

				<div class="d-all blog_header" style="overflow: visible">
					<div class="d-all tagbar">
						<?php blog_tagbar(); //see functions.php ?>
					</div>
					<?php //If this is a video post, change things around a bit
					//Or, if it's a twit, echo the twit custom field
					//SEE- just above the_content();

					$video_shortcode = get_post_meta( $post->ID, 'video_shortcode', true) ;

					$twit_src = get_post_meta( $post->ID, 'twit_image_code', true) ;

					//If it is neither twit nor video, output the featured image

					if( $video_shortcode == '' && $twit_src == '' && !has_tag( 'slideshare' )  ) {
						$size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
						<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img';?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
					<?php } ?>

					<div id="topinfo">
						<div class="title_info_container">
						<h1 itemprop="name headline"><?php the_title(); ?></h1>
					

						<?php if( $video_shortcode == '' && $twit_src == ''  && !has_tag( 'slideshare' ) ) { ?>

							<div class="author-cat-time-container">
								<div class="meta-wrapper">
									<div class="readtime">
										<img src="/wp-content/themes/brafton/library/images/blog-images/time.png"/>
										<span><?php echo readtime(); //see brafton.php ?></span>
									</div>	
									<div class="subcategory">
										<?php subcategory_links(); ?>
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

								<?php if( $video_shortcode ) { ?>
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
							<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Single Sidebar" ) ) : ?>
								<p>Add Widgets to the Post Sidebar</p>
							<?php endif; ?>
						</div>
					</div>

				<?php endwhile; endif; ?>
		</article><!-- End #single -->
	</div>

	<div class="bottom-cta d-all">
		<div class="bottom-cta-container">
			<a href="http://www.brafton.com/resources/content-social-join-party-thats-right-business"><div class="ourlatestfooter">
			</div></a>

			<div class="marketzine">
			</div>

			<div class="askamarketer">
			</div>
		</div>
	</div>	

<!--This is the popup form that goes along with the "Like what you read" CTA-->

<div class="popup_form">
	<div class="popup_form_inner">
		<h2>Get the <strong>Content Marketzine</strong></h2>
		<?php echo do_shortcode( '[contact-form-7 id="54255" title="Newsletter Signup"]'); ?>
	</div>
	<div class="popup_form_exit">X</div>

</div>

<div class="popup_form_shadow">
</div>

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>


<?php get_footer(); ?>