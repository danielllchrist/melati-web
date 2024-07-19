<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/components/customer/sidebarcustomer.css')
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="sidebar-back">
                <div class="profile">
                    <img class="pp-picture" src="{{ $user->profilePicturePath }}" alt="" id="profilepicture">
                    <p>{{ Str::limit(strtok($user->name, ' '), 10) }}</p>
                </div>
            </div>
            <div class="sidebar-menu-container">
                <div class="sidebar-menu">
                    <a href="{{ route('CustomerProfile') }}"><h2 class="menu">Akun</h2></a>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="#profil">Profil</a></li>
                        <li><a href="#ganti_password">Ganti Kata Sandi</a></li>
                        <li><a href="#keluar">Keluar</a></li>
                    </ul>
                </div>
                <div class="sidebar-menu">
                    <a href="{{ route('CustomerMyOrder') }}"><h2 class="menu">Pesanan</h2></a>
                    <ul class="spacing-sidebarmenu">
                        <li><a href="{{ route('CustomerMyOrder') }}">Pesanan Saya</a></li>
                        {{-- <li><a href="{{ route('CustomerReturn') }}">Pengembalian Pesanan</a></li> --}}
                    </ul>
                </div>
                <div class="sidebar-menu">
                    <a href="{{ route('alamat-saya.index') }}"><h2 class="menu">Alamat</h2></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
