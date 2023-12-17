<?php

include 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    
    $dataTamu = mysqli_query($connect, "SELECT * FROM datatamu WHERE id = '$id'");
    $data = mysqli_fetch_array($dataTamu);

    if (isset($_POST['submit'])) {
        $nama = mysqli_real_escape_string($connect, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($connect, $_POST['jenis_kelamin']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $agama = mysqli_real_escape_string($connect, $_POST['agama']);
        $tanggal_lahir = mysqli_real_escape_string($connect, $_POST['tanggal_lahir']);
        $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

        $updateQuery = "UPDATE datatamu SET nama='$nama', jenis_kelamin='$jenis_kelamin', email='$email', agama='$agama', tgl_lahir='$tanggal_lahir', alamat='$alamat' WHERE id='$id'";
        $updateResult = mysqli_query($connect, $updateQuery);

        if ($updateResult) {
            echo "<script>alert('Update data berhasil'); document.location = '?page=tabel';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data');</script>";
        }
    }
} else {
    echo "<script>alert('ID tidak valid');</script>";
}
?>

<div class="form">
    <h1>Data Tamu</h1>
    <form method="post" enctype="multipart/form-data">
        <table class="data">
            <tr>
                <td class="in">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required placeholder="Masukkan Nama" class="input" value="<?php echo $data['nama'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo ($data['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?>>
                    <label for="laki">Laki-Laki</label> <br>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
                    <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required placeholder="Masukkan Email" class="input" value="<?php echo $data['email'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="agama">Agama :</label>
                    <select name="agama" id="agama" class="input select">
                        <option value="" selected>Pilih</option>
                        <option value="Islam" <?php echo ($data['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                        <option value="Kristen" <?php echo ($data['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                        <option value="Katolik" <?php echo ($data['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                        <option value="Hindu" <?php echo ($data['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                        <option value="Budha" <?php echo ($data['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="input" value="<?php echo $data['tgl_lahir'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" required placeholder="Masukkan Alamat" class="input"><?php echo $data['alamat'] ?></textarea>
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
