<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/components/admin/headeradmin.css')
</head>

<body>
    <nav class="header-custom bg-black">
        <a class="" href="{{ route('LandingPage') }}">
            <img src="\assets\images\logo svg.svg" width="120" height="62" class="d-inline-block align-top"
                alt="">
        </a>

        <div class= "justify-content-center align-items-center navmenu-custom">
            <ul class="navmenu-custom admin">
                <li><a class="admin-menu" href="{{ route('AdminDashboard') }}"><img src="\assets\admin_menu\home.svg" alt=""
                            width = "25" height = "25">Beranda</a></li>
                <li><a class="admin-menu" href="{{ route('AdminStatus') }}"><img src="\assets\admin_menu\shopping bag.svg" alt=""
                            width = "25" height = "25">Pesanan</a></li>
                <li><a class="admin-menu" href="{{ route('produk.index') }}"><img src="\assets\admin_menu\package.svg" alt=""
                            width = "25" height = "25">Produk</a></li>
                <li><a class="admin-menu" href="{{ route('AdminChat') }}"><img src="\assets\admin_menu\circle.svg" alt=""
                            width = "25" height = "25">Obrolan</a></li>
                <li><a class="admin-menu" href="{{ route('ManageLandingPage') }}"><img src="\assets\admin_menu\content.svg" alt=""
                            width = "25" height = "25">Konten</a></li>
                <li><a class="admin-menu" href="{{ route('AdminProfile') }}"><img src="\assets\admin_menu\light.svg" alt=""
                            width = "25" height = "25">Profil</a></li>
            </ul>
        </div>

    </nav>
</body>

</html>
