<?php 
/*
**Template Name: Brafton Newsletter
*/

get_header(); ?>

<div id="content">

<div class="inner">

	<div class="text">

		<h1><?php the_title(); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

	</div>

</div>

</div>

<?php get_footer(); ?>