<?php
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

function get_array_from_sql_request($sql_request, $connect) {
  $response_array = array();
  $response = mysqli_query($connect, $sql_request);

  if ($response) {
    while ($row = mysqli_fetch_assoc($response)) {
      $response_array[] = $row;
    }
  }

  return $response_array;
}

mysqli_close($connect);
?>