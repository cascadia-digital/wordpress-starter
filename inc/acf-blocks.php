<?php
// Custom Gutenberg Blocks
add_action('acf/init', 'register_my_blocks');

function register_my_blocks(){
    $block_json_files = glob( get_template_directory() . '/acf-blocks/**/block.json' );

    // dump_data( $block_json_files );

    // auto register all blocks that were found.
    foreach ( $block_json_files as $block_json_file ) {
        // $block_folder = dirname( $filename );
        register_block_type( $block_json_file );
    };
}
