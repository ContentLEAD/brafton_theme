<?php get_header(); global $query_string; query_posts( $query_string . '&p=52315' ); ?>
<div id="content">
            <div class="support-cms-bar">
                <div class="support-cta">
                    <div class="inner">
                        <div class="get-help">
                            We can help!
                        </div>
                        <div class="choose-cms">
                            Click Here and Choose your CMS...
                        </div>
                    </div>
                </div>
                <ul class="support-link-container">
                    <div class="inner">
                        <li class="support-link">
                            <a>Wordpress</a>
                            <ul class="version-container">
                                <li><a class="version" href="http://www.brafton.com/support/wordpress">2.9+</a></li>
                            </ul>
                        </li>
                        <li class="support-link">
                            <a>Drupal</a>
                            <ul class="version-container">
                                <li><a class="version" href="http://www.brafton.com/support/drupal">V6.x</a></li>
                                <li><a class="version" href="http://www.brafton.com/support/drupal-7">V7.x</a></li>
                            </ul>
                        </li>
                        <li class="support-link">
                            <a title="BlogEngine" href="http://www.brafton.com/support/blogengine">BlogEngine</a>
                        </li>
                        <li class="support-link">
                            <a>Joomla!</a>
                            <ul class="version-container">
                                <li><a class="version" href="http://www.brafton.com/support/joomla-25">V2.5</a></li>
                                <li><a class="version" href="http://www.brafton.com/support/joomla-30">V3.0</a></li>
                            </ul>
                        <li class="support-link">
                            <a href="http://www.brafton.com/support/hubspot">Hubspot</a>
                        </li>
                        <li class="support-link">
                            <a href="http://www.brafton.com/support/blogger">Blogger</a>
                        </li>
                        <li class="support-link">
                            <a href="http://www.brafton.com/support/netsuite">NetSuite</a>
                        </li>
                        <li class="support-link">
                            <a>Sitefinity</a>
                            <ul class="version-container">
                                <li><a class="version" href="http://www.brafton.com/support/sitefinity-v3-7">V3.7</a></li>
                                <li><a class="version" href="http://www.brafton.com/support/sitefinity-v6-1">V6.1</a></li>
                                <li><a href="http://www.brafton.com/support/sitefinity-6-video">V6 Video</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
    <div id="inner-content" class="wrap cf">
        <div class="inner">
            <article id="support" class="d-all t-all m-all">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            <div id="topmeta" class="d-all t-all m-all">
                <div id="topinfo" class="d-1of4">
                    <?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
                </div>
            </div>
            <div class="d-all t-all m-all">
                <div id="body" class="d-5of7 t-2of3 m-all">
                    <?php the_content(); ?>
                </div>
                <div id="sidebar" class="d-2of7 t-1of3 m-all">
                    <aside>
                        <ul>
                            <?php dynamic_sidebar( "Support Left Menu" ); ?>
                        </ul>
                    </aside>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_query(); ?>
            </article><!-- End #support -->
        </div>
    </div>
</div>
<?php get_footer(); ?>