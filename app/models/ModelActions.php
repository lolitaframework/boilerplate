<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\Loc;
use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Url;
use \lolitatheme\LolitaFramework;

class ModelActions
{
    /**
     * Filter old browsers
     *
     * @return void
     */
    public static function checkBrowser()
    {
        $response = Loc::browserVersion();
        if (is_array($response) && 'old' !== Url::route()) {
            if (array_key_exists('name', $response) && array_key_exists('version', $response)) {
                $name    = $response['name'];
                $version = (int) $response['version'];

                if ('Internet Explorer' === $name && $version < 11) {
                    wp_redirect(home_url('old'));
                    exit;
                }
            }
        }
    }

    /**
     * Add permalinks structure
     *
     * @return void
     */
    public static function permalinkStructure()
    {
        $rw = Loc::wpRewrite();
        if(!$rw->using_permalinks()) {
            $rw->set_permalink_structure('/%postname%/');
        }
    }

    /**
     * Deface wordpress logo
     *
     * @return void
     */
    public static function defaceWordPressLogin()
    {
        echo View::make(
            'styles' . DS . 'deface_wordpress_login',
            array(
                'bg' => LolitaFramework::baseUrl() . '/app/assets/img/login_page_bg.png',
                'logo' => LolitaFramework::baseUrl() . '/app/assets/img/logo.svg',
            )
        );
    }

    /**
     * Redirect if wp-login or wp-register
     *
     * @return void
     */
    public static function checkLogin()
    {
        $pagenow = Loc::pagenow();
        $pages   = array('wp-login.php', 'wp-register.php');
        if (strpos($_SERVER['REQUEST_URI'], '?') > -1) {
            list($file, $arguments) = explode("?", $_SERVER['REQUEST_URI']);
        } else {
            $file = $_SERVER['REQUEST_URI'];
        }

        if (in_array($pagenow, $pages)) {
            if (strpos($file, 'client-login') === false) {
                wp_redirect(home_url());
            }
        }
    }

    /**
     * AJAX. Search posts
     *
     * @return void
     */
    public static function search()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $args = array(
            'posts_per_page'   => 3,
            'offset'           => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true,
            's'                => Arr::get($_POST, 's')
        );
        $items  = get_posts($args);
        $return = array();

        foreach ($items as &$item) {
            $el = array(
                'url'     => get_permalink($item->ID),
                'title'   => get_the_title($item->ID),
                'content' => $item->post_content,
                'img'     => '',
            );
            $return[] = $el;
        }

        wp_send_json_success(
            array(
                'items' => $return
            )
        );
    }

    /**
     * Deregister all scripts
     *
     * @return void
     */
    public static function deregisterScripts()
    {
        $wp_scripts_queue = wp_scripts()->queue;

        if (is_array($wp_scripts_queue)) {
            foreach ($wp_scripts_queue as $handle) {
                wp_deregister_script($handle);
            }
        }
    }

    /**
     * Deregister all styles
     *
     * @return void
     */
    public static function deregisterStyles()
    {
        $wp_styles_queue  = wp_styles()->queue;
        if (is_array($wp_styles_queue)) {
            foreach ($wp_styles_queue as $handle) {
                wp_deregister_style($handle);
            }
        }
        wp_enqueue_style('old-browser', LolitaFramework::baseUrl() . '/app/assets/css/old-browser.min.css');
    }
}
