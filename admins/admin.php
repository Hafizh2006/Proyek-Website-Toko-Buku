<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/Proyek-Website-Toko-Buku/Assets/frontend/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <title>Admin</title>
</head>
<body>
  <main>
    <!-- Login/Register Section -->
    <section class="container my-5" style="max-width: 480px;">
      <!-- Tabs untuk login & register -->
      <ul class="nav nav-tabs justify-content-center mb-4" id="authTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-selected="true">
            Masuk
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-selected="false">
            Daftar
          </button>
        </li>
      </ul>
  
      <!-- Isi tab -->
      <div class="tab-content" id="authTabContent">
        <!-- Login -->
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form>
            <div class="mb-3">
              <label for="loginUsername" class="form-label">Username *</label>
              <input type="text" class="form-control" id="loginUsername" placeholder="">
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password *</label>
              <input type="password" class="form-control" id="loginPassword" placeholder="">
            </div>
            <div class="d-flex justify-content-between mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Ingat saya</label>
              </div>
              <a href="#" class="text-decoration-none">Lupa password?</a>
            </div>
            <button type="submit" class="btn btn-dark w-100">Login</button>
          </form>
        </div>
  
        <!-- Register -->
        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
          <form>
            <div class="mb-3">
              <label for="registerUsername" class="form-label">Username *</label>
              <input type="text" class="form-control" id="registerUsername" placeholder="Masukkan username">
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Password *</label>
              <input type="password" class="form-control" id="registerPassword" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-dark w-100">Register</button>
          </form>
        </div>
      </div>
    </section>
  </main>
  
</body>
</html>  



  