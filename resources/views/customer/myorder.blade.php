<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite('resources/css/customer/myorder.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content">
            <div class="inner-container">
                <div id="pesanan" class="section">
                    <div class="ps-header">
                        <h2 class="ps-title">Pesanan Saya</h2>
                        <div class="padding-search-custom">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="ps-search-custom-container">
                                    <img src="assets/search-white.svg" alt="search" width="19" height="19"
                                        onclick="hidePassword()">
                                    <input class="ps-search-custom" type="text"
                                        placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ps-content">
                        <div class="ps-status-menu">
                            <ul class="status-menu">
                                <li><a class="ps-menu-link active-menus" href="#"
                                        onclick="setActive(event, 'Menunggu Konfirmasi')">Menunggu Konfirmasi</a>
                                </li>
                                <li><a class="ps-menu-link" href="#" onclick="setActive(event, 'Diproses')">Dalam
                                        Proses</a></li>
                                <li><a class="ps-menu-link" href="#"
                                        onclick="setActive(event, 'Sedang Dikirim')">Dalam Pengiriman</a></li>
                                <li><a class="ps-menu-link" href="#" onclick="setActive(event, 'Tiba')">Tiba di
                                        Tujuan</a></li>
                                <li><a class="ps-menu-link" href="#" onclick="setActive(event, 'Dibatalkan')">Dibatalkan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ps-order">
                            <div class="ps-status-order">
                                <h3>Order #001</h3>
                                <div class="ps-info">
                                    <img src="\assets\information_green_button.svg" alt="info">
                                    <div class="menunggu-konfirmasi">Menunggu Konfirmasi</div>
                                </div>
                            </div>
                            <div class="ps-order-detail">
                                <div class="ps-picture">
                                    <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                    <div class="ps-picture-text">
                                        <h2 class="name">Eau De Toilette</h2>
                                        <p>Size : L</p>
                                    </div>
                                </div>
                                <div class="ps-total">
                                    <p>x1</p>
                                    <p class="fw-bold">Rp. 100,000.00</p>
                                </div>
                            </div>
                            <div class="ps-order-detail">
                                <div class="ps-picture">
                                    <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                    <div class="ps-picture-text">
                                        <h2 class="name">Eau De Toilette</h2>
                                        <p>Size : L</p>
                                    </div>
                                </div>
                                <div class="ps-total">
                                    <p>x1</p>
                                    <p class="fw-bold">Rp. 100,000.00</p>
                                </div>
                            </div>
                            <div class="ps-order-detail">
                                <div class="ps-picture">
                                    <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                    <div class="ps-picture-text">
                                        <h2 class="name">Eau De Toilette</h2>
                                        <p>Size : L</p>
                                    </div>
                                </div>
                                <div class="ps-total">
                                    <p>x1</p>
                                    <p class="fw-bold">Rp. 100,000.00</p>
                                </div>
                            </div>
                            <div class="ps-total-order">
                                <p>Total Pesanan :</p>
                                <h3>Rp. 300,000.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pengembalian" class="section">
                    <div class="ps-header">
                        <h2 class="ps-title">Pengembalian Pesanan</h2>
                        <div class="padding-search-custom">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="ps-search-custom-container">
                                    <img src="assets/search-white.svg" alt="search" width="19" height="19"
                                        onclick="hidePassword()">
                                    <input class="ps-search-custom" type="text"
                                        placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.customer.footercustomer')
    <script>
        function setActive(event, status) {
            var menuLinks = document.querySelectorAll('.ps-menu-link');
            menuLinks.forEach(function (link) {
                link.classList.remove('active-menus');
            });
            event.target.classList.add('active-menus');
            console.log('Status yang dipilih:', status);
        }
    </script>
</body>

</html>