<?php
include 'connect.php';

if (isset($_SESSION['admin'])) {
    header('location:admin.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>
        Ilham Yoga Pratama -
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
                        <a href="?page=home" class="<?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : ''; ?>">
                            Home
                        </a>
                        <hr class="nav <?php echo (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'nav_active' : ''; ?>" id="home">
                    </li>
                    <?php if (isset($_SESSION['admin'])) { ?>
                        <li>
                            <a href="?page=form" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'form') ? 'active' : ''; ?>">
                                Form
                            </a>
                            <hr class="nav <?php echo (isset($_GET['page']) && $_GET['page'] == 'form') ? 'nav_active' : ''; ?>" id="form">
                        </li>
                        <li>
                            <a href="?page=tabel" <?php echo (isset($_GET['page']) && $_GET['page'] == 'tabel') ? 'class="active"' : ''; ?>>
                                Table
                            </a>
                            <hr class="nav <?php echo (isset($_GET['page']) && $_GET['page'] == 'tabel') ? 'nav_active' : ''; ?>" id="table">
                        </li>
                    <?php } ?>
                    <li>
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <a href="logout.php">Logout</a>
                        <?php } else { ?>
                            <a href="login.php">Login</a>
                        <?php } ?>
                        <hr class="nav" id="login">
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container">
        <?php
        $page = @$_GET['page'];
        if (file_exists($page . '.php')) {
            include $page . '.php';
        } else {
            include 'home.php';
        }
        ?>
    </section>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Ilham Yoga Pratama. All Rights Reserved.</small>
        </div>
    </footer>
    <script src="script/script.js"></script>
</body>

</html>
