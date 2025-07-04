
<?php 
date_default_timezone_set("Asia/Jakarta");
?>


<div class="container">
  <form action="<?php echo BASE_URL?>/home/checkout" method="POST">
    <div class="row">
      <!-- Billing Address -->
      <div class="col-md-7">
        <h3>Billing Address</h3>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="nama_user" class="form-control" value="<?php echo htmlspecialchars($data['user']['nama_user']); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email_user" class="form-control" value="<?php echo htmlspecialchars($data['user']['email_user']); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="alamat_user" class="form-control" value="<?php echo htmlspecialchars($data['user']['alamat_user']); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Telephone</label>
          <input type="tel" name="no_user" class="form-control" value="<?php echo htmlspecialchars($data['user']['no_user']); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Date</label>
          <input type="text" name="tanggal_sekarang" class="form-control" value="<?php echo date('d/m/Y') ?>" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label">Time</label>
          <input type="text" name="jam_sekarang" class="form-control" value="<?php echo date('h:i:sa') ?>" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label">Order Notes</label>
          <textarea class="form-control" name="notes" rows="3"></textarea>
        </div>
      </div>

      <!-- Your Order -->
      <div class="col-md-5 mb-4">
        <h3>Your Order</h3>
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <strong>PRODUCT</strong>
              <strong>TOTAL</strong>
            </div>
            <hr>
            <?php if (!empty($data['items_checkout'])): ?>
              <?php foreach ($data['items_checkout'] as $item): ?>
                <div class="d-flex justify-content-between">
                  <span><?php echo htmlspecialchars($item['jumlah']); ?>x <?php echo htmlspecialchars($item['nama_buku']); ?></span>
                  <span><?php echo number_format($item['harga'], 0, '.', ','); ?></span>
                </div>
                <input type="hidden" name="id_buku[]" value="<?php echo $item['id_buku']; ?>">
                <input type="hidden" name="jumlah[]" value="<?php echo $item['jumlah']; ?>">
                <input type="hidden" name="cart_item_ids[]" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="nama_buku[]" value="<?php echo htmlspecialchars($item['nama_buku']); ?>">
              <?php endforeach; ?>
            <?php endif; ?>
            <hr>
            <div class="d-flex justify-content-between">
              <span>Shipping</span>
              <strong>FREE</strong>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
              <strong>TOTAL</strong>
              <strong><?php echo number_format($data['total_harga'], 0, '.', ','); ?></strong>
            </div>

            <div class="form-check mt-3">
              <input class="form-check-input" type="radio" name="payment" id="bankTransfer" value="Direct Transfer">
              <label class="form-check-label" for="bankTransfer">
                Direct Bank Transfer
              </label>
              <small class="d-block">Langsung lewat bank ?</small>
            </div>

            <div class="form-check mt-3">
              <input class="form-check-input" type="radio" name="payment" id="paypal" value="Paypal system">
              <label class="form-check-label" for="paypal">
                Paypal System
              </label>
              <small class="d-block">lewat paypal was wes</small>
            </div>

            <div class="form-check mt-3">
              <input class="form-check-input" type="checkbox" id="terms" required>
              <label class="form-check-label" for="terms">
                I've read and accept the <a href="#">terms & conditions</a>
              </label>
            </div>

            <input type="hidden" name="total" value="<?php echo $data['total_harga']; ?>">
            <button type="submit" class="btn btn-primary w-100 mt-4">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
