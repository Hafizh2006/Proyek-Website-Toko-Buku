<?php

//var_dump($data['produk']); die;
$detailProduk = $data['produk'];
//var_dump($detailProduk); die;

?>
<section class="container my-5">
    <div class="row">
    <!-- Cover Buku -->
    <div class="col-md-4 text-center mb-4 mb-md-0">
      <img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $detailProduk['foto']?>" alt="Judul Buku" class="img-fluid rounded shadow">
    </div>

    <!-- Deskripsi Buku -->
    <div class="col-md-6">
        <h2 class="fw-bold"><?php echo $detailProduk['nama']?></h2>
        <div class="row">
            <div class="col-6">
                <p class="fw-normal">Penulis: <?php echo $detailProduk['penulis']?></p>
                <p class="fw-normal">Penerbit: Toko Sigma</p>
                <p class="fw-normal">Tanggal Terbit: 30 Februari 2025</p>
                <p class="fw-normal">ISBN: 123-456-7890</p>
            </div>
            <div class="col-6">
                <p class="fw-normal">Jumlah Halaman: <?php echo $detailProduk['halaman'] ?> lembar</p>
                <p class="fw-normal">Lebar : <?php echo $detailProduk['lebar']?>cm</p>
                <p class="fw-normal">Panjang : <?php echo $detailProduk['panjang']?>cm</p>
                <p class="fw-normal">Berat : <?php echo $detailProduk['berat']?> kg</p>
                <p class="fw-normal">Jumlah stok : <?php echo $detailProduk['stok']?> </p>
                <p class="fw-normal">Harga : Rp.<?php echo number_format($detailProduk['harga'], 0, '.', ',')?> </p>
                <?php if ($detailProduk['stok'] > 0): ?>
                    <form action="<?php echo BASE_URL?>/home/tambahCart/<?php echo $detailProduk['id']?>" method="post">    
                        <label for="jumlah" class="form-label">Beli berapa : </label>
                        <input type="number" class="form-control mb-3" style="max-width: 120px;" value="1" min="1" max="<?php echo $detailProduk['stok']; ?>" name="jumlah" id="jumlah" required>
                        <input type="hidden" name="nama_buku" value="<?php echo $detailProduk['nama']?>">
                        <input type="hidden" name="foto_buku" value="<?php echo $detailProduk['foto']?>">
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary rounded-pill">Masukkan Keranjang</button>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="d-grid">
                        <button class="btn btn-secondary rounded-pill" disabled>Stok Habis</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Sinopsis Buku -->
    <div class="row mt-5">
        <div class="col">
            <h4 class="fw-semibold">Sinopsis</h4>
            <p class="text-justify">
                <?php echo $detailProduk['sinopsis']?>
            </p>
        </div>
    </div>
    </div>
</section>

</body>
</html>