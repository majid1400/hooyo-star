<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';


class DashboardHandler extends Handler
{
    public function __construct()
    {

    }
    public function index()
    {
        View::load('panel.dashboard.index',[
            "name" => "majid"
        ]);
    }
}
