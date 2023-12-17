<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost","id21684345_ilham","Binatang15#","id21684345_uas_pemweb");
?>
