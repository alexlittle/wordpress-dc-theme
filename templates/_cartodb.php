<?php
/*
Template Name: CartoDB
*/
get_header(); ?>


 <link rel="stylesheet" href="http://libs.cartocdn.com/cartodb.js/v3/3.15/themes/css/cartodb.css" />
 <script src="http://libs.cartocdn.com/cartodb.js/v3/3.15/cartodb.js"></script>
  <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://libs.cartocdn.com/cartodb.js/v2/themes/css/cartodb.ie.css" />
  <![endif]-->
  <style>
    #cartodb-oppia-map { width: 100%; height:500px; background: #fff;}
  </style>

  <script>
    var map;
    jQuery(document).ready(function($){
      // initiate leaflet map
      map = new L.Map('cartodb-oppia-map', { 
        center: [0,35],
        zoom: 3
      });
      var layerUrl = 'https://digital-campus.cartodb.com/api/v2/viz/ff384a60-12b9-11e6-8bfd-0ecfd53eb7d3/viz.json';
      
      L.tileLayer('http://a.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    	  attribution: 'Map tiles by CartoDB, under CC BY 3.0. Data by OpenStreetMap, under ODbL.'
    	}).addTo(map);
      
      cartodb.createLayer(map, layerUrl)
      .addTo(map)
      .on('error', function() {
    	  console.log("Error occurred");
      });
    });
  </script>




<div id="primary" class="span8">
	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top();
		
		the_post();
		get_template_part( '/partials/content', 'page' );
		comments_template();

		tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
