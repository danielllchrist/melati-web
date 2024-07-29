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
                <div class="profile">
                    <img class="pp-picture" src="{{ $user->profilePicturePath ? $user->profilePicturePath : '/storage/uploads/daniel.png' }}" alt="" id="profilepicture">
                    <p>{{ Str::limit(strtok($user->name, ' '), 10) }}</p>
                </div>
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <a href="{{ route('ShippingServiceProfile') }}"><h2 class="menu">Akun</h2></a>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="{{ route('ShippingServiceProfile') }}#profil">Profil</a></li>
                        <li><a href="{{ route('ShippingServiceProfile') }}#ganti_password">Ganti Kata Sandi</a></li>
                        <li><a href="{{ route('ShippingServiceProfile') }}#keluar">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
