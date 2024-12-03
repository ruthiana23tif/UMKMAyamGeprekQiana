<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vision and Mission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #c71212;
            color: rgb(0, 0, 0);
            text-align: center;
        }

        .section {
            padding: 40px 20px;
        }

        .vision-mission {
            color: rgb(255, 255, 255);
        }

        .vision-mission h1 {
            text-transform: uppercase;
            font-size: 3em;
            color: #ffffff;
        }

        .vision-mission p {
            margin-top: 10px;
            font-size: 1.2em;
            line-height: 1.6;
        }

        .container {
            background-color: #ffffff
        }

        .soulfull-section {
            background-color: rgb(255, 255, 255);
            color: #ffffff;
        }

        .soulfull-title {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .soulfull-content {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .soulfull-box {
            text-align: center;
            width: 300px;
        }

        .soulfull-box img {
            border-radius: 90%;
            width: 300px;
            height: 300px;
            object-fit: cover;
            border: 10px solid #e2c405;
        }

        .soulfull-box h3 {
            font-size: 1.5em;
            margin: 20px 0 10px;
            color: #000;
        }

        .soulfull-box p {
            font-size: 1em;
            line-height: 1.4;
            color: #000;
        }

        footer {
            background-color: #c71212;
            color: rgb(255, 255, 255);
            padding: 40px 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-left,
        .footer-center,
        .footer-right {
            flex: 1;
            margin: 10px;
        }

        .footer-left img {
            display: block;
            justify-content: center;

        }

        .footer-left p {
            font-size: 0.9em;
            line-height: 1.6;
        }

        .footer-center ul {
            list-style: none;
            padding: 0;

        }

        .footer-center ul li a {
            margin: 40px 0;
            color: #c9d001
        }

        .newsletter {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .newsletter input[type="email"] {
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 20px 0 0 20px;
            width: 200px;
        }

        .newsletter button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 0 20px 20px 0;
            background-color: #FFD700;
            color: #ffffff;
            cursor: pointer;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .social-icons a {
            display: inline-block;
            transition: filter 0.3s ease;
        }

        .social-icons a img {
            width: 40px;
            height: 40px;
        }

        .social-icons a:active img {
            filter: brightness(0.7);
            /* Efek gelap saat diklik */
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            background-color: #ffffff gap: 20px;
        }

        .image-container img {
            max-width: 400px;
            border-radius: 10px;
        }

        .text-container {
            max-width: 600px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #000000;
        }

        p {
            font-size: 1.2em;
            line-height: 1.8;
        }
    </style>
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
                <h2> Ayam Geprek Qianaa </h2>
                <li><a href="#">Menu</a></li><br>
                <li><a href="#">Promo</a></li><br>
                <li><a href="#">contact us</a></li><br>
                <li><a href="{{ route('dashboard') }}">Go to Dashboard</a></li>
            </ul>
        </div>
        </div>
    </footer>
</body>

</html>
