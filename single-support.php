<?php get_header(); ?>

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
	                </ul>
	            </div>


				<div id="inner-content" class="wrap cf">

					<div class="inner">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php 
								//No comments on the standard page template
								//comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<div class="sidebar d-2of7 t-1of3 m-all">
							<?php //dynamic_sidebar( "Support Left Menu" ); ?>
						</div>


				</div>

			</div>

		</div>

<?php get_footer(); ?>
