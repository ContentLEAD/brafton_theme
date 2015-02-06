<?php  get_header(); ?>
<article id="archive" class="d-all" itemscope itemtype="http://schema.org/WebPage">
	<?php 
    $i=0;
    if( have_posts() ) : while( have_posts() ) : the_post();
    
	if( $i == 0 ) { ?>
		
		<section class="d-all">
	    <article class="d-all featured-post">
    
    <?php } elseif( $i == 1 ) {  //second article starts a new 5of7 section ?>
	    
	    <section class="d-5of7 t-2of3 m-all secondary-blog">
		<article class="d-all">
	
	<?php } elseif ($i > 1 ) { //and the rest of the articles will just be wrapped in article tag, not in a new section ?>
		
		<article class="d-all">

	<?php } ?>
	
	<?php $author = brafton_author_data( get_the_ID() ); ?>
		
		<header class="d-all">
			<?php if( $i == 0 ) { ?>
				
				<div class="d-all tagbar">
					<?php blog_tagbar(); //see brafton.php ?>
				</div>
				
				<?php   if (is_date()) { ?>

							<h1 class="title" itemprop="name">Month Archive: <span class="color"><?php  the_time('F Y'); ?></span></h1>

				<?php   } elseif( is_tag( array( 165,201,200,199,134,218 ) ) ){ 

							/*no header for tags in tagbar, just highlight the tagbar*/

						} elseif( is_tag() ) { ?>

							<h1 class="title" itemprop="name"><?php single_tag_title(); ?></h1>

				<?php	} elseif( is_author() ) { ?>

							<h1 class="title" itemprop="name">All posts by <?php the_author(); ?></h1>

				 <?php  } else { ?>
				 			
				 			<h1 itemprop="name"><span><?php post_type_archive_title(); ?></h1>

				 <?php  } 
			
				 }   ?>
			
			<?php $size = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
			<div class="image-inner <?php if( !has_post_thumbnail() ) echo ' no-img'; else echo 'alignleft'; ?>"><?php the_post_thumbnail('medium', array('itemprop' => 'image', 'alt' => get_the_excerpt(), 'title' => get_the_excerpt())); ?></div>
			<div id="topinfo">
				<div class="title_info_container">
				<h2 itemprop="name headline"><a href=<?php echo '"' . get_permalink() . '"'?>><?php the_title(); ?></a></h2>
				</div>

				<?php if( !is_post_type_archive( 'downloadables' ) ) { ?> 
					
					<?php if( !is_tag('client-success-stories') ) { ?>
					
						<div class="author">
							<a href="<?php echo $author['url']; ?>" class="user"><?php echo get_avatar($author['ID']); ?></a>
							<span>by <?php //if(get_the_author() != 'Editorial') : ?>
								<a href="<?php echo $author['url']; ?>" title="Learn more about: <?php echo $author['name']; ?>" rel="author"><?php echo $author['name']; ?></a>
								<?php //else: ?>
								<!--Brafton Editorial -->
								<?php //endif; ?>
							</span>
						</div>

					<?php } //end client success conditional ?>
					
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

				<?php } ?>

			</div>
		</header>
		<div class="arrow_to_infinity"></div>
	</article>

	<?php if( $i == 0 ) { 
			echo '</section>'; //close the twelvecol section surrounding the first post 
		} 

	$i++;
    endwhile;
    endif;

    ?>
		<?php  _paginate(); //See Brafton.php ?>
	
	</section><!--this closes the eightcol section after the last article-->
	<div class="d-1of5 t-1of3 m-all blog_sidebar sidebar">
		<aside>
			<ul>
				<?php dynamic_sidebar("New Blog Sidebar"); ?>
			</ul>
		</aside>
</article><!-- End #archive -->
<?php  get_footer(); ?>