<?php
/**
 * Template for displaying the contact page.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

$excerpt = get_the_excerpt();
$image_source = get_featured_image( $post->ID );
$google_maps_image_source = get_google_maps_image( $post );

get_header(); ?>

<div class="contact container">
	<div class="col-xs-12">

		<?php if ( $image_source ) { ?>
			<figure class="image">
				<div class="source" style="background-image: url( <?php echo esc_url( $image_source ); ?> );"></div>
			</figure>
		<?php } ?>

		<?php if ( $excerpt ) { ?>
			<div class="excerpt">
				<?php echo $excerpt; ?>
			</div>
			<p>If you'd like to contact me, please fill out the following form...</p>
		<?php } ?>

		<div class="field-container row">
			<div class="form-group col-md-6">
				<label for="firstname">First Name *</label>
				<input type="text" class="form-control" id="firstname">
			</div>
			<div class="form-group col-md-6">
				<label for="lastname">Last Name *</label>
				<input type="text" class="form-control" id="lastname">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="email">Email Address *</label>
				<input type="email" class="form-control" id="email">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="subject">Subject *</label>
				<input type="text" class="form-control" id="subject">
			</div>
		</div>

		<div class="field-container row">
			<div class="form-group col-md-12">
				<label for="message">Message *</label>
				<textarea class="form-control" id="message"></textarea>
			</div>
		</div>

		<button class="btn btn-info contact-btn">Submit</button>

	</div>
</div>

<?php get_footer(); ?>
