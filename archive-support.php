<?php get_header(); global $query_string; query_posts( $query_string . '&p=52315' ); ?>
 <div id="content">
    <div id="inner-content" class="wrap cf">
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


<?php get_footer(); ?>