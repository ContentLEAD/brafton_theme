<?php  get_header(); ?>
<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<div class="archive-title">
		<?php  if (is_date()) { ?><h1 itemprop="name">Month Archive: <span class="color"><?php  the_time('F Y'); ?></span></h1><?php  } elseif(is_tag()){ /*no header tag archives*/ } else { ?><h1 itemprop="name"><span><?php  single_tag_title(); ?></span></h1><?php  } ?>
	</div>
		<?php 
    $i=0;
    if( have_posts() ) : while( have_posts() ) : the_post();
    
	if( $i == 0 ) { ?>
		<section class="d-all">
	    <article id="archive" class="d-all featured-post">
    <?php } elseif( $i == 1 ) {  //second article starts a new 5of7 section ?>
	    <section class="d-5of7 t-2of3 m-allsecondary-blog">
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
			<?php } ?>
			<?php $size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
			<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
			<div id="topinfo">
				<div class="title_info_container">
				<h3 itemprop="name headline"><a href=<?php echo '"' . get_permalink() . '"'?>><?php the_title(); ?></a></h3>
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
						<img src="/wp-content/themes/b3/blog-images/time.png"/>
						<span><?php echo readtime(); ?></span>
					</div>			
			</div>
		</header>
		<?php if( $i > 0 ) { ?>
		<div class="arrow_to_infinity"></div>
		<?php } ?>
	</article>

	<?php if( $i == 0 ) { 
			echo '</section>'; //close the twelvecol section surrounding the first post 
		} 

	$i++;
    endwhile;
    endif;

    ?>
		<?php  _paginate(); ?>
	</section><!--this closes the eightcol section after the last article-->
	<div class="d-2of7 t-1of3 m-all sidebar">
		<aside>
			<ul>
				<?php dynamic_sidebar("Archive Sidebar"); ?>
			</ul>
		</aside>
</article><!-- End #archive -->
<?php  get_footer(); ?>