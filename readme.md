# UAS Pemrograman Web
## ILHAM YOGA PRATAMA, 121140081, RB

Website : https://121140081-ilham-yoga-pratama-uas-pemweb.000webhostapp.com/ 

Username : Admin

Password : 123


## Bagian 1: Client-side Programming

Dibuat sebuah website yang dapat mendata tamu. Pada halaman awal user akan diperlihatan tampilan awal website yang menjelaskan tentang website ini.

Kemudian ada halaman login, yang menyediakan formulir untuk input login pengguna. Pada halaman manajemen, ada beberapa halaman home (yang menandakan bahwa kita sudah login), kemudian halaman Form (yang digunakan sebagai pendataan tamu), lalu ada halaman Table (halaman ini merupakan halaman data tamu yang sudah mengisi pada halaman Form), terakhir ada Logout (yang menandakan admin bisa keluar dari halaaman manajemen). Halaman ini juga menggunakan JavaScript DOM yang berfungsi untuk mengelola elemen HTML dengan ID "home," "form," "table," dan "login," serta mengatur animasi transisi masuk dan keluar dengan mengubah properti gaya, terutama margin-left. Fungsi-fungsi seperti `homein`, `homeout`, `formin`, `formout`, `tablein`, `tableout`, `loginin`, dan `loginout` dibuat berdasarkan jumlah kelas CSS pada masing-masing elemen. Tujuannya untuk menciptakan efek animasi pada halaman web.

