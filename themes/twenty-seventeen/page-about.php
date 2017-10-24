<?php
/**
 * Template for displaying the about page.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */

namespace PackItRightNow;

get_header();

?>

<div class="content row">
	<div class="container">
		<?php echo $post->post_content; ?>
	</div>
</div>

<?php get_footer(); ?>
