<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
    <link href="<?php bloginfo('stylesheet_directory') ?>/css/modern.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_directory') ?>/css/modern-responsive.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_directory') ?>/style.css" rel="stylesheet" type="text/css">

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<?php //wp_head(); ?>

	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/assets/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/assets/jquery.mousewheel.min.js"></script>

    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/dropdown.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/accordion.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/buttonset.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/carousel.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/input-control.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/pagecontrol.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/rating.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/slider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/tile-slider.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/tile-drag.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/calendar.js"></script>

</head>
<body class="metrouicss">
<?php 
//*code for social buttons*//
if(get_option("metroui_theme_show_social")) : ?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<?php endif; ?>

<!-- menu -->

<?php if(get_option("metroui_theme_show_navbar")) : ?>
  <div class="nav-bar">
        <div class="nav-bar-inner">
			<span class="element">&nbsp;</span>
            <span class="element"><?php bloginfo('name'); ?></span>
 
            <span class="divider"></span>
<?php
$args = array(
	'theme_location'  => 'top-menu',
	'container'       => false,
	'echo'            => true,
	'fallback_cb'     => 'nav_pages_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'depth'           => 0,
);
wp_nav_menu( $args ) ?>
        </div>
    </div>

<?php endif; ?>
    <div class="page <?php if(get_option('metroui_theme_show_sidebar')) echo'with-sidebar'; ?>">

        <div class="page-header" id="header">
<?php if(get_option("metroui_theme_show_search")) : ?>
		  <div id="search-form">
			<?php get_search_form( true ); ?>
		  </div>
<?php endif; ?>
		  <div class="page-header-inner" style="width:70%">
            <h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?> </a> <?php if ( is_single() ) { ?><a href=""> &raquo; Blog Archive</a> <?php } ?> </a><?php wp_title(); ?></h1>
			<h5><?php bloginfo('description'); ?></h5>
          </div>
        </div>
