<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php bloginfo('name'); ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">


  <meta name="description" content="<?php bloginfo('description'); ?>">

  <meta name="author" content="<?php bloginfo('author'); ?>">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@0;1&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/4e5f136f21.js" crossorigin="anonymous"></script>
<!-- A FAIRE: trouver comment inclure le script JS -->
<script src="./assets/js/main.js" type="text/javascript"></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="site-branding">
      <?php if(has_custom_logo()) :
         the_custom_logo();
       else: ?>
        <a href="<?php bloginfo('url'); ?>">
          <?php bloginfo('name'); ?>
        </a>
      <?php endif; ?>
    </div>

    <nav class="navigation navigation-top desktop-navigation">
      <?php
        wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'container' => false // évite que WP engloabe le <ul> d'une balise <div>
          )
        );
       ?>
    </nav>

    <nav class="navigation navigation-top mobile-navigation">
      <ul>
        <li class="mobile-menu"><i class="fa fa-bars fa-1x"></i>
          <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'primary',
              'menu_class'      => 'sub-navigation', // liste des classes CSS que WP doit ajouter à la balise <ul> créée
              'container'       => false // évite que WP engloabe le <ul> d'une balise <div>
            )
          );
           ?>
        </li>
      </ul>
    </nav>

    <nav class="navigation navigation-aside">
      <ul>
        <li class="search-toggle">
          <a href="#"><i class="fas fa-search"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="count cart-counter">0</span>
          </a>
        </li>
      </ul>
    </nav>
    <section class="search-popup">
      <form class="search-form" action="index.html" method="post">
        <input type="text" name="search" value="" placeholder="Tapez quelque chose...">
        <input type="submit" name="submit" value="Rechercher">
      </form>
    </section>
  </header>
  
