<?php
/*
 * Glossary Archive Template
*/
?>

<?php get_header(); ?>

        <div class="inner">

            <div id="content">

                <div id="inner-content" class="wrap cf">

                        <div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

                            <section class="entry-content cf" itemprop="articleBody">

                            <h1 class="archive-title h2">Marketing Glossary</h1>

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
                                    if( $this_char != "A" )
                                    echo "<h2><a name='$this_char'>$this_char</a></h2>";
                                 } ?>
                                <article itemscope itemtype="http://schema.org/CreativeWork">
                                    <header>
                                        <h3 itemprop="name"><a href="<?php the_permalink(); ?>" title="Read: <?php the_title_attribute(); ?>" itemprop="url"><?php the_title(); ?></a></h3>
                                    </header>
                                <?php the_excerpt('Read the entry &rsaquo;'); ?>
                                </article>

                            <?php endwhile; endif; wp_reset_query(); ?>

                        </div>

                    </section>

                    <div class="sidebar d-2of7 t-1of3 m-all">
                        <?php dynamic_sidebar( "Archive Sidebar" ); ?>
                    </div>

                    <a class="back-to-top" href="#"><i>^</i></a>

                </div>

            </div>

        </div>

<script>
jQuery(document).ready(function() {
    var offset = 650;
    var duration = 300;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>

<?php get_footer(); ?>