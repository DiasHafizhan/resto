<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require "../function.php";

$menu = menu("SELECT * FROM menu");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
  <!-- Header start -->
  <div class="navbar">
    <div class="logo">
      <a href="">
        <h1>Dapur <span>Bunda</span> Bahagia</h1>
      </a>
    </div>

    <div class="navbar-btn">
      <a href="logout.php" class="btn-primary">
        Logout
      </a>
    </div>


    <a href="" class="navbar-icon">
      <i class='bx bx-menu'></i>
    </a>

  </div>
  <!-- Header end -->


  <div class="add-side">
    <ul>
      <li>
        <a href="adminPage.php">List Menu</a>
      </li>
      <li>
        <a href="report.php">Financial Statements</a>
      </li>
    </ul>
  </div>

  <div class="add-menu">
    <div class="menu-list-wrapper">
      <a href="addMenu.php" class="add-btn">Add Menu</a>
      <h1>Appetizer</h1>
      <div class="menu-container">
        <?php foreach ($menu as $row): ?>
          <?php if ($row['category'] === 'appetizer'): ?>
            <div class="menu-card">
              <div class="menu-img">
                <img src="../img/<?php echo $row['img'] ?>" alt="">
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
                <div class="">
                  <a href="edit.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bxs-edit'></i>
                  </a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bx-trash'></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="menu-list-wrapper">
      <h1>Mennu utama</h1>
      <div class="menu-container">
        <?php foreach ($menu as $row): ?>
          <?php if ($row['category'] === 'menu utama'): ?>
            <div class="menu-card">
              <div class="menu-img">
                <img src="../img/<?php echo $row['img'] ?>" alt="">
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
                <div class="">
                  <a href="edit.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bxs-edit'></i>
                  </a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bx-trash'></i>
                  </a>
                </div>
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
                <img src="../img/<?php echo $row['img'] ?>" alt="">
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
                <div class="">
                  <a href="edit.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bxs-edit'></i>
                  </a>
                  <a href="delete.php?id=<?php echo $row['id'] ?>">
                    <i class='bx bx-trash'></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>

</html>