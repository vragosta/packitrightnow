<?php
/**
 * Template for displaying the accessories archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

$beard_cover_ids = get_accessories( FACEGEAR_TAXONOMY, 'beard-cover' );
$eye_wear_ids = get_accessories( FACEGEAR_TAXONOMY, 'eye-wear' );
$face_shield_ids = get_accessories( FACEGEAR_TAXONOMY, 'face-shield' );
$mask_ids = get_accessories( FACEGEAR_TAXONOMY, 'mask' );

get_header(); ?>

<div class="archive accessories">
	<div class="preface container">
		<div class="col-xs-12 col-sm-6">
			<h2>Accessories</h2>
			<p>Nullam quis risus eget urna mollis ornare vel eu leo. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<ul>
				<li><a href="#facegear">FaceGear</a></li>
				<li><a href="#headgear">HeadGear</a></li>
				<li><a href="#miscellaneous">Miscellaneous</a></li>
			</ul>
		</div>
	</div>

	<div class="content row">
		<div class="container">
			<h2 id="facegear" class="anchor">FaceGear</h2>

			<div class="row">

				<?php if ( ! empty( $beard_cover_ids ) ) { ?>

					<div class="col-xs-12">
						<h3>Beard Covers</h3>
					</div>

					<?php foreach( $beard_cover_ids as $id ) { ?>
						<?php $featured_image = get_featured_image( $id ); ?>
						<?php $title = get_the_title( $id ); ?>
						<div class="content-item col-xs-12 col-sm-4">
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
							</figure>
							<h4><?php echo esc_html( $title ); ?></h4>
						</div>
					<?php } ?>

				<?php } ?>

			</div>

			<div class="row">

				<?php if ( ! empty( $eye_wear_ids ) ) { ?>

					<div class="col-xs-12">
						<h3>Eye Wear</h3>
					</div>

					<?php foreach( $eye_wear_ids as $id ) { ?>
						<?php $featured_image = get_featured_image( $id ); ?>
						<?php $title = get_the_title( $id ); ?>
						<div class="content-item col-xs-12 col-sm-4">
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
							</figure>
							<h4><?php echo esc_html( $title ); ?></h4>
						</div>
					<?php } ?>

				<?php } ?>

			</div>

			<div class="row">

				<?php if ( ! empty( $face_shield_ids ) ) { ?>

					<div class="col-xs-12">
						<h3>Face Shield</h3>
					</div>

					<?php foreach( $face_shield_ids as $id ) { ?>
						<?php $featured_image = get_featured_image( $id ); ?>
						<?php $title = get_the_title( $id ); ?>
						<div class="content-item col-xs-12 col-sm-4">
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
							</figure>
							<h4><?php echo esc_html( $title ); ?></h4>
						</div>
					<?php } ?>

				<?php } ?>

			</div>

			<div class="row">

				<?php if ( ! empty( $mask_ids ) ) { ?>

					<div class="col-xs-12">
						<h3>Masks</h3>
					</div>

					<?php foreach( $mask_ids as $id ) { ?>
						<?php $featured_image = get_featured_image( $id ); ?>
						<?php $title = get_the_title( $id ); ?>
						<div class="content-item col-xs-12 col-sm-4">
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
							</figure>
							<h4><?php echo esc_html( $title ); ?></h4>
						</div>
					<?php } ?>

				<?php } ?>

			</div>
		</div>
	</div>

	<div class="content row">
		<div class="container">
			<h2 id="headgear" class="anchor">HeadGear</h2>
			<!-- <p style="font-size: 20px; font-weight: 700; margin-bottom: 30px;">* Available in a variety of colors.</p> -->
			<div class="row">
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 1</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 2</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder5.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 3</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 4</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 5</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder5.jpg'; ?> );"></div>
					</figure>
					<h4>HeadGear Title 6</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="content row">
		<div class="container">
			<h2 id="miscellaneous" class="anchor">Miscellaneous</h2>
			<div class="row">
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 1</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 2</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder5.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 3</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder3.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 4</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder2.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 5</h4>
				</div>
				<div class="content-item col-xs-12 col-sm-4">
					<figure class="image">
						<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/placeholder5.jpg'; ?> );"></div>
					</figure>
					<h4>Miscellaneous Title 6</h4>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
