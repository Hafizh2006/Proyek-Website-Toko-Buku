    <!--- Login Section -->
    <section class="container my-5" style="max-width: 480px;">
      <!-- Isi tab -->
      <div class="tab-content" id="authTabContent">
        
        <!-- Login -->
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form action="<?php echo BASE_URL?>/admin/cekLogin" method="POST">
            
            <div class="mb-3">
              <label for="nama_user" class="form-label">Username *</label>
              <input type="text" name="nama_user" id="nama_user" class="form-control"  placeholder="Username" required>
            </div>

            <div class="mb-3">
              <label for="password_user" class="form-label">Password *</label>
              <input type="password" name="password_user" id="password_user" class="form-control"  placeholder="Password" required>
            </div>

            <button type="submit" name="loginAdmin" class="btn btn-dark w-100">Login</button>
          </form>
        </div>
      </div>
    </section>
