<?php 

//var_dump($data['riwayat']); die;
$riwayat = $data['riwayat'];
?>

<div class="container py-4">
  <!-- Judul Halaman -->
  <h4 class="fw-bold mb-4">Transaksi</h4>

  <!-- Daftar Transaksi -->
  <div class="row g-3">
    <div class="col-12">
      <div class="card shadow-sm rounded-4">
        <div class="card-body">
          <?php if(!empty($riwayat)){?>
            <?php foreach ($riwayat as $item){?>
              
              <!-- Detail isi -->
              <div class="row align-items-center">
                <div class="col-md-8 d-flex">
                  <div>
                    <p class="mb-0 fw-semibold"><?php echo $item['semua_buku'] ?></p>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <small class="">Total Pembayaran</small>
                  <h5 class="fw-bold mt-1 mb-0">Rp. <?php echo number_format($item['total'], 0, '.', ',') ?></h5>
                </div>
              </div>
              <!-- footer transaksi -->
              <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="small">
                  <?php echo  $item['tanggal_diterima'] ?> &nbsp; | &nbsp;
                  <span class="text-primary fw-semibold"><?php echo $item['kode_barang'] ?></span>
                  <i class="bi bi-clipboard ms-1" style="cursor: pointer;"></i>
                </div>
                <span class="badge bg-light text-danger border border-danger"><?php echo $item['status'] ?></span>
              </div>
            <?php }?>
          <?php }?>

          <?php if (empty($riwayat)): ?>
              <div class="card mb-3 shadow-sm border-0 rounded-3 p-4">
                    <h5 class="text-center">Riwayat Anda kosong.</h5>
                    <a href="<?php echo BASE_URL ?>/home/profile/<?php echo $_SESSION['LoginUser']['id']?>" class="btn btn-primary mt-3">Kembali</a>
              </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>

