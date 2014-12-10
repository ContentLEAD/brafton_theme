<?php
/*
 * Infographic Archive Template
*/
?>

<?php get_header(); ?>

            <div id="content">

                <div id="inner-content" class="wrap cf">

                        <div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

                            <section class="entry-content cf" itemprop="articleBody">

                                <h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

                                <?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); 


                                $i = 0;

                                ?>

                                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                                <?php if($i==0) { 
                                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
                                    <article class="featured d-all t-all m-all" itemscope itemtype="http://schema.org/MediaObject">
                                <?php } else { 
                                     $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                                    <article class="d-1of4 t-1of4 m-all" itemscope itemtype="http://schema.org/MediaObject">
                                <?php } ?>
                                    <div class="infographic-shell" itemscope="" itemtype="http://schema.org/NewsArticle">
                                        <div id='infographic-img'>
                                            <a href="<?php the_permalink(); ?>" class="infographic"><img src="<?php echo $thumbnail[0];?>"></a>
                                        </div>
                                        <div class="data">
                                            <h5><?php the_title(); ?></h5>
                                            <time datetime="<?php the_time('c'); ?>" itemprop="datePublished" class="padder"><?php the_time('l, F j, Y'); ?></time>
                                        </div>
                                    </div>
                                </article>

                                <?php $i++; endwhile; endif; wp_reset_query(); ?>

                            </section>

                        </div>

                    <div class="sidebar d-2of7 t-1of3 m-all">
                        <?php dynamic_sidebar( "Page Sidebar" ); ?>
                    </div>

                </div>

            </div>

<?php get_footer(); ?>