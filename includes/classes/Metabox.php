<?php
namespace Estatik\Bookings;

class Metabox {
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add'));
        add_action('save_post', array($this, 'save'));
    }

    public function add() {
        add_meta_box(
            'booking_details',
            __('Booking Details', 'textdomain'),
            array($this, 'callback'),
            'booking',
            'normal',
        );
    }

    function callback($post) {
        wp_nonce_field('save', 'estatik_booking_metabox_nonce');

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

    public function save($post_id) {
        if (!isset($_POST['estatik_booking_metabox_nonce']) || !wp_verify_nonce($_POST['estatik_booking_metabox_nonce'], 'estatik_booking_save_metabox_data')) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['start_date'])) {
            update_post_meta($post_id, '_start_date', sanitize_text_field($_POST['start_date']));
        }

        if (isset($_POST['end_date'])) {
            update_post_meta($post_id, '_end_date', sanitize_text_field($_POST['end_date']));
        }

        if (isset($_POST['address'])) {
            update_post_meta($post_id, '_address', sanitize_text_field($_POST['address']));
        }

        if (isset($_POST['start_date'])) {
            $start_date_gmt = strtotime(get_gmt_from_date($_POST['start_date']));
            update_post_meta($post_id, '_start_date', $start_date_gmt);
        }

        if (isset($_POST['end_date'])) {
            $end_date_gmt = strtotime(get_gmt_from_date($_POST['end_date']));
            update_post_meta($post_id, '_end_date', $end_date_gmt);
        }
    }
}
