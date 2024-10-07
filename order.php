<?php

require "function.php";

$id = $_GET['id'];

$menu = menu("SELECT * FROM menu WHERE id = $id")[0];


if (isset($_POST["submit"])) {
  // Cek apakah data berhasil ditambahkan dengan fungsi order
  $orderId = order($_POST); // Ambil ID dari order yang baru di-insert

  if ($orderId > 0) {
    echo "<script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'struk.php?id=$orderId';
            </script>";
  } else {
    echo "<script>
              alert('Gagal menambahkan data');
            </script>";
  }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>Document</title>
</head>

<body>
  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0">Item</h1>
                    </div>
                    <hr class="my-4">

                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="img/<?= $menu['img'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted"><?= $menu['category'] ?></h6>
                        <h6 class="mb-0"><?= $menu['title'] ?></h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>

                        <button class="btn" id="decrementBtn">-</button>
                        <div class="counter" id="counterValue">1</div>
                        <button class="btn" id="incrementBtn">+</button>

                        <input hidden type="text" value="<?= $menu['price'] ?>" id="hargaMenu">

                        <!-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button> -->
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 id="hargaTotal" class="mb-0">Rp. <?= $menu['price'] ?></h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>

                    <hr class="my-4">

                    <div class="pt-5">
                      <h6 class="mb-0"><a href="menuDetail.php?id=<?= $menu['id'] ?>" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-body-tertiary">
                  <form action="" method="post">
                    <div class="p-5">
                      <input hidden type="text" value="<?= $menu['id'] ?>" name="menuId">
                      <input hidden type="text" value="" id="quantityInput" name="quantiti">
                      <input hidden type="text" value="<?= $menu['price'] ?>" name="price">
                      <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                      <hr class="my-4">

                      <h5 class="text-uppercase mb-3">Shipping</h5>

                      <div class="mb-4 pb-2">
                        <select data-mdb-select-init name="tableId">
                          <option value="1">Table One</option>
                          <option value="2">Table Two</option>
                          <option value="3">Table Three</option>
                          <option value="4">Table Four</option>
                        </select>
                      </div>

                      <h5 class="text-uppercase mb-3">Name</h5>

                      <div class="mb-5">
                        <form data-mdb-input-init class="form-outline" method="post">
                          <input type="text" id="form3Examplea2" name="user" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Examplea2">Enter your Name</label>
                        </form>
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase">Total price</h5>
                        <h5 id="totalPrice">Rp. <?= $menu['price'] ?></h5>
                      </div>

                      <button type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-dark btn-block btn-lg" name="submit" data-mdb-ripple-color="dark">Buy</button>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <script>
    let counter = 1;

    // Ambil elemen untuk menampilkan nilai counter
    const counterDisplay = document.getElementById('counterValue');
    const quantityInput = document.getElementById('quantityInput'); // Ambil input hidden untuk kuantitas
    counterDisplay.textContent = 1;

    const hargaMenu = document.getElementById('hargaMenu').value
    const Total = document.getElementById('hargaTotal')
    const totalPrice = document.getElementById('totalPrice')


    // Fungsi untuk mengupdate nilai yang ditampilkan dan input hidden
    function updateCounter() {
      counterDisplay.textContent = counter;
      console.log(hargaMenu * counter)
      quantityInput.value = counter
      Total.textContent = 'Rp. ' + (hargaMenu * counter)
      totalPrice.textContent = 'Rp. ' + (hargaMenu * counter)
    }



    // Event listener untuk tombol Increment
    document.getElementById('incrementBtn').addEventListener('click', function () {
      counter++;
      updateCounter();
    });

    // Event listener untuk tombol Decrement
    document.getElementById('decrementBtn').addEventListener('click', function () {
      counter--;
      updateCounter();
    });

    // Menampilkan nilai awal
    updateCounter();
  </script>
</body>

</html>