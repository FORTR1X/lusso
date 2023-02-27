<?php
require_once "functions.php";
$servername = "localhost";
$username = "admin";
$password = "6JGaj44B!1FAO9Rz";
$db_name = "lusso";

// Create connection
$connect = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$nav_categories = get_array_from_sql_request("SELECT * FROM navigation_category", $connect);
$categories = get_array_from_sql_request("SELECT * FROM category", $connect);
$subcategories = get_array_from_sql_request("SELECT * FROM subcategory", $connect);
$subcategories_by_category = array();
foreach ($categories as $category) {
  $subcat = get_array_from_sql_request("SELECT * FROM subcategory WHERE category_id = ". $category["id"] .";", $connect);
  $subcategories_by_category[] = $subcat;
}

mysqli_close($connect);