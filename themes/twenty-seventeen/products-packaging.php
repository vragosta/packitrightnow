<?php
/**
 * Template for displaying the package archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get post type description.
$description = get_post_type_description( PACKAGE_POST_TYPE );

# Get the type taxonomy.
$taxonomy = get_taxonomy( PACKAGE_TYPE_TAXONOMY );
$terms = get_terms( PACKAGE_TYPE_TAXONOMY );

get_header(); ?>

<div class="archive package">
	<div class="preface row">
		<div class="container">
			<div class="col-xs-12 col-sm-6">
				<h2>Packages</h2>
				<?php if ( ! is_null( $description ) ) { ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php } ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<ul>
					<?php foreach( $terms as $term ) { ?>
						<li><a href="#<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="content row">

		<?php if ( ! empty( $terms ) ) { ?>

			<?php foreach( $terms as $term ) { ?>
				<?php $post_ids = get_post_ids( PACKAGE_POST_TYPE, PACKAGE_TYPE_TAXONOMY, $term->slug ); ?>

				<?php if ( ! empty( $post_ids ) ) { ?>

					<div class="taxonomy-header row">
						<div class="container">
							<div class="col-xs-12">
								<h2 id="<?php echo esc_attr( $term->slug ); ?>" class="anchor"><?php echo esc_html( $term->name ); ?></h2>
							</div>
						</div>
					</div>

					<div class="container">

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

			<?php } /*--- end foreach $terms ---*/ ?>

		<?php } /*--- end if $terms ---*/ ?>

	</div>
</div>

<?php get_footer(); ?>
