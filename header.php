<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ) ?>">
<link rel="shortcut icon" href="/assets/img/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body class="shifter">

<div id="wrapper" class="shifter-page">
  <span class="shifter-handle">Menu</span>
  <?php get_template_part('templates/home','slider' );?>

  <section id="main" role="main" <?php body_class();?>>
    <div <?php post_class('container'); ?>>

      <div id="logo-wrapper" class="sixteen columns">
        <div class="four columns alpha">
          <h1 id="logo"><a href="/"><img class="img-responsive" src="/assets/img/linklogo.png" alt="LINK" /></a></h1>
        </div>
        <div id="goodthings" class="twelve columns omega">        
          <div id="goodatthings" class="words four columns alpha"><div>We're good at like, 3 things:</div></div>
          <div id="whatweregoodat" class="words eight columns omega"><div>fancy sausage, california booze and good times</div></div>
        </div>
      </div>

      <div id="nav-column" class="four columns">
        <nav id="main-nav">
          <?php wp_nav_menu( array( 'menu_class' => 'menu', 'theme_location'  => 'main-menu', 'walker' => new clean_nav())); ?>
        </nav>
        <?php dynamic_sidebar( 'primary-widget-area' ); ?>
      </div><!-- Nav Column -->
      <div id="content" class="twelve columns">
        <div class="wrapper">