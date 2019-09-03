<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view ($view_name, $data = [])
{
    extract ($data);
    return require "app/views/{$view_name}.view.php";
}

function redirect ($path)
{
    header ("Location: /{$path}");
}