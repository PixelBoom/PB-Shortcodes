<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
// Row.
if( ! shortcode_exists( 'row' ) ) {
	function pb_shortcodes_row($atts, $content = null) {
		return '<div class="row clearfix">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'row', 'pb_shortcodes_row' );
}


// Columns.
if( ! shortcode_exists( 'column' ) ) {
	function pb_shortcodes_column($atts, $content) {
		$args = shortcode_atts( array(
			  'size'     => '1/2'
			, 'position' => ''
			, 'class'    => ''
		), $atts, 'column' );
		$classes = array();
		$classes[] = 'column';

		// Size.
		$size = in_array( $args['size'], array('1/2', '2/4', '1/3', '2/3', '1/4', '3/4') ) ? $args['size'] : '1/2';
		if( '1/3' == $size ) {
			$classes[] = 'column-one-third';
		}
		elseif( '2/3' == $size ) {
			$classes[] = 'column-two-third';
		}
		elseif( '1/4' == $size ) {
			$classes[] = 'column-one-fourth';
		}
		elseif( '3/4' == $size ) {
			$classes[] = 'column-three-fourth';
		}
		else {
			$classes[] = 'column-one-half';
		}

		// Position.
		if( 'last' == esc_attr( $args['position'] ) ) {
			$classes[] = 'column-last';
		}

		$class = implode(' ', $classes);
		return '<div class="'. $class .'">'. do_shortcode( $content ) .'</div>';

	}
	add_shortcode( 'column', 'pb_shortcodes_column' );
}