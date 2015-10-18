<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */   ?>
</div><!-- #main .wrapper -->
<footer id="colophon" role="contentinfo">
<div class="site-info">
<?php do_action( 'twentytwelve_credits' ); ?>
<?php printf( '<a href="%s" title="%s">%s</a> %s%s', get_footer_info( 'url' ), get_footer_info( 'title' ), get_footer_info( 'text' ), get_footer_info( 'text_alt' ), PHP_EOL ); ?>
</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
