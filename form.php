<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

    if (strlen($nama) <= 2) {
        echo "<script>alert('Panjang nama harus lebih dari 2 karakter. Silahkan isi ulang inputan');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email tidak valid. Silahkan isi ulang inputan');</script>";
    } elseif (empty($nama) || empty($jenis_kelamin) || empty($email) || empty($agama) || empty($tanggal_lahir) || empty($alamat)) {
        echo "<script>alert('Harap lengkapi semua field yang ada. Silahkan isi ulang inputan');</script>";
    } else {
        include 'connect.php';
        $tambah = mysqli_query($connect, "INSERT INTO datatamu (id, nama, jenis_kelamin, email, agama, tgl_lahir, alamat) VALUES ('', '$nama', '$jenis_kelamin', '$email', '$agama', '$tanggal_lahir', '$alamat')");
        echo "<script>alert('Tambah data berhasil'); document.location = '?page=tabel';</script>";
    }
}
?>
<div class="form">
    <form method="post" enctype="multipart/form-data">
        <table class="data">
            <tr>
                <td class="in">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="input" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-Laki') ? "checked" : ''; ?>>
                    <label for="laki">Laki-Laki</label> <br>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan') ? "checked" : ''; ?>>
                    <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan Email" class="input" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="agama">Agama :</label>
                    <select name="agama" id="agama" class="input select">
                        <option value="" selected>Pilih</option>
                        <?php
                        $agama_options = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha');
                        foreach ($agama_options as $option) {
                            echo "<option value='$option' " . (isset($_POST['agama']) && $_POST['agama'] == $option ? 'selected' : '') . ">$option</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="input" value="<?php echo isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukkan Alamat" class="input"><?php echo isset($_POST['alamat']) ? $_POST['alamat'] : ''; ?></textarea>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <div class="submit">
                        <input class="btn" type="submit" value="Kirim" name="submit">
                    </div>
                </th>
            </tr>
        </table>
    </form>
</div>
