<?php
/**
 * Template for displaying the front page.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

get_header(); ?>

<section class="front-page container" style="min-height: 1200px;">

	<div class="carousel">

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder.jpg'; ?> );"></div>
			</figure>
		</div>

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder1.jpg'; ?> );"></div>
			</figure>
		</div>

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
			</figure>
		</div>

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
			</figure>
		</div>

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder4.jpg'; ?> );"></div>
			</figure>
		</div>

		<div>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder5.jpg'; ?> );"></div>
			</figure>
		</div>

	</div>

</section>

<?php get_footer(); ?>