Web ini juga sudah terdapat  `4 elemen input (text, email, radio, date dan textarea)`
```script
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
```
![alt text](https://github.com/YogaaPratama/UAS_121140081_PEMWEB_RB/blob/main/gambar/tabel.png)


bisa dilihat pada gambar tersebut dalam website yang telah dibuat telah berhasil menampilkan data dari server ke dalam sebuah halaman web menggunakan tag `table`. Serta dilengkapi dengan fitur Delete dan Edit. berikut kodenya : 

```script
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

```


Dalam pengisian form juga dilakukan 3 event handle form yang terdiri dari Panjang nama harus lebih dari 2 karakter, Format email tidak valid, dan Harap lengkapi semua field yang ada. Berikut kodenya :
```script
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
        $tambah = mysqli_query($connect, "INSERT INTO dataTamu (id, nama, jenis_kelamin, email, agama, tgl_lahir, alamat) VALUES ('', '$nama', '$jenis_kelamin', '$email', '$agama', '$tanggal_lahir', '$alamat')");
        echo "<script>alert('Tambah data berhasil'); document.location = '?page=tabel';</script>";
    }
}
?>
```

## Bagian 2: Server-side Programming

Dibuat enam file PHP utama untuk menangani proses data antara website dan database:
1. `login.php`: Menggunakan metode POST
2. `index.php`: Menggunakan metode GET
3. `form.php`: Menggunakan metode POST
4. `edit.php`: Menggunakan metode GET & POST
5. `delete.php`: Menggunakan metode GET
6. `admin.php` : Menggunakan metode GET

## Bagian 3: Manajemen Database

Query konfigurasi database:

```sql
create database if not exists id21683226_uas_pemweb;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `datatamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`username`, `password`) VALUES ('admin', '123');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `datatamu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `datatamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
```

## Query Script PHP:

### login.php
```php
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'"; //login
```
### login.php
```php
$sql = "INSERT INTO admin(nama, username, password) VALUES ('$nama','$username','$password')"; //sign up
```
### form.php
```php
$sql = "INSERT INTO dataTamu (id, nama, jenis_kelamin, email, agama, tgl_lahir, alamat) VALUES ('', '$nama', '$jenis_kelamin', '$email', '$agama', '$tanggal_lahir', '$alamat')"; //tambah data
```
### edit.php
```php
$sql = "UPDATE dataTamu SET nama='$nama', jenis_kelamin='$jenis_kelamin', email='$email', agama='$agama', tgl_lahir='$tanggal_lahir', alamat='$alamat' WHERE id='$id'"; //edit data
```
### delete.php
```php
$sql = "DELETE FROM dataTamu WHERE id = '$id'"; //hapus data
```
### tabel.php
```php
$sql = "SELECT * FROM dataTamu ORDER BY id ASC"; //ambil data tamu dari database
```

### Bagian 4: State Management

Dibuat sebuah session pada page admin.php,home.php,login.php yang digunakan untuk Redirect ke halaman utama jika admin belum login

session disimpan dengan variabel  $_SESSION['admin'], session ini menyimpan status atau informasi spesifik terkait pengguna yang sedang login sebagai admin.
```php
if (!isset($_SESSION['admin'])) {
    header('location:index.php');
}
```

## Bagian Bonus: Hosting Aplikasi Web

### 1. Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
1. Daftar dan buat akun di 000webhost.com.
2. Setelah berhasil login, klik opsi "Create Website" dan pilih rencana gratis.
3. Input nama website dan password.
4. Pilih opsi "Upload File" untuk mengunggah semua file website ke direktori public_html.
5. Navigasi ke "Database Manager", buat database baru, catat detail seperti nama, pengguna, dan kata sandi database, lalu perbarui variabel di berkas `connect.php`
6. Setelah langkah-langkah tersebut selesai, situs web sekarang dapat diakses dengan menggunakan database yang sudah diatur.
7. Website dapat diakses dengan database yang berfungsi.
   
### 2. Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
Sebagai pengguna yang baru memulai perjalanan di dunia pengembangan web, saya memilih 000webhost sebagai penyedia hosting untuk menampung aplikasi web saya. Pilihan ini didorong oleh beberapa alasan yang memudahkan saya dalam proses pengelolaan dan pengembangan proyek web.

Pertama-tama, saya tertarik dengan fakta bahwa 000webhost menawarkan rencana gratis, memungkinkan saya menjalankan aplikasi web tanpa perlu membayar biaya bulanan.

Antarmuka pengguna 000webhost juga terbukti mudah digunakan, memberikan kenyamanan bagi saya yang belum memiliki banyak pengalaman dalam mengelola server atau hosting web. Saya dapat dengan cepat memahami cara mengunggah file proyek web saya langsung melalui antarmuka web mereka, mempercepat proses pemasangan.

Selain itu, 000webhost menawarkan pemeliharaan server otomatis, yang berarti sebagian besar tanggung jawab terkait manajemen infrastruktur diambil alih oleh platform ini. Ini memberi saya kemudahan dalam fokus pada pengembangan aplikasi tanpa harus terlalu khawatir tentang aspek teknis.

Saya juga senang mengetahui bahwa 000webhost mendukung database MySQL dan bahasa pemrograman PHP, yang sesuai dengan teknologi-teknologi yang saya gunakan dalam pengembangan web. Ini memungkinkan saya menyelaraskan proyek web saya dengan lingkungan hosting yang tersedia.

Meskipun menyadari batasan pada rencana gratis, seperti keterbatasan sumber daya, saya merasa bahwa 000webhost memberikan platform yang ramah pemula dan ideal untuk eksperimen awal serta pengembangan proyek kecil.
 
### 3. Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
1. Update dan Pemeliharaan Rutin:
   - Pastikan sistem operasi, server web, dan perangkat lunak aplikasi selalu diperbarui dengan yang terbaru untuk mengatasi kerentanan keamanan yang mungkin telah diperbaiki oleh pengembang.
2. Firewall:
   - Konfigurasikan firewall untuk membatasi akses ke server hanya kepada layanan dan port yang diperlukan. Ini membantu mengurangi risiko serangan dan akses yang tidak diinginkan.
3. Enkripsi HTTPS:
   - Aktifkan enkripsi HTTPS dengan menggunakan sertifikat SSL/TLS untuk melindungi data yang dikirim antara pengguna dan server. Ini penting terutama jika aplikasi web melibatkan pertukaran informasi sensitif.
4. Validasi Input:
   - Selalu validasi dan bersihkan data input dari pengguna untuk mencegah serangan injeksi, seperti SQL injection atau Cross-Site Scripting (XSS).

### 4. Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
1. Web Server Apache:
   - Pada web ini saya menggunakan web server Apache.
2. Menggunakan Bahasa Pemrograman PHP, JS, CSS, dan MySQL:
   - PHP digunakan sebagai bahasa server-side untuk menjalankan logika aplikasi, berinteraksi dengan basis data MySQL, dan menghasilkan halaman dinamis. JavaScript (JS) digunakan untuk logika client-side, sementara CSS digunakan untuk styling tampilan website.
3. Database MySQL:
   - MySQL digunakan sebagai sistem manajemen basis data relasional (RDBMS). Konfigurasi MySQL mencakup parameter-parameter seperti pengaturan koneksi, kapasitas penyimpanan, dan pengelolaan hak akses pengguna.
4. Manajemen Kode dengan GitHub:
   - Seluruh kode aplikasi diunggah dan dikelola menggunakan platform GitHub. Ini memungkinkan kolaborasi yang efisien, kontrol versi, dan dokumentasi perubahan kode.
