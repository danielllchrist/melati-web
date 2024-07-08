<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/admin/sidebaradmin.css')
    @vite('resources/css/components/app.css')
</head>

<body>
    <div class = "sidebar">
        <div class = "sidebar-content">
            <div class="sidebar-back">
                <!-- <a href="#" class="profile"><img src="assets/side_bar/back_arrow.svg" alt="Back"> -->
                    <div class="profile"><img class="pp-picture" src="\assets\top1.png" alt="" />
                        <p>{{$nama}}</p>
                    </div>
                <!-- </a> -->
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
            </div>
        </div>
    </div>
</body>

</html>
