<?php
/**
 * Template for the mobile menu.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace PackItRightNow;

?>

<section id="mobile-menu">
	<div class="container">
		<i class="fa fa-times fa-2x"></i>
		<nav class="menu">
			<a name="products">Products</a>

			<div class="sub-menu">
				<a class="dropdown-item" href="<?php echo home_url( '/accessories/' ); ?>">PPE Accessories</a>
				<a class="dropdown-item" href="<?php echo home_url( '/clothing/' ); ?>">Clothing</a>
				<a class="dropdown-item" href="<?php echo home_url( '/kitchen/' ); ?>">Kitchen</a>
				<a class="dropdown-item" href="<?php echo home_url( '/packaging/' ); ?>">Packaging</a>
				<a class="dropdown-item" href="<?php echo home_url( '/miscellaneous/' ); ?>">Miscellaneous</a>
			</div>

			<a href="<?php echo home_url( '/about/' ); ?>">About Us</a>
			<a href="<?php echo home_url( '/contact/' ); ?>">Contact Us</a>
		</nav>
	</div>
</section>
