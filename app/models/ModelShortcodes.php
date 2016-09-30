<?php

namespace lolitatheme;

use \lolitatheme\LolitaFramework\Core\View;

class ModelShortcodes
{

    /**
     * Header
     * @return string HTML code header.
     */
    public static function header()
    {
        return View::make('blocks' . DS . 'header');
    }

    /**
     * Footer
     * @return string HTML code footer.
     */
    public static function footer()
    {
        return View::make('blocks' . DS . 'footer');
    }
}
