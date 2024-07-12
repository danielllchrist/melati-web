<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/components/shipping_service/footerss.css')
</head>

<body>
    <div class = "footer-custom-container">
        <div class = "info-admin">
            <a class="navbar-brand" href="#">
                <img src="\assets\images\logo svg.svg" width="165" height="82" class="d-inline-block align-top"
                    alt="">
            </a>
            <div>
                <ul class="ss-footer-menu">
                    <li><a class = "ss-nav" href = "{{ route('ShippingServiceDashboard') }}">Beranda</a></li>
                    <li><a class = "ss-nav" href = "{{ route('ShippingServiceProfile') }}">Profil</a></li>
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
