<?php get_header(); ?>

<article itemscope itemtype="http://schema.org/<?php if(in_category('blog')) echo 'Blog'; else echo 'Article'; ?>" id="single" class="d-all row">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	$author = brafton_author_data( get_the_ID() ); ?>
		<div class="d-all blog_header row" style="overflow: visible">
			<div class="d-all row tagbar">
				<?php blog_tagbar(); //see functions.php ?>
			</div>
			<?php //If this is a video post, change things around a bit
			//Or, if it's a twit, echo the twit custom field
			//SEE- just above the_content();

			$video_shortcode = get_post_meta( $post->ID, 'video_shortcode', true) ;

			$twit_src = get_post_meta( $post->ID, 'twit_image_code', true) ;

			//If it is neither twit nor video, output the featured image

			if( $video_shortcode == '' && $twit_src == '' ) {
				$size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
				<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
			<?php } ?>
			<div id="topinfo">
				<div class="title_info_container">
				<h1 itemprop="name headline"><?php the_title(); ?></h1>
				</div>
				<div class="author-cat-time-container">
					<div class="author">
						<a href="<?php echo $author['url']; ?>" class="user"><?php echo get_avatar($author['ID']); ?></a>
						<span>by <?php if(get_the_author() != 'Editorial') : ?>
							<a href="<?php echo $author['url']; ?>" title="Learn more about: <?php echo $author['name']; ?>" rel="author"><?php echo $author['name']; ?></a>
							<?php else: ?>
							Brafton Editorial
							<?php endif; ?>
						</span>
					</div>
					<div class="subcategory">
						<?php subcategory_links(); //see functions.php ?>
					</div>	
					<div class="readtime">
						<img src="/brafton/wp-content/themes/bones/library/images/blog-images/time.png"/>
						<span><?php echo readtime(); //see functions.php ?></span>
					</div>	
				</div>		
			</div>
		</div>
		<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
		<div class="d-all row">
		<div id="body" class="d-2of3" itemprop="text">

			<?php if( $video_shortcode ) { 
				echo do_shortcode( $video_shortcode );
			} elseif( $twit_src ) { ?>
				<div class="single-twit">
					<?php echo $twit_src; ?>
				</div>
			<?php } ?>

			<?php the_content(); ?>
			<?php if( function_exists( 'brafton_share' )) brafton_share( 'bottom' ); ?>
			<footer class="meta">
				<?php if(get_the_author() != 'Editorial') { ?>
				<div class="boilerplate">
					<table><td class="author_avatar_container" style="background:#000"><a href="<?php echo $author['url']; ?>" class="user"><?php echo get_avatar($author['ID']); ?></a></td><td class="bio"><?php echo $author['description']; ?></td></table>
					<a href="<?php echo $author['url']; ?>" title="View <?php echo $author['name']; ?>'s Profile" class="authorprofile"><img src="/wp-content/themes/b3/blog-images/auth_profile.png"/></a>
					<div class="icons small">
					<?php if( $author['linkedin'] ) echo "<a href='".$author['linkedin']."' class='cube linkedin'></a>"; ?> 
					<?php if( $author['twitter'] ) echo "<a href='http://www.twitter.com/".$author['twitter']."' class='cube twitter'></a>"; ?> 
					<?php if( $author['facebook'] ) echo "<a href='http://www.facebook.com/".$author['facebook']."' class='cube facebook'></a>"; ?> 
					<?php if( $author['googleplus_id'] ) echo "<a href='https://plus.google.com/".$author['googleplus_id']."?rel=author' class='cube gplus'></a>"; ?></div>
				</div>
				<hr />
			<?php } ?>
			</footer>
			<?php do_action('after_post_content'); ?>
			<div id="comments">
				<div class="arrow_to_infinity"></div>
				<h1>What say you?</h1>
				<?php comments_template(); ?>
			</div>
		</div>
		<div id="sidebar" class="d-1of3 last">
			<aside>
				<ul>
					<?php if ( get_the_ID() == 17049 ) {
						echo '<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script><form id="mktoForm_1144"></form><script>MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1144, function(form) {form.setValues({"MKTO_Source__c":window.location.pathname});});</script>';
					} ?>
					<?php if( get_the_ID() == 72499 ) {
						echo '<li><iframe src="http://fuel.brafton.com/MarchMadness1.html" height="300" width="100" style="height:488px;width:496px;overflow:hidden;" scrolling="no" ></iframe></li>';
					} ?>
					<?php if( get_the_ID() == 72904 ) {
						echo '<li><iframe src="http://fuel.brafton.com/MarchMadness2.html" height="300" width="100" style="height:488px;width:496px;overflow:hidden;" scrolling="no" ></iframe></li>';
					} ?>
					<?php if( get_the_ID() == 72917 ) {
						echo '<li><iframe src="http://fuel.brafton.com/MarchMadness2-2.html" height="300" width="100" style="height:488px;width:496px;overflow:hidden;" scrolling="no" ></iframe></li>';
					} ?>
					<?php if ( get_the_ID() == 73256 ) {
						echo '<li><iframe src="http://fuel.brafton.com/SocialMarchMadnessFinals.html" height="300" width="100" style="height:327px;width:496px;overflow:hidden;" scrolling="no" ></iframe></li>';
					}
					?>
				<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Single Sidebar" ) ) : ?>
					<p>Add Widgets to the Post Sidebar</p>
				<?php endif; ?>
				</ul>
			</aside>
		</div>
	</div>
		<?php endwhile; endif; ?>
</article><!-- End #single -->

<div class="bottom-cta d-all row">
	<div class="bottom-cta-container">
		<a href="http://www.brafton.com/resources/reduce-reuse-recycle-repurpose-get-content"><div class="ourlatestfooter">
		</div></a>

		<a href="http://www.brafton.com/news/connect-brafton-leadscon-new-york-aug-14-15-leadscon"><div class="leadscon">
		</div></a>

		<div id="lightbox-link" class="askamarketer">
		</div>
	</div>
</div>	

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>


<?php get_footer(); ?>