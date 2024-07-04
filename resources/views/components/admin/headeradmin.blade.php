<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/admin/headeradmin.css')
</head>

<body>
    <nav class="header-custom bg-black">
        <a class="navbar-brand" href="#">
            <img src="\assets\images\logo svg.svg" width="120" height="62" class="d-inline-block align-top"
                alt="">
        </a>

        <div class= "justify-content-center align-items-center navmenu-custom">
            <ul class="navmenu-custom admin">
                <li><a class="admin-menu" href="/admin"><img src="\assets\admin_menu\home.svg" alt=""
                            width = "25" height = "25">Dashboard</a></li>
                <li><a class="admin-menu" href="/admin/pesanan"><img src="\assets\admin_menu\shopping bag.svg" alt=""
                            width = "25" height = "25">Orders</a></li>
                <li><a class="admin-menu" href="/admin/produk"><img src="\assets\admin_menu\package.svg" alt=""
                            width = "25" height = "25">Products</a></li>
                <li><a class="admin-menu" href="/admin/live-chat"><img src="\assets\admin_menu\circle.svg" alt=""
                            width = "25" height = "25">Chats</a></li>
                <li><a class="admin-menu" href="/admin/atur"><img src="\assets\admin_menu\content.svg" alt=""
                            width = "25" height = "25">Content</a></li>
                <li><a class="admin-menu" href="/admin/profil"><img src="\assets\admin_menu\light.svg" alt=""
                            width = "25" height = "25">Profile</a></li>
            </ul>
        </div>

    </nav>
</body>

</html>
