<?php
/**
 * Template for displaying the clothing archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get post type description.
$description = get_post_type_description( CLOTHING_POST_TYPE );

# Get the taxonomy.
$taxonomy = get_taxonomy( CLOTHING_TYPE_TAXONOMY );
$parent_terms = get_parent_terms( CLOTHING_TYPE_TAXONOMY );

get_header(); ?>

<div class="archive <?php echo CLOTHING_POST_TYPE; ?>">
	<div class="preface row">
		<div class="container">
			<div class="heading col-xs-12 col-sm-6">
				<h2>Clothing</h2>

				<?php if ( ! is_null( $description ) ) { ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php } /*--- end if $description ---*/ ?>

			</div>

			<?php if ( ! empty( $parent_terms ) ) { ?>
				<div class="content col-xs-12">
					<div class="">
						<ul class="nav nav-pills">
							<?php $count = 0; ?>
							<?php foreach( $parent_terms as $parent_term ) { ?>
								<?php $slug = esc_attr( $parent_term->slug ); ?>

								<li <?php echo $count++ == 0 ? 'class="active"' : ''; ?>>
									<a data-toggle="pill" href="<?php echo "#{$slug}"; ?>">
										<?php echo esc_html( $parent_term->name ); ?>
									</a>
								</li>

							<?php } /*--- end foreach $parent_terms ---*/ ?>
						</ul>
					</div>
				</div>
			<?php } /*--- end if $parent_terms ---*/ ?>

		</div>
	</div>

	<?php if ( ! empty( $parent_terms ) ) { ?>
		<div class="tab-content">
			<?php $count = 0; ?>
			<?php foreach( $parent_terms as $parent_term ) { ?>
				<?php $child_terms = get_child_terms( CLOTHING_TYPE_TAXONOMY, $parent_term->term_id ); ?>

				<div id="<?php echo esc_attr( $parent_term->slug ); ?>" class="tab-pane fade in anchor <?php echo $count++ == 0 ? 'active' : ''; ?> <?php echo empty( $child_terms ) ? 'no-children' : ''; ?>">
					<div class="preface row">
						<div class="container">

							<div class="heading col-xs-12 col-sm-6">
								<h2><?php echo esc_html( $parent_term->name ); ?></h2>
							</div>

							<div class="content col-xs-12 col-sm-6">
								<?php if ( ! is_null( $parent_term->description ) ) { ?>
									<p><?php echo esc_html( $parent_term->description ); ?></p>
								<?php } /*--- end if $parent_term->description ---*/ ?>
							</div>

						</div>
					</div>

					<?php if ( ! empty( $child_terms ) ) { ?>
						<?php foreach( $child_terms as $child_term ) { ?>
							<?php $post_ids = get_post_ids( CLOTHING_POST_TYPE, CLOTHING_TYPE_TAXONOMY, $child_term->slug ); ?>

							<?php if ( ! empty( $post_ids ) ) { ?>

								<div class="child-terms">
									<div class="heading row">
										<div class="container">
											<h2><?php echo esc_html( $child_term->name ); ?></h2>
										</div>
									</div>
									<div class="expand-bar container">
										<h4 name="click-to-expand" data-assoc="<?php echo esc_attr( $child_term->slug ); ?>">
											Click To Expand
											<i class="fa fa-angle-double-down"></i>
										</h4>
									</div>
									<div class="content <?php echo esc_attr( $child_term->slug ); ?> container">
										<?php foreach( $post_ids as $post_id ) { ?>
											<?php $featured_image = get_featured_image( $post_id ); ?>
											<?php $title = get_the_title( $post_id ); ?>

											<div class="content-item col-xs-6 col-sm-3">
												<figure class="image">
													<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
												</figure>
												<h4><?php echo esc_html( $title ); ?></h4>
											</div>

										<?php } /*--- end foreach $post_ids ---*/ ?>
									</div>
								</div>

							<?php } /*--- end if $post_ids ---*/ ?>
						<?php } /*--- end foreach $child_terms ---*/ ?>
					<?php } else { ?>
						<?php $post_ids = get_post_ids( CLOTHING_POST_TYPE, CLOTHING_TYPE_TAXONOMY, $parent_term->slug ); ?>
						<?php if ( ! empty( $post_ids ) ) { ?>

							<div class="content <?php echo esc_attr( $parent_term->slug ); ?> container">
								<?php foreach( $post_ids as $post_id ) { ?>
									<?php $featured_image = get_featured_image( $post_id ); ?>
									<?php $title = get_the_title( $post_id ); ?>

									<div class="content-item col-xs-6 col-sm-3">
										<figure class="image">
											<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
										</figure>
										<h4><?php echo esc_html( $title ); ?></h4>
									</div>

								<?php } /*--- end foreach $post_ids ---*/ ?>
							</div>

						<?php } /*--- end if $post_ids ---*/ ?>

					<?php } /*--- end else $child_terms ---*/ ?>
				</div>

			<?php } /*--- end foreach $parent_terms ---*/ ?>
		</div>
	<?php } /*--- end if $parent_terms ---*/ ?>

</div>

<?php get_footer(); ?>
