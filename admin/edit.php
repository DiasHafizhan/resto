<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require "../function.php";


$id = $_GET['id'];

$menu = menu("SELECT * FROM menu WHERE id = $id")[0];

if (isset($_POST["edit"])) {

  if (ubah($_POST) > 0) {
    echo "<script>
            'Data berhasil diubah'
            document.location.href = 'adminPage.php'
          </script>";
  } else {
    echo "<script>
            'Data berhasil diubah'
            document.location.href = 'adminPage.php'
          </script>";

  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">

  <title>Document</title>
</head>

<body>
  <!-- Header start -->
  <!-- <div class="navbar">
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

  </div> -->
  <!-- Header end -->

  <div id="edit-page">
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $menu['id'] ?>">
      <label for="">Nama Menu</label>
      <input type="text" name="title" class="img-inp" value="<?= $menu['title'] ?>">
      <label for="">Description Menu</label>
      <textarea rows="7" name="description" id=""><?= $menu['description'] ?></textarea>
      <label for="">Image Menu</label>
      <input type="file" value="<?= $menu['img'] ?>" name="img">
      <label for="">Category Menu</label>
      <input type="text" name="category" class="img-inp" value="<?= $menu['category'] ?>">
      <label for="">Price Menu</label>
      <input type="text" name="price" class="img-inp" value="<?= $menu['price'] ?>">
      <label for="">Stock Menu</label>
      <input type="text" name="stock" class="img-inp" value="<?= $menu['stock'] ?>">
      <div class="">
        <button type="submit" name="edit">Submit</button>
      </div>
    </form>
  </div>


</body>

</html>