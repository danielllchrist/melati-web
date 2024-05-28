<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/components/shipping_service/headerss.css')
</head>

<body>
    <nav class="header-custom bg-black">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo svg.svg" width="120" height="62" class="d-inline-block align-top"
                alt="">
        </a>

        <div class= "justify-content-center align-items-center navmenu-custom">
            <ul class="navmenu-custom admin">
                <li><a class="admin-menu" href="#"><img src="assets/admin_menu/home.svg" alt=""
                            width = "28" height = "28">Dashboard</a></li>
                <li><a class="admin-menu" href="#"><img src="assets/admin_menu/light.svg" alt=""
                            width = "28" height = "28">Profile</a></li>
            </ul>
        </div>

    </nav>
</body>

</html>
