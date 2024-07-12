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

<body <?php body_class('flex flex-col min-h-screen'); ?> x-data="app" :class="isMenuOpen ? 'fixed menu-open' : 'menu-closed'">
<?php wp_body_open(); ?>
	<a href="#primary" class="sr-only focus:not-sr-only"><?php esc_html_e( 'Skip to content', 'cascadia-starter' ); ?></a>

	<header id="masthead" class="py-8 shadow-xl">
		<div class="container">
            <div class="flex justify-between">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="font-semibold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="font-semibold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
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
                    <div class="mobile-menu absolute inset-0 h-screen w-screen bg-white" x-show="isMenuOpen" x-cloak x-transition>
                        <div class="container py-8 relative">
                            <button x-on:click="toggleMenu" class="absolute top-8 right-0 p-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span class="sr-only">
                                    Close
                                </span>
                            </button>

                            <div class="mt-8">
                                <p class="font-semibold mb-8"><?php bloginfo( 'name' ); ?></p>
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
            </div>
        </div>
	</header><!-- #masthead -->
