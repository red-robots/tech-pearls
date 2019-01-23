<?php 
get_header(); ?>

	<div id="primary" class="full-content-area clear">
		<main id="main" class="site-main" role="main">
			<?php $wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
			if ( have_posts() ) { the_post()  ?>
				
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
