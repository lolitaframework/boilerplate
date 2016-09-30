<?php

namespace lolitatheme\app\widgets\menu\engine;

use \lolitatheme\LolitaFramework\Core\View;
use \lolitatheme\LolitaFramework\Core\Arr;

class Menu
{
    /**
     * Menu items
     */
    private $items = null;

    /**
     * Menu graph
     */
    private $graph = null;

    /**
     * Class constructor
     */
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->initGraph();
    }

    /**
     * Init graph
     *
     * @return Menu instance.
     */
    public function initGraph()
    {
        foreach ($this->items as $item) {
            $this->graph[ $item->menu_item_parent ][] = new MenuItem($item, $this);
        }
        return $this;
    }

    /**
     * Get graph
     *
     * @return mixed
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * Get subitems
     *
     * @param  integer $parent
     * @return mixed
     */
    public function getSubItems($parent = 0)
    {
        if (array_key_exists($parent, $this->graph)) {
            return $this->graph[ $parent ];
        }
        return false;
    }

    /**
     * Menu items
     *
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Render menu
     *
     * @return string
     */
    public function render()
    {
        return View::make(
            dirname(__DIR__) . DS . 'views' . DS . 'tree.php',
            array(
                'ul' => $this->ul($this->getSubItems()),
            )
        );
    }

    /**
     * Render ul
     *
     * @param  array $items
     * @return string
     */
    public function ul($items)
    {
        if (is_array($items) && count($items)) {
            $level = (int) ($items[0]->me->menu_item_parent > 0);
        }
        return View::make(
            dirname(__DIR__) . DS . 'views' . DS . 'ul.php',
            array(
                'ul'    => $items,
                'level' => $level,
            )
        );
    }
}
