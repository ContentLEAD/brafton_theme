<?php  get_header(); ?>
<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<?php 
    $i=0;
    if( have_posts() ) : while( have_posts() ) : the_post();
    
	if( $i == 0 ) { ?>
		<section class="d-all">
	    <article id="archive" class="d-all featured-post">
    <?php } elseif( $i == 1 ) {  //second article starts a new 5of7 section ?>
	    <section class="d-5of7 t-2of3 m-all secondary-blog">
		<article id="archive" class="d-all">
	<?php } elseif ($i > 1 ) { //and the rest of the articles will just be wrapped in article tag, not in a new section ?>
		<article id="archive" class="d-all">
	<?php } ?>
	<?php $author = brafton_author_data( get_the_ID() ); ?>
		<header class="d-all">
			<?php if( $i == 0 ) { ?>
				<div class="d-all tagbar">
					<?php blog_tagbar(); ?>
				</div>
				<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
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
			echo '</section>'; //close the twelvecol section surrounding the first post 
		} 

	$i++;
    endwhile;

    else: ?>

    <div class="wrap">

    	<div class="d-all t-all m-all">

			<article id="post-not-found" class="hentry cf">
				<header class="article-header" style="display: block;">
					<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>

					<div class="widget">
						<?php get_search_form( true ); ?>
					</div>
				</section>
			</article>

		</div>

	</div>


    <?php 
    endif;

    ?>
		<?php  _paginate(); //See Brafton.php ?>
	
	</section><!--this closes the eightcol section after the last article-->
</article><!-- End #archive -->
<?php  get_footer(); ?>