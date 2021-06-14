<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.crispybacon.it
 * @since             1.0.0
 * @package           Mokilla_Core
 *
 * @wordpress-plugin
 * Plugin Name:       Mokilla Core
 * Plugin URI:        www.crispybacon.it
 * Description:       
 * Version:           1.0.0
 * Author:            Serxhio Vrapi
 * Author URI:        www.crispybacon.it/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mokilla-core
 * Domain Path:       /languages
 */

namespace mokilla\mokilla_core;

use mokilla\mokilla_core_includes\Mokilla_Core;
use mokilla\mokilla_core_includes\Activator;
use mokilla\mokilla_core_includes\Deactivator;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

const PLUGIN_NAME = 'mokilla_core';

/**
 * Include classes with Composer.
 */
require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MOKILLA_CORE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function activate_mokilla_core() {
	Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_mokilla_core() {
	Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'mokilla\mokilla_core\activate_mokilla_core' );
register_deactivation_hook( __FILE__, 'mokilla\mokilla_core\deactivate_mokilla_core' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mokilla_core() {

	$plugin = new Mokilla_Core();
	$plugin->run();

}
run_mokilla_core();
