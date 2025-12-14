<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="index.php" method="POST">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password </label>
                <input type="password" id="password" name="password" required>
            </svg>
            </div>
            <div class="remember-forgot d-flex justify-content-between">
          <div>
            <input type="checkbox" >Remember me </input>
            <a href="#" class="for"> Forgot password?</a><p>
          </div>
            <button type="submit">Login</a>
            </button>
            <div class="register-link">
                <p>Tidak punya akun? Silahkan <a href="register.php">register!</a></p>
            </div>
        </form>
    </div>
</body>
</html>
