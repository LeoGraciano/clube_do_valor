<?php

/**
 * The footer for our theme.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <?php get_template_part('template-parts/footer/site', 'widgets'); ?>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>