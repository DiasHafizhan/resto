<?php
session_start();

// Cek apakah sudah login
if (isset($_SESSION["login"])) {
  header("Location: adminPage.php");
  exit;
}

// Pastikan koneksi database berhasil
require "../function.php";

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Perbaiki penamaan variabel koneksi
  $result = mysqli_query($connnect, "SELECT * FROM admin WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {
    // Cek password
    $row = mysqli_fetch_assoc($result);
    if ($row["password"]) {
      // Set session
      $_SESSION["login"] = true;
      header("Location: adminPage.php");
      exit;
    }
  }

  // Menangani error jika login gagal
  $error = true; // Anda dapat menampilkan pesan error ini pada form login
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style/login.css">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form action="" method="post">
        <h1>Login</h1>
        <span>or use your account</span>
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <button type="submit" name="login">Login</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>Hello, Admin!</h1>
          <p>Enter your personal details and start journey with us</p>
        </div>
      </div>
    </div>
  </div>


</body>

</html>