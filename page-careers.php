<?php 
/*
**Template Name: Careers
*/

get_header(); ?>

			<div id="content">
				<div class="graphical-header">
					<img src="/wp-content/themes/brafton/library/images/page-headers/blank_header.png">
				
					<h1><?php bold_last_word( get_field( "h1" ) ); //see bones.php ?></h1>
				</div>

				<?php brafton_share( 'top' ); ?>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="business_model_container">

					<div class="template_section">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_1') ); //see bones.php ?></h2>
							<div class="content_body">
								<?php $opps = get_field( 'massive_opportunities' ); 

								echo $opps;

								?>
							</div>
						</div>

					</div>

					<div class="template_section gray_body">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_2') ); ?></h2>
							<div class="content_body">
								<?php $talk = get_field( 'lets_talk' ); 

								echo $talk;

								?>
							</div>
						</div>

					</div>

					<div class="template_section how_it_works">

						<div class="content_container wrap">
							<h2><?php bold_first_word( get_field('subhead_3') ); ?></h2>
							<div class="content_body">
										<!--//jobvite javascript...-->
										<iframe id="jobviteframe" style="font-size: 14px; line-height: 1.5em;" src="http://hire.jobvite.com/CompanyJobs/Careers.aspx?c=qAD9Vfw1&amp;jvresize=http://www.brafton.com/FrameResize.html" height="500" width="100%" frameborder="0" scrolling="yes"></iframe>
										<script type="text/javascript">// <![CDATA[
										var l = location.href;
										      var args = '';
										      var k = '';
										      var iStart = l.indexOf('?jvk=');
										      if (iStart == -1) iStart = l.indexOf('&#038;jvk=');
										      if (iStart != -1) {
										            iStart += 5;
										            var iEnd = l.indexOf('&#038;', iStart);
										            if (iEnd == -1) iEnd = l.length;
										            k = l.substring(iStart, iEnd);
										      }
										      iStart = l.indexOf('?jvi=');
										      if (iStart == -1) iStart = l.indexOf('&#038;jvi=');
										      if (iStart != -1) {
										            iStart += 5;
										            var iEnd = l.indexOf('&#038;', iStart);
										            if (iEnd == -1) iEnd = l.length;
										            args += '&#038;j=' + l.substring(iStart, iEnd);
										            if (!k.length) args += '&#038;k=Job';
										            var iStart = l.indexOf('?jvs=');
										            if (iStart == -1) iStart = l.indexOf('&#038;jvs=');
										            if (iStart != -1){
										                  iStart += 5;
										                  var iEnd = l.indexOf('&#038;', iStart);
										                  if (iEnd == -1) iEnd = l.length;
										                  args += '&#038;s=' + l.substring(iStart, iEnd);
										            }
										      }
										      if (k.length) args += '&#038;k=' + k;
										      if (args.length) document.getElementById('jobviteframe').src += args;
										      function resizeFrame(height, scrollToTop) {
										            if (scrollToTop) window.scrollTo(0, 0);
										            var oFrame = document.getElementById('jobviteframe');
										            if (oFrame) oFrame.height = height;
										      }
										// ]]></script>
										<!--END JOBVITE CODE -->
							</div>
						</div>

					</div>


				</div>

				<?php endwhile; endif; ?>

			</div>

<?php get_footer(); ?>

