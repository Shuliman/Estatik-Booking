<?php
defined('ABSPATH') or die('No script kiddies please!');

?>

    <label for="start_date"><?php _e('Start Date', 'estatik-bookings'); ?></label>
    <input type="text" id="start_date" name="start_date" value="<?php echo esc_attr($start_date_value); ?>" class="widefat datepicker">

    <label for="end_date"><?php _e('End Date', 'estatik-bookings'); ?></label>
    <input type="text" id="end_date" name="end_date" value="<?php echo esc_attr($end_date_value); ?>" class="widefat datepicker">

    <label for="address"><?php _e('Address', 'estatik-bookings'); ?></label>
    <input type="text" id="address" name="address" value="<?php echo esc_attr($address); ?>" class="widefat">

    <div id="booking-map" data-address="<?php echo esc_attr(get_post_meta(get_the_ID(), '_address', true)); ?>"></div>

<?php
