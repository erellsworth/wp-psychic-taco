<?php
/**
 * @package WP_PsychicTaco
 * @version 1
 */
/*
Plugin Name: Psychic Taco
Description: Display a random taco recipe
Author: E.R. Ellsworth
Plugin URI: https://erellsworth.com/wordpress
Version: 1
Author URI: https://erellsworth.com
*/

if(!class_exists('WP_PsychicTaco')){
	class WP_PsychicTaco{
		private static $api_url = 'http://taco-randomizer.herokuapp.com/random/?full-taco=true';

	    function __construct() {

	    }	

		public static function get_taco(){
			$response = wp_remote_get(self::$api_url);
			$taco = json_decode($response['body']);
			return $taco;
		}   

		public static function display_taco(){
			$taco = self::get_taco();
			?>
				<h2>Random Taco:</h2>
				<h3><a href="<?php echo $taco->url; ?>" target="_blank"><?php echo $taco->name; ?></a></h3>
			<?php
		} 
	}

}