<?php
namespace Inc\Triggers;

use Inc\Base\BaseController;

class Triggers extends BaseController
{

    public function dashboard()
    {
        include_once $this->plugin_path . 'templates/dashboard.php';
    }

    public function cpt()
    {
        include_once $this->plugin_path . 'templates/cpt.php';
    }

    public function taxonomies()
    {
        include_once $this->plugin_path . 'templates/taxonomies.php';
    }

    public function widgets()
    {
        include_once $this->plugin_path . 'templates/widgets.php';
    }

    public function settings($input)
    {
        return isset($input) ? true : false;
    }

    public function sections()
    {
        echo wpautop("This aren't the Settings you're looking for. Move along.'");
    }

    public function pageName()
    {
        $value = esc_attr(get_option('page_name'));
        echo '<input type="text" value="' . $value . '" placeholder="Page Name" name="page_name">';
    }

 
    
    public function firstName($args)
    { // Textbox Callback
        $option = get_option($args[0]);
        echo '<input type="text" id="'.$args[0] .'" name="'. $args[0] .'" value="'. $option .'" />';
    }

    
    public function lastName($args)
    { // Textbox Callback
        $option = get_option($args[0]);
        echo '<input type="text" id="'.$args[0] .'" name="'. $args[0] .'" value="'. $option .'" />';
    }
 
}
