<?php

include "Handler.php";
include HSP_DIR . 'view.class.php';

class ResultStarHandler extends Handler
{
    public function __construct()
    {
    }
    public function index()
    {
        View::load('panel/result/index.php');
    }
}
