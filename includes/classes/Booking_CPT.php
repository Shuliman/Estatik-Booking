<?php
namespace Estatik\Bookings;

class Booking_CPT {
    public function __construct() {
        add_action('init', array($this, 'register'));
    }

    function callback($post){
        wp_nonce_field('estatik_booking_save_metabox_data', 'estatik_booking_metabox_nonce');

        $start_date = get_post_meta($post->ID, '_start_date', true);
        $end_date = get_post_meta($post->ID, '_end_date', true);
        $address = get_post_meta($post->ID, '_address', true);

        echo '<label for="start_date">' . __('Start Date', 'textdomain') . '</label>';
        echo '<input type="text" id="start_date" name="start_date" value="' . esc_attr($start_date) . '" class="widefat datepicker">';

        echo '<label for="end_date">' . __('End Date', 'textdomain') . '</label>';
        echo '<input type="text" id="end_date" name="end_date" value="' . esc_attr($end_date) . '" class="widefat datepicker">';

        echo '<label for="address">' . __('Address', 'textdomain') . '</label>';
        echo '<input type="text" id="address" name="address" value="' . esc_attr($address) . '" class="widefat">';
    }

    public static function register() {
        $args = array(
            'public' => true,
            'label' => 'Bookings',
            'supports' => array('title', 'editor', 'custom-fields'),
        );
        register_post_type('booking', $args);
    }
}
