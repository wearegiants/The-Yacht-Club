<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="description" content="The Yacht Club is committed to helping create positive
growth for at-risk youth and young adults through the game of dodgeball, workshops and mentorships.">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php wp_head(); ?>

</head>

<?php
  $menuParameters = array(
    'container'       => false,
    'echo'            => false,
    'items_wrap'      => '%3$s',
    'theme_location'  =>'main-menu',
    'walker'          => new MV_Cleaner_Walker_Nav_Menu(),
    'depth'           => 0,
  );
?>

<body <?php body_class('fs-grid'); ?>>
<div id="wrapper">
  <header id="header">
    <div class="fs-row">
      <div class="fs-cell fs-lg-3 fs-md-2 fs-sm-3"><a href="/" id="logo">The Yacht Club</a></div>
      <div class="fs-cell fs-lg-9 fs-md-4 fs-sm-hide">
        <div class="fs-row">
          <div class="fs-cell fs-lg-half fs-md-6">
            <nav class="navigation" data-navigation-handle="#handle">
              <?php echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); ?>
            </nav>
          </div>
          <div class="fs-cell fs-lg-half fs-md-hide">
            <nav class="social-icons text-right">
              <a class="ss-social-circle ss-icon" target="blank" href="http://facebook.com/theyachtclub">Facebook</a>
              <a class="ss-social-circle ss-icon" target="blank" href="http://twitter.com/theeryc">Twitter</a>
              <a class="ss-social-circle ss-icon" target="blank" href="http://instagram.com/theyachtclub">Instagram</a>
            </nav>
          </div>
        </div>
      </div>
  </header>