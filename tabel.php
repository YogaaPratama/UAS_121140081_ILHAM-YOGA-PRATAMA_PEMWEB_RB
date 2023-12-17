<div class="form mahasiswa">
    <a class="btn_tbh" href="?page=form">Tambah Tamu</a>

    <table class="daftar_mahasiswa" style="overflow-x:scroll" id="table">
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Agama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>

        <?php
        // Mengambil data tamu dari database
        $daftar_tanggapan = mysqli_query($connect, "SELECT * FROM dataTamu ORDER BY id ASC");

        // Menampilkan data tamu dalam tabel
        while ($data = mysqli_fetch_array($daftar_tanggapan)) {
        ?>
            <tr>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['agama']; ?></td>
                <td><?php echo $data['tgl_lahir']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td width="22%">
                    <a class="btn" href="?page=edit&&id=<?php echo $data['id']?>">Edit</a>
                    <a class="btn_del" href="javascript:confirmDelete(<?php echo $data['id']; ?>)">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<script>
function confirmDelete(id) {
    var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (result) {
        window.location.href = "?page=delete&&id=" + id;
    }
}
</script>