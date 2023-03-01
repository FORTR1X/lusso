<?php

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

function route_to_conroller($uri, $routes) {
		if (array_key_exists($uri, $routes)) {
				include $routes[$uri];
		} else {
				abort();
		}
}

function abort($status_code = 404) {
		http_response_code($status_code);

		require "{$status_code}.php";

		die();
}

function get_subcategory_page($uri, $subcategories) {
	foreach ($subcategories as $subcat) {
		if (str_contains($uri, $subcat["url"])) {
			return $subcat;
		}
	}

	return array(
		"id" => -1,
		"title" => "not found",
		"url" => "not found",
		"category_id" => -1
	);
}

function get_category_by_subcategory($categories, $subcategory) {
	foreach($categories as $category) {
		if ($subcategory["category_id"] == $category["id"]) {
			return $category;
		}
	}

	return array(
		"id" => -1,
		"title" => "not found"
	);
}

function create_dir($dir) {
	if (is_dir($dir)) return;
	mkdir($dir, 0777);
	chmod($dir, 0777);
}