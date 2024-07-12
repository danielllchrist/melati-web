<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/admin/footeradmin.css')
</head>

<body>
    <div class = "footer-custom-container">
        <div class = "info-admin">
            <a class="navbar-brand" href="#">
                <img src="\assets\images\logo svg.svg" width="165" height="82" class="d-inline-block align-top"
                    alt="">
            </a>
            <div>
                <ul class="admin-footer-menu">
                    <li><a href = "{{ route('AdminDashboard') }}">Beranda</a></li>
                    <li><a href = "{{ route('AdminStatus') }}">Pesanan</a></li>
                    <li><a href = "{{ route('produk.index') }}">Produk</a></li>
                    <li><a href = "{{ route('AdminChat') }}">Obrolan</a></li>
                    <li><a href = "{{ route('ManageLandingPage') }}">Konten</a></li>
                </ul>
            </div>
            <div class="logo">
                <img src="\assets\social\youtube.svg" alt="">
                <img src="\assets\social\instagram.svg" alt="">
                <img src="\assets\social\twitter.svg" alt="">
                <img src="\assets\social\facebook.svg" alt="">
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
