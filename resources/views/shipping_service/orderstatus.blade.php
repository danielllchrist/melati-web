<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Melati</title>
    @vite('resources/css/shipping_service/orderstatus.css')
    @vite('resources/css/app.css')

    <style>
        .box-1 {
            background-image: url('/assets/backgroundHijau.png');
        }

        .box-2 {
            background-image: url('/assets/backgroundMerah.png');
        }

        .box-3 {
            background-image: url('/assets/backgroundCoklat.png');
        }

        .order-list a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-black">
    @include('components.shipping_service.headerss')
    <div class="container d-flex justify-content-between mt-5 mb-5">
        <div class="d-flex box-1 justify-content-between align-items-center">
            <div class="box-left">
                <p id="need">Need to be picked up</p>
                <p class="count">{{ $countOrders2updated }}</p>
            </div>
            <div class="box-right">
                <img src="/assets/iconPickUp.png" class="pickup-img">
            </div>
        </div>

        <div class="d-flex box-2 justify-content-between align-items-center">
            <div class="box-left">
                <p>On Delivery</p>
                <p class="count">{{ $order3Count }}</p>
            </div>
            <div class="box-right">
                <img src="/assets/iconDelivery.png" class="delivery-img">
            </div>
        </div>

        <div class="d-flex box-3 justify-content-between align-items-center">
            <div class="box-left">
                <p>Total Order</p>
                <p class="count" id="total-order">{{ $orders->count() }}</p>
                <form action="{{ route('orderstatus') }}" method="GET">
                    <select name="sortBy" id="sortBy" onchange="this.form.submit()">
                        <option value="4" {{ request('sortBy') == '4' ? 'selected' : '' }}>Semua</option>
                        <option value="1" {{ request('sortBy') == '1' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="2" {{ request('sortBy') == '2' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="3" {{ request('sortBy') == '3' ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                </form>
            </div>
            <div class="box-right">
                <img src="/assets/iconDone.png" class="done-img">
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="inner-container">
            {{-- <div class="ps-header">
                <div class="padding-search-custom">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="ps-search-custom-container"><img src="/assets/search-white.svg" alt="search"
                                width="15" height="15"><input class="ps-search-custom" type="text"
                                placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk" action="/shipping-service">
                        </div>
                    </form>
                </div>
            </div> --}}
            <div class="ps-content">
                <div class="ps-status-menu">
                    <ul class="status-menu">
                        <li id="tab1" class="ps-menu-link active-menus" onclick="setActive(event, 'content1')">
                            Perlu Diantar</li>
                        <li id="tab2" class="ps-menu-link" onclick="setActive(event, 'content2')">Dalam Pengiriman
                        </li>
                        <li id="tab3" class="ps-menu-link" onclick="setActive(event, 'content3')">Tiba di Tujuan
                        </li>
                    </ul>
                </div>
                <div class="ps-order">
                    <div id="content1" class="order-list">
                        <table id="dataTable">
                            <thead>
                                <tr class="table-cell">
                                    <th class="id-cell">ID Pesanan</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Nomor Telepon</th>
                                    <th>Status</th>
                                    <th>Detail Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders2updated as $order)
                                    <tr>
                                        <td>#{{ $order->transactionID }}</td>
                                        <td>{{ $order->address->receiver }}</td>
                                        <td>{{ $order->address->detailAddress }}<br>
                                            {{ $order->address->cityOrRegency }}, {{ $order->address->province }}
                                        </td>
                                        <td>{{ $order->address->phoneNum }}</td>
                                        <td>
                                            <div class="ps-info">
                                                <div class="menunggu-konfirmasi">Perlu Diantar</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ps-info">
                                                <a href='{{ route('ShippingServiceOrder', $order->transactionID) }}'>
                                                    <img src="/assets/information_green_button.svg" width="30"
                                                        height="30" alt="info">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <div class="no-order">
                                            Belum ada Pesanan
                                        </div>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="content2" class="order-list" style="display: none;">
                        <table id="dataTable">
                            <thead>
                                <tr class="table-cell">
                                    <th class="id-cell">ID Pesanan</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Nomor Telepon</th>
                                    <th>Status</th>
                                    <th>Detail Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders3 as $order)
                                    <tr>
                                        <td>#{{ $order->transactionID }}</td>
                                        <td>{{ $order->address->receiver }}</td>
                                        <td>{{ $order->address->detailAddress }}<br>
                                            {{ $order->address->cityOrRegency }},
                                            {{ $order->address->province }}
                                        </td>
                                        <td>{{ $order->address->phoneNum }}</td>
                                        <td>
                                            <div class="ps-info">
                                                <div class="menunggu-konfirmasi">Dalam Pengiriman</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ps-info">
                                                <a href="{{ route('ShippingServiceOrder', $order->transactionID) }}">
                                                    <img src="/assets/information_green_button.svg" width="30"
                                                        height="30" alt="info">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <div class="no-order">
                                            Belum ada Pesanan
                                        </div>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="content3" class="order-list" style="display: none;">
                        <table id="dataTable">
                            <thead>
                                <tr class="table-cell">
                                    <th class="id-cell">ID Pesanan</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Nomor Telepon</th>
                                    <th>Status</th>
                                    <th>Detail Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders4 as $order)
                                    <tr>
                                        <td>#{{ $order->transactionID }}</td>
                                        <td>{{ $order->address->receiver }}</td>
                                        <td>{{ $order->address->detailAddress }}<br>
                                            {{ $order->address->cityOrRegency }},
                                            {{ $order->address->province }}
                                        </td>
                                        <td>{{ $order->address->phoneNum }}</td>
                                        <td>
                                            <div class="ps-info">
                                                <div class="menunggu-konfirmasi">Tiba di Tujuan</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ps-info">
                                                <a href="{{ route('ShippingServiceOrder', $order->transactionID) }}">
                                                    <img src="/assets/information_green_button.svg" width="30"
                                                        height="30" alt="info">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <div class="no-order">
                                            Belum ada Pesanan
                                        </div>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function setActive(event, contentId) {
            event.preventDefault();
            const links = document.querySelectorAll('.ps-menu-link');
            const orderLists = document.querySelectorAll('.order-list');

            links.forEach(link => link.classList.remove('active-menus'));
            orderLists.forEach(list => list.style.display = 'none');

            event.currentTarget.classList.add('active-menus');
            document.getElementById(contentId).style.display = 'block';
        }
    </script>
    @include('components.shipping_service.footerss')
</body>

</html>
