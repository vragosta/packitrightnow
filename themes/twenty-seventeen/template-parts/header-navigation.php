<?php
/**
 * Main header navigation for all templates except front page.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

?>

<header class="header">
	<div class="container">
		<a href="<?php echo home_url(); ?>" class="logo">
			<img src="<?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/PIR_LOGO_2017_LARGER_WHITE_BOX.png'; ?>" style="width: 120px" />
		</a>
		<nav class="menu">
			<div class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Products
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?php echo home_url( '/accessories/' ); ?>">PPE Accessories</a>
					<a class="dropdown-item" href="<?php echo home_url( '/aluminum/' ); ?>">Aluminum</a>
					<a class="dropdown-item" href="<?php echo home_url( '/clothing/' ); ?>">Clothing</a>
					<a class="dropdown-item" href="<?php echo home_url( '/kitchen/' ); ?>">Kitchen</a>
					<a class="dropdown-item" href="<?php echo home_url( '/packaging/' ); ?>">Packaging</a>
					<a class="dropdown-item" href="<?php echo home_url( '/miscellaneous/' ); ?>">Miscellaneous</a>
				</div>
			</div>
			<a href="<?php echo home_url( '/about/' ); ?>">About Us</a>
			<a href="<?php echo home_url( '/contact/' ); ?>">Contact Us</a>
		</nav>
		<i class="ion ion-navicon drop-down"></i>
	</div>
</header>
