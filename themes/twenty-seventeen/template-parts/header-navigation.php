<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

$post_types = get_supported_post_types();

?>

<header class="header">
	<div class="container">
		<a href="<?php echo home_url(); ?>" class="logo">
			<img src="<?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/PIR_LOGO_2017_LARGER_WHITE_BOX.png'; ?>" style="width: 300px" />
		</a>

		<div class="header-information">
			<p>Call : <a href="tel:718-252-8816">(718)-547-8578</a></p>
			<p>Email : <a href="mailto:packitrightnow@gmail.com">packitrightnow@gmail.com</a></p>
		</div>
	</div>
	<div class="row menu-container">
		<nav class="menu container">
			<a href="<?php echo home_url(); ?>">Home</a>

			<?php foreach( $post_types as $post_type ) { ?>
				<?php $taxonomy = reset( get_taxonomies_by_post_type( $post_type->name ) ); ?>
				<?php $parent_terms = get_parent_terms( $taxonomy->name ); ?>

				<div class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo esc_html( $post_type->label ); ?>
					</a>
					<div class="dropdown-menu">
						<?php foreach( $parent_terms as $term ) { ?>
							<a class="dropdown-item" href="<?php echo home_url( strtolower( esc_attr( $post_type->labels->menu_name ) ) . '?term=' . esc_attr( $term->slug ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
						<?php } ?>
					</div>
				</div>

			<?php } ?>

			<a href="<?php echo home_url( '/about/' ); ?>">About Us</a>
			<a href="<?php echo home_url( '/contact/' ); ?>">Contact Us</a>
		</nav>
		<i class="ion ion-navicon drop-down"></i>
	</div>
</header>
