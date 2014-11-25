<?php 
/*
Template Name: Careers 
*/
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php if( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">

									<?php
									// the content (pretty self explanatory huh)
									the_content(); ?>

									<div id="form" class="d-all t-all m-all">
										<?php get_template_part('marketoforms/contact_marketo_form'); ?>
	
										Please note: To contact us about a job application, use our <a href="careers">Careers</a> page.
									</div>

									<div class="d-all t-all m-all">

									<aside class="d-1of2 t-1of2 m-all">

										<h4>Offices</h4>

										<ul>

											<li><strong>Boston (HQ)</strong><br/><a href="http://g.co/maps/hxvyn" title="See Brafton's Boston office on a Map" target="_blank" class="address">1 Winthrop Square, Floor 5, Boston MA 02110</a></li>

											<li><strong>Chicago</strong><br/><a href="http://goo.gl/lh1Xnq" title="See Brafton's Chicago office on a Map" target="_blank" class="address">168 North Clinton Street, 4th Floor, Chicago IL 60661</a></li>

											<li><strong>San Francisco</strong><br/><a href="http://goo.gl/maps/sp3q0" title="See Brafton's San Francisco office on a Map" target="_blank" class="address">220 Montgomery Street, Suite 917, San Francisco CA 94104</a></li>

										</ul>

									</aside>

									<aside class="d-1of2 t-1of2 m-all no-margins last" id="phone">

										<h4>Contact Information</h4>

										<div class="d-1of2 t-1of2 m-all no-margins">

										<ul>

											<li><strong>Main</strong><br />617.206.3040</li>

											<li><strong>Fax</strong><br />866.272.8112</li>

										</ul>

										</div>

										<div class="d-1of2 t-1of2 m-all no-margins last">

										<ul>

											<li><strong>General Inbox</strong><br/><a href="mailto:info@brafton.com">info@brafton.com</a></li>

											<li><strong>Operations</strong><br/><a href="mailto:operations@brafton.com">operations@brafton.com</a></li>

											<li><strong>Integration Support</strong><br/><a href="mailto:techsupport@brafton.com">techsupport@brafton.com</a></li>

										</ul>

										</div>

									</aside>

									</div>

										<?php
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
					</div>
				</div>

<?php get_footer(); ?>
