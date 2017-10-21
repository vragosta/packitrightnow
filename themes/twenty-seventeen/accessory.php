<?php
/**
 * Template for displaying the accessory child archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

$accessory_slug = get_query_var( 'accessory' );
$parent_term = get_term_by( 'slug', $accessory_slug, ACCESSORY_TYPE_TAXONOMY );
$child_terms = get_child_terms( ACCESSORY_TYPE_TAXONOMY, $parent_term->term_id );

get_header(); ?>

<div class="archive child <?php echo ACCESSORY_POST_TYPE; ?>">
	<div class="preface row <?php echo empty( $child_terms ) ? 'no-children' : ''; ?>">
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


	<div class="content row">
		<?php if ( $child_terms ) { ?>
			<?php foreach( $child_terms as $child_term ) { ?>
				<div class="taxonomy-header <?php echo esc_attr( $child_term->slug ); ?> row">
					<div class="container">
						<div class="col-xs-12">
							<h2 id="<?php echo esc_attr( $child_term->slug ); ?>" class="anchor"><?php echo esc_html( $child_term->name ); ?></h2>
						</div>
					</div>
				</div>

				<?php $post_ids = get_post_ids( ACCESSORY_POST_TYPE, ACCESSORY_TYPE_TAXONOMY, $child_term->slug ); ?>
				<?php if ( ! empty( $post_ids ) ) { ?>

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

				<?php } /*--- end if $post_ids ---*/ ?>
			<?php } /*--- end foreach $child_terms ---*/ ?>
		<?php } else { ?>
			<?php $post_ids = get_post_ids( ACCESSORY_POST_TYPE, ACCESSORY_TYPE_TAXONOMY, $parent_term->slug ); ?>
			<?php if ( ! empty( $post_ids ) ) { ?>

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

			<?php } /*--- end if $post_ids ---*/ ?>
		<?php } /*--- end if $child_terms ---*/ ?>
	</div>
</div>

<?php get_footer(); ?>
