<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/shipping_service/sidebar.css')
</head>

<body>
    <div id="sidebar" class="sidebar">
        <div class="sidebar-content">
            <div class="sidebar-back">
                <a href="#" class="profile">
                    <div class="profile"><img class="pp-picture" src="\assets\top1.png" alt="" />
                        <p>Ryan</p>
                    </div>
                </a>
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <h2>Akun</h2>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="#profil">Profil</a></li>
                        <li><a href="#ganti_password">Ganti Password</a></li>
                        <li><a href="#keluar">Keluar</a></li>
                    </ul>
                </div>
                {{-- active-page bisa dimasukkin ke class biar warna menu nya ke selected --}}
            </div>
        </div>
    </div>
</body>

</html>