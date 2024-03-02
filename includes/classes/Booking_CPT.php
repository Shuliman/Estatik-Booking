<?php
namespace Estatik\Bookings;

class Booking_CPT {
    public function __construct() {
        add_action('init', array($this, 'register'));
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
