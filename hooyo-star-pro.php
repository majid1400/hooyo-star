<?php
/*
Plugin Name: هویو استار پرو
Plugin URI: https://www.tarminet.com
Description: پیشنهاد اسباب بازی براساس تست گاردنر جدید
Author:  مجید بهنام فرد
Author URI: https://www.tarminet.com
Text Domain: hooyo_star_pro
Domain Path: /languages/
Version: 1.0.0
*/

class HooyoStarPro
{
    public function __construct()
    {
        $this->define_constants();
        $this->init();
    }

    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        $this->start_router();
        $this->admin();
    }

    public function define_constants()
    {
        define('HSP_DIR', plugin_dir_path(__FILE__));
        define('HSP_URL', plugin_dir_url(__FILE__));
        define('HSP_ASSET_URL', HSP_URL.'/assets/');
        define('HSP_VIEWS', HSP_DIR.DIRECTORY_SEPARATOR.'views/');
        define('HSP_OPTION', HSP_DIR.DIRECTORY_SEPARATOR.'options-panel/');
    }

    public function activation()
    {
    }

    public function deactivation()
    {
    }

    private function start_router()
    {
        include "router.php";
        new Router;
    }

    private function admin()
    {
        if (is_admin()) {
            include HSP_DIR . "options-panel" . DIRECTORY_SEPARATOR .'index.php';
        }else{
	        include HSP_OPTION.'user/shortcode/main.php';
	        include HSP_OPTION.'user/shortcode/chart.php';
        }
    }
}

new HooyoStarPro;
