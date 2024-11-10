<?php

/**
 * Plugin Infrastructure
 * 
 * @package Plugin Infrastructure
 * @author Mayank Majeji
 * @license gplv2
 * @version 1.0.0
 * 
 * @wordpress-plugin
 * Plugin Name:     Plugin Infrastructure
 * Plugin URI:      https://wordpress.org/plugins/plugin-infrastructure/
 * Description:     Allows you to remove unused resources and improve speed and performance of your WordPress website
 * Version:         1.0.0
 * Author:          Mayank Majeji
 * Author URI:      https://mayankmajeji.com/
 * Text Domain:     plugin-infrastructure
 * Domain Path:     languages
 * License:         GPLv2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Plugin Infrastructure. If not, see <http://www.gnu.org/licenses/>.
 * 
 * Plugin Infrastructure is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Plugin Infrastructure is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function TEST() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name.
define('PLUGIN_INFRASTRUCTURE_NAME', 'Plugin Infrastructure');

// Plugin version.
define('PLUGIN_INFRASTRUCTURE_VERSION', '1.0.0');

// Plugin Root File.
define('PLUGIN_INFRASTRUCTURE_FILE', __FILE__);

// Plugin base.
define('PLUGIN_INFRASTRUCTURE_BASE', plugin_basename(PLUGIN_INFRASTRUCTURE_FILE));

// Plugin Folder Path.
define('PLUGIN_INFRASTRUCTURE_DIR', plugin_dir_path(PLUGIN_INFRASTRUCTURE_FILE));

// Plugin Folder URL.
define('PLUGIN_INFRASTRUCTURE_URL', plugin_dir_url(PLUGIN_INFRASTRUCTURE_FILE));

/**
 * Load the main class for the core functionality
 */
require_once PLUGIN_INFRASTRUCTURE_DIR . 'core/class-plugin-infrastructure.php';

/**
 * The main function to load the only instance
 * of our master class.
 */
function PLUGIN_INFRASTRUCTURE()
{
    return Plugin_Infrastructure::instance();
}

PLUGIN_INFRASTRUCTURE();
