<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentytwenty'); ?></a>
        <header id="masthead" class="site-header">
            <?php get_template_part('template-parts/header/site', 'branding'); ?>
            <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
        </header><!-- #masthead -->
        <div id="content" class="site-content">
            <main id="main" class="site-main">
                <?php
                // Include the page content template.
                get_template_part('template-parts/post/content', 'none');
                ?>
            </main><!-- #main -->
        </div><!-- #content -->