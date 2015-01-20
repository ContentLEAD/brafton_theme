<?php get_header(); ?>

<?php putRevSlider( "home" ) ?>
<!--<div class="services-slider-nav">
	<ul class="services-list">
		<li class="d-1of5 t-1of5 m-all">News</li>
		<li>Website Content</li>
		<li>SEO</li>
		<li>Social Marketing</li>
		<li>Analytics</li>
	</ul>
</div>-->


<div id="content">
<div class="wrap cf">
<div id="home-secondary" class="m-all row">
	<div id="home-news" class="m-all d-1of3 t-1of3 widget-area cf">
		<aside>
			<ul>
				<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Home News" ) ) : ?>
					<p>Add Widgets to the Home News Area</p>
				<?php endif; ?>
			</ul>
		</aside>
	</div>
	<div id="home-social" class="m-all d-1of3 t-1of3">
		<aside>
			<ul>
				<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Home Social" ) ) : ?>
					<p>Add Widgets to the Home Social Area</p>
				<?php endif; ?>
			</ul>
		</aside>
	</div>
	<div id="home-subscribe" class="m-all d-1of3 t-1of3 last">
		<aside>
			<ul>
			
					<?php dynamic_sidebar( 'Home Subscribe' ); ?>
		
			</ul>
		</aside>
	</div>
</div><!-- End #home-secondary -->
</div>
</div>

<?php get_footer(); ?>