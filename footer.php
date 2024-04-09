<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cascadia_Starter
 */

?>

<footer id="colophon" class="mt-auto py-8 bg-slate-700 text-white">
    <div class="container">
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'cascadia-starter' ), 'cascadia-starter', '<a href="http://cascadia.digital">Cascadia Digital</a>' );
            ?>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
