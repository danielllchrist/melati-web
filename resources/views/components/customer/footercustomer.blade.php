<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/components/customer/footercustomer.css')
</head>

<body>
    <div class = "footer-custom-container">
        <div class = "info">
            <div class="menus">
                <div class="about">
                    <p class="title">About Melati</p>
                    <ul class = "child">
                        <li><a href="{{ route('LandingPage') }}">Beranda</a></li>
                        <li><a href="{{ route('Catalogue') }}">Katalog</a></li>
                        <li><i><a href="{{ route('MixMatch') }}">Mix and Match</a></i></li>
                    </ul>
                </div>
                <div class="kelamin">
                    <p class="title">Jenis Kelamin</p>
                    <ul class = "child">
                        <li><a href="{{ route('MenCatalogue') }}">Pria</a></li>
                        <li><a href="{{ route('WomenCatalogue') }}">Wanita</a></li>
                    </ul>
                </div>
                <div class="bantuan">
                    <p class="title">Bantuan</p>
                    <ul class = "child">
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Kebijakan Pembelian</a></li>
                        <li><a href="">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="akun">
                    <p class="title">Akun Saya</p>
                    <ul class = "child">
                        <li><a href="{{ route('CustomerMyOrder') }}">Pesanan Saya</a></li>
                        <li><a href="{{ route('CustomerProfile') }}">Profil</a></li>
                        <li><a href="{{ route('CustomerCart') }}">Keranjang</a></li>
                    </ul>
                </div>
            </div>
            <div class="social">
                <div class="description">
                    <p class="title">Nusantara Di Hati</p>
                    <p class = 'text'>Melati merupakan suatu wadah bagi fashion tradisional dan batik untuk
                        memperkenalkan dirinya dan
                        bersinar dengan tampilan yang menarik dan memberi pengalaman baru kepada customer dengan
                        transaksi yang praktis dan kesempurnaan dalam kemudahan aksesibilitas yang diberikan, di desain
                        untuk digunakan untuk siapapun, dimanapun, kapanpun.</p>
                </div>
                <div class="logo">
                    <img src="\assets\social\youtube.svg" alt="">
                    <img src="\assets\social\instagram.svg" alt="">
                    <img src="\assets\social\twitter.svg" alt="">
                    <img src="\assets\social\facebook.svg" alt="">
                </div>
            </div>
        </div>
        <div class = "copyrights">
            <hr>
            <div class="tnc">
                <p>Syarat & Ketentuan | Kebijakan Privasi</p>
                <p>Copyright © 2020. All right reserved </p>
            </div>
        </div>
    </div>
</body>
</html>
