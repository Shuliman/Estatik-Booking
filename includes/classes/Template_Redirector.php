<?php
namespace Estatik\Bookings;

class Template_Redirector {
    public function __construct() {
        add_filter('single_template', [$this, 'redirect_single_template']);
    }

    public function redirect_single_template($template) {
        global $post;

        if ('booking' === $post->post_type) {
            $plugin_template = ESTATIK_BOOKINGS_PATH . 'templates/single-booking.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }
}
