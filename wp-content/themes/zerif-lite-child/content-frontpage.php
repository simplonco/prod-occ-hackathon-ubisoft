<?php
$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):

		get_template_part( 'sections/big_title' );

	endif;

?>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<div id="content" class="site-content">

<?php

	/* OUR FOCUS SECTION */

	$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

	if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):

	zerif_before_our_focus_trigger();

		get_template_part( 'sections/our_focus' );

	zerif_after_our_focus_trigger();

	endif;
	
	/* ABOUT US */

		/* TESTIMONIALS */

	$zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

	if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):

	zerif_before_testimonials_trigger();

		get_template_part( 'sections/testimonials' );

	zerif_after_testimonials_trigger();

	endif;

	/* OUR TEAM */

	$zerif_ourteam_show = get_theme_mod('zerif_ourteam_show');

	if( isset($zerif_ourteam_show) && $zerif_ourteam_show != 1 ):

	zerif_before_our_team_trigger();

		get_template_part( 'sections/our_team' );

	zerif_after_our_team_trigger();

	endif;

	?>
	<section class="lots">
		
		<div class="container">

		<!-- SECTION HEADER -->

			<div class="section-header">

				<h2>Lots</h2>

			</div>

			<div class="row">
				<div class="col-lg-4">
					<img src="http://lorempixel.com/200/200/" alt="..." class="img-thumbnail">
					<h3>Google Home</h3>
				</div>
				<div class="col-lg-4">
					<img src="http://lorempixel.com/200/200/" alt="..." class="img-thumbnail">
					<h3>Visite du studio Ubisoft</h3></div>
				<div class="col-lg-4">
					<img src="http://lorempixel.com/200/200/" alt="..." class="img-thumbnail">
					<h3>Abonnement Netflix</h3>
				</div>
			</div>
		</div>

	</section>
	
		