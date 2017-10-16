<?php
/**
 * Template for displaying the accessory archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

$accessory_slug = get_query_var( 'accessory' );
$parent_term = get_term_by( 'slug', $accessory_slug, ACCESSORY_TYPE_TAXONOMY );
$child_terms = get_child_terms( ACCESSORY_TYPE_TAXONOMY, $parent_term->term_id );

// echo '<pre>';
// var_dump( $child_terms );
// echo '</pre>';
// exit();

get_header(); ?>

<div class="archive child <?php echo ACCESSORY_POST_TYPE; ?>">
	<div class="preface row">
		<div class="container">
			<div class="col-xs-12 col-sm-6">
				<h2><?php echo esc_html( $parent_term->name ); ?></h2>
				<?php if ( ! is_null( $parent_term->description ) ) { ?>
					<p><?php echo esc_html( $parent_term->description ); ?></p>
				<?php } /*--- end if $parent_term->description ---*/ ?>
			</div>

			<?php if ( ! empty( $child_terms ) ) { ?>
				<div class="col-xs-12 col-sm-6">
					<ul>

						<?php foreach( $child_terms as $child_term ) { ?>
							<li><a href="#<?php echo esc_attr( $child_term->slug ); ?>"><?php echo esc_html( $child_term->name ); ?></a></li>
						<?php } /*--- end foreach $child_terms ---*/ ?>

					</ul>
				</div>
			<?php } /*--- end if $child_terms ---*/ ?>

		</div>
	</div>
