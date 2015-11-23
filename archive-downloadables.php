<?php  get_header(); ?>
<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>
	<div class="archive category_body blog">
	<?php 
   $i = 0;
    if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post();
   	//first article will be wrapped in d-all container
	if( $i == 0 ) { ?>
	<section class="d-all">
    <article class="d-all t-all m-all featured-post">
    <?php } elseif( $i == 1 ) {  //second article starts a new d-2of3 section, in a wrapper for padding... ?>
    <div class="wrap">
    	<div class="inner">
    	<section class="d-5of7 t-2of3 m-all secondary-blog">
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
				<?php   if (is_date()) { ?>

							<div class="inner"><h1 class="title" itemprop="name">Month Archive: <span class="color"><?php  the_time('F Y'); ?></span></h1></div>

				<?php   } elseif( is_tag( array( 165,201,200,199,134,218 ) ) ){ 

							/*no header for tags in tagbar, just highlight the tagbar*/

						} elseif( is_tag() ) { ?>

							<div class="inner"><h1 class="title" itemprop="name"><?php single_tag_title(); ?></h1></div>

				<?php	} elseif( is_author() ) { ?>

							<div class="inner"><h1 class="title" itemprop="name">All posts by <?php the_author(); ?></h1></div>

				 <?php  } else { ?>
				 			
				 			<div class="inner"><h1 itemprop="name"><span><?php post_type_archive_title(); ?></h1></div>

				 <?php  } 
			
				 }   ?>
				<div class="inner">
				<?php $size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
				<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
				<div id="topinfo">
					<div class="title_info_container">
					<h2 itemprop="name headline"><a href=<?php echo '"' . get_permalink() . '"'?>><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					</div>	
				</div>
			<div class="arrow_to_infinity"></div>
		</div>
		</article>

		<?php if( $i == 0 ) {
			echo '</section>'; //close the d-all section surrounding the first post 
		} ?>

		<?php $i++; ?>
		<?php endwhile; endif; ?>
			<?php  _paginate(); //See Brafton.php ?>
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
	<section class="entry-content d-3of4 t-3of4 m-all cf">
		<div class="bottom-cta d-all">
			<div class="bottom-cta-container">
				<!--<a href="http://www.brafton.com/resources/content-social-join-party-thats-right-business"><div class="ourlatestfooter">
				</div></a>-->

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

<!--<div class="popup_form">
	<div class="popup_form_inner">
		<h2>Get the <strong>Content Marketzine</strong></h2>
		<?php // echo do_shortcode( '[contact-form-7 id="54255" title="Newsletter Signup"]'); ?>
	</div>
	<div class="popup_form_exit">X</div>

</div>-->

<div class="popup_form_shadow">
</div>

<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>

</div>
</div>

<?php  get_footer(); ?>