<?php

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Settings',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Notifications',
        'menu_title'    => 'Notifications',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-settings',
    ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Blog Settings',
    //     'menu_title'    => 'Blog',
    //     'parent_slug'   => 'general-settings',
    // ));

}
