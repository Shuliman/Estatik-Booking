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
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_style('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
        }
    }

    public function activate_datepicker() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>
        <?php
    }
}
