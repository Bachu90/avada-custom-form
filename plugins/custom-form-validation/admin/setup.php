<?php

// Registrations

function custom_reservation_register_settings()
{
    //Sunday
    add_option('custom_reservation_sunday_open', '9:00');
    add_option('custom_reservation_sunday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_sunday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_sunday_close', Array("show_in_rest" => true));
    
    //Monday
    add_option('custom_reservation_monday_open', '9:00');
    add_option('custom_reservation_monday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_monday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_monday_close', Array("show_in_rest" => true));
    
    //Tuesday
    add_option('custom_reservation_tuesday_open', '9:00');
    add_option('custom_reservation_tuesday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_tuesday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_tuesday_close', Array("show_in_rest" => true));
    
    //Wednesday
    add_option('custom_reservation_wednesday_open', '9:00');
    add_option('custom_reservation_wednesday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_wednesday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_wednesday_close', Array("show_in_rest" => true));
    
    //Thursday
    add_option('custom_reservation_thursday_open', '9:00');
    add_option('custom_reservation_thursday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_thursday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_thursday_close', Array("show_in_rest" => true));
    
    //Friday
    add_option('custom_reservation_friday_open', '9:00');
    add_option('custom_reservation_friday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_friday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_friday_close', Array("show_in_rest" => true));
    
    //Saturday
    add_option('custom_reservation_saturday_open', '9:00');
    add_option('custom_reservation_saturday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_saturday_open', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_saturday_close', Array("show_in_rest" => true));

    //Gap Value
    add_option('custom_reservation_gap_value', 4);
    register_setting('custom_reservation_settings', 'custom_reservation_gap_value', Array("show_in_rest" => true));

    //IDs
    add_option('custom_reservation_date_input_id', 'custom_reservation_date');
    add_option('custom_reservation_time_input_id', 'custom_reservation_time');
    register_setting('custom_reservation_settings', 'custom_reservation_date_input_id', Array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_time_input_id', Array("show_in_rest" => true));

}
add_action('init', 'custom_reservation_register_settings');

// Footer data injection
add_action('wp_footer', 'custom_reservation_footer_injection'); 
function custom_reservation_footer_injection() {
    $days = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    $opening_times = array();
    foreach($days as $day){
        $opening_times[$day] = array('open' => get_option("custom_reservation_{$day}_open"), 'close' => get_option("custom_reservation_{$day}_close"));;
    }
    $info = array(
        'opening_times' => $opening_times, 
        'reservation_gap' => intval(get_option('custom_reservation_gap_value')),
        'date_input_id' => get_option('custom_reservation_date_input_id'),
        'time_input_id' => get_option('custom_reservation_time_input_id'),
    );
    $encoded_info = str_replace("\"","&#39;",json_encode($info));
    echo '<dix id="custom_reservation_info" style="display: none;" data-info="'.$encoded_info.'" />'; 
}