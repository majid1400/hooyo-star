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

    public function init(){
        register_activation_hook( __FILE__, [$this, 'activation'] );
        register_deactivation_hook( __FILE__, [$this, 'deactivation'] );
        
    }

    public function define_constants()
    {
        define('HSP_DIR', plugin_dir_path(__FILE__));
        define('HSP_URL', plugin_dir_url(__FILE__));
    }

    public function activation()
    {
    }

    public function deactivation()
    {
    }
}

new HooyoStarPro;