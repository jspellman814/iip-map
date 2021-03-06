<?php

wp_nonce_field( 'map_project_info', 'map_project_info_nonce' );

$map_id = $post->ID;
$screendoor_project = get_post_meta( $post->ID, '_iip_map_screendoor_project', true);
$screendoor_venue = get_post_meta( $post->ID, '_iip_map_screendoor_venue', true);
$screendoor_address = get_post_meta( $post->ID, '_iip_map_screendoor_address', true);
$screendoor_city = get_post_meta( $post->ID, '_iip_map_screendoor_city', true);
$screendoor_region = get_post_meta( $post->ID, '_iip_map_screendoor_region', true);
$screendoor_country = get_post_meta( $post->ID, '_iip_map_screendoor_country', true);
$screendoor_hostname = get_post_meta( $post->ID, '_iip_map_screendoor_hostname', true);
$screendoor_event = get_post_meta( $post->ID, '_iip_map_screendoor_event', true);
$screendoor_desc = get_post_meta( $post->ID, '_iip_map_screendoor_desc', true);
$screendoor_date = get_post_meta( $post->ID, '_iip_map_screendoor_date', true);
$screendoor_time = get_post_meta( $post->ID, '_iip_map_screendoor_time', true);
$screendoor_duration = get_post_meta( $post->ID, '_iip_map_screendoor_duration', true);
$screendoor_topic = get_post_meta( $post->ID, '_iip_map_screendoor_topic', true);
$screendoor_contact = get_post_meta( $post->ID, '_iip_map_screendoor_contact', true);

?>
<div class="map-project-info-box" id="map-project-info-box">

  <div class="map-screendoor-project-container">
    <div class="map-project-input-div">
      <label class="map-admin-label" for="_iip_map_screendoor_project"><?php _e( 'Screendoor Project ID:', 'iip-map' )?></label>
      <input
      id="iip-map-screendoor-project"
        type="text"
        name="_iip_map_screendoor_project"
        class="map-admin-project-info-input"
        value="<?php if ( isset ( $screendoor_project ) ) echo $screendoor_project; ?>"
      />
    </div>
    <div class="map-project-btn-div">
      <button class="button button-primary button-large" type="button" id="iip-map-get-fields"><?php _e( 'Get Project Field ID\'s', 'iip-map' )?></button>
    </div>
  </div>

  <div class="map-screendoor-fields-container">
    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_venue"><?php _e( 'Screendoor Venue Name Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-venue" name="_iip_map_screendoor_venue" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_venue ) ) echo '<option value="' . $screendoor_venue . '">' . $screendoor_venue . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_address"><?php _e( 'Screendoor Venue Address Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-address" name="_iip_map_screendoor_address" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_address ) ) echo '<option value="' . $screendoor_address . '">' . $screendoor_address . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_city"><?php _e( 'Screendoor Venue City Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-city" name="_iip_map_screendoor_city" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_city ) ) echo '<option value="' . $screendoor_city . '">' . $screendoor_city . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_region"><?php _e( 'Screedoor Venue Region Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-region" name="_iip_map_screendoor_region" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_region ) ) echo '<option value="' . $screendoor_region . '">' . $screendoor_region . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_country"><?php _e( 'Screendoor Country Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-country" name="_iip_map_screendoor_country" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_country ) ) echo '<option value="' . $screendoor_country . '">' . $screendoor_country . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_hostname"><?php _e( 'Screendoor Host Name Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-hostname" name="_iip_map_screendoor_hostname" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_hostname ) ) echo '<option value="' . $screendoor_hostname . '">' . $screendoor_hostname . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_event"><?php _e( 'Screendoor Event Name Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-event" name="_iip_map_screendoor_event" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_event ) ) echo '<option value="' . $screendoor_event . '">' . $screendoor_event . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_desc"><?php _e( 'Screendoor Event Description Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-desc" name="_iip_map_screendoor_desc" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_desc ) ) echo '<option value="' . $screendoor_desc . '">' . $screendoor_desc . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_date"><?php _e( 'Screendoor Event Date Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-date" name="_iip_map_screendoor_date" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_date ) ) echo '<option value="' . $screendoor_date . '">' . $screendoor_date . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_time"><?php _e( 'Screendoor Event Time Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-time" name="_iip_map_screendoor_time" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_time ) ) echo '<option value="' . $screendoor_time . '">' . $screendoor_time . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_duration"><?php _e( 'Screendoor Event Duration Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-duration" name="_iip_map_screendoor_duration" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_duration ) ) echo '<option value="' . $screendoor_duration . '">' . $screendoor_duration . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_topic"><?php _e( 'Screendoor Event Topic Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-topic" name="_iip_map_screendoor_topic" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_topic ) ) echo '<option value="' . $screendoor_topic . '">' . $screendoor_topic . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields">
      <div class="map-input-div">
        <label class="map-admin-label" for="_iip_map_screendoor_contact"><?php _e( 'Screendoor Event Contact Field ID:', 'iip-map' )?></label>
        <select id="iip-map-screendoor-contact" name="_iip_map_screendoor_contact" class="map-admin-project-info-select">
          <?php if ( isset ( $screendoor_contact ) ) echo '<option value="' . $screendoor_contact . '">' . $screendoor_contact . '</option>'; ?>
        </select>
      </div>
    </div>

    <div class="map-screendoor-fields"><!-- Placeholder to fill unused flex space --></div>
    <div class="map-screendoor-fields"><!-- Placeholder to fill unused flex space --></div>


  </div> <!-- End map-screendoor-fields-container -->
</div>
