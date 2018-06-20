<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
if( ! shortcode_exists( 'toggle' ) ) {
	function pb_shortcodes_toggle( $atts, $content = null ) {
		
		// Enqueue script.
		wp_enqueue_script( 'pb-shortcodes-toggle' );

		// output.
		$args = shortcode_atts( array(
			  'title' => esc_html__( 'Your toggle title', 'pb-shortcodes' )
			, 'state' => 'open'
		), $atts, 'toggle' );

		$output = '';
		$output .= '<div class="toggle" data-state="'. esc_attr( $args['state'] ) .'">';
			$output .= '<span class="toggle-title">'. esc_attr( $args['title'] ) .'</span>';
			$output .= '<div class="toggle-content">'. do_shortcode( $content ) .'</div>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode( 'toggle', 'pb_shortcodes_toggle' );
}