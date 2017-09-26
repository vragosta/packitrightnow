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
		<!-- <div class="close-container"> -->
			<!-- <button type="button" class="close-menu"> -->
		<i class="fa fa-times fa-2x"></i>
			<!-- </button> -->
		<!-- </div> -->
		<?php get_partial( 'template-parts/content-menu' ); ?>
	</div>
</section>
