<?php
require "vendor/autoload.php";

use App\Controller;

$uri = explode("/", $_SERVER['REQUEST_URI']);
array_shift($uri);

$method = $uri[0] !== "" ? $uri[0] : "home";

$id = $uri[1] ?? null;

$controller = new Controller();

$result = $controller->$method($id);

ob_start();
include $result["view"];
$page = ob_get_contents();

ob_end_clean();

include "./view/layout.php";