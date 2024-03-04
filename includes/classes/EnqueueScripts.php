<?php
namespace Estatik\Bookings;

class EnqueueScripts {
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_footer', array($this, 'activate_datepicker'));
    }

    public function enqueue() {
        global $post_type;
        if( 'booking' == $post_type ) {
            wp_enqueue_script('jquery', plugin_dir_url(__FILE__) . '../../node_modules/jquery/dist/jquery.min.js', array(), false, true);
            wp_enqueue_style('jquery-ui-style', plugin_dir_url(__FILE__) . '../../node_modules/jquery-ui-dist/jquery-ui.min.css');
            wp_enqueue_script('jquery-ui', plugin_dir_url(__FILE__) . '../../node_modules/jquery-ui-dist/jquery-ui.min.js', array('jquery'), false, true);
            wp_enqueue_script('jquery-datetimepicker', plugin_dir_url(__FILE__) . '../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js', array('jquery', 'jquery-ui'), false, true);
            wp_enqueue_style('jquery-datetimepicker-style', plugin_dir_url(__FILE__) . '../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css');
        }
    }

    public function activate_datepicker() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.datepicker').datetimepicker({
                    format:'d M Y H:i',
                    formatTime:'H:i',
                    formatDate:'d M Y'
                });
            });
        </script>
        <?php
    }
}
