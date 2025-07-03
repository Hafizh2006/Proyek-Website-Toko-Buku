<div class="container">
        <div class="login-box">
            <div class="logo">
                📘
            </div>
            <div class="form">
                <h1>LOGIN ADMIN</h1>
                <form action="<?php echo BASE_URL?>/admin/cekLogin" method="POST">
                    <input type="text" placeholder="Username" name="nama_user" id = "nama_user" required><br><br>
                    <input type="password" placeholder="Password" name="password_user" id = "password_user" required>
                <button type = "submit" name = "loginAdmin" class = "tombol">Masuk</button>
                </form>
            </div>
        </div>
    </div>