<!doctype html>
<?php
	include "config/db.php";
?>
<header class="header _anim-item">
  <div class="navbar">
    <a href="/lusso/">
      <img class="navbar__logo" src="img/logo.png" alt="LOGO">
    </a>

    <div class="navbar__category_container">
      <div onclick="onClickBurgerMenu()" class="navbar__burger_menu">
        <div class="navbar__burger_menu_line"></div>
      </div>

      <ul class="navbar__ul_category">
        <?php
          foreach ($nav_categories as $cat) {
            echo "<li class='navbar__category'>";
            echo "<a href='/lusso/#". $cat["page_url"] ."'>". $cat["title"]. "</a>";
            echo "</li>";
          }
        ?>
      </ul>
    </div>

    <img src="svg/search.svg" alt="search" class="navbar__search">
  </div>
</header>