<?php
$localhost = "localhost";
$root = "root";
$password = "hafizhan14";
$db = "resto";


$connnect = mysqli_connect($localhost, $root, $password, $db);


function menu($query)
{
  global $connnect;

  $result = mysqli_query($connnect, $query);
  $rows = [];
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }
  return $rows;
}
;

function tambah($post)
{
  global $connnect;

  // ambil data dari setiap elemen dalam form
  $title = htmlspecialchars($post["title"]);
  $description = htmlspecialchars($post["description"]);
  $category = htmlspecialchars($post["category"]);
  $price = htmlspecialchars($post["price"]);
  $stock = htmlspecialchars($post["stock"]);
  $img = upload();

  // upload gambar
  if (!$img) {
    return false;
  }


  // mengambil query
  $query = "INSERT INTO menu (title, description, category, price, stock, img) VALUES ('$title', '$description', '$category', $price, $stock, '$img')";

  mysqli_query($connnect, $query);

  return mysqli_affected_rows($connnect);
}

function upload()
{
  $namaFile = $_FILES["img"]["name"];
  $ukuranFile = $_FILES["img"]["size"];
  $error = $_FILES["img"]["error"];
  $tmpName = $_FILES["img"]["tmp_name"];

  // cek apakah tidak ada gambar yang diupload, 4 menandakan false atau null dalam PHP
  if ($error === 4) {
    echo "<script>
        alert('Anda belum mengupload gambar')
      </script>";
    return false;
  }

  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  $fileExtension = pathinfo($namaFile, PATHINFO_EXTENSION);
  if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
    echo "<script>
        alert('Anda Salah memasukan File')
      </script>";
    return false;
  }

  // cek jika ukuranFile gambar terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
          alert('Ukuran File Terlalu Besar')
        </script>";
    return false;
  }
  ;

  move_uploaded_file($tmpName, '../img/' . $namaFile);
  return $namaFile;

}

function ubah($data)
{
  global $connnect; // Pastikan koneksi global digunakan

  $id = $data['id'];
  $title = $data['title'];
  $description = $data['description'];
  $img = $data['img'];
  $category = $data['category'];
  $stock = $data['stock'];
  $price = $data['price'];

  $query = "UPDATE menu SET 
              title = '$title',
              description = '$description',
              img = '$img',
              category = '$category',
              stock = $stock,
              price = $price
            WHERE id = $id";

  mysqli_query($connnect, $query);
  return mysqli_affected_rows($connnect);
}

function hapus($id)
{
  global $connnect;

  mysqli_query($connnect, "DELETE FROM menu WHERE id = $id");
  return mysqli_affected_rows($connnect);
}

function order($post) {
  global $connnect;

  // Ambil data dari form
  $nama = htmlspecialchars($post['user']);
  $menuId = htmlspecialchars($post["menuId"]);
  $qnt = htmlspecialchars($post['quantiti']);
  $price = htmlspecialchars($post["price"]);
  $table = htmlspecialchars($post["tableId"]);

  // Hitung total harga
  $total = (int)$qnt * (int)$price;

  // Query insert data ke tabel orders
  $query = "INSERT INTO orders (nama, id_menu, id_table, total, quantiti) 
            VALUES ('$nama', '$menuId', '$table', '$total', $qnt)";

  // Eksekusi query
  mysqli_query($connnect, $query);

  // Cek apakah ada baris yang terpengaruh dan ambil ID insert
  if (mysqli_affected_rows($connnect) > 0) {
      return mysqli_insert_id($connnect); // Kembalikan ID order yang baru
  } else {
      return 0; // Jika gagal, kembalikan 0
  }
}





?>