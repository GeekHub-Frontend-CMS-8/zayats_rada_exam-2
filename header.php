<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akad
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500" rel="stylesheet">

    <title><?php the_title(); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
<div id="page" class="site">

    <div class="main-wrapper">
        <div class="header">
            <div class="header__burger">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/menu_icon.png" alt="">
            </div>

            <nav id="menu" class="header__menu">

                <nav id="menu" class="header__menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'header__item', 'container' => false ) ); ?>
                </nav>
                <ul>
                    <li class="header_item">Clients</li>
                    <li class="header_item">News</li>
                </ul>
            </nav>

            <img src="<?php bloginfo('template_url'); ?>/assets/images/Logo.png" alt="">

            <form action="" method="get">
                <label for="found"></label>
                <input type="search" id="found"><i class="fa fa-search">
            </form>
        </div>

    </div>
