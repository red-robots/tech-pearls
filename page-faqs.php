<?php
/**
 * Template Name: FAQ's
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear">
		<main id="main" class="site-main wrapper" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>

			<?php if(have_rows('faqs')): ?>
			<section class="faqs">
				<?php while(have_rows('faqs')): the_row();
					$question=get_sub_field('question');
					$answer=get_sub_field('answer');
					?>
						<div class="faqrow">
							<div class="question">
								<div class="plus-minus-toggle collapsed"></div>
								<?php the_sub_field('question'); ?>
							</div>
							<div class="answer"><?php the_sub_field('answer'); ?></div>
						</div><!-- faqrow -->
				<?php endwhile; ?>
			</section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();