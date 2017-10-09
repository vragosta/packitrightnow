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

get_header(); ?>

<section class="front-page container">

	<?php if ( $carousel_posts->have_posts() ) { ?>
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
	<?php } ?>

	<div class="featured-products">
		<h2>Featured Products</h2>
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder4.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder4.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
				</figure>
			</div>

			<div class="col-xs-12 col-sm-4">
				<figure class="image">
					<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder4.jpg'; ?> );"></div>
				</figure>
			</div>
		</div>
	</div>

	<div class="about">
		<h2>About Us</h2>
		<p>
			Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
			Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vestibulum id ligula porta felis euismod semper.
		</p>
	</div>

</section>

<?php get_footer(); ?>
