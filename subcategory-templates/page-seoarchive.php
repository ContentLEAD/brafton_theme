<?php
/*
*Template Name: SEO Archive
*/



get_header(); 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

//pulls both blog/seo and news/seo subcategories

$cat_posts = new WP_Query( 'cat=50,203&posts_per_page=10&paged=' . $paged );


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
    	<section class="d-5of7 t-2of3 m-all secondary-blog">
			<article class="d-all">
	<?php } elseif ($i > 1 ) { //and the rest of the articles will just be wrapped in article tag, not in a new section ?>
			<article class="d-all">
	<?php } ?>
		<?php $author = brafton_author_data( get_the_ID() ); ?>
			<?php if( $i == 0 ) { ?>
				<div class="d-all tagbar">
					<?php blog_tagbar(); //see brafton.php?>
				</div>
				<h1 itemprop="name" class="title">SEO Archive</h1>
			<?php } ?>
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
							<div class="readtime">
								<img src="/wp-content/themes/brafton/library/images/blog-images/time.png"/>
								<span><?php echo readtime(); //see brafton.php ?></span>
							</div>	
							<div class="subcategory">
								<?php subcategory_links(); ?>
							</div>	
						</div>		
				</div>
			<div class="arrow_to_infinity"></div>
		</article>

		<?php if( $i == 0 ) {
			echo '</section>'; //close the d-all section surrounding the first post 
		} ?>

		<?php $i++; ?>
		<?php endwhile; endif; ?>
			<?php _paginate($cat_posts); //see Brafton.php ?>
		</section><!--this closes the d-2of3 section after the last article-->
	</div>
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

<div class="bottom-cta d-all">
	<div class="bottom-cta-container">
		<a href="http://www.brafton.com/resources/reduce-reuse-recycle-repurpose-get-content"><div class="ourlatestfooter">
		</div></a>

		<div class="leadscon">
		</div>

		<div class="askamarketer">
		</div>
	</div>
</div>	

<div class="blog_popup">
	<div class="blog_popup_inner">
		<h2>Get the <strong>Content Marketzine</strong></h2>
		<?php echo do_shortcode( '[contact-form-7 id="54255" title="Newsletter Signup"]'); ?>
	</div>
	<div class="blog_popup_exit">X</div>

</div>

<div class="blog_popup_shadow">
</div>

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>

<?php  get_footer(); ?>