<?php

// Check if a custom ID is set in the block editor
if( !empty($block['anchor']) )
    $block_id = $block['anchor'];

// Block classes
$classes = [];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

// Block alignment
if( !empty( $block['align'] ) )
    $classes[] = 'align' . $block['align'];


$inner_blocks =  array(
    array('core/heading', array(
        'placeholder' => 'This is a heading',
        'className' => 'font-serif text-5xl lg:text-6xl xl:text-hero',
        'level' => 2,
    )),
);

$allowed_blocks = [
    'core/heading',
];
?>

<div class="<?php echo implode(' ', $classes); ?>">
	Block content

    <InnerBlocks
        allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
        template="<?php echo esc_attr( wp_json_encode( $inner_blocks ) ); ?>"
        templateLock="all"
        className="text-left"
    />
</div>
