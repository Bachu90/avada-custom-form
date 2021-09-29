<?php

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
            <h2 style="margin-top: 30px; margin-bottom: 30px;">Godziny rezerwacji</h2>
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
                    <td><p>Pamiętaj aby ustawić ten identyfikator jako ID pola wyboru daty.</p></td>
                </tr>
                <tr valign="center">
                    <th scope="row" style="padding-right: 20px;"><label>Godzina</label></th>
                    <td><input type="text" id="custom_reservation_time_input_id" name="custom_reservation_time_input_id" value="<?php echo get_option('custom_reservation_time_input_id'); ?>" /></td>
                    <td><p>Pamiętaj aby ustawić ten identyfikator jako ID pola wyboru godziny.</p></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}