<?php
/*
*Template Name: New Blog
*/



get_header(); 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

//remember to add cat=25,19 query back in!!!

$cat_posts = new WP_Query( 'posts_per_page=10&paged=' . $paged );

//Pagination code================================================

$cat_posts->query_vars[ 'paged' ] > 1 ? $current = $cat_posts->query_vars[ 'paged' ] : $current = 1;

        //set the "paginate_links" array to do what we would like it it. Check the codex for examples http://codex.wordpress.org/Function_Reference/paginate_links
        $args = array(
            'base' => @add_query_arg( 'paged', '%#%' ),
            //'format' => '',
            'showall' => false,
            'prev_next' => true,
            'end_size' => 0,
            'mid_size' => 3,
            'total' => $cat_posts->max_num_pages,
            'current' => $current,
            'type' => 'array'
     	);

    //build the paging links
    if ( $wp_rewrite->using_permalinks() )
        $args[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    //more paging links
    if ( !empty( $cat_posts->query_vars[ 's' ] ) )
        $args[ 'add_args' ] = array( 's' => get_query_var( 's' ) );

    $pagination = paginate_links($args);

    //Unset total number from the array
    unset( $pagination[count($pagination)-2] );


 //Then begin the blog html structure...

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
				<h1 itemprop="name" class="title">Marketing Blog</h1>
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
						<div class="subcategory">
							<?php subcategory_links(); ?>
						</div>	
						<div class="readtime">
							<img src="/wp-content/themes/brafton/library/images/blog-images/time.png"/>
							<span><?php echo readtime(); //see brafton.php ?></span>
						</div>			
				</div>
			<?php if( $i != 0 ) { ?><div class="arrow_to_infinity"></div> <?php } ?>
		</article>

		<?php if( $i == 0 ) {
			echo '</section>'; //close the d-all section surrounding the first post 
		} ?>

		<?php $i++; ?>
		<?php endwhile; endif; ?>
			<ul class="pagination">
				<?php foreach($pagination as $pag) {
					echo '<li>';
					echo $pag;
					echo '</li>';
				} ?>
			</ul>
		</section><!--this closes the d-2of3 section after the last article-->
	</div>
	<?php wp_reset_query(); ?>
	<div id="sidebar" class="d-2of7 t-1of3 m-all blog_sidebar">
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

		<a href="http://www.brafton.com/news/connect-brafton-leadscon-new-york-aug-14-15-leadscon"><div class="leadscon">
		</div></a>

		<div id="lightbox-link" class="askamarketer">
		</div>
	</div>

</div>	

<script>

jQuery(document).ready( function($) {
	//Put title div ABOVE featured image in mobile view
	/*window.onresize = function() {
		var wd = $(window).width();
		if( wd < 480 ) {
			$('#topinfo').insertBefore('.image-inner');
		}

		if( wd >= 480 ) {
			$('#topinfo').insertBefore('.image-inner');
		}
	}*/
});


</script>
<script src="//app-sj04.marketo.com/js/forms2/js/forms2.js"></script>
<form id="mktoForm_1337"></form>

<?php  get_footer(); ?>