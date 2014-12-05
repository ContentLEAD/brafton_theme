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
<script type="text/javascript" src="/wp-content/themes/brafton/library/js/libs/jquery.jcarousel.js"></script>
<script type="text/javascript">

jQuery(document).ready(function($) {

//wrapping 2 articles in each li, t0 be reused in AJAX calls
function group_articles() {
	var $set = $('#carousel-ul').children();    
	for(var i=0, len = $set.length; i < len; i+=2){
    $set.slice(i, i+2).wrapAll('<li></li>');
	} 
}

group_articles();

//then, run jcarousel

    $('.jcarousel').jcarousel({
         wrap: 'circular'
    });
    $('.jcarousel-prev').jcarouselControl({
        target: '-=1'
    });

    $('.jcarousel-next').jcarouselControl({
        target: '+=1'
    });


//hide all hover images

$(".hover_image_link").hide();

//mouseenter and leave effects

	$(function() {
		$(document).on("mouseenter", ".featured_image_link", function () {
			$(this).hide();
			$(this).next().fadeIn(300);
		});

		$(document).on("mouseleave", ".hover_image_link", function () {
			$(this).hide();
			$(this).prev().show();
		});
	});



//
//AJAX calls for filters, jcarousel reloaded on success
//


		$(document).on('change','#sel-ind,#sel-prod,#sel-size', function() {

		industry=$('#sel-ind').children(":selected").text();

		indid=$('#sel-ind').children(":selected").val();
		prodid=$('#sel-prod').children(":selected").val();
		sizeid=$('#sel-size').children(":selected").val();

		indname=$('#sel-ind').children(":selected").attr("id");
		prodname=$('#sel-prod').children(":selected").attr("id");
		sizename=$('#sel-size').children(":selected").attr("id");

		console.log(sizeid);


			$.ajax({
				url: 'http://www.brafton.com/wp-admin/admin-ajax.php',
				data: {'id':indid,'prodid':prodid,'sizeid':sizeid,'action':'do_ajax','industry':industry},
				dataType: 'JSON', // I find JSON to be most versatile
		        beforeSend: function() {

		          $('#carousel-ul').html('<p>Loading...</p>')
		        },

		        success: function(data){

		      $('#carousel-ul').html('');


			if(data){
				for(i=0;i<data.length;i++){
				$('#carousel-ul').append(data[i]);
		//endloop
			}

		group_articles();
		//end null test
		}
		$(".hover_image_link").hide();
		//reload dat jcarousel 
		$('.jcarousel').jcarousel({
		         
		 });
		//end success
		},

		 		 error: function(errorThrown){
		               alert(indid+' '+prodid);
		               console.log(errorThrown);
		          }

			})
		   // or $(this).val()
		});


		$(document).on('click','.viewall', function(){
		$('#sel-ind').val('')
		$('#sel-prod').val('')

		$.ajax({
		url: 'http://www.brafton.com/wp-admin/admin-ajax.php',
		data: {'action':'do_ajax','industry':'all'},
		  //end ajax 
		 dataType: 'JSON', // I find JSON to be most versatile
		    beforeSend: function() {

		          $('#carousel-ul').html('<p>Loading...</p>')
		        },

		        success: function(data){

		      $('#carousel-ul').html('');

		if(data){




		for(i=0;i<data.length;i++){

		$('#carousel-ul').append(data[i]);



		//endloop
		}


		group_articles();


		//end null test
		}

		$(".hover_image_link").hide();

		//reload dat jcarousel 


		 $('.jcarousel').jcarousel({
		         
		    });


		//end success
		    }

		//end ajax
		})
	});
//end document ready
});


</script>


<?php  get_footer(); ?>