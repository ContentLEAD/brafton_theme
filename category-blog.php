<?php




get_header(); 



$cat_posts = new WP_Query( 'cat=25,19&posts_per_page=10&paged=' . $paged );

?>



<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
	<div class="archive category_body blog">
	<?php 
   $i = 0;
    if( $cat_posts->have_posts() ) : while( $cat_posts->have_posts() ) : $cat_posts->the_post();
   	//first article will be wrapped in d-all container
	if( $i == 0 ) { ?>
	<section class="d-all">
    <article class="d-all t-all m-all featured-post">
    <?php } elseif( $i == 1 ) {  //second article starts a new d-2of3 section, in a wrapper for padding... ?>
    <div class="wrap">
		<div class="inner">
    	<section class="d-5of7 t-2of3 m-all secondary-blog">
    		<div class="arrow_to_infinity featured"></div>
			<article class="d-all">
	<?php } elseif ($i > 1 ) { //and the rest of the articles will just be wrapped in article tag, not in a new section ?>
			<article class="d-all">
	<?php } ?>
		<?php $author = brafton_author_data( get_the_ID() ); ?>
			<?php if( $i == 0 ) { ?>
				<div class="d-all tagbar">
					<div class="inner">
						<?php blog_tagbar(); //see brafton.php?>
					</div>
				</div>
				<div class="inner"><h1 itemprop="name" class="title">Marketing Blog</h1></div>
			<?php } ?>

				<div class="inner">
				<?php $size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
				<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
				<div id="topinfo">
					<div class="title_info_container">
					<h2 itemprop="name headline"><a href=<?php echo '"' . get_permalink() . '"'?>><?php the_title(); ?></a></h2>
					</div>
						<div class="author">
							<a href="<?php echo $author['url']; ?>" class="user"><?php echo get_avatar($author['ID']); ?></a>
							<span>by <?php if(get_the_author() != 'Editorial') : ?>
								<a href="<?php echo $author['url']; ?>" title="Learn more about: <?php echo $author['name']; ?>" rel="author"><?php echo $author['name']; ?></a>
								<?php else: ?>
								Brafton Editorial
								<?php endif; ?>
							</span>
						</div>
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
			<?php if($i > 0) { ?>
				<div class="arrow_to_infinity"></div>
			<?php } ?>
		</div>
		</article>


	<div class="inner">

		<?php if( $i == 0 ) {
			echo '</section>'; //close the d-all section surrounding the first post 
		} ?>

		<?php $i++; ?>
		<?php endwhile; endif; ?>
			<?php _paginate(); //see Brafton.php ?>
		</section><!--this closes the d-2of3 section after the last article-->
	<?php wp_reset_query(); ?>
	<div class="d-1of4 t-1of3 m-all sidebar blog_sidebar">
		<aside>
			<ul>
				<?php dynamic_sidebar( "New Blog Sidebar" ); ?>
			</ul>
		</aside>
	</div>
	</div>
</article><!-- End #archive -->


<div class="inner">
	<section class="d-5of7 t-2of3 m-all">
		<div class="bottom-cta d-all">
			<div class="bottom-cta-container">
				<a onclick="ga('send', 'event', 'Download eBook', 'Button Click', 'Download_eBook');" href="http://www.brafton.com/resources/content-social-join-party-thats-right-business"><div class="ourlatestfooter">
				</div></a>

				<div class="marketzine">
				</div>

				<div class="askamarketer">
				</div>
			</div>
		</div>
	</section>
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


<!--End Popup form-->	

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>

</div>
</div>

<?php  get_footer(); ?>