<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite('resources/css/admin/orderstatus.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="main-content">
        <div class="page-title">
            <div class="title">
                <h1>Order</h1>
            </div>
        </div>
        <div class="main-content">
            {{-- @livewire('order-search-bar') --}}
            <div class="inner-container">
                <div class="ps-header">
                    <div class="padding-search-custom">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="ps-search-custom-container">
                                <img src="/assets/search-white.svg" alt="search" width="15" height="15">
                                <input wire:model.live="search" class = "ps-search-custom" type="search"
                                    placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ps-content">
                    <div class="ps-status-menu">
                        <ul class="status-menu">
                            <li><button id="menu-menunggu" class="ps-menu-link active-menus">Menunggu Konfirmasi</button></li>
                            <li><button id="menu-proses" class="ps-menu-link">Dalam Proses</button></li>
                            <li><button id="menu-pengiriman" class="ps-menu-link">Dalam Pengiriman</button></li>
                            <li><button id="menu-sampai" class="ps-menu-link">Tiba di Tujuan</button></li>
                            <li><button id="menu-batal" class="ps-menu-link">Dibatalkan</button></li>
                        </ul>
                    </div>

                    <div id="order-list1" class="order-list">

                        @forelse ($orders1 as $order)
                            <a href="{{ route('adminPesanan', $order->transactionID) }}" class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="/assets/information_green_button.svg" alt="info"
                                                class="i">
                                            <div class="menunggu-konfirmasi status">{{ $order->status->statusName }}
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="/assets/top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Size: Size</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan: </p>
                                        <h3>Rp. {{ $order->totalPrice }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="ps-order">
                                No Order Yet
                            </div>
                        @endforelse
                    </div>

                    <div id="order-list2" class="order-list" style="display: none;">
                        @forelse ($orders2 as $order)
                            <a href="{{ route('adminPesanan', $order->transactionID) }}" class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="/assets/information_green_button.svg" alt="info"
                                                class="i">
                                            <div class="dalam-proses status">{{ $order->status->statusName }}</div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="/assets/top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Size: Size</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan: </p>
                                        <h3>Rp. {{ $order->totalPrice }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="ps-order">
                                No Order Yet
                            </div>
                        @endforelse
                    </div>

                    <div id="order-list3" class="order-list" style="display: none;">
                        @forelse ($orders3 as $order)
                            <a href="{{ route('adminPesanan', $order->transactionID) }}" class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="/assets/information_green_button.svg" alt="info"
                                                class="i">
                                            <div class="dalam-proses status">{{ $order->status->statusName }}</div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="/assets/top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Size: Size</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan: </p>
                                        <h3>Rp. {{ $order->totalPrice }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="ps-order">
                                No Order Yet
                            </div>
                        @endforelse
                    </div>

                    <div id="order-list4" class="order-list" style="display: none;">
                        @forelse ($orders4 as $order)
                            <a href="{{ route('adminPesanan', $order->transactionID) }}" class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="/assets/information_green_button.svg" alt="info"
                                                class="i">
                                            <div class="dalam-proses status">Tiba di Tujuan</div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="/assets/top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Size: Size</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan: </p>
                                        <h3>Rp. {{ $order->totalPrice }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="ps-order">
                                No Order Yet
                            </div>
                        @endforelse
                    </div>

                    <div id="order-list5" class="order-list" style="display: none;">
                        @forelse ($orders5 as $order)
                            <a href="{{ route('adminPesanan', $order->transactionID) }}" class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="/assets/information_green_button.svg" alt="info"
                                                class="i">
                                            <div class="dalam-proses status">{{ $order->status->statusName }}</div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="/assets/top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Size: Size</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan: </p>
                                        <h3>Rp. {{ $order->totalPrice }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="ps-order">
                                No Order Yet
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>

        @include('components.admin.footeradmin')

        {{-- @vite('resources/js/admin/orderstatus.js') --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.ps-menu-link');
                const orderList1 = document.getElementById('order-list1');
                const orderList2 = document.getElementById('order-list2');
                const orderList3 = document.getElementById('order-list3');
                const orderList4 = document.getElementById('order-list4');
                const orderList5 = document.getElementById('order-list5');

                buttons.forEach(button => {
                    button.addEventListener('click', () => {
                        buttons.forEach(btn => btn.classList.remove('active-menus'));
                        button.classList.add('active-menus');

                        if (button.id === 'menu-menunggu') {
                            orderList1.style.display = 'block';
                            orderList2.style.display = 'none';
                            orderList3.style.display = 'none';
                            orderList4.style.display = 'none';
                            orderList5.style.display = 'none';
                        } else if (button.id === 'menu-proses') {
                            orderList1.style.display = 'none';
                            orderList2.style.display = 'block';
                            orderList3.style.display = 'none';
                            orderList4.style.display = 'none';
                            orderList5.style.display = 'none';
                        } else if (button.id === 'menu-pengiriman') {
                            orderList1.style.display = 'none';
                            orderList2.style.display = 'none';
                            orderList3.style.display = 'block';
                            orderList4.style.display = 'none';
                            orderList5.style.display = 'none';
                        } else if (button.id === 'menu-sampai') {
                            orderList1.style.display = 'none';
                            orderList2.style.display = 'none';
                            orderList3.style.display = 'none';
                            orderList4.style.display = 'block';
                            orderList5.style.display = 'none';
                        } else if (button.id === 'menu-batal') {
                            orderList1.style.display = 'none';
                            orderList2.style.display = 'none';
                            orderList3.style.display = 'none';
                            orderList4.style.display = 'none';
                            orderList5.style.display = 'block';
                        }
                    });
                });

                // Initial check to show/hide order lists based on the active menu
                const activeMenu = document.querySelector('.ps-menu-link.active-menus');
                if (activeMenu.id === 'menu-menunggu') {
                    orderList1.style.display = 'block';
                    orderList2.style.display = 'none';
                } else if (activeMenu.id === 'menu-proses') {
                    orderList1.style.display = 'none';
                    orderList2.style.display = 'block';
                } else {
                    orderList1.style.display = 'none';
                    orderList2.style.display = 'none';
                }
            });
        </script>
</body>

</html>
