<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require "../function.php";

if (isset($_POST["submit"])) {
  // var_dump($_POST);
  // exit;

  // Cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan')
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
  <div id="edit-page">
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id">
      <label for="">Nama Menu</label>
      <input type="text" name="title" class="img-inp">
      <label for="">Description Menu</label>
      <textarea rows="7" name="description" id=""></textarea>
      <label for="img">Image Menu</label>
      <input type="file" name="img">
      <label for="">Category Menu</label>
      <input type="text" name="category" class="img-inp">
      <label for="">Price Menu</label>
      <input type="text" name="price" class="img-inp">
      <label for="">Stock Menu</label>
      <input type="text" name="stock" class="img-inp">
      <div class="">
        <button type="submit" name="submit">Add</button>
      </div>
    </form>
  </div>
</body>

</html>