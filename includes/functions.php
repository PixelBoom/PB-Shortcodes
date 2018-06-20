<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
/**
 * Adds shortcodes to widget text.
 *
 * @since 1.0
 */
add_filter( 'widget_text', 'do_shortcode' );


/**
 * Remove paragraph tag before & after shortcodes.
 *
 * @since 1.0
 */
function pb_shortcodes_remove_paragraph( $content ) {
	if( $content ) {
		$content = strtr( $content, array(
				  '<p>['    => '['
				, ']</p>'   => ']'
				, ']<br />' => ']'
			)
		);
	}

	return $content;
}
add_filter( 'the_content', 'pb_shortcodes_remove_paragraph' );