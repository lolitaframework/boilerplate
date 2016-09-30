<?php

namespace lolitatheme\app\widgets\gmap\engine;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Url;

class Engine
{
    /**
     * Render the google map widget
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public static function widget($args, $instance)
    {
        add_action('wp_footer', array(__CLASS__, 'enqueue'));
        
        echo View::make(
            dirname(__DIR__).DS.'views'.DS.'gmap.php',
            array(
                'args'     => $args,
                'instance' => $instance,
            )
        );
    }

    /**
     * Enqueue scripts
     */
    public static function enqueue()
    {
        $js_url = Url::toUrl(dirname(__DIR__) . DS . 'assets' . DS . 'js' . DS . 'lf_google_map.js');
        wp_enqueue_script('lf_gmap', $js_url, array('jquery'));
    }
}
