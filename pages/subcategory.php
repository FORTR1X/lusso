<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#000000"/>
    <meta
			name="description"
			content="Lusso - Студия Вашей кухни"
    />
    <meta http-equiv=Content-Security-Policy content="connect-src ws: wss: https: http:">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lusso - студия Вашей кухни</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include "config/db.php";
		include "config/config.php";
		require_once "config/functions.php";

		$path_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
		$subcategory = get_subcategory_page($path_uri, $subcategories);
		$category = get_category_by_subcategory($categories, $subcategory);
	?>

	<div class="wrapper">
		<!-- header -->
		<?php include "components/header.php"; ?>

		<main class="main">
			<div class="subcategory">
				<div class="subcategory__header">
					<div class="subcategory__header_rectangle">

					</div>
					<div class="subcategory__header_group">
						<div class="subcategory__header_breadcrums">
							<a href="/lusso/">Главная /</a>
							<?php echo "<span>{$category["title"]} /</span>"; ?>
							<?php echo "<span>{$subcategory["title"]}</span>"; ?>
						</div>

						<div class="subcategory__header_title">
							<?php
								echo "<h3>{$subcategory["title"]}</h3>";
							?>
						</div>
					</div>
				</div>

				<div class="subcategory__images">
					<div class="subcategory__images_container">
						<div class="subcategory__images_full_container" id="full_screen">
							<img class='subcategory__images_full_img' id="full_screen_img" src='' />
						</div>
						<?php
							$dir = "img/categories/{$subcategory["url"]}/";
							if (is_dir($dir)) {
								if ($dh = opendir($dir)) {
									while (($file = readdir($dh)) !== false) {
										if ($file != "." and $file != "..") {
												echo "<img class='subcategory__images_img' src='{$dir}{$file}'>";
										}
									}
									closedir($dh);
								}
							} else {
								create_dir($dir);
							}
						?>
					</div>
				</div>
			</div>
		</main>

		<!-- footer -->
		<?php include "components/footer.php"; ?>
	</div>

	<script src="js/script.js"></script>
</body>