<?php $product = $data['kategori']; ?>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Menampilkan produk untuk kategori <strong><?php echo $data['segmen']?></strong></h5>
  </div>

  <h2 class="text-center mb-4">Katalog <?php echo $data['segmen']; ?></h2>
  <div class="row g-4">

    <?php  foreach($product as $item){?>
      <!-- Item 1 -->
      <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm">
          <a href="<?php echo BASE_URL?>/home/product/<?php echo $item['id']?>">
            <img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $item['foto']?>" class="card-img-top" alt="<?php echo $item['nama']?>" style="height: 250px; object-fit: cover;">
          </a>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><a href="<?php echo BASE_URL?>/home/product/<?php echo $item['id']?>" class="text-dark text-decoration-none"><?php echo $item['nama']?></a></h5>
            <p class="card-text fw-bold mb-1 text-danger">Rp<?php echo number_format($item['harga'], 0, '.', ',')?></p>
            <p class="mb-2 small text-muted">
              <?php if ($item['stok'] > 0): ?>
                <span class="text-success">Stok: Tersedia</span>
              <?php else: ?>
                <span class="text-danger">Stok: Habis</span>
              <?php endif; ?>
            </p>
            <div class="mt-auto d-grid">
                <a href="<?php echo BASE_URL?>/home/product/<?php echo $item['id']?>" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>

  </div>
</div>
