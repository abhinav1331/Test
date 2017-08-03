<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png" type="image/x-icon">
	<!-- Google Fonts used -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,800,300' rel='stylesheet' type='text/css'>
	<!-- font-family: 'Open Sans', sans-serif; -->

	<!-- Bootstrap -->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.css" rel="stylesheet">
	<!-- Custom -->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/process.css" type="text/css" media="screen" />
	<!-- Animate.css -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery.mCustomScrollbar.css" type="text/css" media="screen" />
	    
	  
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div style="overflow:hidden">
<header class="header wow fadeIn">
  <div class="top-head">
      <div class="container">
      <div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="Logo"></a></div>
      <div class="head-contact">
          <a class="mail-h" href="mailto:<?php the_field('email_address',90); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php the_field('email_address',90); ?></a>
          <div class="call-today">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              <h3>CAll Us Today</h3>
              <a href="tel:<?php the_field('phone_number',90); ?>"><?php the_field('phone_number',90); ?></a>
          </div>
      </div>
        <div class="centr"><h2>Perth's Home Theatre & Automation Specialists</h2></div>  
      </div>
  </div>
<div class="main-menu">
    <div class="container">
    <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false">
	       <span class="sr-only">Toggle navigation</span>
	       <span class="icon-bar top-bar"></span>
	       <span class="icon-bar middle-bar"></span>
	       <span class="icon-bar bottom-bar"></span>
	   </button>
    </div>
    <nav class="topnav">
      <div class="collapse navbar-collapse" id="topnav">
        <ul>
          <?php
			$defaults = array(
				'theme_location'  => '',
				'menu'            => 'header_menu',
				'container'       => 'header_menu',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '8',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '%3$s',
				'depth'           => 0,
				'walker'          => ''
			);

			wp_nav_menu( $defaults );

			?>              
        </ul>
      </div>
    </nav>
</div>    
    
  </div>
</header>