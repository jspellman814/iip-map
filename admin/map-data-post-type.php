<?php
class IIP_Map_Post_Type {

  // Post type name.
  public $name = 'iip_map_data';

  public function create_map_post_type(){
    $labels = array(
      'name'               => _x( 'IIP Map Data', 'post type general name', 'iip-map' ),
      'singular_name'      => _x( 'Map Data', 'post type singular name', 'iip-map' ),
      'menu_name'          => _x( 'Map Embed', 'admin menu', 'iip-map' ),
      'name_admin_bar'     => _x( 'Map Data', 'add new on admin bar', 'iip-map' ),
      'add_new_item'       => __( 'Add New Map', 'iip-map' ),
      'new_item'           => __( 'New Map', 'iip-map' ),
      'edit_item'          => __( 'Edit Map', 'iip-map' ),
      'view_item'          => __( 'View Map', 'iip-map' ),
      'all_items'          => __( 'All Maps', 'iip-map' ),
      'search_items'       => __( 'Search Maps', 'iip-map' ),
      'not_found'          => __( 'No Maps found.', 'iip-map' ),
      'not_found_in_trash' => __( 'No Maps found in Trash.', 'iip-map' )
    );

    $args   = array(
      'labels'               => $labels,
      'description'          => __( 'Configure Map', 'iip-map' ),
      'public'               => false,
      'publicly_queryable'   => false,
      'show_ui'              => true,
      'show_in_menu'         => true,
      'show_in_nav_menus'    => true,
      'show_in_admin_bar'    => true,
      'show_in_rest'         => false,
      'exclude_from_search'  => true,
      'query_var'            => false,
      'rewrite'              => array( 'slug' => 'map' ),
      'capability_type'      => 'post',
      'has_archive'          => false,
      'hierarchical'         => false,
      'can_export'           => true,
      'delete_with_user'     => false,
      'menu_position'        => 6,
      'register_meta_box_cb' => array( $this, 'map_add_metaboxes' ),
      'menu_icon'            => 'dashicons-location-alt',
      'supports'             => 'title'
    );

    register_post_type( $this->name, $args );
  }

  // Add custom metaboxes to backend dashboard
  public function map_add_metaboxes() {
    add_meta_box(
      'iip_map_project_info',
      __( 'Screendoor Project Information', 'iip-map' ),
      array( $this, 'project_info_metabox' ),
      $this->name,
      'normal',
      'high'
    );
    add_meta_box(
      'iip_map_geocoder',
      __( 'Geocode Events', 'iip-map' ),
      array( $this, 'geocoder_metabox' ),
      $this->name,
      'normal',
      'low'
    );
    add_meta_box(
      'iip_map_shortcode',
      __( 'Shortcode Generator', 'iip-map' ),
      array( $this, 'shortcode_metabox' ),
      $this->name,
      'side',
      'low'
    );
    add_meta_box(
      'iip_map_update_marker',
      __( 'Update/Delete Marker', 'iip-map' ),
      array( $this, 'update_marker_metabox' ),
      $this->name,
      'side',
      'low'
    );
    add_meta_box(
      'iip_map_export',
      __( 'Export Project Data', 'iip-map' ),
      array( $this, 'data_export_metabox' ),
      $this->name,
      'side',
      'low'
    );
  }

  // Pull in metabox partials
  public function project_info_metabox( $post ) {
    include_once( 'partials/project-info-metabox.php' );
  }

  public function geocoder_metabox( $post ) {
    include_once( 'partials/geocoder-metabox.php' );
  }

  public function shortcode_metabox( $post ) {
    include_once( 'partials/shortcode-metabox.php' );
  }

  public function update_marker_metabox( $post ) {
    include_once( 'partials/update-marker-metabox.php' );
  }

  public function data_export_metabox( $post ) {
    include_once( 'partials/data-export-metabox.php' );
  }

  // Sanitize and store map post metadata values
  public function save_map_meta( $post_id, $post_object ) {
    include_once( 'partials/project-info-save-metadata.php' );
    include_once( 'partials/geocoder-save-metadata.php' );
    include_once( 'partials/shortcode-save-metadata.php' );
  }

}
