<?php
add_action('admin_menu', 'hsd_add_options_panel');
add_action('admin_enqueue_scripts', 'hooyostar_option_panel_assets');
add_action('hsp_save_settings', 'hsp_save_settings_handle');

function hooyostar_option_panel_assets()
{
    wp_register_style('option-panel-style', HSP_URL . 'options-panel/assets/css/options_panel.css');
    wp_register_style('persianDatepicker-default', HSP_URL . 'options-panel/assets/css/persianDatepicker-default.css');
    wp_register_script('option-panel-script', HSP_URL . 'options-panel/assets/js/options_panel.js');
    wp_register_script('persianDatepicker', HSP_URL . 'options-panel/assets/js/persianDatepicker.min.js', ['jquery']);

    wp_enqueue_style('option-panel-style');
    wp_enqueue_style('persianDatepicker-default');
    wp_enqueue_script('option-panel-script');
    wp_enqueue_script('persianDatepicker');
}

function hsd_add_options_panel()
{
    add_menu_page(
        'هویو استار پرو',
        'هویو استار پرو',
        'manage_options',
        'hsp_options_panel',
        'hooyo_star_show_options_panel',
        '',
        2
    );

    add_submenu_page(
        'hsp_options_panel',
        'تنظیمات هویو استار پرو',
        'تنظیمات هویو استار پرو',
        'manage_options',
        'hsp_options_panel_settings',
        'hooyo_star_show_options_settings',
        2
    );
}

function hooyo_star_show_options_panel()
{
    include_once 'tools/jdf.php';
    include_once 'tools/VIPHandler.php';
    if (isset($_GET['statistic_ref_id']) && !empty($_GET['statistic_ref_id'])) {
        include HSP_OPTION . 'woocamerceApi/APIWOO.php';
        include_once 'tools/DBHandler.php';
        include 'views/users/indexUsers.php';
    } else {
        include 'models/dashboard/DBDashboard.php';
        include 'views/dashboard/dashboard.php';
    }

}


function hooyo_star_show_options_settings()
{
    if (isset($_POST['save_settings'])) {
        do_action('hsp_save_settings');
    }
    $hsp_settings = get_option('hsp_settings', []);
    $options = $hsp_settings['api'];
    include HSP_OPTION . 'settings/index.php';
}

function hsp_save_settings_handle()
{
    $hsp_settings = get_option('hsp_settings', []);
    $hsp_settings['api'] = [
        'consumer_key' => sanitize_text_field($_POST['consumer_key']),
        'consumer_password' => sanitize_text_field($_POST['consumer_password']),
    ];
    update_option('hsp_settings', $hsp_settings);
}
