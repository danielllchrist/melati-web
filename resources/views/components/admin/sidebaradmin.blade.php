<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/admin/sidebaradmin.css')
    @vite('resources/css/components/app.css')
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="sidebar-back">
                <!-- <a href="#" class="profile"><img src="assets/side_bar/back_arrow.svg" alt="Back"> -->
<<<<<<< Updated upstream
                    <div class="profile"><img class="pp-picture" src="\assets\top1.png" alt="" />
                        <p>{{$nama}}</p>
                    </div>
=======
                <div class="profile"><img class="pp-picture" src="\assets\top1.png" alt="" />
                    <p>Ryan</p>
                </div>
>>>>>>> Stashed changes
                <!-- </a> -->
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <a class="menu" href="{{route("profile")}}"><h2>Akun</h2></a>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="#profile">Profil</a></li>
                        <li><a href="#change-password">Ganti Password</a></li>
                        <li><a href="#logout">Keluar</a></li>
                    </ul>
                </div>
                {{-- active-page bisa dimasukkin ke class biar warna menu nya ke selected --}}
            </div>
        </div>
    </div>
</body>

</html>
