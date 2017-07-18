<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_ABL_Plugin
 * @subpackage WP_ABL_Plugin/public
 * @author     Your Name <email@example.com>
 */
class WP_ABL_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $WP_ABL_Plugin    The ID of this plugin.
	 */
	private $WP_ABL_Plugin;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $WP_ABL_Plugin       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $WP_ABL_Plugin, $version ) {

		$this->WP_ABL_Plugin = $WP_ABL_Plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'css/wp-abl-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->WP_ABL_Plugin, plugin_dir_url( __FILE__ ) . 'js/wp-abl-plugin-public.js', array( 'jquery' ), $this->version, false );

	}
    
    public function abl_button_shortcode(){
        function abl_button($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $atts = shortcode_atts( array('label' => 'Book Now', 'merchant' => '', 'activity' => '', 'event' => '', 'style' => ''), $atts, 'abl-button' );
            $merchant = '';
            $event = '';
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
                $merchant = 'data-merchant="'.$atts['merchant'].'"';
            }else{
                $merchant = 'data-merchant="'.$atts['merchant'].'"';
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = 'data-event="'.$atts['event'].'"';
            }
            return '<a class="activity-button '.$atts['style'].'" style="cursor:pointer !important" '.$merchant.' data-activity="'.$atts['activity'].'" '.$event.'>'.$atts['label'].'</a>';
        }
        add_shortcode("abl-button", "abl_button");
    }
    
    public function abl_redirect_shortcode(){
        function abl_redirect($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $atts = shortcode_atts( array('label' => 'See this activity', 'merchant' => '', 'activity' => '', 'event' => '', 'style' => ''), $atts, 'abl-redirect' );
            $merchant = '';
            $activity = '';
            $event = '';
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['activity'] ) && $atts['activity'] != ''){
                $activity = '/activity/'.$atts['activity'];
            }
            if(isset( $atts['event'] ) && $atts['event'] != ''){
                $event = '/event/'.$atts['event'];
            }
            return '<a class="'.$atts['style'].'" target="_blank" href="https://booking.adventurebucketlist.com/#/merchant/'.$atts['merchant'].$activity.$event.'">'.$atts['label'].'</a>';
        }
        add_shortcode("abl-redirect", "abl_redirect");
    }
    
    public function abl_widget_shortcode(){
        function abl_widget($atts){
            $options = get_option( 'wp_abl_plugin_settings' );
            $width = '';
            $height = '';
            $atts = shortcode_atts( array('merchant' => '', 'width' => '1001', 'height' => '503'), $atts, 'abl-widget' );
            if( isset($options['wp_abl_plugin_settings_public_key']) ){
                $atts['merchant'] = $options['wp_abl_plugin_settings_public_key'];
            }
            if(isset( $atts['width'] ) && $atts['width'] != ''){
                $width = $atts['width'];
            }
            if(isset( $atts['height'] ) && $atts['height'] != ''){
                $height = $atts['height'];
            }
            return '<iframe frameborder="0" scrolling="no" width="' . $width . '" height="' . $height . '"
  src="https://widget.adventurebucketlist.com/iframe.html?merchant='.$atts['merchant'].'"></iframe>';
        }
        add_shortcode("abl-widget", "abl_widget");
    }

}
