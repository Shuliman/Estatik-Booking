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

        $start_date_value = $start_date ? date('j M Y H:i', $start_date) : '';
        $end_date_value = $end_date ? date('j M Y H:i', $end_date) : '';

        include ESTATIK_BOOKINGS_PATH . 'templates/metabox-view.php';
    }

    public function save($post_id) {
        error_log(print_r($_POST, true));
        if (!isset($_POST['estatik_booking_metabox_nonce']) ||
            !wp_verify_nonce($_POST['estatik_booking_metabox_nonce'], 'save')) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['start_date'])) {
            $start_date = sanitize_text_field($_POST['start_date']);
            $start_date_timestamp = strtotime($start_date);
            update_post_meta($post_id, '_start_date', $start_date_timestamp);
        }

        if (isset($_POST['end_date'])) {
            $end_date = sanitize_text_field($_POST['end_date']);
            $end_date_timestamp = strtotime($end_date);
            update_post_meta($post_id, '_end_date', $end_date_timestamp);
        }

        if (isset($_POST['address'])) {
            $address = sanitize_text_field($_POST['address']);
            update_post_meta($post_id, '_address', $address);
        }
    }
}
