<?php

class View
{
    public static function load($view, $data=[], $layout = 'default')
    {
        $layout_path = HSP_VIEWS.DIRECTORY_SEPARATOR.'layouts/';
        $layout_file_path = $layout_path.$layout.'.php';

        if (is_readable($layout_file_path) and file_exists($layout_file_path)) {
            extract($data);
            include $layout_file_path;
        }
        
    }
}
