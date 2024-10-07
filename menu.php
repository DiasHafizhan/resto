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
  <header class="navbar">
    <nav>
      <div class="logo">
        <a href="">
          <h1>Dapur <span>Bunda</span> Bahagia</h1>
        </a>
      </div>

      <ul class="menu">
        <li>
          <a href="">About</a>
        </li>
        <li>
          <a href="">Menu</a>
        </li>
      </ul>


    </nav>
    </div>


    <a href="" class="navbar-icon">
      <i class='bx bx-menu'></i>
    </a>

  </header>

  <!-- List mobile start -->
  <div class="wrapper">
    <ul class="">
      <li class="pb-[15px]">
        <a href="">About</a>
      </li>
      <li class="pb-[15px]">
        <a href="">Menu</a>
    </ul>

    <div class="wrapper-btn">
      <a href="" class="btn-primary">
        Login
      </a>
      <a href="" class="btn-secondary">
        Sign Up
      </a>
    </div>
  </div>
  <!-- List mobile end -->
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


  <footer>
    <article class="footer-container">
      <div class="logo">
        <a href="">
          <h1>Dapur <span>Bunda</span> Bahagia</h1>
        </a>
      </div>
      <div class="footer-map">
        <span class="footer-icon">
          <i class='bx bxs-map'></i>
        </span>
        <span class="footer-desc">
          <span class="footer-name">
            Gedung Graha Ganesha
          </span>
          <span class="">
            Lantai 1 Suite 120 & 130 Jl. Hayam Wuruk No.28, Kelurahan Kebon Klapa Kecamatan Gambir, Jakarta Pusat, DKI
            Jakarta
          </span>
        </span>
      </div>
      <div class="footer-contact">
        <p class="footer-title">
          Consumer Complaints Service Contact Information
        </p>
        <p class="footer-desc">
          Directorate General of Consumer Protection and Trade Compliance, Ministry of Trade of the Republic of
          Indonesia
        </p>
        <p class="footer-wa">
          WhatsApp Ditjen PKTN: 0853-1111-1010
        </p>
      </div>
    </article>
    <div class="footer-social">
      <p>
        &copy; 2023 Dapur Bunda Bahagia, All Right Reserved
      </p>
      <div class="footer-icon-bx">
        <div class="footer-bx"><i class='bx bxl-youtube'></i></div>
        <div class="footer-bx"><i class='bx bxl-twitter'></i></div>
        <div class="footer-bx"><i class='bx bxl-instagram-alt'></i></div>
        <div class="footer-bx"><i class='bx bxl-linkedin'></i></div>
      </div>
    </div>
  </footer>



  <script src="js/script.js"></script>
</body>

</html>