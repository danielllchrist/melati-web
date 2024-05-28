<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('public/css/bootstrap.css')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class = "sidebar">
        <div class = "sidebar-content">
            <div class="sidebar-back">
                <img src="assets/side_bar/back_arrow.svg" alt="Back">
                <div class="profile"><img class="pp-picture" src="assets/top1.png" alt="" />
                    <p>Ryan</p>
                </div>
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <h2>Akun</h2>
                    <ul class = "spacing-sidebarmenu">
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Ganti Password</a></li>
                    </ul>
                </div>
                {{-- active-page bisa dimasukkin ke class biar warna menu nya ke selected --}}
                <div class="sidebar-menu">
                    <h2>Pesanan</h2>
                    <ul class = "spacing-sidebarmenu">
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Ganti Password</a></li>
                    </ul>
                </div>
                <div class="sidebar-menu">
                    <h2>Alamat</h2>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
