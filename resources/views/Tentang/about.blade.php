<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vision and Mission</title>

</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="storage/images/LOGO UMKM.png" alt="AYAM GEPREK QIANA">
        </div>
        <div class="text-container">
            <h1>Tentang Ayam Geprek Qiana</h1>
            <p>
                Ayam Geprek Qiana merupakan sebuah usaha kuliner yang telah berjalan selama 8 bulan.
                Terdapat banyak menu makanan yang ada pada Ayam geprek qiana. Kamu bisa mengunjungi
                fitur contact yang di dalam nya terdapat maps lokasi dari ayam geprek qiana.
            </p>
        </div>
    </div>
    <div class="section vision-mission">
        <h1><u> VISI</u></h1>
        <p>Menjadi usaha kuliner ayam geprek yang dikenal akan cita rasa khas, kualitas terbaik,</p>
        <p> serta pelayanan yang memuaskan, dan kepuasan pelanggan.</p>
        <h1><u>MISI</u></h1>
        <p>1. Menyajikan ayam geprek yang lezat, berkualitas, dan higienis</p>
            <p> dengan menggunakan bahan-bahan berkualitas.</p>
        <p>2. Menawarkan produk dengan harga yang terjangkau,</p>
        <p>sehingga dapat dinikmati oleh berbagai kalangan. </p>
        <p>3. Menciptakan Lapangan
            Pekerjaan.</p>
        <p>4. Memberikan pelayanan ramah
            dan cepat.</p>
    </div>

    <div class="section soulfull-section">
        <h1 class="soulfull-title">Tersedia Ayam Geprek</h1>
        <div class="soulfull-content">
            <div class="soulfull-box">
                <img src="storage/images/Sambal geprek.jpg" alt="Sambal Geprek">
                <h3>Ayam Sambal Geprek</h3>
                <p> Free Teh Es.</p>
            </div>
            <div class="soulfull-box">
                <img src="storage/images/ayam geprek.jpg" alt="Sambal Terasi">
                <h3>Ayam Sambal Terasi</h3>
                <p> Free Teh Es. </p>
            </div>
        </div>
    </div>

    <footer>
        <div class="social-icons">
            <img src="storage/images/LOGO UMKM.png" alt="Logo Ayam Geprek Qiana" width="200" height="200">
        </div>
        <div class="footer-left">
            <p>
                Jl. Kartika Sari, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28266
            </p>
            <div class="social-icons">
                <a href=" " target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
                </a>
                <a href="https://wa.me/08909272987" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                </a>
                <a href=" " target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                        alt="Facebook">
                </a>
            </div>
        </div>
        <div class="footer-center">
            <ul>
                <h2> Ayam Geprek Qiana </h2>
                <li><a href="#">Menu</a></li><br>
                <li><a href="{{ route('promo.index') }}">Promo</a></li><br>
                <li><a href="#">contact us</a></li><br>
                <li><a href="{{ route('dashboard') }}">Go to Dashboard</a></li>
            </ul>
        </div>
        </div>
    </footer>
</body>

</html>
