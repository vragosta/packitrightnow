<?php
/**
 * Template for displaying the packaging archive.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

# Get post type description.
$description = get_post_type_description( PACKAGE_POST_TYPE );

# Get the taxonomy.
$taxonomy = get_taxonomy( PACKAGE_TYPE_TAXONOMY );
$parent_terms = get_parent_terms( PACKAGE_TYPE_TAXONOMY );

get_header(); ?>

<div class="archive <?php echo PACKAGE_POST_TYPE; ?>">
	<div class="preface row">
		<div class="container">
			<div class="heading col-xs-12 col-sm-6">
				<h2>Packaging</h2>

				<?php if ( ! is_null( $description ) ) { ?>
					<p><?php echo esc_html( $description ); ?></p>
				<?php } /*--- end if $description ---*/ ?>

			</div>

			<?php if ( ! empty( $parent_terms ) ) { ?>
				<div class="content col-xs-12">
					<div class="">
						<ul class="nav nav-pills">
							<?php foreach( $parent_terms as $parent_term ) { ?>
								<?php $slug = esc_attr( $parent_term->slug ); ?>

								<li>
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
			<?php foreach( $parent_terms as $parent_term ) { ?>
				<?php $child_terms = get_child_terms( PACKAGE_TYPE_TAXONOMY, $parent_term->term_id ); ?>

				<div id="<?php echo esc_attr( $parent_term->slug ); ?>" class="tab-pane fade in anchor <?php echo empty( $child_terms ) ? 'no-children' : ''; ?>">
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
							<?php $post_ids = get_post_ids( PACKAGE_POST_TYPE, PACKAGE_TYPE_TAXONOMY, $child_term->slug ); ?>

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
											<?php $spec_sheet_url = get_post_meta($post_id, '_spec_sheet_url', true); ?>

											<div class="content-item col-xs-6 col-sm-3">
												<?php if ($spec_sheet_url): ?>
													<a href="#" data-toggle="modal" data-target="#spec-sheet-modal-<?= $post_id; ?>">
													<figure class="image">
														<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
													</figure>
													</a>
												<?php else: ?>
													<figure class="image">
														<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
													</figure>
												<?php endif; ?>
												<h4><?php echo esc_html( $title ); ?></h4>
											</div>

											<?php if ($spec_sheet_url): ?>
												<div class="modal fade" id="spec-sheet-modal-<?= $post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="spec-sheet" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<iframe src="<?= $spec_sheet_url; ?>" title="your_title" align="top" height="600" width="100%" frameborder="0" scrolling="auto"></iframe>
														</div>
													</div>
												</div>
											<?php endif; ?>

										<?php } /*--- end foreach $post_ids ---*/ ?>
									</div>
								</div>

							<?php } /*--- end if $post_ids ---*/ ?>
						<?php } /*--- end foreach $child_terms ---*/ ?>
					<?php } else { ?>
						<?php $post_ids = get_post_ids( PACKAGE_POST_TYPE, PACKAGE_TYPE_TAXONOMY, $parent_term->slug ); ?>
						<?php if ( ! empty( $post_ids ) ) { ?>

							<div class="content <?php echo esc_attr( $parent_term->slug ); ?> container">
								<?php foreach( $post_ids as $post_id ) { ?>
									<?php $featured_image = get_featured_image( $post_id ); ?>
									<?php $title = get_the_title( $post_id ); ?>
									<?php $spec_sheet_url = get_post_meta($post_id, '_spec_sheet_url', true); ?>

									<div class="content-item col-xs-6 col-sm-3">
										<?php if ($spec_sheet_url): ?>
											<a href="#" data-toggle="modal" data-target="#spec-sheet-modal-<?= $post_id; ?>">
												<figure class="image">
													<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
												</figure>
											</a>
										<?php else: ?>
											<figure class="image">
												<div class="source" style="background-image: url( <?php echo esc_url( $featured_image ); ?> );"></div>
											</figure>
										<?php endif; ?>
										<h4><?php echo esc_html( $title ); ?></h4>
									</div>

									<?php if ($spec_sheet_url): ?>
										<div class="modal fade" id="spec-sheet-modal-<?= $post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="spec-sheet" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<iframe src="<?= $spec_sheet_url; ?>" title="your_title" align="top" height="600" width="100%" frameborder="0" scrolling="auto"></iframe>
												</div>
											</div>
										</div>
									<?php endif; ?>

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
