<?php
defined('ABSPATH') or die('No script kiddies please!');

?>

    <label for="start_date"><?php _e('Start Date', 'textdomain'); ?></label>
    <input type="text" id="start_date" name="start_date" value="<?php echo esc_attr($start_date_value); ?>" class="widefat datepicker">

    <label for="end_date"><?php _e('End Date', 'textdomain'); ?></label>
    <input type="text" id="end_date" name="end_date" value="<?php echo esc_attr($end_date_value); ?>" class="widefat datepicker">

    <label for="address"><?php _e('Address', 'textdomain'); ?></label>
    <input type="text" id="address" name="address" value="<?php echo esc_attr($address); ?>" class="widefat">
<?php