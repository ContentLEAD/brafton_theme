<?php
/*
 * Glossary Archive Template
*/
?>

<?php get_header(); ?>

            <div id="content">

                <div id="inner-content" class="wrap cf">

                        <div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

                            <h1 class="archive-title h2"><?php post_type_archive_title(); ?></h1>

                            <?php if( function_exists( 'brafton_share' ) ) brafton_share( 'top' ); ?>

                                <p><?php $post_type = get_post_type_object( 'brafton_glossary' );
                                        echo $post_type->description; ?>
                                </p>
                                
                                <div id="pagination">
                                    <div>
                                        Jump
                                    </div>  
                                    <?php $letters = range('A', 'Z'); 

                                    foreach($letters as $letter) { 
                                        echo "<a href='#$letter' title='Jump to terms beginning with &quot;$letter&quot;'>$letter</a>"; 
                                    } ?>
                                </div>

                                <?php global $query_string; query_posts( $query_string . '&orderby=title&order=ASC&posts_per_page=-1' ); ?>

                            <?php if (have_posts()) : while (have_posts()) : the_post(); 
                            
                                $this_char = strtoupper(substr($post->post_title,0,1));
                                
                                if ($this_char != $last_char) {
                                    $last_char = $this_char;
                                    if( $this_char != "A" ) echo '<a href="#top" class="btt">Back to top</a>';
                                    echo "<h2><a name='$this_char'>$this_char</a></h2>";
                                 } ?>
                                <article itemscope itemtype="http://schema.org/CreativeWork">
                                    <header>
                                        <h3 itemprop="name"><a href="<?php the_permalink(); ?>" title="Read: <?php the_title_attribute(); ?>" itemprop="url"><?php the_title(); ?></a></h3>
                                    </header>
                                <?php the_excerpt('Read the entry &rsaquo;'); ?>
                                </article>

                            <?php endwhile; endif; wp_reset_query(); ?>
                            
                            <a href="#top" class="btt">Back to top</a>

                        </div>

                    <div class="sidebar d-2of7 t-1of3 m-all">
                        <?php dynamic_sidebar( "Archive Sidebar" ); ?>
                    </div>

                </div>

            </div>

<?php get_footer(); ?>