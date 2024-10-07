<?php

require "function.php";

$id = $_GET['id']; // Pastikan $id diambil dengan benar

function struk($id)
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
  ON orders.id_menu = menu.id
  WHERE orders.id = $id"; // Jangan lupa untuk melindungi $id dari SQL Injection (gunakan prepared statement)

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

// Panggil fungsi struk dan berikan $id sebagai argumen
$struk = struk($id)[0];

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>A simple, clean, and responsive HTML invoice template</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .invoice-box.rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
      text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
      text-align: left;
    }
  </style>
</head>

<body>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="2">
          <table>
            <tr>
              <td class="title">
                <h6>Dapur Bunda Bahagia</h6>
              </td>

              <td>
                Invoice #: <?= $struk['order_id'] ?><br />
                Created: <?= $struk['order_date'] ?><br />
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="2">
          <table>
            <tr>
              <td>
                Sparksuite, Inc.<br />
                12345 Sunny Road<br />
                Sunnyville, CA 12345
              </td>

              <td>
                Acme Corp.<br />
                Meja <?= $struk['id_table'] ?><br />
                <?= $struk['customer_name'] ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="heading">
        <td>Payment Method</td>

        <td>Check #</td>
      </tr>

      <tr class="details">
        <td>Check</td>

        <td>1000</td>
      </tr>

      <tr class="heading">
        <td>Item</td>

        <td>Price</td>
      </tr>


      <tr class="item">
        <td><?= $struk['menu_title'] ?> (<?= $struk['quantiti'] ?>)</td>

        <td>Rp. <?= $struk['menu_price'] ?></td>
      </tr>

      <tr class="total">
        <td></td>

        <td>Total: <?= $struk['total_amount'] ?></td>
      </tr>
    </table>
    <h6 class="mb-0"><a href="index.php?>" class="text-body"><i
          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
  </div>
</body>

</html>