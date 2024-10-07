<?php
require "function.php";


$menu = menu("SELECT * FROM menu");



?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
  <!-- Header start -->
  <?php include "component/header.php" ?>
  <!-- Header end -->

  <main id="menu">
    <article class="menu-banner">
      <img src="img/menu.png" alt="">
      <div class="menu-title">
        <h1>MENU</h1>
      </div>
    </article>

    <article>
      <div class="menu-service">
        <p>TYPE OF SERVICES AVAILABLE</p>
        <ul>
          <li>Pick-up</li>
          <li>Delivery</li>
          <li>Coffee Catering</li>
        </ul>
      </div>
    </article>

    <div class="menu-main">
      <aside class="menu-side">
        <ul class="menu-list-side">
          <li>
            <a href="">Appetizer</a>
          </li>
          <li>
            <a href="">Menu Utama</a>
          </li>
          <li>
            <a href="">Minuman</a>
        </ul>
      </aside>

      <article class="menu-list">
        <div class="menu-list-wrapper">
          <h1>Appetizer</h1>
          <div class="menu-container">
            <?php foreach ($menu as $row): ?>
              <?php if ($row['category'] === 'appetizer'): ?>
                <div class="menu-card">
                  <div class="menu-img">
                    <img src="img/<?php echo $row['img'] ?>" alt="">
                  </div>
                  <div class="menu-content">
                    <h3>
                      <a href="menuDetail.php?id=<?php echo $row['id'] ?>">
                        <?php echo $row['title'] ?>
                      </a>
                    </h3>
                    <p class="menu-price">Rp. <?php echo $row['price'] ?></p>
                    <p class="menu-desc">
                      <?php echo $row['description'] ?>
                    </p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="menu-list-wrapper">
          <h1>Menu Utama</h1>
          <div class="menu-container">
            <?php foreach ($menu as $row): ?>
              <?php if ($row['category'] === "menu utama"): ?>
                <div class="menu-card">
                  <div class="menu-img">
                    <img src="img/<?php echo $row['img']; ?>" alt="">
                  </div>
                  <div class="menu-content">
                    <h3>
                      <a href="menuDetail.php?id=<?php echo $row['id'] ?>">
                        <?php echo $row['title']; ?>
                      </a>
                    </h3>
                    <p class="menu-price">Rp. <?php echo $row['price']; ?></p>
                    <p class="menu-desc" id="menu-desc">
                      <?php echo $row['description']; ?>
                    </p>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="menu-list-wrapper">
          <h1>Minuman</h1>
          <div class="menu-container">
            <?php foreach ($menu as $row): ?>
              <?php if ($row['category'] === 'minuman'): ?>
                <div class="menu-card">
                  <div class="menu-img">
                    <img src="img/<?php echo $row['img'] ?>" alt="">
                  </div>
                  <div class="menu-content">
                    <h3>
                      <a href="menuDetail.php?id=<?php echo $row['id'] ?>">
                        <?php echo $row['title'] ?>
                      </a>
                    </h3>
                    <p class="menu-price">Rp. <?php echo $row['price'] ?></p>
                    <p class="menu-desc">
                      <?php echo $row['description'] ?>
                    </p>
                  </div>
                </div>
              <?php endif ?>
            <?php endforeach ?>
          </div>
        </div>
      </article>
    </div>
  </main>


  <!-- Footer start -->
  <?php include "component/footer.php" ?>
  <!-- Footer end -->



  <script src="js/script.js"></script>
</body>

</html>