<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';


class OrderHandler extends Handler
{
    public function __construct()
    {
    }

    public function index()
    {
        View::load('panel.order.index');
    }
}