<?php  
	// $obj = get_queried_object();
	// $page_title = ( isset($obj->label) && $obj->label ) ? $obj->label : '';
	$taxonomy = 'product_cat';
	$exclude = ['uncategorized'];
	$categories = get_terms( array(
	    'taxonomy' => $taxonomy,
	    'hide_empty' => false,
	    'parent' => 0
	) );
	if($categories) {
		foreach($categories as $k=>$cat) {
			if(in_array($cat->slug,$exclude)) {
				unset($categories[$k]);
			}
		}
	}
	$page_id = 23;
	$page_title = get_the_title($page_id);
	$courses = get_field('courses',$page_id);
?>
<div id="primary" class="full-content-area clear default-theme woocommerce">
	<main id="main" class="site-main-subpage" role="main">
		<header class="title-wrap text-center">
			<div class="wrapper clear">
				<h1 class="page-title"><?php echo $page_title ?></h1>
			</div>
		</header>

		<div class="courses-section clear">
			<div class="wrapper">
				<?php if($courses) { ?>
				<div class="flexrow">
					<?php foreach ($courses as $row) {
						$term = $row['title'];
						$term_id = ($term) ? $term->term_id : 0;
						$title = ($term) ? $term->name : '';
						$pagelink = ($term) ? get_term_link($term) : '';
						$description = $row['description'];
						$icon = $row['icon'];
						?>
						<div class="flexcol course">
							<?php if ($icon) { ?>
							<div class="icon">
								<img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['title'] ?>" aria-hidden="true" />
							</div>	
							<?php } ?>
							<h3 class="title"><?php echo $title; ?></h3>
							<div class="description"><?php echo $description ?></div>
							<?php if ($pagelink) { ?>
								<div class="button"><a href="#termId_<?php echo $term_id;?>">Start Now</a></div>	
							<?php } ?>
						</div>
					<?php } ?>
				</div>	
				<?php } ?>
			</div>
		</div>

		<?php if ($categories) { ?>
		<section class="section-course-options clear">
			<div class="inner-wrapper clear">
				<?php foreach ($categories as $cat) { 
				$cat_id = $cat->term_id;
				$cat_name = $cat->name;
				$post_type = 'product';
				$args = array(
					'posts_per_page'   => -1,
					'post_type'        => $post_type,
					'post_status'      => 'publish',
					'tax_query' => array(
			            array(
			                'taxonomy' => $taxonomy,
			                'field' => 'term_id',
			                'terms' => $cat_id
			            )
			        )
				);
				$items = get_posts($args);
				?>
				<h3 id="termId_<?php echo $cat_id?>" class="catname"><?php echo $cat_name ?></h3>
				<div class="course-listing clear">
					<?php if ($items) { ?>
					<div class="itemswrap clear">
						<?php $i=1; foreach ($items as $item) { 
						$post_title = $item->post_title;
						$post_id = $item->ID;
						$post_cats = get_the_terms($post_id,$taxonomy);
						$i_product = wc_get_product( $post_id );
						$price = ($i_product) ? $i_product->get_regular_price() : '0.00';
						$price = wc_price($price);
						// $_product->get_regular_price();
						// $_product->get_sale_price();
						// $_product->get_price();
						$i_product_link = get_site_url() . '/product-category/' . $item->slug . '/?add-to-cart=' . $post_id;
						$boxClass = ($i % 2) ? 'odd':'even';
						$children_categories = '';
						if($post_cats) {
							$j=1; foreach ($post_cats as $pc) {
								$child_id = $pc->term_id;
								$child_cat = $pc->name;
								if($child_id!==$cat_id) {
									$comma = ($j>1) ? ' / ':'';
									$children_categories .= $comma . $child_cat;
									$j++;
								}
							}
						}
						?>
						<div class="course-box clear <?php echo $boxClass ?>">
							<?php if ($children_categories) { ?>
							<div class="course-cat"><?php echo $children_categories ?></div>	
							<?php } ?>
							<div class="course-info clear">
								<div class="left">
									<div class="ctitle"><?php echo $post_title ?></div>
									<div class="clink"><a href="<?php echo get_permalink($post_id); ?>">View Details</a></div>
								</div>
								<div class="right">
									<div class="cprice"><?php echo $price ?></div>
									<div class="c_addcart_btn">
										<a href="/ac/pearls/product-category/continuing-education/?add-to-cart=412" data-quantity="1" class="button product_type_course add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $post_id ?>" data-product_sku="" rel="nofollow">Add to cart</a>
									</div>
								</div>
							</div>
						</div>	
						<?php $i++; } ?>	
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>


	</main>
</div>