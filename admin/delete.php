<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}


require "../function.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  // Menangani kasus di mana 'id' tidak ditemukan
  echo "<script>
          alert('ID tidak ditemukan!')
          document.location.href = 'adminPage.php'
        </script>";
  exit;
}

if (hapus($id) > 0) {
  echo "<script>
          alert('Data berhasil terhapus')
          document.location.href = adminPage.php
        </script>";
} else {
  echo "<scrpit>
          alert('Data gagal terhapus')
        </scrpit>";
}



?>