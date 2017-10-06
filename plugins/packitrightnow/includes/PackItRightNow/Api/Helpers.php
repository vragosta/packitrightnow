<?php

namespace PackItRightNow;

function get_featured_image( $post_id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' )[0];
}
