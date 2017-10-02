<?php
/**
 * Main header navigation for both desktop and mobile designs.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

?>

<header class="header">
	<div class="container">
		<a href="<?php echo home_url(); ?>" class="logo"><h1>Pack It Right Now LLC.</h1></a>
		<nav class="menu">
			<div class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Products
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?php echo home_url( '/accessories/' ); ?>">Accessories</a>
					<a class="dropdown-item" href="<?php echo home_url( '/clothing/' ); ?>">Clothing</a>
					<a class="dropdown-item" href="<?php echo home_url( '/cutlery/' ); ?>">Cutlery</a>
					<a class="dropdown-item" href="<?php echo home_url( '/gloves/' ); ?>">Gloves</a>
					<a class="dropdown-item" href="<?php echo home_url( '/packaging/' ); ?>">Packaging</a>
				</div>
			</div>
			<a href="<?php echo home_url( '/about/' ); ?>">About Us</a>
			<a href="<?php echo home_url( '/contact/' ); ?>">Contact Us</a>
		</nav>
		<i class="ion ion-navicon drop-down"></i>
	</div>
</header>
