import mapboxgl from '../node_modules/mapbox-gl';

// shortcode parameters
const mapId = iip_map_params.map_id; // eslint-disable-line no-undef, camelcase
const apiKey = iip_map_params.mapbox_api_key; // eslint-disable-line no-undef, camelcase
const mapZoom = iip_map_params.map_zoom; // eslint-disable-line no-undef, camelcase
const lat = iip_map_params.map_center_lat; // eslint-disable-line no-undef, camelcase
const lng = iip_map_params.map_center_lng; // eslint-disable-line no-undef, camelcase

// get topic select
const topicSelect = document.getElementById( 'topic-select' );
const fragment = document.createDocumentFragment();

// define Map
mapboxgl.accessToken = apiKey;
const map = new mapboxgl.Map( {
  container: 'map',
  style: 'mapbox://styles/jspellman814/cjwiaf6wi05nk1dlue7undbxu',
  center: [lat, lng],
  zoom: mapZoom
} );

// Configure Map controls
// Disable zoom on scroll
map.scrollZoom.disable();
// Add zoom and rotation controls to the map.
map.addControl( new mapboxgl.NavigationControl( { showCompass: false } ) );

// Pull map data from iip-maps API
const mapDataEndpoint = '/wp-json/iip-map/v1/maps/' + mapId; // eslint-disable-line prefer-template
const mapDataXHR = new XMLHttpRequest();
mapDataXHR.open( 'GET', mapDataEndpoint );
mapDataXHR.responseType = 'json';
mapDataXHR.send();

map.on( 'load', () => {
  function plotMarkers( m ) {
    const layerIDArray = [];
    m.features.forEach( ( marker ) => {
      const eventID = marker.properties.ext_id;
      const title = marker.properties.title; // eslint-disable-line prefer-destructuring
      const layerID = 'poi-' + eventID; // eslint-disable-line prefer-template
      console.log( eventID + title ); // eslint-disable-line prefer-template

      // Add a layer for this symbol type if it hasn't been added already.
      if ( !map.getLayer( layerID ) ) {
        map.addLayer( {
          id: layerID,
          type: 'circle',
          source: 'events',
          paint: {
            'circle-color': '#003B55',
            'circle-radius': 5,
            'circle-stroke-width': 1,
            'circle-stroke-color': '#fff'
          },
          filter: [
            '==', 'ext_id', eventID
          ]
        } );
      }

      layerIDArray.push( layerID );
      const option = document.createElement( 'option' );
      option.innerHTML = layerID;
      option.value = layerID;
      fragment.appendChild( option );

      map.on( 'click', layerID, ( e ) => {
        const coordinates = e.features[0].geometry.coordinates.slice();
        const fields = e.features[0].properties.fields; // eslint-disable-line prefer-destructuring
        console.log( fields );

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while ( Math.abs( e.lngLat.lng - coordinates[0] ) > 180 ) {
          coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        new mapboxgl.Popup( { offset: 25 } )
          .setLngLat( coordinates )
          .setHTML( '<div class="post-content ' + title + '"><h3>' + title + '</h3></div>' ) // eslint-disable-line prefer-template
          .addTo( map );
      } );

      // Change the cursor to a pointer when the mouse is over the places layer.
      map.on( 'mouseenter', layerID, () => {
        map.getCanvas().style.cursor = 'pointer';
      } );

      // Change it back to a pointer when it leaves.
      map.on( 'mouseleave', layerID, () => {
        map.getCanvas().style.cursor = '';
      } );
    } );

    topicSelect.addEventListener( 'change', () => {
      const layerIDArrayLength = layerIDArray.length;
      console.log( layerIDArrayLength );
      for ( let i = 0; i < layerIDArrayLength; i++ ) { // eslint-disable-line no-plusplus
        map.setLayoutProperty( layerIDArray[i], 'visibility', 'visible' );
      }

      const index = layerIDArray.indexOf( topicSelect.value );
      // loop through layerIDArray and checked box value (set as layerID)
      if ( index !== -1 ) {
        layerIDArray.splice( index, 1 );
        const splicedArrayLength = layerIDArray.length;
        for ( let count = 0; count < splicedArrayLength; count++ ) { // eslint-disable-line no-plusplus
          map.setLayoutProperty( layerIDArray[count], 'visibility', 'none' );
        }
      }
      layerIDArray.push( topicSelect.value );
    } );

    topicSelect.appendChild( fragment );
  }

  mapDataXHR.onload = function loadData() {
    const mapDataData = mapDataXHR.response;

    map.addSource( 'events', {
      type: 'geojson',
      data: mapDataData,
      cluster: true,
      clusterMaxZoom: 14,
      clusterRadius: 50
    } );


    plotMarkers( mapDataData );
  };
} );
