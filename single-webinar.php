<?php get_header(); ?>
<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL | E_STRICT);

$registered = false; //assume user has not signed up for webinar

//ONLY enter this page to the db if they haven't registered on this page before...

$current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( $_COOKIE[ 'Registered1' ] == $current_page) {
	//Don't worry, this column is UNIQUE- multiple visits will not result in multiple DB entries...
	$the_ID = get_the_ID();
	$success = $wpdb->insert(
		'brftn_registrations',
		array(
			'user_name' => $_COOKIE[ 'Name' ],
			'type' => 'webinar',
			'post_title' => get_the_title( $the_ID )
		)
	);

	setcookie("Registered1","clear",1,'/');
} 


//check all results for whether any entries match title of current webinar, set $registered to true, if so
if ( $_COOKIE[ 'Name' ] ) {
	$registrations = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT post_title FROM brftn_registrations WHERE user_name = '" . $_COOKIE[ 'Name' ] . "'" ) );
	//print_r($registrations);
	foreach ( $registrations as $registration ) {
		//echo "Checking registrations...currently: " . $registration . "<br />";
		if( $registration == get_the_title( get_the_ID() ) ) {

			$registered = true;
			break;
		}
	}
}

$daUrl = curPageURL2();

function brafton_webinar_share( $location ){
	$services = array( 'linkedin', 'twitter', 'facebook', 'gplus', 'pinterest', 'stumbleupon' );

	echo "<div class='share icons $location small cf'>";
	foreach( $services as $network )
		echo "<a data-service='$network' href='" . curPageURL2() . "'></a>";

	echo '</div>';
}
function curPageURL2() {
	$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	//var_dump($url);
	$parts = parse_url($url);
	$str = $parts['scheme'].'://'.$parts['host'].$parts['path'];
	return $str;
}
?>
<article id="glossary-term" class="twelvecol row">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<header>
		<h1 itemprop="name"><?php the_title(); ?></h1>
	</header>
	<div id="topmeta" class="twelvecol row">
		<div id="topinfo"><?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?></div>
	</div>
	<div class="twelvecol row">
		<div id="body" class="eightcol">
			<?php //echo curPageURL2(); ?>
			<?php //echo "The cookie is " . $_COOKIE[ $daUrl ]; ?>
			<?php if( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() ) ) { ?>
					<?php //if ( $_GET['signedup'] != 'true' ) { ?>
					<?php //if( $_COOKIE[ 'Registered' ] != "true" ) { ?>
					<?php if( $registered != true ) { ?>
							<?php brafton_webinar_share( 'top' ); ?>
							<h3><strong>Sign Up on the Right to View this Webinar</strong></h3>
							<!--<div style="font-size: 16px;">
								<p>
									<strong>Presenters:</strong> <?php echo get_post_meta( get_the_ID(), 'presenter', true ); ?>
									<br />
									<strong>Running time:</strong> <?php echo get_post_meta( get_the_ID(), 'run_time', true ); ?>
								</p>
							</div>-->
						<?php }else{ ?>
							<?php brafton_webinar_share( 'top' ); ?>
					
						<?php } ?>
					
					<?php
						//if( $_COOKIE[ 'Registered' ] == "true" ) {
						if( $registered == true ) {
						//if( $_GET['signedup'] == 'true') {
							$sublime_text = get_post_meta( get_the_ID(), 'sublime_vid_shortcode', true );
							if ( $sublime_text )
								echo do_shortcode( $sublime_text );
							else
								echo get_post_meta( get_the_ID(), 'embed_code', true );
						}else if ( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() )) {
							echo "<span id='webinar-preview'>";
							the_post_thumbnail();
							echo "</span>";
						}else{
							the_post_thumbnail();
						}
					?>
			
					<?php the_content(); ?>
					<!-- <h5>Related Content</h5>
					<blockquote><?php //related_posts(); ?></blockquote> -->
				<?php }else if( has_term( 'twitter-chats', 'event-type', get_the_ID() ) || has_term( 'pre-chat', 'event-type', get_the_ID() ) ) {
					brafton_webinar_share( 'top' );
					echo '<span class="twitter-event-img">';
					the_post_thumbnail();
					echo '</span>';
					the_content();
				} ?>
		</div>
		<div id="sidebar" class="fourcol last">
			<aside>
				<?php //if( $_GET['signedup'] != 'true' ) { ?>
				<?php //if( $_COOKIE[ 'Registered' ] != "true" ) { ?>
				<?php if( $registered != true ) { ?>
				<div id="CTA">
					<?php if( has_term( 'webinars', 'event-type', get_the_ID() ) || has_term( 'pre-webinar', 'event-type', get_the_ID() )) {
						echo '<h4 class="dark">Sign up to view this webinar!';
						
						echo'</h4>';
						get_template_part('marketoforms/webinar_marketo_form');
					} else if ( has_term( 'twitter-chats', 'event-type', get_the_ID() ) || has_term( 'pre-chat', 'event-type', get_the_ID() ) ) { 
						echo '<iframe src="http://fuel.brafton.com/BRTwitteriFrame.html" width=375 height=675></iframe>';
					} ?>
				</div>
				<?php } else { ?>
					<ul>
					<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Archive Sidebar" ) ) : ?>
						<p>Add Widgets to the Page Sidebar</p>
					<?php endif; ?>
					</ul>
				<?php } ?>
			</aside>
		</div>
	</div>
	<?php endwhile; endif; ?>
</article><!-- End #glossary-term -->

<?php get_footer(); ?>