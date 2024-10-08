<?php

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
</head>

<body>
  <?php include '../component/header.php' ?>
  <?php include '../component/sidebar.php' ?>



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