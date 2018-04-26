<?php

class IIP_Map {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      IIP_Map_Loader    $loader    Maintains and registers all hooks for the plugin.
   */

  protected $loader;

  /**
   * The unique identifier  and version of this plugin.
   *
   * @since    1.0.0
   * @access   protected
   */

  protected $plugin_name;
  protected $version;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies, define the locale, and set the hooks for the admin area and
   * the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function __construct() {
    $this->plugin_name = 'iip-map';
    $this->version = '1.0.0';

    $this->load_dependencies();
    $this->define_admin_hooks();
    $this->define_public_hooks();
  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - IIP_Map_Loader. Orchestrates the hooks of the plugin.
   * - IIP_Map_Admin. Defines all hooks for the admin area.
   * - IIP_Map_Embed. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */

  private function load_dependencies() {

    // The class responsible for orchestrating the actions and filters of the core plugin.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-iip-map-loader.php';

    // The class responsible for defining all actions that occur in the admin area.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-iip-map-admin.php';

    // The class responsible for defining all actions that occur in the public-facing side of the site.
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/embed-map.php';

    $this->loader = new IIP_Map_Loader();

  }

  // Register all of the hooks related to the admin area functionality of the plugin.
  private function define_admin_hooks() {
    $plugin_admin = new IIP_Map_Admin( $this->get_plugin_name(), $this->get_version() );

    $this->loader->add_action( 'admin_init', $plugin_admin, 'added_settings_sections' );
    $this->loader->add_action( 'admin_init', $plugin_admin, 'added_settings_fields' );
    $this->loader->add_action( 'admin_menu', $plugin_admin, 'added_admin_menu' );
    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
  }

  // Register all of the hooks related to the public-facing functionality
  private function define_public_hooks() {
    $plugin_public = new IIP_Map_Embed( $this->get_plugin_name(), $this->get_version() );

    $this->loader->add_action( 'init', $plugin_public, 'iip_map_added_shortcodes' );
  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    1.0.0
   */

  public function run() {
    $this->loader->run();
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @since     1.0.0
   * @return    IIP_Map_Loader    Orchestrates the hooks of the plugin.
   */

  public function get_loader() {
    return $this->loader;
  }

  // Retrieve the name & version number of the plugin.
  public function get_plugin_name() {
    return $this->plugin_name;
  }

  public function get_version() {
    return $this->version;
  }
}