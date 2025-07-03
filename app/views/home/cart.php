<?php 

$dataKeranjang = $data['keranjang'];

?>
<main class="container py-5">
    <form action="<?php echo BASE_URL?>/home/menuCheckout" method="POST" id="cart-form">
        <div class="row g-4">
            <!-- Cart items -->
            <div class="col-lg-8">
            <h4 class="mb-3">Keranjang Belanja</h4>
            <?php if (empty($dataKeranjang)): ?>
                <div class="card mb-3 shadow-sm border-0 rounded-3 p-4">
                    <h5 class="text-center">Keranjang Anda kosong.</h5>
                    <a href="<?php echo BASE_URL ?>/home/allCategory" class="btn btn-primary mt-3">Mulai Belanja</a>
                </div>
            <?php else: ?>
                <?php foreach($dataKeranjang as $item){ ?>
                    <div class="card mb-3 shadow-sm border-0 rounded-3">
                        <div class="row g-0 align-items-center p-3">
                            
                            <div class="col-auto d-flex justify-content-center align-items-center">
                                <!-- Checkbox untuk seleksi, bagian dari form utama -->
                                <input class="form-check-input item-checkbox" type="checkbox" name="selected_items[]" value="<?php echo $item['id']; ?>" data-item-price="<?php echo $item['harga']; ?>" checked>
                            </div>

                            <div class="col-2 text-center">
                                <img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $item['foto_buku']?>" class="img-fluid rounded-3" alt="Product image" style="max-height: 100px; object-fit: contain;">
                            </div>

                            <div class="col" style="min-width: 0;">
                                <h5 class="mb-1 text-truncate">
                                    <a href="<?php echo BASE_URL?>/home/product/<?php echo $item['id_buku']?>" class="text-dark text-decoration-none fw-bold" title="<?php echo htmlspecialchars($item['nama_buku']); ?>">
                                        <?php echo htmlspecialchars($item['nama_buku']); ?>
                                    </a>
                                </h5>
                            </div>

                            <div class="col-3 d-flex align-items-center">
                                <!-- Input dan tombol update sekarang menjadi bagian dari form utama -->
                                <input type="number" name="jumlah[<?php echo $item['id']; ?>]" value="<?php echo $item['jumlah']?>"   class="form-control form-control-sm" style="width: 75px;" readonly>
                            </div>
                            <div class="col-2 text-center">
                                <h6 class="mb-0 item-total-price"><?php echo number_format($item['harga'], 0, '.', ',')?></h6>
                            </div>
                            <div class="col-auto text-center">
                                <a href="<?php echo BASE_URL?>/home/hapusCart/<?php echo $item['id']?>" onclick="return confirm('Yakin ingin menghapus item ini?')" class="btn btn-sm btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php endif; ?>
            </div>
            
            <!-- Order summary -->
            <div class="col-lg-4">
            <div class="card shadow-sm p-4 border-0 rounded-3">
                <h4 class="mb-3">Ringkasan Pesanan</h4>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <strong id="subtotal-price">0</strong>
                </div>

                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Total</span>
                    <strong id="total-price">0</strong>
                </div>

                <input type="hidden" name="id_user" value="<?php echo $_SESSION['LoginUser']['id'] ?? '' ?>">
                <button type="submit" id="checkout-button" class="btn btn-primary btn-lg w-100">Lanjut ke Checkout</button>
            </div>
            </div>
        </div>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const subtotalPriceEl = document.getElementById('subtotal-price');
    const totalPriceEl = document.getElementById('total-price');
    const checkoutButton = document.getElementById('checkout-button');

    function formatNumber(angka) {
        // Format angka dengan pemisah ribuan (misal: 1.000.000)
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function updateTotal() {
        let subtotal = 0;
        let itemsSelected = false;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                subtotal += parseInt(checkbox.getAttribute('data-item-price'));
                itemsSelected = true;
            }
        });

        subtotalPriceEl.textContent = formatNumber(subtotal);
        totalPriceEl.textContent = formatNumber(subtotal); // Asumsi belum ada biaya lain

        // Aktifkan/nonaktifkan tombol checkout
        checkoutButton.disabled = !itemsSelected;
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotal);
    });

    // Kalkulasi awal saat halaman dimuat
    updateTotal();
});
</script>