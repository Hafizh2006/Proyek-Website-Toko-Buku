<?php 

$dataKeranjang = $data['keranjang']; 
//var_dump($dataKeranjang); die;
$subtotal = 0;
?>
<main class="container py-5">
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
                <?php $subtotal += $item['harga']; ?>
                <div class="card mb-3 shadow-sm border-0 rounded-3">
                    <form action="<?php echo BASE_URL?>/home/updateCart/<?php echo $item['id']?>" method="POST">
                        <div class="row g-0 align-items-center p-3">
                            <div class="col-md-2 text-center">
                                <img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $item['foto_buku']?>" class="img-fluid rounded-3" alt="Product image" style="max-height: 100px; object-fit: contain;">
                            </div>
                            <div class="col-md-3">
                                <h5 class="mb-1"><b><?php echo $item['nama_buku']?></b></h5>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <input type="number" name="jumlah" class="form-control w-75" value="<?php echo $item['jumlah']?>" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">Update</button>
                            </div>
                            <div class="col-md-2 text-center">
                                <h6 class="mb-0">Rp. <?php echo number_format($item['harga'], 0, '.', ',')?></h6>
                            </div>
                            <div class="col-md-2 text-center">
                                <a href="<?php echo BASE_URL?>/home/hapusCart/<?php echo $item['id']?>" onclick="return confirm('Yakin ingin menghapus item ini?')" class="btn btn-sm btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        <?php endif; ?>
        </div>

        <!-- Order summary -->
        <div class="col-lg-4">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h4 class="mb-3">Order Summary</h4>
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal</span>
                <strong>Rp. <?php echo number_format($subtotal, 0, '.', ',') ?></strong>
            </div>
            <!-- <div class="d-flex justify-content-between mb-2">
                <span>Shipping</span>
                <strong>Rp. 10,000</strong>
            </div> -->
            <hr>
            <div class="d-flex justify-content-between mb-3">
                <span class="fw-bold">Total</span>
                <strong>Rp. <?php echo number_format($subtotal, 0, '.', ',') ?></strong>
            </div>
            <button class="btn btn-primary btn-lg w-100" <?php echo empty($dataKeranjang) ? 'disabled' : ''; ?>>Proceed to Checkout</button>
        </div>
        </div>
    </div>
</main>