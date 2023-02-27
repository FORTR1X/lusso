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