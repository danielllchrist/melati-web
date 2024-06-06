<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite('resources/css/shipping_service/orderstatus.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.shipping_service.headerss')
    <div class="main-content ">
        <div class="inner-container">
            <div class = "ps-header">
                <div class = "padding-search-custom">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="ps-search-custom-container"><img src = "assets/search-white.svg" alt = "search"
                                width = "19" height = "19"><input class = "ps-search-custom" type="text"
                                placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                        </div>
                    </form>
                </div>
            </div>
            <div class="ps-content">
                <div class="ps-status-menu">
                    <ul class="status-menu">
                        <li><a class = "ps-menu-link active-menus" href="#">Menunggu Diambil</a></li>
                        <li><a class = "ps-menu-link" href="#">Dalam Pengiriman</a></li>
                        <li><a class = "ps-menu-link" href="#">Sudah Tiba</a></li>
                    </ul>
                </div>
                <div class="ps-order">
                    <table id="dataTable">
                        <thead>
                            <tr class = "table-cell">
                                <th class = "id-cell">ID Pesanan</th>
                                <th>Nama Penerima</th>
                                <th>Alamat Pengiriman</th>
                                <th>Nomor Telepon</th>
                                <th>Status</th>
                                <th>Detail Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>#001</td>
                                    <td>Grace</td>
                                    <td>Jalan Pakuan No.3
                                        Sentul, Kabupaten Bogor
                                        Jawa Barat</td>
                                    <td>(+62)123456789</td>
                                    <td>
                                        <div class = "ps-info">
                                            <div class="menunggu-konfirmasi">Menunggu Konfirmasi</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class = "ps-info">
                                            <img src="assets/information_green_button.svg" width = "30" height = "30"
                                                alt="info">
                                        </div>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('components.shipping_service.footerss')
</body>

</html>
