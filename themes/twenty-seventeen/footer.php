<?php
/**
 * Template for displaying the footer.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 * @uses get_partial()
 */

namespace PackItRightNow;

?>

	<?php get_partial( 'template-parts/content-mobile-menu' ); ?>

	<footer class="footer">
		<nav class="menu">
			<a href="<?php echo home_url( '/about/' ); ?>">About Us</a>
			<a href="<?php echo home_url( '/contact/' ); ?>">Contact Us</a>
		</nav>
		<p>&copy; <?php echo date( 'Y' ); ?> Pack It Right LLC. All Rights Reserved. Responsive Website by <a href="http://vincentragosta.com">Vincent Ragosta</a></p>
	</footer>
	</body>
</html>
<?php wp_footer(); ?>
