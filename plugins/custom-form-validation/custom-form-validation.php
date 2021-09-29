<?php

/**
 * Plugin Name: Custom Form Validation
 * Author: Grzegorz Bach
 * Author URI: https://grzegorzbach.pl
 * Description: Plugin modyfikujący walidację formularzy. Motyw Avada jest wymagany do poprawnego działania wtyczki. Aby edytować ustawienia rezerwacji stolika, przejdź do Ustawienia -> Rezerwacja stolika. Aby pole formularza przyjmowało tylko litery, dodaj do pola klasę css 'only-letters-input'.
 * Version: 1.0.0
 */

// Load js scripts
require_once(plugin_dir_path( __FILE__ ).'/script-loaders.php');

// Admin settings
require_once(plugin_dir_path( __FILE__ ).'/admin/setup.php');
require_once(plugin_dir_path( __FILE__ ).'/admin/settings-page.php');




