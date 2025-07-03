<?php 
//var_dump($data); die;
$buku = $data['pendidikan'];
$novel = $data['novel'];
$komik = $data['komik'];
//var_dump($buku[0]['foto']); die;
$countpendidikan = 1;
$countkomik = 1;
$countnovel = 1;
$countromansa = 1;

$bukubanner = $buku
?>

<section id="billboard" class="position-relative d-flex align-items-center py-5 bg-light-gray"
style="background-image: url(<?php echo BASE_URL?>/frontend/images/banner-image-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center; height: 800px;">
<div class="position-absolute end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next main-slider-button-next">
	<svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
	<use xlink:href="#alt-arrow-right-outline"></use>
	</svg>
</div>
<div class="position-absolute start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev main-slider-button-prev">
	<svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
	<use xlink:href="#alt-arrow-left-outline"></use>
	</svg>
</div>
<div class="swiper main-swiper">
	<div class="swiper-wrapper d-flex align-items-center">
	<div class="swiper-slide">
		<div class="container">
		<div class="row d-flex flex-column-reverse flex-md-row align-items-center">
			<div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
			<div class="banner-content">
				<h2>Toko buku Sigma</h2>
				<p>Belilah dan agar menjadi orang sigma!</p>
				<a href="<?php echo BASE_URL?>" class="btn mt-3">Shop Collection</a>
			</div>
			</div>
			<div class="col-md-6 text-center">
			<div class="image-holder">
				<img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $buku[0]['foto'] ?>" class="img-fluid" alt="banner">
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="swiper-slide">
		<div class="container">
		<div class="row d-flex flex-column-reverse flex-md-row align-items-center">
			<div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
			<div class="banner-content">
				<h2>How Innovation works</h2>
				<p>Discount available. Grab it now!</p>
				<a href="index.html" class="btn mt-3">Shop Product</a>
			</div>
			</div>
			<div class="col-md-6 text-center">
			<div class="image-holder">
				<img src="<?php echo BASE_URL?>/frontend/images/banner-image1.png" class="img-fluid" alt="banner">
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="swiper-slide">
		<div class="container">
		<div class="row d-flex flex-column-reverse flex-md-row align-items-center">
			<div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
			<div class="banner-content">
				<h2>Your Heart is the Sea</h2>
				<p>Limited stocks available. Grab it now!</p>
				<a href="index.html" class="btn mt-3">Shop Collection</a>
			</div>
			</div>
			<div class="col-md-6 text-center">
			<div class="image-holder">
				<img src="<?php echo BASE_URL?>/frontend/images/" class="img-fluid" alt="banner">
			</div>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
</section>


