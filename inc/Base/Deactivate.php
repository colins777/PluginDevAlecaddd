<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

class Deactivate
{
    public static function deactivate() {
        //Обновляет правила перезаписи ЧПУ: удаляет имеющиеся, генерирует и записывает новые
        flush_rewrite_rules();
    }
}