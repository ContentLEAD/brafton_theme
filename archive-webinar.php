<?php

get_header(); 

?>



<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
	<div class="archive category_body blog">
	<?php 
   $i = 0;
    if( have_posts() ) : while( have_posts() ) : the_post();
   
   	//first article will be wrapped in d-all container
	if( $i == 0 ) { ?>
	
	<section class="d-all">
    <article class="d-all t-all m-all featured-post">
    
    <?php } elseif( $i == 1 ) {  //second article starts a new d-2of3 section, in a wrapper for padding... ?>
    
    	<section class="d-4of7 t-2of3 m-all secondary-blog">
			<article class="d-all">
	
	<?php } elseif ($i > 1 ) { //and the rest of the articles will just be wrapped in article tag, not in a new section ?>
			
			<article class="d-all">
	
	<?php } ?>

			<header class="d-all">
				<?php $author = brafton_author_data( get_the_ID() ); ?>
					<?php if( $i == 0 ) { ?>
						<h1 itemprop="name" class="title">Webinars & Events</h1>
					<?php } ?>
						<?php $size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
						<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
						<div id="topinfo">
							<div class="title_info_container">
							<h2 itemprop="name headline"><a href=<?php echo '"' . get_permalink() . '"'?>><?php the_title(); ?></a></h2>
							</div>		
						</div>
			</header>
			<div class="arrow_to_infinity"></div>
		</article>

		<?php if( $i == 0 ) {
			echo '</section>'; //close the d-all section surrounding the first post 
		} ?>

		<?php $i++; ?>
		<?php endwhile; endif; ?>
			<?php _paginate(); //see Brafton.php ?>
		</section><!--this closes the d-2of3 section after the last article-->
	<?php wp_reset_query(); ?>
	<div class="d-3of7 t-1of3 m-all sidebar blog_sidebar">
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
				<a href="http://www.brafton.com/resources/reduce-reuse-recycle-repurpose-get-content"><div class="ourlatestfooter">
				</div></a>

				<div class="marketzine">
				</div>

				<div class="askamarketer">
				</div>
			</div>
		</div>
	</section>
</div>

<div class="popup_form">
	<div class="popup_form_inner">
		<h2>Get the <strong>Content Marketzine</strong></h2>
		<?php echo do_shortcode( '[contact-form-7 id="54255" title="Newsletter Signup"]' ); ?>
	</div>
	<div class="popup_form_exit">X</div>

</div>

<div class="popup_form_shadow">
</div>	

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>

<?php  get_footer(); ?>