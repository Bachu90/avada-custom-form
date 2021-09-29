<?php
function ab_dequeue_script()
{
    if (class_exists('Fusion_Dynamic_JS')) {
        Fusion_Dynamic_JS::dequeue_script('fusion-date-picker');
    }
}
add_action('wp_print_scripts', 'ab_dequeue_script', 100);

function ab_flatpicker_enqueue()
{
    if (class_exists('Fusion_Dynamic_JS')) {
        wp_enqueue_script(
            'fusion-date-picker',
            plugin_dir_url(__FILE__) . 'flatpickr.js',
            ['jquery', 'fusion-scripts'],
            '1.1',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'ab_flatpicker_enqueue', 999);


function custom_fusionform_script_enqueue()
{
    wp_enqueue_script(
        'custom-fusionform-script',
        plugin_dir_url(__FILE__) . 'custom-form-validation-script.js',
        ['jquery'],
        '1',
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_fusionform_script_enqueue', 999);
