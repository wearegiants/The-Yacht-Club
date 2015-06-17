<?php 

$erycsettings = array(

  'available_scripts' => array(
  'jquery'            => array('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js','1.11.1'),
  'scripts'           => array('/assets/javascripts/scripts.min.js'),
  ),

  'default_scripts'   => array(
  'scripts'),

  'available_stylesheets' => array(
  'default'           => array ( '/assets/css/main.min.css'),
  ),

  'default_stylesheets' => array(
  'default'
  ),

  'deregister_scripts' => array('jquery','l10n')
  
);

Themewrangler::set_defaults( $erycsettings );


require locate_template('/lib/activation.php');         
require locate_template('/lib/slug.php' );
include locate_template('/lib/soil-master/soil.php' );
include locate_template('/lib/custom-post-types.php' );
include locate_template('/lib/enque-js.php' );
include locate_template('/lib/woo-disablebilling.php' );
include locate_template('/lib/json-api/json-api.php' );

include locate_template('/lib/roots-rewrites-master/roots-rewrites.php' );
include locate_template('/lib/opengraph/opengraph.php' );

add_theme_support('soil-relative-urls');
add_theme_support('soil-nice-search');
add_theme_support('soil-clean-up');