<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';

class DiscountHandler extends Handler
{
    public function __construct()
    {
    }

    public function index()
    {
        View::load('panel.discount.index');
    }
}