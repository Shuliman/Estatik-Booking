<?php
namespace Estatik\Bookings;

class EnqueueScripts {
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_action('admin_footer', [$this, 'activate_datepicker']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_scripts']);
    }

    public function enqueue_admin_scripts() {
        global $post_type;
        if ('booking' === $post_type) {
            wp_enqueue_script('jquery', plugin_dir_url(__FILE__) . '../../node_modules/jquery/dist/jquery.min.js', array(), false, true);
            wp_enqueue_style('jquery-ui-style', plugin_dir_url(__FILE__) . '../../node_modules/jquery-ui-dist/jquery-ui.min.css');
            wp_enqueue_script('jquery-ui', plugin_dir_url(__FILE__) . '../../node_modules/jquery-ui-dist/jquery-ui.min.js', array('jquery'), false, true);
            wp_enqueue_script('jquery-datetimepicker', plugin_dir_url(__FILE__) . '../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js', array('jquery', 'jquery-ui'), false, true);
            wp_enqueue_style('jquery-datetimepicker-style', plugin_dir_url(__FILE__) . '../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css');
            $this->enqueue_shared_scripts();
        }
    }

    public function enqueue_frontend_scripts() {
        if (is_singular('booking')) {
            $this->enqueue_shared_scripts();
        }
    }

    private function enqueue_shared_scripts() {
        wp_enqueue_style('estatik-bookings-style', plugin_dir_url(__FILE__) . '../../assets/css/estatik-bookings.css');
        wp_enqueue_script('estatik-bookings-map', plugin_dir_url(__FILE__) . '../../assets/js/estatik-bookings-map.js', array('jquery'), null, true);
        wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_MAPS_API . '&callback=initMap', array(), null, true);
    }

    public function activate_datepicker() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.datepicker').datetimepicker({
                    format: 'd M Y H:i',
                    formatTime: 'H:i',
                    formatDate: 'd M Y',
                });
            });
        </script>
        <?php
    }
}