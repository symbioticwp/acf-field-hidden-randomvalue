<?php
/*
Plugin Name: Advanced custom fields hidden random value
Plugin URI: http://www.github.com/symbioticwp
Description: Display a hidden field with a random generated value
Version: 1.0.0
Author: Kevin Kernegger
Author URI: http://www.regenrek.at
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
namespace Symbiotic\Acf\Field\RandomValue;

class Loader {

	public function __construct() {
		$this->settings = [
			'version' => '1.0.0',
			'url'     => plugin_dir_url( __FILE__ ),
			'path'    => plugin_dir_path( __FILE__ ),
		];
		load_plugin_textdomain( 'acf-randomvalue', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
		add_action( 'acf/include_field_types', [ $this, 'fields' ] );
		add_action( 'acf/register_fields', [ $this, 'fields' ] );
	}

	public function fields( $version = 5 ) {
		require( 'src/AcfFieldRandomValue.php' );
		new AcfFieldRandomValue();

		// Check if Wordplate is available in your theme and register
		// the helper function
		if ( function_exists( 'acf_text' ) ) {
			include_once 'src/wordplate_field.php';
		}
	}
}

new Loader();



?>