<?php
/**
 * Template for displaying the front page.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get carousel images.
$carousel_posts = get_carousel_posts();

# Get featured products.
$featured_products = get_featured_products();

# Get excerpt from the about page.
$about_excerpt = get_about_excerpt();

get_header(); ?>

<section class="front-page">

	<?php if ( $carousel_posts->have_posts() ) { ?>
		<div class="carousel-container row">
			<div class="container">
				<i class="ion-chevron-left"></i>
				<i class="ion-chevron-right"></i>
				<div class="carousel">
					<?php while ( $carousel_posts->have_posts() ) { ?>
						<?php $carousel_posts->the_post(); ?>
						<?php $image_source = get_carousel_image( $post ); ?>

						<div>
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $image_source ); ?> );"></div>
							</figure>
						</div>

					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if ( $featured_products->have_posts() ) { ?>
		<div class="featured-products">
			<h2>Featured Products</h2>
			<div class="container">
				<div class="row">
					<?php while ( $featured_products->have_posts() ) { ?>
						<?php $featured_products->the_post(); ?>
						<?php $image_source = get_featured_image( $post->ID ); ?>

						<div class="featured-product-item col-xs-6 col-sm-3">
							<a href="<?php echo home_url( strtolower( $post_type->label ) ); ?>">
								<figure class="image">
									<div class="source" style="background-image: url( <?php echo esc_url( $image_source ); ?> );"></div>
								</figure>
								<h4><?php echo esc_html( $post->post_title ); ?></h4>
							</a>
						</div>

					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if ( $about_excerpt ) { ?>
		<div class="about">
			<h2>About Us</h2>
			<p><?php echo $about_excerpt; ?></p>
		</div>
	<?php } ?>

</section>

<?php get_footer(); ?>
