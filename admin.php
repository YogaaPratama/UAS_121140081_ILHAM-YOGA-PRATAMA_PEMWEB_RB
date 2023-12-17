<?php
include 'connect.php';

// Redirect ke halaman utama jika admin belum login
if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/design.css">
    <title>Ilham Yoga Pratama - 
        <?php 
        if (!isset($_GET['page'])) {
            echo "Home";
        } elseif ($_GET['page'] == 'home') {
            echo "Home";
        } elseif ($_GET['page'] == 'form') {
            echo "Form";
        } elseif ($_GET['page'] == 'tabel') {
            echo "Tabel";
        }
        ?>
    </title>
</head>
<body>
    <header>
        <div class="container header">
            <div class="Judul">
                <h1>Pendataan Buku Tamu</h1>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="?page=home" 
                            onmouseover="homein()" onmouseout="homeout()"
                            class="<?= (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : ''; ?>">
                            Home
                        </a>
                        <hr class="nav <?= (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'nav_active' : ''; ?>" id="home">
                    </li>
                    <li>
                        <a href="?page=form" 
                            onmouseover="formin()" onmouseout="formout()"
                            class="<?= (isset($_GET['page']) && $_GET['page'] == 'form') ? 'active' : ''; ?>">
                            Form
                        </a>
                        <hr class="nav <?= (isset($_GET['page']) && $_GET['page'] == 'form') ? 'nav_active' : ''; ?>" id="form">
                    </li>
                    <li>
                        <a href="?page=tabel" 
                            onmouseover="tablein()" onmouseout="tableout()"
                            class="<?= (isset($_GET['page']) && $_GET['page'] == 'tabel') ? 'active' : ''; ?>">
                            Table
                        </a>
                        <hr class="nav <?= (isset($_GET['page']) && $_GET['page'] == 'tabel') ? 'nav_active' : ''; ?>" id="table">
                    </li>
                    <?php                    
                    if (isset($_SESSION['admin'])) {
                    ?>
                    <li>
                        <a href="logout.php" 
                            onmouseover="loginin()" onmouseout="loginout()">
                            Logout
                        </a>
                        <hr class="nav" id="login">
                    </li>
                    <?php
                    } else {
                    ?>
                    <li>
                        <a href="login.php" 
                            onmouseover="loginin()" onmouseout="loginout()">
                            Login
                        </a>
                        <hr class="nav" id="login">
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container">
        <?php
          $page = @$_GET['page'];
          if (file_exists($page.'.php')) {
            include $page.'.php';
          } else {
            include 'home.php';
          }      
        ?>  
    </section>
    <script src="script/script.js"></script>
</body>
</html>
