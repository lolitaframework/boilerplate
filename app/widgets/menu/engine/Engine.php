<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolitatheme\LolitaFramework\Core\Arr;
use \lolitatheme\LolitaFramework\Core\View;

class Engine
{
    /**
     * Locations
     */
    public static function locations()
    {
        $locations = get_nav_menu_locations();
        if (count($locations)) {
            $locations = array_flip($locations);
        }
        $locations = Arr::prepend($locations, __('Select location', 'lf'), -1);
        return $locations;
    }

    /**
     * Get menu
     */
    public static function menu($menu_id = '')
    {
        if ($menu_id > 0) {
            return wp_get_nav_menu_items($menu_id);
        }
        return false;
    }

    /**
     * Render the google map widget
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public static function widget($args, $instance)
    {
        $items = array();
        $menu  = false;
        if (array_key_exists('location', $instance)) {
            $location = $instance['location'];
            $items = self::menu($location);
        }
        if (count($items) && is_array($items)) {
            $menu = new Menu($items);
        }
        echo View::make(
            dirname(__DIR__).DS.'views'.DS.'menu.php',
            array(
                'args'     => $args,
                'instance' => $instance,
                'items'    => $items,
                'menu'     => $menu,
            )
        );
    }
}
