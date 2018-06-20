<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
if( ! shortcode_exists( 'highlight' ) ) {
	function pb_shortcodes_highlight( $atts, $content = null ) {
		return '<span class="highlight">'. do_shortcode( $content ) .'</span>';
	}
	add_shortcode( 'highlight', 'pb_shortcodes_highlight' );
}