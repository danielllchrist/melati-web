<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Melati</title>
    @vite('resources/css/shipping_service/orderstatus.css')
    @vite('resources/css/app.css')

    <style>
        .box-1 {
            background-image: url('assets/backgroundHijau.png');
        }

        .box-2 {
            background-image: url('assets/backgroundMerah.png');
        }

        .box-3 {
            background-image: url('assets/backgroundCoklat.png');
        }
    </style>
</head>

<body class = "bg-black" >
    @include('components.shipping_service.headerss')
    <div class="container d-flex justify-content-between mt-5 mb-5">
        <div class="d-flex box-1 justify-content-between align-items-center">
            <div class="box-left">
                <p>Need to be picked up</p>
                <p class="count">15</p>
            </div>
            <div class="box-right">
                <img src="assets/iconPickUp.png" class="pickup-img">
            </div>
        </div>

        <div class="d-flex box-2 justify-content-between align-items-center">
            <div class="box-left">
                <p>On Delivery</p>
                <p class="count">37</p>
            </div>
            <div class="box-right">
                <img src="assets/iconDelivery.png" class="delivery-img">
            </div>
        </div>

        <div class="d-flex box-3 justify-content-between align-items-center">
            <div class="box-left">
                <p>Total Order</p>
                <p class="count" id="total-order">543</p>
                <select name="sortBy" id="sortBy" onchange="order(this)">
                    <option value="1">This Week</option>
                    <option value="2">This Month</option>
                    <option value="3">This Year</option>
                    <option value="4">All Orders</option>
                </select>
            </div>
            <div class="box-right">
                <img src="assets/iconDone.png" class="done-img">
            </div>
        </div>
    </div>

    <div class="main-content ">
        <div class="inner-container">
            <div class = "ps-header">
                <div class = "padding-search-custom">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="ps-search-custom-container"><img src = "assets/search-white.svg" alt = "search"
                                width = "15" height = "15"><input class = "ps-search-custom" type="text"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function order(atr){
            var kategori = atr.value;

            if(kategori == 1){
                document.getElementById("total-order").innerHTML = "543";
            }else if(kategori == 2){
                document.getElementById("total-order").innerHTML = "1020";
            }else if(kategori == 3){
                document.getElementById("total-order").innerHTML = "3183";
            }else{
                document.getElementById("total-order").innerHTML = "4746";
            }
        }
    </script>
    @include('components.shipping_service.footerss')
</body>

</html>
