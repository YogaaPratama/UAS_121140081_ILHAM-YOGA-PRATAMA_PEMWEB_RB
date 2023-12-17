<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost","id21683226_ilhamyoga","Binatang15#","id21683226_uas_pemweb");
?>