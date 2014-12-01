<?php
/*
 * Infographic Archive Template
*/
?>

<?php get_header(); ?>

            <div id="content">

                <div id="inner-content" class="wrap cf">

                        <div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

                            <h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

                            <?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>

                            <?php if( have_posts() ) : while( have_posts() ) : the_post(); 

                            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                            
                            <article itemscope itemtype="http://schema.org/MediaObject">
                                <div class="shell " itemscope="" itemtype="http://schema.org/NewsArticle">
                                    <div id='infographic-img'>
                                        <a href="<?php the_permalink(); ?>" class="infographic"><img src="<?php echo $thumbnail[0];?>"></a>
                                    </div>
                                    <div class="data">
                                        <title><?php the_title(); ?></title>
                                        <time datetime="<?php the_time('c'); ?>" itemprop="datePublished" class="padder"><?php the_time('l, F j, Y'); ?></time>
                                    </div>
                                </div>
                            </article>

                            <?php endwhile; endif; wp_reset_query(); ?>

                        </div>

                    <div class="sidebar d-2of7 t-1of3 m-all">
                        <?php dynamic_sidebar( "Page Sidebar" ); ?>
                    </div>

                </div>

            </div>

<?php get_footer(); ?>