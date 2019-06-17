<?php
namespace Inc\Triggers;
use Inc\Base\BaseController;

class Triggers extends BaseController {

    public function dashboard() {
        include_once $this->plugin_path.'templates/dashboard.php';
    }
    public function cpt()
    {
        include_once $this->plugin_path.'templates/cpt.php';
    }

    public function taxonomies() {
        include_once $this->plugin_path.'templates/taxonomies.php';
    }

    public function widgets() {
        include_once $this->plugin_path.'templates/widgets.php';
    }
}