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

# Get the taxonomy.
$taxonomy = get_taxonomy( ACCESSORY_TYPE_TAXONOMY );
$parent_terms = get_parent_terms( ACCESSORY_TYPE_TAXONOMY );

// echo '<pre>';
// var_dump( $parent_terms );
// echo '</pre>';
// exit();

get_header(); ?>

<div class="archive <?php echo ACCESSORY_POST_TYPE; ?>">
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
		<div class="content row">
			<?php foreach( $parent_terms as $parent_term ) { ?>
				<div class="col-xs-12 col-sm-4">

				</div>
			<?php } ?>
		</div>
	<?php } ?>

</div>

<?php get_footer(); ?>
