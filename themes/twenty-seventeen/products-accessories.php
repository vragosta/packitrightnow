<?php
/**
 * Template for displaying the accessory parent archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get post type description.
$description = get_post_type_description( ACCESSORY_POST_TYPE );

# Get the taxonomy.
$taxonomy = get_taxonomy( ACCESSORY_TYPE_TAXONOMY );
$parent_terms = get_parent_terms( ACCESSORY_TYPE_TAXONOMY );

get_header(); ?>

<div class="archive parent <?php echo ACCESSORY_POST_TYPE; ?>">
	<div class="preface row">
		<div class="container">
			<div class="col-xs-12 col-sm-6">
				<h2>Accessories</h2>

				<?php if ( ! is_null( $description ) ) { ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php } /*--- end if $description ---*/ ?>

			</div>
		</div>
	</div>

	<?php if ( $parent_terms ) { ?>
		<div class="content container">
			<?php foreach( $parent_terms as $parent_term ) { ?>
				<?php $image_source = get_term_image( $parent_term->term_id ); ?>

				<?php if ( $image_source ) { ?>
					<div class="content-item col-xs-12 col-sm-4">
						<a href="<?php echo home_url( '/accessories/' . esc_attr( $parent_term->slug ) ); ?>">
							<figure class="image">
								<div class="source" style="background-image: url( <?php echo esc_url( $image_source ); ?> );"></div>
							</figure>
							<h4><?php echo esc_html( $parent_term->name ); ?></h4>
						</a>
					</div>
				<?php } /*--- end if $image_source ---*/ ?>

			<?php } /*--- end foreach $parent_terms ---*/ ?>
		</div>
	<?php } /*--- end if $parent_terms ---*/ ?>

</div>

<?php get_footer(); ?>
