<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-inner clear">
			<?php if( get_custom_logo() ) { ?>
	            <div class="logo">
	            	<?php the_custom_logo(); ?>
	            </div>
	        <?php } else { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } ?>


			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="main-menu-container">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container'=>false ) ); ?>
					<div class="user-navi">
						<a href="#">My Account</a>
						<?php
							$cart_total =  WC()->cart->get_cart_contents_count();
							$cart_total_text = ($cart_total>0) ? ' <span class="cart-total">('.$cart_total.')</span>':'';
						?>
						<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">My Cart<?php echo $cart_total_text;?></a>
					</div>
				</div>
				<div class="secondary-menu-container">
					<?php wp_nav_menu( array( 'menu' => 'Secondary Menu', 'container'=>false ) ); ?>
				</div>
			</nav>
			<div id="mobile-navigation" class="mobile-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu','container_class'=>'mobile-main-nav' ) ); ?>
			</div>
			<span id="toggleMenu" class="burger"><i></i></span>
		</div>
	</header><!-- #masthead -->

	<?php if( is_home() ) { 
		get_template_part('template-parts/banner');
	} ?>

	<div id="content" class="site-content clear">
