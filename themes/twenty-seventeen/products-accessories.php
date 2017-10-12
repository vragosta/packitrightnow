<?php
/**
 * Template for displaying the accessory archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get post type description.
$description = get_post_type_description( ACCESSORY_POST_TYPE );

# Get the accessory type taxonomy.
$taxonomy = get_taxonomy( ACCESSORY_TYPE_TAXONOMY );
$parent_terms = get_parent_terms( ACCESSORY_TYPE_TAXONOMY );

get_header(); ?>

<div class="archive accessory">
	<div class="preface row">
		<div class="container">
			<div class="col-xs-12 col-sm-6">
				<h2>Accessories</h2>
				<?php if ( ! is_null( $description ) ) { ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php } /*--- end if $description ---*/ ?>
			</div>

			<?php if ( ! empty( $parent_terms ) ) { ?>
				<div class="col-xs-12 col-sm-6">
					<ul>

						<?php foreach( $parent_terms as $parent_term ) { ?>
							<li><a href="#<?php echo esc_attr( $parent_term->slug ); ?>"><?php echo esc_html( $parent_term->name ); ?></a></li>
						<?php } /*--- end foreach $parent_terms ---*/ ?>

					</ul>
				</div>
			<?php } /*--- end if $parent_terms ---*/ ?>

		</div>
	</div>

	<div class="content row">

		<?php if ( ! empty( $parent_terms ) ) { ?>
			<?php foreach( $parent_terms as $parent_term ) { ?>

				<div class="taxonomy-header <?php echo esc_attr( $parent_term->slug ); ?> row">
					<div class="container">
						<div class="col-xs-12">
							<h2 id="<?php echo esc_attr( $parent_term->slug ); ?>" class="anchor"><?php echo esc_html( $parent_term->name ); ?></h2>
						</div>
					</div>
				</div>

				<?php if ( $parent_term->name == 'Miscellaneous' ) { ?>
					<?php $post_ids = get_post_ids( ACCESSORY_POST_TYPE, ACCESSORY_TYPE_TAXONOMY, $parent_term->slug ); ?>

					<div class="content-post-ids <?php echo esc_attr( $parent_term->slug ); ?> container">
						<?php foreach( $post_ids as $post_id ) { ?>
							<?php $featured_image = get_featured_image( $post_id ); ?>
							<?php $title = get_the_title( $post_id ); ?>

							<div class="content-item col-xs-12 col-sm-4">
								<figure class="image">
									<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
								</figure>
								<h4><?php echo esc_html( $title ); ?></h4>
							</div>

						<?php } /*--- end foreach $post_ids ---*/ ?>
					</div>

				<?php } else { ?>

					<?php $child_terms = get_child_terms( ACCESSORY_TYPE_TAXONOMY, $parent_term->term_id ); ?>
					<?php foreach( $child_terms as $child_term ) { ?>
						<?php $post_ids = get_post_ids( ACCESSORY_POST_TYPE, ACCESSORY_TYPE_TAXONOMY, $child_term->slug ); ?>

						<div class="content-header <?php echo esc_attr( $child_term->slug ); ?> row">
							<div class="container">
								<div class="col-xs-12 col-sm-6">
									<h3><?php echo esc_html( $child_term->name ); ?></h3>
								</div>
								<div class="col-xs-12 col-sm-6">

									<?php if ( $child_term->description ) { ?>
										<p><?php echo esc_html( $child_term->description ); ?></p>
									<?php } /*--- end if $child_term->description ---*/ ?>

								</div>
							</div>
						</div>

						<div class="content-post-ids <?php echo esc_attr( $child_term->slug ); ?> container">
							<?php foreach( $post_ids as $post_id ) { ?>
								<?php $featured_image = get_featured_image( $post_id ); ?>
								<?php $title = get_the_title( $post_id ); ?>

								<div class="content-item col-xs-12 col-sm-4">
								  <figure class="image">
									<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
								  </figure>
								  <h4><?php echo esc_html( $title ); ?></h4>
								</div>

							<?php } /*--- end foreach $post_ids ---*/ ?>
						</div>
					<?php } /*--- end foreach $child_terms ---*/ ?>
				<?php } /*--- end else $parent_term->name ---*/ ?>
			<?php } /*--- end foreach $parent_terms ---*/ ?>
		<?php } /*--- end if $parent_terms ---*/ ?>
	</div>
</div>

<?php get_footer(); ?>
