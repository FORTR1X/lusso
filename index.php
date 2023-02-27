<!doctype html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "config/db.php";
include "config/config.php";
require_once "config/functions.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = array();
$routes["/lusso/"] = 'pages/main.php';

foreach ($subcategories as $subcategory) {
		$routes["/lusso/" . $subcategory["url"]] = 'pages/subcategory.php';
}

route_to_conroller($uri, $routes);