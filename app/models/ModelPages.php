<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;

class ModelPages
{
    /**
     * Home page
     */
    public static function home()
    {
        return View::make(
            'pages' . DS . 'home',
            array(
                'logo' => get_theme_mod(
                    'general_site_settings_upload_a_logo'
                ),
            )
        );
    }

    /**
     * Old browser page
     */
    public static function old()
    {
        $base_url = LolitaFramework::baseUrl();

        // Remove not needed scripts
        add_action(
            'wp_print_scripts',
            array(__NAMESPACE__ . NS . 'ModelActions', 'deregisterScripts')
        );

        // remove not needed styles
        add_action(
            'wp_print_styles',
            array(__NAMESPACE__ . NS . 'ModelActions', 'deregisterStyles')
        );

        return View::make(
            'pages' . DS . 'old',
            array(
                'ie' => $base_url . '/app/assets/img/old_browser/ie.png',
                'cr' => $base_url . '/app/assets/img/old_browser/cr.png',
                'ff' => $base_url . '/app/assets/img/old_browser/ff.png',
                'sf' => $base_url . '/app/assets/img/old_browser/sf.png',
            )
        );
    }
}
