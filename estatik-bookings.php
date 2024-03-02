<?php

/*
Plugin Name: Estatik Bookings
Description: Custom Booking System for WordPress.
Version: 1.0
Author: Shuliman
*/

include(plugin_dir_path(__FILE__) . 'includes/booking-details-metabox.php');
include(plugin_dir_path(__FILE__) . 'includes/booking-cpt.php');
include(plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php');

function estatik_bookings_activate()
{
    estatik_register_booking_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'estatik_bookings_activate');

function estatik_bookings_deactivate()
{
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'estatik_bookings_deactivate');
