
<?php 
date_default_timezone_set("Asia/Jakarta");
?>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form action="<?php echo BASE_URL?>/home/checkout" method="POST">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="nama_user" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($data['user']['nama_user']); ?>">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email_user" placeholder="Email" value="<?php echo htmlspecialchars($data['user']['email_user']); ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="alamat_user" placeholder="Alamat" value="<?php echo htmlspecialchars($data['user']['alamat_user']); ?>">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="no_user" placeholder="Telephone" value="<?php echo htmlspecialchars($data['user']['no_user']); ?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="tanggal_sekarang" placeholder="Tanggal" value="<?php echo date('d/m/Y') ?>" readonly>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="jam_sekarang" placeholder="jam" value="<?php echo date('h:i:sa') ?>" readonly>
							</div>
							
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="notes"  placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php if (!empty($data['items_checkout'])): ?>
									<?php foreach ($data['items_checkout'] as $item): ?>
										<div class="order-col">
											<div><?php echo htmlspecialchars($item['jumlah']); ?>x <?php echo htmlspecialchars($item['nama_buku']); ?></div>
											<div><?php echo number_format($item['harga'], 0, '.', ','); ?></div>
										</div>
										<input type="hidden" name="id_buku[]" value="<?php echo $item['id_buku']; ?>">
										<input type="hidden" name="jumlah[]" value="<?php echo $item['jumlah']; ?>">
										<input type="hidden" name="cart_item_ids[]" value="<?php echo $item['id']; ?>">
										<input type="hidden" name="nama_buku[]" value="<?php echo htmlspecialchars($item['nama_buku']); ?>">
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php echo number_format($data['total_harga'], 0, '.', ','); ?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio" >
								<input type="radio" name="payment" id="payment-1" value="Direct Transfer">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Langsung lewat bank ?</p>
								</div>
							</div>
							
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3" value="Paypal system">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>lewat paypal was wes</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms" required>
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<input type="hidden" name="total" value="<?php echo $data['total_harga']; ?>">
						<button type="submit" id="checkout-button" class="btn btn-primary btn-lg w-20">Bayar</button>
					</div>
					<!-- /Order Details -->
			</form>
			
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->