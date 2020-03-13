<?php

define('APP_DIR', __DIR__);
require_once('vendor/autoload.php');

//die(print_r($_SERVER));

$app = new \App\App(new \App\Http\Request());
$app->run();


