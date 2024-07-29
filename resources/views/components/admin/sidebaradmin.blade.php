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
                <div class="profile">
                    <img class="pp-picture" src="{{ $user->profilePicturePath ? $user->profilePicturePath : '/storage/uploads/daniel.png' }}" alt="" id="profilepicture">
                    <p>{{ Str::limit(strtok($user->name, ' '), 10) }}</p>
                </div>
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <a href="{{ route('AdminProfile') }}"><h2 class="menu">Akun</h2></a>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="{{ route('AdminProfile') }}#profil">Profil</a></li>
                        <li><a href="{{ route('AdminProfile') }}#ganti_password">Ganti Kata Sandi</a></li>
                        <li><a href="{{ route('AdminProfile') }}#keluar">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
