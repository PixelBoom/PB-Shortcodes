<?php
/*
Plugin Name: PB Shortcodes
Description: Enables shortcodes to be used in PixelBoom WordPress Themes.
Plugin URI: http://www.pixelboom.net
Author: PixelBoom
Author URI: http://www.pixelboom.net
Version: 1.0
License: GPL2
Text Domain: pb-shortcodes
Domain Path: /languages/
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


// The PB_Shortcodes class.
if( !class_exists( 'PB_Shortcodes' ) ) {
	class PB_Shortcodes {
		/**
		 * Constructor.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct() {
			// Define constants.
			if( !defined('PB_SHORTCODES_PATH') ) {
				define( 'PB_SHORTCODES_PATH', plugin_dir_path( __FILE__ ) );
			}

			if( !defined('PB_SHORTCODES_URL') ) {
				define( 'PB_SHORTCODES_URL', plugin_dir_url( __FILE__ ) );
			}

			// Translation.
			load_plugin_textdomain( 'pb-shortcodes', false, PB_SHORTCODES_PATH . 'languages' );

			// Load the plugin functions files.
			$this->includes();

			// Add filters for the TinyMCE buttton.
			add_action( 'admin_init', array( $this, 'add_mce_button' ) );

			// Loads the admin styles and scripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

			// Loads the frontend styles and scripts.
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts') );

		}


		/**
		 * Load the plugin functions files.
		 *
		 * @since 1.0
		 * @access private
		 */
		private function includes() {
			require_once( PB_SHORTCODES_PATH . 'includes/functions.php' );

			// Loads the shortcodes
			require_once( PB_SHORTCODES_PATH . 'includes/alert.php' );
			require_once( PB_SHORTCODES_PATH . 'includes/button.php' );
			require_once( PB_SHORTCODES_PATH . 'includes/columns.php' );
			require_once( PB_SHORTCODES_PATH . 'includes/highlight.php' );
			require_once( PB_SHORTCODES_PATH . 'includes/tabs.php' );
			require_once( PB_SHORTCODES_PATH . 'includes/toggle.php' );
		}


		/**
		 * Add filters for the TinyMCE buttton.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function add_mce_button() {
			// Check user permissions
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}

			// Check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', array( $this, 'add_tinymce_plugin' ) );
				add_filter( 'mce_buttons', array( $this, 'register_mce_button' ) );
			}
		}


		/**
		 * Loads the TinyMCE button js file.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function add_tinymce_plugin($args) {
			$args['pb_shortcodes_tinymce'] = PB_SHORTCODES_URL . 'assets/js/editor.js';
			return $args;
		}


		/**
		 * Adds the TinyMCE button to the post editor buttons.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function register_mce_button($args) {
			array_push($args, 'pb_shortcodes_tinymce');
			return $args;
		}


		/**
		 * Loads the admin styles and scripts.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function admin_scripts() {}


		/**
		 * Loads the frontend styles and scripts.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function frontend_scripts() {
			// styles.
			wp_enqueue_style( 'pb-shortcodes-style', PB_SHORTCODES_URL . 'assets/css/style.css', array(), '1.0' );

			// scripts.
			wp_register_script( 'pb-shortcodes-tab', PB_SHORTCODES_URL . 'assets/js/tabs.js', array('jquery', 'jquery-ui-tabs'), '1.0', true );
			wp_register_script( 'pb-shortcodes-toggle', PB_SHORTCODES_URL . 'assets/js/toggle.js', array('jquery', 'jquery-ui-accordion'), '1.0', true );
		}

	}

	new PB_Shortcodes();
}
