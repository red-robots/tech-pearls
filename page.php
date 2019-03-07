<?php
get_header(); ?>

	<div id="primary" class="full-content-area clear page-about">
		<main id="main" class="site-main-subpage clear" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="title-wrap text-center">
					<div class="wrapper clear">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</div>
				</header>

				<?php the_content(); ?>
			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
