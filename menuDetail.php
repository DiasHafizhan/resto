<?php

require "function.php";

$id = $_GET['id'];

$menu = menu("SELECT * FROM menu WHERE id = $id")[0];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <!-- Header start -->
  <?php include "component/header.php" ?>
  <!-- Header end -->


  <!-- Menu Detail start -->
  <div id="detail">
    <div class="detail-container">
      <div class="detail-img">
        <img src="img/<?= $menu['img'] ?>" alt="">
      </div>

      <div class="detail-content">
        <h2><?= $menu['title'] ?></h2>
        <p>Stock <span><?= $menu['stock'] ?></span> | <span class="detail-category"><?= $menu['category'] ?></span></p>


        <h3 class="detail-price">Rp. <?= $menu['price'] ?></h3>

        <p class="detail-desc">
          <?= $menu['description'] ?>
        </p>

        <a href="order.php?id=<?= $menu['id'] ?>">
          Buy
        </a>
      </div>
    </div>
  </div>
  <!-- Menu Detail end -->

  <!-- Footer start -->
  <?php include "component/footer.php" ?>
  <!-- Footer end -->

</body>

</html>