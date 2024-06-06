<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/components/customer/headercustomer.css')
</head>

<body>
    <nav class="header-custom">
        <a class="" href="/">
            <img src="assets/images/logo svg.svg" width="120" height="62" class="d-inline-block align-top"
                alt="">
        </a>

        <div class= "justify-content-center align-items-center navmenu-custom">
            <ul class="navmenu-custom">
                <li class = "padding-search-custom">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="search-custom-container"><img src = "assets/nav_menu/search.svg" alt = "search"
                                width = "19" height = "19"><input class = "search-custom" type="text"
                                placeholder="Pencarian">
                        </div>
                    </form>
                </li>
                <li class><a href="#" class="nav-custom"><img src = "assets/nav_menu/wishlist.svg"
                            alt = "wishlist" width = "28" height = "28"></a></li>
                <li class><a href="#" class="nav-custom"><img src = "assets/nav_menu/cart.svg" alt = "cart"
                            width = "33" height = "33"></a>
                </li>
                <li class><a href="#" class="nav-custom"><img src = "assets/nav_menu/person.svg" alt = "profile"
                            width = "28" height = "28"></a></li>
            </ul>
        </div>

    </nav>
</body>

</html>
