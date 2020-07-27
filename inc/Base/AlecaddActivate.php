<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

class AlecaddActivate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}