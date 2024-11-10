<?php

// Exit if accessed directly.
if (! defined('ABSPATH')) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Test_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if (! class_exists('Plugin_Infrastructure')) :

    /**
     * Main Plugin_Infrastructure Class.
     *
     * @package		Plugin_Infrastructure
     * @subpackage	Classes/Plugin_Infrastructure
     * @since		1.0.0
     * @author		Mayank Majeji
     */
    final class Plugin_Infrastructure
    {

        /**
         * The real instance
         *
         * @access	private
         * @since	1.0.0
         * @var		object|Plugin_Infrastructure
         */
        private static $instance;


        /**
         * TEST helpers object.
         *
         * @access	public
         * @since	1.0.0
         * @var		object|Test_Helpers
         */
        public $helpers;

        /**
         * TEST settings object.
         *
         * @access	public
         * @since	1.0.0
         * @var		object|Test_Settings
         */
        public $settings;

        /**
         * Main Plugin_Infrastructure Instance.
         *
         * Insures that only one instance of Test exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @access		public
         * @since		1.0.0
         * @static
         * @return		object|Test	The one true Test
         */
        public static function instance()
        {
            if (! isset(self::$instance) && ! (self::$instance instanceof Plugin_Infrastructure)) {
                self::$instance                    = new Plugin_Infrastructure;
                self::$instance->base_hooks();
                self::$instance->includes();

                // self::$instance->helpers        = new Plugin_Infrastructure_Helpers();
                // self::$instance->settings        = new Plugin_Infrastructure_Settings();

                // //Fire the plugin logic
                // new Plugin_Infrastructure_Run();

                /**
                 * Fire a custom action to allow dependencies
                 * after the successful plugin setup
                 */
                do_action('Plugin_Infrastructure/plugin_loaded');
            }

            return self::$instance;
        }

        /**
         * Include required files.
         *
         * @access  private
         * @since   1.0.0
         * @return  void
         */
        private function includes()
        {

            // add all the class files here 

            // require_once PLUGIN_INFRASTRUCTURE_DIR . 'core/includes/classes/class-plugin-infrastructure-helpers.php';
            // require_once PLUGIN_INFRASTRUCTURE_DIR . 'core/includes/classes/class-plugin-infrastructure-settings.php';

            // require_once PLUGIN_INFRASTRUCTURE_DIR . 'core/includes/classes/class-plugin-infrastructure-run.php';
        }

        /**
         * Add base hooks for the core functionality
         *
         * @access  private
         * @since   1.0.0
         * @return  void
         */
        private function base_hooks()
        {
            add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));
        }

        /**
         * Loads the plugin language files.
         *
         * @access  public
         * @since   1.0.0
         * @return  void
         */
        public function load_textdomain()
        {
            load_plugin_textdomain('plugin-infrastructure', FALSE, dirname(plugin_basename(PLUGIN_INFRASTRUCTURE_FILE)) . '/languages/');
        }
    }
endif;
