<?php

namespace Estatik\Bookings;

class Plugin
{
    public static function init()
    {
        register_activation_hook(__FILE__, array(self::class, 'activate'));
        register_deactivation_hook(__FILE__, array(self::class, 'deactivate'));

        new Booking_CPT();
        new Metabox();
        new EnqueueScripts();
        new Template_Redirector();
    }

    public static function activate()
    {
        Booking_CPT::register();
        flush_rewrite_rules();
    }

    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
