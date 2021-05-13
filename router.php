<?php

class Router
{
    public function __construct()
    {
        add_action('init', [$this, 'handle_routes']);
    }

    public function handle_routes()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $this->dispatch_request($request_uri);
    }

    private function dispatch_request($request_uri)
    {
        if (!strpos($request_uri, 'dashboard')) {
            return;
        }
        $handler = $this->parse_uri($request_uri);
        $handler_name = $this->format_handler_name($handler);
        if (!$this->is_handler_valid($handler_name)) {
            throw new Exception('request handler is not valid');
        }
        $handler_path = $this->get_handler_file($handler_name);

        include_once $handler_path;
        $hadnlerInstance = new $handler_name;
        $hadnlerInstance->index();
        exit;
    }

    private function parse_uri($uri)
    {
        return end(explode('/', strtok($uri, '?')));
    }

    private function format_handler_name($handler)
    {
        return ucfirst($handler) . 'Handler';
    }

    private function get_handler_file($handler_name)
    {
        return HSP_DIR . 'panelUser' . DIRECTORY_SEPARATOR . 'handlers' . DIRECTORY_SEPARATOR . $handler_name . '.php';
    }

    private function is_handler_valid($handler_name)
    {
        $handler_path = $this->get_handler_file($handler_name);
        return is_readable($handler_path) && file_exists($handler_path);
    }
}
