<section class="container my-4">
  <div class="row">
    <!-- PLISS LAH MANA TOMBOL KEMBALI -->
    <!-- <a href="<?php echo BASE_URL?>"><button class="btn btn-success btn-sm">Kembali</button></a> -->
    
    
    <!-- Kolom kiri: Foto Profil jika tidak ada gambarnya -->
    <?php if (is_null($data['user']['foto'])): ?>
      <div class="col-md-4 text-center">
        <div class="profile-img-wrapper mb-3">
          <img src="https://via.placeholder.com/200" class="img-thumbnail rounded-circle" alt="Profile Picture" style="width:200px;height:200px;object-fit:cover;">
        </div>
        <!-- <button class="btn btn-outline-primary w-100">Unggah / Ganti Foto</button> -->
      </div>
    <?php endif; ?>

    <!-- Kolom kiri Foto Profil jika ada gambarnya -->
    <?php if (!is_null($data['user']['foto'])): ?>
      <div class="col-md-4 text-center">
        <div class="profile-img-wrapper mb-3">
          <img src="<?php echo BASE_URL?>/backend/image/user/<?php echo $data['user']['foto']?>" class="img-thumbnail rounded-circle" alt="Profile Picture" style="width:200px;height:200px;object-fit:cover;">
        </div>
        <!-- <button class="btn btn-outline-primary w-100">Unggah / Ganti Foto</button> -->
      </div>
    <?php endif; ?>

    <!-- Kolom kanan: Data user -->
    <div class="col-md-8">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" value="<?php echo $data['user']['nama_user']?>" readonly>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" value="<?php echo $data['user']['email_user']?>" readonly>
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" class="form-control" rows="2" readonly><?php echo $data['user']['alamat_user']?></textarea>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" value="********" readonly>
      </div>

      <!-- Buttons -->
      
      <!-- href yang ada echonya menandakan ia akan mengirim id ke file yang dituju lewat href -->
      <div class="d-flex gap-2 mt-3">
        <a href="<?php echo BASE_URL?>/home/HalamanUpdate"><button class="btn btn-success btn-sm">Update Profile</button></a>
        <a href="<?php echo BASE_URL ?>/home/riwayat/<?php echo $data['user']['id']?>" ><button class="btn btn-success btn-sm">Riwayat Pemesanan</button></a>
        <a href="<?php echo BASE_URL ?>/home/logout"><button class="btn btn-success btn-sm">Logout</button></a>
        <a href="<?php echo BASE_URL?>/home/deleteUser/<?php echo $data['user']['id']?>"><button class="btn btn-success btn-sm">Hapus Akun</button></a>
      </div>
    </div>

  </div>
</section>