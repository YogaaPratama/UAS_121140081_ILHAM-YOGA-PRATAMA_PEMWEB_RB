<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    
    $query = "DELETE FROM dataTamu WHERE id = '$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>alert('Hapus data berhasil'); document.location = '?page=tabel';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
} else {
    echo "<script>alert('ID tidak valid');</script>";
}

?>
