<?php
function estatik_enqueue_date_picker() {
    global $post_type;
    if( 'booking' == $post_type ) {
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
    }
}
add_action('admin_enqueue_scripts', 'estatik_enqueue_date_picker');

function estatik_activate_datepicker() {
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
add_action('admin_footer', 'estatik_activate_datepicker');