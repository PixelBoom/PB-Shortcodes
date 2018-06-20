<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
if( ! shortcode_exists( 'button' ) ) {
	function pb_shortcodes_button($atts, $content = null) {
		$args = shortcode_atts( array(
			  'url'    => '#'
			, 'color'  => 'black'
			, 'size'   => 'small'
			, 'type'   => 'round'
			, 'target' => '_self'
		), $atts, 'button' );

		return '<a href="'. esc_url( $args['url'] ) .'" class="btn btn-'. esc_attr( $args['color'] ) .' btn-'. esc_attr( $args['size'] ) .' btn-'. esc_attr( $args['type'] ) .'" target="'. esc_attr( $args['target'] ) .'">'. do_shortcode( $content ) .'</a>';
	}
	add_shortcode( 'button', 'pb_shortcodes_button' );
}
