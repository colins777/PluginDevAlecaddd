<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{

    public function checkboxSanitize( $input )
    {
        //return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false );
    }

    public function adminSectionManager ()
    {
        echo 'Manage the Sections and Features of this Plugin by checkboxes.';
    }

    public function checkboxField($args)
    {
        //var_dump($args);
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option($name);
        echo '<input type="checkbox" name="' . $name . '" value="1" class=" ' . $classes . '" ' . ($checkbox ? 'checked' : '') . ' >';
    }

}