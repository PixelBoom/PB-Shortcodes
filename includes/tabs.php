<?php
/**
 * @package PB_Shortcodes
 * @since 1.0
 */
// Tabgroup.
if( ! shortcode_exists( 'tabgroup' ) ) {
	function pb_shortcodes_tabgroup($atts, $content = null) {
		STATIC $i = 0;
		$i++;

		// Enqueue script.
		wp_enqueue_script( 'pb-shortcodes-tab' );

		// Extract the tab titles for use in the tabgroup.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset( $matches[1] ) ) {
			$tab_titles = $matches[1];
		}
		$output = '';

		if( count( $tab_titles ) ) {
			$output .= '<div id="tabgroup-'. $i .'" class="tabgroup clearfix">';
				
				$output .= '<ul class="tab-nav clearfix">';
					foreach( $tab_titles as $tab ) {
						$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
					}
				$output .= '</ul>';

				$output .= do_shortcode( $content );

			$output .= '</div>';
		}
		else {
			$output .= do_shortcode( $content );
		}

		return $output;
	}
	add_shortcode( 'tabgroup', 'pb_shortcodes_tabgroup' );
}


// Tab.
if( ! shortcode_exists( 'tab' ) ) {
	function pb_shortcodes_tab($atts, $content = null) {
		$args = shortcode_atts( array( 'title' => esc_html__( 'Tab', 'pb-shortcodes' ) ), $atts, 'tab' );
		return '<div id="tab-'. sanitize_title( $args['title'] ) .'" class="tab-content clearfix">' . do_shortcode( $content ) . '</div>';
	}
	add_shortcode( 'tab', 'pb_shortcodes_tab' );
}
