<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cascadia_Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="antialiased font-whitney">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col min-h-screen'); ?> x-data="app">
<?php wp_body_open(); ?>
	<a href="#primary" class="sr-only focus:not-sr-only"><?php esc_html_e( 'Skip to content', 'cascadia-starter' ); ?></a>

	<header id="masthead" class="py-8 shadow-xl">
		<div class="container">
            <div class="flex justify-between">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                ?>
                <nav id="site-navigation" class="hidden lg:block">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->
                <div class="block lg:hidden">
                    <button x-on:click="toggleMenu">
                        Menu
                    </button>
                    <div class="mobile-menu" x-show="isMenuOpen" x-cloak>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
