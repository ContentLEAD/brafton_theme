<?php
/*
Template Name: Case Studies & Testimonals
*/
?>
<?php  get_header(); ?>

<!-- Currently not in use as of jan 21 2014 Ali-->
<article id="archive-case page" class="d-all t-all m-all" itemscope itemtype="http://schema.org/WebPage">
	
	<div class="d-all t-all m-all">

		<?php if( function_exists( 'brafton_share' ) ) brafton_share(); ?>

		<div class="case-study-wrapper">

			<section class="d-all t-all m-all" itemprop="mainContentOfPage">

				<?php

				$terms1 = get_terms( 'industry', array(
				 	'orderby'    => 'count',
				 	'hide_empty' => 0
				 ) );

				$terms2 = get_terms( 'prod-service', array(
				 	'orderby'    => 'count',
				 	'hide_empty' => 0
				 ) );

				$terms3 = get_terms( 'client-size', array(
				 	'orderby'    => 'count',
				 	'hide_empty' => 0
				 ) );

				?>
				<div id="sort">
					<div id="dropdown-container">
						<form id="filterform">

							<div class="dropdown" id="industry">
								<img src="/wp-content/themes/brafton/library/images/case-study-images/industries.png"/>
								<select id="sel-ind">
									<option selected="selected" value="undefined">--Please select--</option>
										<?php
										foreach($terms1 as $term1){
										echo "<option id='".$term1->name."'value='".$term1->term_id."'>".$term1->name."</option>";
										};?>
								</select>
							</div>


							<div class="dropdown" id="prod-service">
								<img src="/wp-content/themes/brafton/library/images/case-study-images/products.png"/>
								<select id="sel-prod">
									<option selected="selected" value="undefined">--Please select--</option>
									<?php
									foreach($terms2 as $term2){
									echo "<option id='".$term2->name."' value='".$term2->term_id."'>".$term2->name."</option>";
									};?>
								</select>
							</div>

							<!--Filter for client size-->

							<div class="dropdown" id="client-size">
								<img src="/wp-content/themes/brafton/library/images/case-study-images/clientsize.png"/>
								<select id="sel-size">
									<option selected="selected" value="undefined">--Please select--</option>
									<?php
									foreach($terms3 as $term3){
									echo "<option id='".$term3->name."' value='".$term3->term_id."'>".$term3->name."</option>";
									};?>
								</select>
							</div>


						</form>
						<div class="viewall reinit-clear"><img src="/wp-content/themes/brafton/library/images/case-study-images/clearfilter.png"/></div>
					</div>
				</div>

				<div class="below_filter_wrapper">
					<div id="cases">
					<?php 
							$args1=array(
								'posts_per_page' => -1,
								'orderby'=>'date',
								'order'=>'DESC',
								'post_type'=>array('testimonials','case_studies')
							    );
							$the_query = new WP_Query( $args1 ); ?>

							<div class="jcarousel-wrapper">
									<div class="jcarousel-nav-container">
											<a class="jcarousel-prev" href="#"><div></div></a>
											<div class="casestudy-nav-title"><h6>Case Studies & Testimonials<h6></div>
											<a class="jcarousel-next" href="#"><div></div></a>
											<div class="arrow-to-infinity"></div>
									</div>
									<div class="jcarousel">
										<ul id="carousel-ul">' 

							<?php

							global $post;

							if ( $the_query->have_posts() ) :while ( $the_query->have_posts() ) : $the_query->the_post();
							
							$term=wp_get_post_terms( $post->ID, 'industry');
							$type=get_post_type( $post );
							$hover_image=get_post_meta($post->ID, 'hover_image', TRUE);

							switch($type){
							case 'case_studies':
								$ptype = 'Case Study';
								break;
							case 'testimonials':
								$ptype = 'Testimonial';
								break;
							}
							echo '<article class="shell casethumbs" itemscope itemtype="http://schema.org/NewsArticle">
										<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark" class="featured_image_link">'.get_the_post_thumbnail(get_the_ID(), array('itemprop' => 'image thumbnailUrl')).
										'</a>
										<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark" class="hover_image_link"><img class="hover_image" src="'.$hover_image.'"/></a>
										<div class="data">	<div class="case_data"><u>'.$ptype.'</u>
										</div>
								  </article>';
								endwhile; endif; 

								wp_reset_query(); ?>

									</ul>
								</div>
							</div>
						</div>
					</section>
				</div><!--end below filter wrapper-->
			</div><!--end case-study-wrapper-->
		</article><!-- End #archive -->

	<div class="bottom-case-cta bottom-fixed-cta">
		<a href="http://www.brafton.com/contact" target="_blank"><div class="bottomsales bottom_cta"></div></a>
		<a href="mailto:learning@brafton.com" target="_blank"><div class="bottommarketing bottom_cta"></div></a>
		<a href="http://www.brafton.com/contact" target="_blank"><div class="bottomexamples bottom_cta"></div></a>
	</div>



<?php  get_footer(); ?>