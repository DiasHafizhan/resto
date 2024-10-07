






// Inisialisasi nilai counter
// Inisialisasi nilai counter
let counter = 1;

// Ambil elemen untuk menampilkan nilai counter
const counterDisplay = document.getElementById('counterValue');
const quantityInput = document.getElementById('quantityInput'); // Ambil input hidden untuk kuantitas
counterDisplay.textContent = 1;

const hargaMenu = document.getElementById('hargaMenu').value
const Total = document.getElementById('hargaTotal')


// Fungsi untuk mengupdate nilai yang ditampilkan dan input hidden
function updateCounter() {
  counterDisplay.textContent = counter;
  quantityInput.value = counter; // Update input hidden
  Total.innerHTML = 'Rp. ' + (hargaMenu * counter)
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
