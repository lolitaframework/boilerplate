<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolitatheme\LolitaFramework\Core\View;

class MenuItem
{
    /**
     * Me
     */
    public $me = null;

    /**
     * Menu
     * @var null
     */
    public $menu = null;

    /**
     * Class constructor
     */
    public function __construct($me, $menu)
    {
        $this->me   = $me;
        $this->menu = $menu;
    }

    /**
     * Has submenu
     *
     * @return boolean
     *
     */
    public function hasSubmenu()
    {
        return array_key_exists($this->me->ID, (array) $this->menu->getGraph());
    }

    /**
     * Get sub items
     *
     * @return mixed
     */
    public function getSubItems()
    {
        if ($this->hasSubmenu()) {
            return $this->menu->getSubItems($this->me->ID);
        }
        return false;
    }

    /**
     * Render
     *
     * @return string
     */
    public function render()
    {
        return View::make(
            dirname(__DIR__) . DS . 'views' . DS . 'li.php',
            array(
                'li' => $this
            )
        );
    }
}
