<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
    <link rel="stylesheet" href="../Assets/Css/signupadmin.css">
</head>
<body>
    <div class="sign-up-page">
        <div class="form-card">
        <h1 class="title">Daftar Admin</h1>

        <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="usernamae" placeholder="Username" required>

            </div>
          
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
            </div>
          
            <div class="form-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Kata Sandi" required>
            </div>
          
            <button name="submit" class="button-sign" type="submit">Daftar</button>

        </form>
        
        </div>
    </div>
</body>
</html>