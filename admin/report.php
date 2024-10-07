<?php 
require "../function.php";


function orders()
{
  global $connnect; // Perbaiki nama variabel koneksi jika memang benar '$connect'

  // Query SQL menggunakan kutip ganda untuk variabel di dalamnya
  $query = "SELECT 
    orders.id AS order_id,
    orders.nama AS customer_name,
    orders.total AS total_amount,
    orders.id_table AS id_table,
    orders.quantiti AS quantiti,
    orders.orderDate AS order_date,
    menu.title AS menu_title,
    menu.price AS menu_price,
    menu.category AS menu_category
  FROM orders
  LEFT JOIN menu
  ON orders.id_menu = menu.id"; // Jangan lupa untuk melindungi $id dari SQL Injection (gunakan prepared statement)

  // Jalankan query
  $result = mysqli_query($connnect, $query);

  // Periksa apakah ada hasil
  if (!$result) {
    die('Query Error: ' . mysqli_error($connnect)); // Menampilkan error jika query gagal
  }

  // Ambil hasil dalam bentuk array asosiatif
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

$orders = orders();



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


  <div id="#report">
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
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
          <thead>
            <tr>
              <th>Table</th>
              <th>Name</th>
              <th>title</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $row) : ?>
            <tr>
              <td><?= $row['id_table'] ?></td>
              <td><?= $row['customer_name'] ?></td>
              <td><?= $row['menu_title'] ?></td>
              <td><?= $row['quantiti'] ?></td>
              <td><?= $row['total_amount'] ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>






  </div>

</body>

</html>