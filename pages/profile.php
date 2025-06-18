<?php
require_once dirname(__DIR__) . '/config/const.php';
require_once ROOT_PATH . "/includes/header.php";
?>
<title>Profile</title>
<link rel="stylesheet" href="../Assets/Css/profile.css">

<div class="profile-container">
  <div class="profile-left">
    <h2 class="profile-title">Akun</h2>
    <div class="profile-photo">
      <img src="../Assets/Img/user-default.png"  />
    </div>
    <button class="profile-photo-btn">Ubah Foto Profil</button>
    <div class="profile-photo-info">
    </div>
  </div>
  <div class="profile-right">
    <h2 class="profile-title">Pengaturan Profil</h2>
    <div class="profile-info-list">
      <div class="profile-info-item">
        <div>
          <span class="profile-label">Nama Lengkap</span>
          <span class="profile-value"><b>a</b></span>
        </div>
        <a href="#" class="profile-edit"><i class="fa fa-pencil"></i></a>
      </div>
      <div class="profile-info-item">
        <div>
          <span class="profile-label">Email</span>  
          <span class="profile-value"><b>gmail.com</b></span>
        </div>
        <a href="#" class="profile-edit"><i class="fa fa-pencil"></i></a>
      </div>
      <div class="profile-info-item">
        <div>
          <span class="profile-label">Kata Sandi</span>
          <span class="profile-value"><b>bakekok</b></span>
        </div>
        <a href="#" class="profile-edit"><i class="fa fa-pencil"></i></a>
      </div>
      <div class="profile-info-item">
        <div>
          <span class="profile-label">No. Telepon</span>
          <span class="profile-value"><b>911</b></span>
        </div>
        <a href="#" class="profile-edit"><i class="fa fa-pencil"></i></a>
      </div>
    </div>
  </div>
</div>

<?php require_once ROOT_PATH . "/includes/footer.php"; ?>