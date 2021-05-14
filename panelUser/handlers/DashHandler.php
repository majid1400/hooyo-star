<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';


class DashHandler extends Handler
{
    public function __construct()
    {

    }

    public function index()
    {
        $params = [
            "childs" => $this->get_question()
        ];
        View::load('panel.dashboard.index', $params);
    }

    public function get_question()
    {
        global $wpdb;
        $current_id = get_current_user_id();

        $user_number_question = $wpdb->get_results("
                SELECT `child_name`
				FROM {$wpdb->prefix}data_form_hooyo_star
				WHERE user_id={$current_id}");
        return $user_number_question;

    }
}
