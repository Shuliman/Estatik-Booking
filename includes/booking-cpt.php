<?php
function estatik_register_booking_cpt()
{
    $args = array(
        'public' => true,
        'label' => 'Bookings',
        'supports' => array('title', 'editor', 'custom-fields'),
    );
    register_post_type('booking', $args);
}
add_action('init', 'estatik_register_booking_cpt');