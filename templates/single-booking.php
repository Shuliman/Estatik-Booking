<?php get_header(); ?>

<main id="site-content" role="main">

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <article <?php post_class(); ?>>
                <div class="booking-content-wrapper">
                    <div class="booking-header">
                        <h1 class="booking-title"><?php the_title(); ?></h1>
                    </div>
                    <div class="booking-body">
                    <?php the_content();
                    $start_date_timestamp = get_post_meta(get_the_ID(), '_start_date', true);
                    $end_date_timestamp = get_post_meta(get_the_ID(), '_end_date', true);

                    $start_date_formatted = date_i18n('j M Y H:i', $start_date_timestamp);
                    $end_date_formatted = date_i18n('j M Y H:i', $end_date_timestamp);
                    ?>
                    <!-- Display Booking Details -->
                    <div class="booking-details">
                        <h2><?php _e('Booking Details', 'textdomain'); ?></h2>
                        <ul>
                            <li><strong><?php _e('Start Date:', 'textdomain'); ?></strong> <?php echo $start_date_formatted; ?></li>
                            <li><strong><?php _e('Ending Date:', 'textdomain'); ?></strong> <?php echo $end_date_formatted; ?></li>
                            <li><strong><?php _e('Address:', 'textdomain'); ?></strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_address', true)); ?></li>
                        </ul>
                    </div>
                        <div id="booking-map" data-address="<?php echo esc_attr(get_post_meta(get_the_ID(), '_address', true)); ?>"></div>
                    </div>
            </article>
            <?php
        }
    }
    ?>

</main>

<?php get_footer(); ?>
