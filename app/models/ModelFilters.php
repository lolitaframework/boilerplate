<?php

namespace lolitatheme;

class ModelFilters
{
    /**
     * Rewrite admin URL
     *
     * be sure rules are written every time permalinks are updated
     *
     * @param  mixed $wp_rewrite
     * @return void
     */
    public static function rewriteAdminUrl($wp_rewrite)
    {
        add_rewrite_rule('client-login/?$', 'wp-login.php', 'top');
    }

    /**
     * upload_mimes Filter.
     */
    public static function addMimeSvg($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
