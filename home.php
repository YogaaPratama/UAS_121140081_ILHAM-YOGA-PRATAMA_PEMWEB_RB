<?php
if(isset($_SESSION['admin'])){
?>
    <div class="admin-welcome">
        <div class="welcome-header">
            <h1><?php echo $_SESSION['admin']['nama']?>,</h1>
            <h1>Anda adalah admin sekarang </h1>
        </div>
        <div class="welcome-message">
            <p>Selamat datang di panel admin. Anda memiliki kontrol penuh atas sistem.</p>
        </div>
    </div>
<?php
} else {
?>
    <div class="bg-loader">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <div class="medsos">
        <ul>
            <li><a href="https://www.instagram.com/yogapratama151/"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/in/ilham-yoga-pratama-69775a255/"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://wa.me/6282151229929"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
    </div>

    <!-- Banner -->
    <section class="banner">
        <h2>WELCOME TO MY WEBSITE</h2>
    </section>

    <!-- About -->
    <section class="about">
        <div class="container">
            <h3>ABOUT MY WEBSITE</h3>
            <p>
                Website ini didedikasikan untuk pendataan buku tamu. Saya menyediakan platform di mana pengunjung dapat mengisi formulir dan mencatat data mereka.
                Saya berkomitmen untuk memberikan layanan yang mudah, efisien, dan andal dalam pendataan tamu. Dengan menggunakan layanan ini,
                pengunjung dapat dengan cepat dan nyaman meninggalkan jejak mereka, memudahkan pengelolaan dan akses data secara efektif.
                Terima kasih telah mengunjungi dan menggunakan layanan kami!
            </p>
        </div>
    </section>

    <!-- Service -->
    <section class="service">
        <div class="container">
            <h3>SERVICE</h3>
            <div class="box">
                <div class="col-4">
                    <div class="icon"><i class="fas fa-video"></i></div>
                    <h4>VIDEOGRAPHY</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-globe"></i></div>
                    <h4>WEB DEVELOPMENT</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-edit"></i></div>
                    <h4>DESIGN</h4>
                </div>
                <div class="col-4">
                    <div class="icon"><i class="fas fa-mobile"></i></div>
                    <h4>MOBILE APP</h4>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