<section id="items-listing" class="padding-large">
<div class="container">
	<div class="row">
		<!-- Buku Pendidikan -->
		<div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
			<div class="featured border rounded-3 p-4">
				<div class="section-title overflow-hidden mb-5 mt-2">
					<h3 class="d-flex flex-column mb-0">Buku Pendidikan</h3>
				</div>
				<div class="items-lists">
					<!-- PERULANGAN UNTUK MENAMPILKAN DATA DARI DATABASE BUKU PENDIDIKAN -->
					<?php foreach ($buku as $pendidikan) {?>
						<!-- SELEKSI HANYA DI CETAK 3 DATA PERTAMA -->
						<?php if ($countpendidikan <= 3){?>
						<div class="item d-flex">
							<a href="<?php echo BASE_URL?>/home/product/<?php echo $pendidikan['id']?>"><img src="<?php echo BASE_URL?>/backend/image/buku/<?php  echo $pendidikan['foto'] ?>" class="img-fluid shadow-sm" alt="product item"></a>
							<div class="item-content ms-3">
								<h6 class="mb-0 fw-bold"><a href="<?php echo BASE_URL?>/home/product/<?php  echo $pendidikan['id']?>"><?php echo $pendidikan['nama']?></a></h6>
								<div class="review-content d-flex">
								<p class="my-2 me-2 fs-6 text-black-50"><?php echo $pendidikan['penulis'] ?></p>

								<div class="rating text-warning d-flex align-items-center">
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
								</div>
								</div>
							<span class="price text-primary fw-bold mb-2 fs-5">Rp.<?php echo number_format($pendidikan['harga'], 0, '.', ',') ?></span>
							</div>
						</div>
						<hr class="gray-400">
						<?php $countpendidikan++; }?>
					<?php }?>
				</div> 
 			</div> 
		</div>


	<!-- Buku  Komik -->
	<div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
		<div class="latest-items border rounded-3 p-4">
			<div class="section-title overflow-hidden mb-5 mt-2">
				<h3 class="d-flex flex-column mb-0">Komik</h3>
			</div>		
			<div class="items-lists">
				<?php foreach ($komik as $bukukomik) {?>
					<?php //var_dump($bukukomik); die; ?>
				<?php if ($countkomik <= 3){?>
					<div class="item d-flex">
					<a href="<?php echo BASE_URL?>/home/product/<?php echo $bukukomik['id']?>"><img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $bukukomik['foto']?>" class="img-fluid shadow-sm" alt="product item"></a>
						<div class="item-content ms-3">
							<h6 class="mb-0 fw-bold"><a href="<?php echo BASE_URL?>/home/product/<?php echo $bukukomik['id']?>"><?php echo $bukukomik['nama']?></a></h6>
							<div class="review-content d-flex">
								<p class="my-2 me-2 fs-6 text-black-50"><?php echo $bukukomik['penulis']?></p>
								<div class="rating text-warning d-flex align-items-center">
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
								</div>
							</div>
							<span class="price text-primary fw-bold mb-2 fs-5">Rp.<?php echo number_format($bukukomik['harga'], 0, '.', ',')?></span>
						</div>
					</div>
					<hr class="gray-400">
					<?php $countkomik++; }?>
				<?php }?>
		</div>
		</div>
	</div>







	<!-- Buku Novel -->
	<div class="col-md-6 mb-4 mb-lg-0 col-lg-3">
		<div class="best-reviewed border rounded-3 p-4">
		<div class="section-title overflow-hidden mb-5 mt-2">
			<h3 class="d-flex flex-column mb-0">Buku Novel </h3>
		</div>
		<div class="items-lists">
				<?php foreach ($novel as $bukunovel) {?>
					<?php //var_dump($bukunovel); die; ?>
				<?php if ($countnovel <= 3){?>
					<div class="item d-flex">
					<a href="<?php echo BASE_URL?>/home/product/<?php echo $item['id']?>"><img src="<?php echo BASE_URL?>/backend/image/buku/<?php echo $bukunovel['foto']?>" class="img-fluid shadow-sm" alt="product item"></a>
						<div class="item-content ms-3">
							<h6 class="mb-0 fw-bold"><a href="<?php echo BASE_URL?>/home/product/<?php  echo $bukunovel['id']?>"><?php echo $bukunovel['nama']?></a></h6>
							<div class="review-content d-flex">
								<p class="my-2 me-2 fs-6 text-black-50"><?php echo $bukunovel['penulis']?></p>
								<div class="rating text-warning d-flex align-items-center">
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
									<svg class="star star-fill">
									<use xlink:href="#star-fill"></use>
									</svg>
								</div>
							</div>
							<span class="price text-primary fw-bold mb-2 fs-5">Rp.<?php echo number_format($bukunovel['harga'], 0, '.', ',')?></span>
						</div>
					</div>
					<hr class="gray-400">
					<?php $countnovel++; }?>
				<?php }?>
		</div>
		</div>
	</div>

	</div>
</div>
</section>


<section id="categories" class="padding-large pt-0">
<div class="container">
	<div class="section-title overflow-hidden mb-4">
	<h3 class="d-flex align-items-center">Kategori</h3>
	</div>
	<div class="row">
	<div class="col-md-4">
		<div class="card mb-4 border-0 rounded-3 position-relative">
		<a href="index.html">
			<img src="<?php echo BASE_URL?>/frontend/images/kategorinovel.png" class="img-fluid rounded-3" alt="cart item">
			<h6 class=" position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3"><a href="<?php echo BASE_URL?>/home/category/<?php echo 4?>"
				class="text-white">Novel</a></h6>
		</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-center mb-4 border-0 rounded-3">
		<a href="index.html">
			<img src="<?php echo BASE_URL?>/frontend/images/kategorikomik.png" class="img-fluid rounded-3" alt="cart item">
			<h6 class=" position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3"><a href="<?php echo BASE_URL?>/home/category/<?php  echo 3?>"
				class="text-white">Komik</a></h6>
		</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card text-center mb-4 border-0 rounded-3">
		<a href="index.html">
			<img src="<?php echo BASE_URL?>/frontend/images/kategorimasak.png" class="img-fluid rounded-3" alt="cart item">
			<h6 class=" position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3"><a href="<?php echo BASE_URL?>/home/category/<?php echo 1?>"
				class="text-white">Pendidikan</a></h6>
		</a>
		</div>
	</div>
	</div>
</div>
</section>
