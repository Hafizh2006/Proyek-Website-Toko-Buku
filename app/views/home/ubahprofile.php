    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="row">

        <!-- Kiri: Foto Profil -->
        <?php //if (!is_null($data['user']['foto'])): ?>
          <div class="col-md-4 text-center">
          <img id="previewImage" src="<?php echo BASE_URL?>/public/backend/image/user/<?php echo $data['user']['foto']?>" alt="Profile Picture" class="rounded-circle mb-3" width="150" height="150">
          <p></p>
        <?php //endif; ?>
        
        
        
        <!-- FORMULIR UPDATE -->
        <form action="<?php echo BASE_URL?>/home/updateUser" method="POST" enctype="multipart/form-data">
          <!-- Hidden File Input -->  
          <input type="hidden" name="id" value="<?php echo $data['user']['id']?>">
          <input type="hidden" name="email_user" value="<?php echo $data['user']['email_user']?>">
          
          <!-- Preview image -->
          <input type="file" name="foto" id="profilePicInput" accept="image/*" class="d-none" onchange="previewPhoto(event)">
           <!-- onchange="previewPhoto(event)"  -->
            
          <!-- Input foto -->
          <!-- Trigger Button -->
          <button type="button" class="btn btn-outline-primary btn-sm" id='profilePicInput' onclick="document.getElementById('profilePicInput').click();" >
              Ganti Foto
          </button>
          <!-- onclick="document.getElementById('profilePicInput').click(); -->
          </div>

          <!-- Kanan: Form Data Diri -->
          <div class="col-md-8">
            <!-- Input username baru -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo $data['user']['nama_user']?>">
            </div>
            
            <!-- Input nomer telepon -->
            <div class="mb-3">
              <label for="telp" class="form-label">Nomor Telepon</label>
              <input type="telp" class="form-control" id="no_user" name="no_user" value="<?php echo $data['user']['no_user']?>">
            </div>

            <!-- Input Alamat user baru -->
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat_user" name="alamat_user" rows="2"><?php echo $data['user']['alamat_user']?></textarea>
            </div>

            <!-- Input password  lama -->
            <div class="mb-4">
              <label for="password" class="form-label">Password lama</label>
              <input type="password" class="form-control" id="password_old" name="password_old" value="">
            </div>

            <!-- Password baru -->
            <div class="mb-4">
              <label for="password" class="form-label">Password Baru</label>
              <input type="password" class="form-control" id="password_user" name="password_user" value="">
            </div>

            <!-- Password konfirmasi  untuk password baru-->
            <div class="mb-4">
              <label for="password" class="form-label">Password Konfirmasi</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
            </div>
            <div class="d-flex flex-wrap gap-2">
              <button type="submit" class="btn btn-success flex-fill">Update profil</button>
              <a href="<?php echo BASE_URL?>/home/profile" class="btn btn-outline-secondary">Kembali</a>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function previewPhoto(event) {
    const previewImage = document.getElementById('previewImage');
    const file = event.target.files[0]; // Ambil file yang dipilih

    if (file) {
        const reader = new FileReader(); // Buat FileReader baru

        reader.onload = function(e) {
            // Setelah file dibaca, hasilnya (Data URL) akan ada di e.target.result
            previewImage.src = e.target.result; // Atur src img preview
        };

        reader.readAsDataURL(file); // Baca file sebagai Data URL
    } else {
        // Opsional: Jika pengguna membatalkan pemilihan file, kembalikan ke gambar default/lama
        // previewImage.src = "<?php echo BASE_URL?>/public/backend/image/user/default.jpg"; 
        // Atau biarkan saja seperti saat ini, yaitu gambar lama dari database.
    }
}
</script>