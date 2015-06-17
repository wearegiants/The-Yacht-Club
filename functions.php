<?php

require_once locate_template('/lib/general.php');
require_once locate_template('/lib/slug.php' );
require_once locate_template('/lib/cleanassnav.php' );
include_once locate_template('/lib/soil-master/soil.php' );
include_once locate_template('/lib/roots-rewrites-master/roots-rewrites.php' );
include_once locate_template('/lib/opengraph/opengraph.php' );

add_theme_support('soil-relative-urls');
add_theme_support('soil-nice-search');
add_theme_support('soil-clean-up');
