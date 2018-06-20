<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
if( ! shortcode_exists( 'alert' ) ) {
	
	function pb_shortcodes_alert($atts, $content = null) {
		$args = shortcode_atts( array(
			'style' => 'note'
		), $atts, 'alert' );

		$style = in_array($args['style'], array('note', 'info', 'error', 'success')) ? esc_attr($args['style']) : 'note';

		return '<div class="alert alert-'. $style .' clearfix">'. do_shortcode( $content ) .'</div>';
	}

	add_shortcode( 'alert', 'pb_shortcodes_alert' );
}
