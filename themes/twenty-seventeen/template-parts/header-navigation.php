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
		<?php get_partial( 'template-parts/content-menu' ); ?>
		<i class="ion ion-navicon drop-down"></i>
	</div>
	<figure class="banner">
		<div class="source" style="background-image: url( <?php echo PACKITRIGHTNOW_TEMPLATE_URL . '/assets/images/banner.png'; ?> );"></div>
	</figure>
</header>
