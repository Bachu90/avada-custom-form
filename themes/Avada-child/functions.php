<?php

function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

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
            get_stylesheet_directory_uri() . '/flatpickr.js',
            ['jquery'],
            '1',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'ab_flatpicker_enqueue', 999);


function custom_fusionform_script_enqueue()
{
    wp_enqueue_script(
        'custom-fusionform-script',
        get_stylesheet_directory_uri() . '/custom-fusion-form-script.js',
        ['jquery'],
        '1',
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_fusionform_script_enqueue', 999);

// Admin dashboard settings

function custom_reservation_register_settings()
{
    //Sunday
    add_option('custom_reservation_sunday_open', '9:00');
    add_option('custom_reservation_sunday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_sunday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_sunday_close', array("show_in_rest" => true));

    //Monday
    add_option('custom_reservation_monday_open', '9:00');
    add_option('custom_reservation_monday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_monday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_monday_close', array("show_in_rest" => true));

    //Tuesday
    add_option('custom_reservation_tuesday_open', '9:00');
    add_option('custom_reservation_tuesday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_tuesday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_tuesday_close', array("show_in_rest" => true));

    //Wednesday
    add_option('custom_reservation_wednesday_open', '9:00');
    add_option('custom_reservation_wednesday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_wednesday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_wednesday_close', array("show_in_rest" => true));

    //Thursday
    add_option('custom_reservation_thursday_open', '9:00');
    add_option('custom_reservation_thursday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_thursday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_thursday_close', array("show_in_rest" => true));

    //Friday
    add_option('custom_reservation_friday_open', '9:00');
    add_option('custom_reservation_friday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_friday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_friday_close', array("show_in_rest" => true));

    //Saturday
    add_option('custom_reservation_saturday_open', '9:00');
    add_option('custom_reservation_saturday_close', '22:00');
    register_setting('custom_reservation_settings', 'custom_reservation_saturday_open', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_saturday_close', array("show_in_rest" => true));

    //Gap Value
    add_option('custom_reservation_gap_value', 4);
    register_setting('custom_reservation_settings', 'custom_reservation_gap_value', array("show_in_rest" => true));

    //IDs
    add_option('custom_reservation_date_input_id', 'custom_reservation_date');
    add_option('custom_reservation_time_input_id', 'custom_reservation_time');
    register_setting('custom_reservation_settings', 'custom_reservation_date_input_id', array("show_in_rest" => true));
    register_setting('custom_reservation_settings', 'custom_reservation_time_input_id', array("show_in_rest" => true));
}
add_action('admin_init', 'custom_reservation_register_settings');
add_action('rest_api_init', 'custom_reservation_register_settings');

function custom_reservation_register_options_page()
{
    add_options_page('Page Title', 'Rezerwacja Stolika', 'manage_options', 'custom_reservation', 'custom_reservation_options_page');
}
add_action('admin_menu', 'custom_reservation_register_options_page');

function custom_reservation_options_page()
{
?>
    <div>
        <h1>Ustawienia rezerwacji stolika</h1>
        <form method="post" action="options.php">
            <?php settings_fields('custom_reservation_settings'); ?>
            <h2 style="margin-top: 30px; margin-bottom: 30px;">Godziny otwarcia rezerwacji</h2>
            <table>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Niedziela</label></th>
                    <td><input type="text" id="custom_reservation_sunday_open" name="custom_reservation_sunday_open" value="<?php echo get_option('custom_reservation_sunday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_sunday_close" name="custom_reservation_sunday_close" value="<?php echo get_option('custom_reservation_sunday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Poniedziałek</label></th>
                    <td><input type="text" id="custom_reservation_monday_open" name="custom_reservation_monday_open" value="<?php echo get_option('custom_reservation_monday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_monday_close" name="custom_reservation_monday_close" value="<?php echo get_option('custom_reservation_monday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Wtorek</label></th>
                    <td><input type="text" id="custom_reservation_tuesday_open" name="custom_reservation_tuesday_open" value="<?php echo get_option('custom_reservation_tuesday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_tuesday_close" name="custom_reservation_tuesday_close" value="<?php echo get_option('custom_reservation_tuesday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Środa</label></th>
                    <td><input type="text" id="custom_reservation_wednesday_open" name="custom_reservation_wednesday_open" value="<?php echo get_option('custom_reservation_wednesday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_wednesday_close" name="custom_reservation_wednesday_close" value="<?php echo get_option('custom_reservation_wednesday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Czwartek</label></th>
                    <td><input type="text" id="custom_reservation_thursday_open" name="custom_reservation_thursday_open" value="<?php echo get_option('custom_reservation_thursday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_thursday_close" name="custom_reservation_thursday_close" value="<?php echo get_option('custom_reservation_thursday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Piątek</label></th>
                    <td><input type="text" id="custom_reservation_friday_open" name="custom_reservation_friday_open" value="<?php echo get_option('custom_reservation_friday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_friday_close" name="custom_reservation_friday_close" value="<?php echo get_option('custom_reservation_friday_close'); ?>" /></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Sobota</label></th>
                    <td><input type="text" id="custom_reservation_saturday_open" name="custom_reservation_saturday_open" value="<?php echo get_option('custom_reservation_saturday_open'); ?>" /></td>
                    <td> - </td>
                    <td><input type="text" id="custom_reservation_saturday_close" name="custom_reservation_saturday_close" value="<?php echo get_option('custom_reservation_saturday_close'); ?>" /></td>
                </tr>
            </table>
            <h2 style="margin-top: 50px; margin-bottom: 30px;">Czas wyprzedzenia rezerwacji (godz.)</h2>
            <input type="number" id="custom_reservation_gap_value" name="custom_reservation_gap_value" value="<?php echo get_option('custom_reservation_gap_value'); ?>" />
            <h2 style="margin-top: 50px; margin-bottom: 30px;">Identyfikatory pól</h2>
            <table>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px; text-align: left;"><label>Data</label></th>
                    <td><input type="text" id="custom_reservation_date_input_id" name="custom_reservation_date_input_id" value="<?php echo get_option('custom_reservation_date_input_id'); ?>" /></td>
                    <td>
                        <p>Pamiętaj aby ustawić ten identyfikator jako ID pola wyboru daty.</p>
                    </td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px;"><label>Godzina</label></th>
                    <td><input type="text" id="custom_reservation_time_input_id" name="custom_reservation_time_input_id" value="<?php echo get_option('custom_reservation_time_input_id'); ?>" /></td>
                    <td>
                        <p>Pamiętaj aby ustawić ten identyfikator jako ID pola wyboru godziny.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

add_action('wp_footer', 'custom_reservation_footer_injection');
function custom_reservation_footer_injection()
{
    $days = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    $opening_times = array();
    foreach ($days as $day) {
        $opening_times[$day] = array('open' => get_option("custom_reservation_{$day}_open"), 'close' => get_option("custom_reservation_{$day}_close"));;
    }
    $info = array(
        'opening_times' => $opening_times,
        'reservation_gap' => intval(get_option('custom_reservation_gap_value')),
        'date_input_id' => get_option('custom_reservation_date_input_id'),
        'time_input_id' => get_option('custom_reservation_time_input_id'),
    );
    $encoded_info = str_replace("\"", "&#39;", json_encode($info));
    echo '<dix id="custom_reservation_info" style="display: none;" data-info="' . $encoded_info . '" />';
}
