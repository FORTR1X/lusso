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

    <!-- Swiper JS css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
</head>
<body>
    <?php
        include "./config/config.php";
        include "./config/db.php";
    ?>
    <div class="wrapper">
			<header class="header">
				<div class="navbar">
					<a href="#">
						<img class="navbar__logo" src="img/logo.png" alt="LOGO">
					</a>

					<div class="navbar__category_container">
						<ul class="navbar__ul_category">
							<?php
								foreach ($nav_categories as $category) {
									echo "<li class='navbar__category'>". $category["title"] ."</li>";
								}
							?>
						</ul>
					</div>

					<img src="svg/search.svg" alt="search" class="navbar__search">
				</div>
			</header>
	    
			<main class="main">
				<div class="swiper__content">
					<!-- Slider main container -->
					<div class="swiper">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<?php
								$slids_path = __DIR__ . "\img\slider";
								$files = array_diff(scandir($slids_path), array('..', '.'));
								foreach ($files as $slide) {
									$img_path = "\img\slider" . "\\" . $slide; 
									echo '<div class="swiper-slide">';
									echo "<img src=". $img_path ." />";
									echo '</div>';
								}
							?>
						</div>
						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>

						<!-- If we need navigation buttons -->
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>

				<div class="navbar__bottom">
					<div class="navbar__info">
						<span class="navbar__info_text">Наш адрес: <span><?php echo $config["address"]?></span></span>
						<span class="navbar__info_text">Контакты: <span><?php echo $config["phone_1"]?>;</span> <span><?php echo $config["phone_2"] ?></span></span>
						<span class="navbar__info_text"></span>
						<span class="navbar__info_text">Ждём Вас: <span>Пн-Вс: 10:00-19:00</span></span>
					</div>

					<div class="navbar__social">
						<img src="svg/vk.svg" alt="vk">
						<img src="svg/telegram.svg" alt="telegram">
						<img src="svg/whatsapp.svg" alt="whats'app">
					</div>

					<span class="navbar__offerta">Не является публичной офертой</span>
				</div>

				<div class="categories">
					<div class="categories__container">
						<div class="categories__offer">
							<div class="categories__offer_container">
								<h3>Мы предлагаем</h3>
								<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>			
							</div>
						</div>

						<div class="categories__list">
							<?php 
								foreach ($categories as $category) {
									echo "<div class='categories__category'>";
									echo "<img src='/svg/category/". $category["id"] .".svg' alt='". $category["title"] ."' />";
									echo "<span>". $category["title"] ."</span>";
									echo "</div>";
								}
							?>
						</div>
					</div>
				</div>
			</main>
			
			<footer class="footer">
				Footerr
			</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/swiper.js"></script>
</body>
</html>
