<!doctype html>
<?php
	include "index.php";
?>
<footer class="footer">
  <div class="footer__info">
    <div class="footer__logo">
      <img src="img/logo.png" alt="Logo">
    </div>

    <ul class="footer__list" id="id1">
      <h3>Контакты</h3>
      <li>Наш адрес: <span><?php echo $config["address"] ?></span></li>
      <li>Телефон: <span><?php echo $config["phone_1"] . "; " . $config["phone_2"] ?></span></li>
      <li>Ждем Вас: <span>Пн-Вс: 10:00-19:00</span></li>
      <li class="footer__contacts_social">
        <a href="#"><img src="svg/contact/vk.svg" alt="vk"></a>
        <a href="#"><img src="svg/contact/telegram.svg" alt="telegram"></a>
        <a href="#"><img src="svg/contact/whatsapp.svg" alt="whatsapp"></a>
      </li>
    </ul>

    <ul class="footer__list" id="id2">
      <h3>Разделы</h3>
      <?php
        foreach ($categories as $category) {
          echo "<li>". $category["title"] ."</li>";
        }
      ?>
    </ul>

    <div class="footer__about_us">
      <p>Студия кухни Lusso работает на рынке Севастополя с 2004 года.</p>
      <p>Интернет-магазин мебели «Lusso» © 2004 - 2023 Все права защищены</p>
    </div>
  </div>
</footer>