<?php

namespace PackItRightNow\Admin;

class AnalyticsSupport {

	function register() {
		add_action( 'wp_footer', array( $this, 'enqueue_footer' ) );
	}

	function enqueue_footer() { ?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111960092-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-111960092-1');
		</script><?php
	}

}
