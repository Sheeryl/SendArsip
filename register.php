<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .register-container {
        background-color: #ffffffff;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    .register-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .input {
        margin-bottom: 15px;
        position: relative;
    }

    .input label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .input input[type="password"],
    .input input[type="text"],
    .input input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #555;
        border-radius: 4px;
        box-sizing: border-box; 
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 28px;
        cursor: pointer;
        font-size: 18px;
        color: #000000ff;
        user-select: none;
    }

    .toggle-konfirmasi {
        position: absolute;
        right: 10px;
        top: 28px;
        cursor: pointer;
        font-size: 18px;
        color: #000000ff;
        user-select: none;
    }

    button { 
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;                 
        border: 2px solid #0056b3;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;       
        font-weight: bold;
        transition: 0.3s;
    }

    button:hover {
        background-color: #0056b3;
        border-color: #004494;
    }

    button a {
        color: white;                
        text-decoration: none;      
        display: block;              
    }

    .register-link {
    text-align: center;
}
  </style>
</head>
<body>
  <div class="register-container">
    <form class="register-form" action="#" method="POST">
      <h2>Register</h2>
      <div class="input">
        <label for="name">Nama</label>
        <input type="text" id="name" name="nama" required>
      </div> 
      <div class="input">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="input">
        <label for="nohp">No Telepon</label>
        <input type="number" id="nohp" name="nohp" required>
      </div> 
      <div class="input">
        <label for="devisi">Unit Kerja</label>
        <input type="text" id="devisi" name="devisi" required>
      </div> 
      <div class="input">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <span class="toggle-password" onclick="togglePassword()">👁</span>
      </div> 
      <div class="input">
        <label for="konfirmasi">konfirmasi</label>
        <input type="password" id="konfirmasi" name="konfirmasi" required>
        <span class="toggle-konfirmasi" onclick="toggleKonfirmasi()">👁</span>
      </div> 
      
      <button type="button">
        <a href="login.php">Register</a>
      </button>
      <div class="register-link">
                <p>Sudah punya akun? Silahkan <a href="login.php">Login</a></p>
            </div>
    </form>
  </div>

  <script>
  function togglePassword() {
    const passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }

  function toggleKonfirmasi() {
    const konfirmasiField = document.getElementById("konfirmasi");
    if (konfirmasiField.type === "password") {
      konfirmasiField.type = "text";
    } else {
      konfirmasiField.type = "password";
    }
  }
</script>

</body>
</html>
