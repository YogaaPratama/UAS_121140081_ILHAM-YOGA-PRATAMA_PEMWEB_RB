<?php
// session_start();
include "connect.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $login = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($login) > 0) {
        $user_data = mysqli_fetch_array($login);
        $_SESSION['admin'] = $user_data;

        // Memanggil fungsi JavaScript untuk menetapkan cookie
        echo "<script>setLoggedInCookie(" . $user_data['id'] . ");</script>";

        echo "<script>alert('Login berhasil'); document.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Akun tidak ditemukan'); document.location = 'login.php';</script>";
    }
}

if (isset($_POST['signup'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $admin = mysqli_query($connect, "SELECT * FROM admin");
    $data = mysqli_fetch_array($admin);

    if ($nama == "" || $username == "" || $password == "") {
        echo "<script>alert('Jangan kosongkan data, silahkan login ulang');</script>";
    } else {
        if ($username != $data['username']) {
            mysqli_query($connect, "INSERT INTO admin(nama, username, password) VALUES ('$nama','$username','$password')");
            echo "<script>alert('Registrasi akun berhasil'); document.location = 'login.php';</script>";
        } else {
            echo "<script>alert('Username sudah digunakan, silahkan registrasi ulang'); document.location = 'login.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Sign Up</title>
    <link rel="stylesheet" href="css/log.css">
</head>

<body>

<div id="loginForm">
    <section class="wrapper">
        <div class="form signup">
            <form method="post" enctype="multipart/form-data">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Username" required />

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password" required />

                <input type="submit" value="Login" name="login" />
            </form>

            <p id="toggleLink">No account? <a href="#" onclick="toggleForms()">Sign up</a></p>
        </div>
    </section>
</div>

<div id="signupForm">
    <div class="form login">
        <form method="post" enctype="multipart/form-data">
            <h2>Sign Up</h2>
            <label for="nama">Full Name:</label>
            <input type="text" name="nama" placeholder="Full name" required />

            <label for="username_signup">Username:</label>
            <input type="text" name="username" placeholder="Username" required />

            <label for="password_signup">Password:</label>
            <input type="password" name="password" placeholder="Password" required />
            
            <input type="submit" value="Signup" name="signup" />
        </form>

        <p id="toggleLink">Have an account? <a href="#" onclick="toggleForms()">Login</a></p>
    </div>
</div>

<script src="script/log.js"></script>

</body>
</html>
