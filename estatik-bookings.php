<?php
/*
Plugin Name: Estatik Bookings
Description: Custom Booking System for WordPress.
Version: 1.0
Author: Shuliman
*/

namespace Estatik\Bookings;

require_once __DIR__ . '/vendor/autoload.php';
define('ESTATIK_BOOKINGS_PATH', plugin_dir_path(__FILE__));


Plugin::init();