<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

class Activate
{
    public static function activate() {
        //Обновляет правила перезаписи ЧПУ: удаляет имеющиеся, генерирует и записывает новые
        flush_rewrite_rules();
    }
}