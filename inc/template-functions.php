<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Cascadia_Starter
 */

 function dump( $data ) {
    echo '<pre>';
    print_r( $data );
    echo '</pre>';
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cascadia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cascadia_pingback_header' );


/**
 * Helper function
 * @param menu
 * @param parent_id
 */
function menu_item_has_children($menu, $parent_id) {
    $parent_IDs = array_column($menu, 'menu_item_parent');
    $found_menu_items = array_search($parent_id, $parent_IDs);

    return $found_menu_items;
}


/**
 * Get nav menu items by location
 *
 * @param $location The menu location id
 * source: https://www.codementor.io/@robbertvermeulen/get-nav-menu-items-by-location-es0n8lmtt
 */
function get_nav_menu_items_by_location( $location, $args = [] ) {

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );

    // Return menu post objects
    return $menu_items;
}

/**
 * Cascadia Menu Builder
 */
function cascadia_menu_builder($menu_location = '') {
    $menu = get_nav_menu_items_by_location($menu_location);
    $new_menu = array();

    foreach ($menu as $item) {
        // If menu item has children
        if (menu_item_has_children($menu, $item->ID) != false) {
            $new_menu[] = [
                'ID' => url_to_postid($item->url),
                'title' => $item->title,
                'url' => $item->url,
                'children' => []
            ];
            continue;
        }

        // If menu item is a child
        if ($item->menu_item_parent != 0)  {
         /**
          * Children menu items are preceeded by their parent.
          * That means we can safely assume the last menu item is the parent
          */
            $parent = array_key_last($new_menu);
            array_push($new_menu[$parent]['children'],
                [
                    'ID' => url_to_postid($item->url),
                    'title' => $item->title,
                    'url' => $item->url,
                ]);
            continue;
        }

        // Just a normal menu item
        $new_menu[] = [
            'ID' => url_to_postid($item->url),
            'title' => $item->title,
            'url' => $item->url,
        ];

    }
    return $new_menu;
}
