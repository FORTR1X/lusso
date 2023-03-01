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
		include "config/db.php";
		include "config/config.php";
	?>
  <div class="wrapper">
		<!-- header -->
		<?php include "components/header.php"; ?>

		<main class="main">
			<?php echo "<a name='". $nav_categories[0]["page_url"] ."'></a>" ?>
			<a name="main"></a>
			<div class="swiper__content">
				<!-- Slider main container -->
				<div class="swiper">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php
							$slids_path = "img/slider";
							$files = array_diff(scandir($slids_path), array('..', '.'));
							foreach ($files as $slide) {
                                $img_path = "img/slider" . "/" . $slide;
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
					<span class="navbar__info_text _anim-item" id="id1">Наш адрес: <span><?php echo $config["address"]?></span></span>
					<span class="navbar__info_text _anim-item" id="id2">Контакты: <span><?php echo $config["phone_1"]?>;</span> <span><?php echo $config["phone_2"] ?></span></span>
					<span class="navbar__info_text _anim-item" id="id3">Ждём Вас: <span>Пн-Вс: 10:00-19:00</span></span>
				</div>

				<div class="navbar__social">
					<img src="svg/vk.svg" alt="vk">
					<img src="svg/telegram.svg" alt="telegram">
					<img src="svg/whatsapp.svg" alt="whats'app">
				</div>

				<span class="navbar__offerta _anim-item">Не является публичной офертой</span>
			</div>

			<div class="categories">
				<?php echo "<a name='". $nav_categories[1]["page_url"] ."'></a>" ?>
				<div class="categories__container _anim-item _anim-no-hide">
					<div class="categories__offer">
						<div class="categories__offer_container">
							<h3>Мы предлагаем</h3>
							<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
						</div>
					</div>

					<div class="categories__list _anim-item _anim-no-hide">
						<?php
							foreach ($categories as $category) {
								$subcat_count = count($subcategories_by_category[$category["id"] - 1]);
								echo "<div class='categories__category'>";
								echo "<img class='categories__category_logo' src='svg/category/". $category["id"] .".svg' alt='". $category["title"] ."' />";
								echo "<div class='categories__subcategories' id='id". $subcat_count ."'>";
									foreach ($subcategories_by_category[$category["id"] - 1] as $subcat) {
										echo "<div class='categories__subcategory'>";
										echo "<a href='". $subcat["url"] ."'>". $subcat["title"] ."</a>";
										echo "</div>";
									}
								echo "</div>";
								echo "<span class='categories__category_title'>". $category["title"] ."</span>";
								echo "</div>";
							}
						?>
					</div>
				</div>
			</div>

			<div class="presentation">
				<?php echo "<a name='". $nav_categories[2]["page_url"] ."'></a>" ?>
				<div class="presentation__logo">
					<span>Lusso</span>
				</div>
				<div class="presentation__container">
					<div class="presentation__work_examples">
						<div class="presentation__work_example" id="id1">
							<img src="img/presentation/1.jpg" alt="1" id="id1"/>
						</div>

						<div class="presentation__work_example" id="id2">
							<div class="presentation__work_example" id="id3">
								<img src="img/presentation/2.jpg" alt="2" id="id2">
								<img src="img/presentation/3.jpg" alt="3" id="id3">
							</div>

							<div class="presentation__work_example" id="id4">
								<img src="img/presentation/4.jpg" alt="4" id="id4">
								<img src="img/presentation/5.jpg" alt="5" id="id5">
							</div>
						</div>
					</div>

					<div class="partners">
						<img src="svg/partners/ikea.svg" alt="ikea" />
						<img src="svg/partners/ashley.svg" alt="ashley" />
						<img src="svg/partners/RH.svg" alt="RH" />
						<img src="svg/partners/Karatell.svg" alt="Karatell" />
					</div>
				</div>
			</div>

			<div class="contacts">
				<?php echo "<a name='". $nav_categories[3]["page_url"] ."'></a>" ?>
				<h4 class="contacts__header">Свяжитесь с нами</h4>

				<div class="contacts__container_wrapper">
					<div class="contacts__container">
						<div class="contacts__links _anim-item _anim-no-hide">
							<div class="contacts__contact">
								<div class="contacts__contact_header_logo">
									<img class="contacts__contact_logo" src="svg/contact/address.svg" alt="Address">
									<h3>Адрес</h3>
								</div>
								<?php echo "<span> ". $config["address"] ."</span>" ?>
							</div>

							<div class="contacts__contact">
								<div class="contacts__contact_header_logo">
									<img class="contacts__contact_logo" src="svg/contact/email.svg" alt="Email">
									<h3>Электронная почта</h3>
								</div>
								<?php echo "<span> ". $config["email"] ."</span>" ?>
							</div>

							<div class="contacts__contact">
								<div class="contacts__contact_header_logo">
									<img class="contacts__contact_logo" src="svg/contact/call.svg" alt="call">
									<h3>Позвоните нам</h3>
								</div>
								<div class="contacts__phones">
									<?php
										echo "<p> ". $config["phone_1"] ."</p>";
										echo "<p> ". $config["phone_2"] ."</p>";
									?>
								</div>
							</div>

							<div class="contacts__contact">
								<div class="contacts__contact_header_logo">
									<img class="contacts__contact_logo" src="svg/contact/social.svg" alt="social">
									<h3>Мы в сети</h3>
								</div>
								<div class="contacts__social_container">
									<img src="svg/contact/vk.svg" alt="vk">
									<img src="svg/contact/telegram.svg" alt="telegram">
									<img src="svg/contact/whatsapp.svg" alt="whatsapp">
								</div>
							</div>
						</div>

						<div id="map" class="contacts__map _anim-item _anim-no-hide"></div>
					</div>
				</div>
			</div>
		</main>

		<!-- footer -->
		<?php include "components/footer.php"; ?>
  </div>

	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=f13f9a47-bb0f-4986-8a6f-4743a3da41f1&lang=ru_RU"></script>
	<script src="js/swiper.js"></script>
	<script src="js/script.js"></script>
	<script src="js/ymap.js"></script>
</body>
</html>