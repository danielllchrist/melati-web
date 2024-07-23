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

<body id="pesanan">
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content">
            <div class="inner-container">
                <div class="section">
                    <div class="ps-header">
                        <h2 class="ps-title">Pesanan Saya</h2>
                        <div class="padding-search-custom">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="ps-search-custom-container">
                                    <img src="assets/search-white.svg" alt="search" width="19" height="19">
                                    <input class="ps-search-custom" type="text"
                                        placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ps-content">
                        <div class="ps-status-menu">
                            <ul class="status-menu">
                                <li><a class="ps-menu-link active-menus" href="#" id="menu-menunggu"
                                        onclick="setActive(event, 'order-list1')">Menunggu Konfirmasi</a></li>
                                <li><a class="ps-menu-link" href="#" id="menu-proses"
                                        onclick="setActive(event, 'order-list2')">Dalam Proses dan Pengiriman</a></li>
                                <li><a class="ps-menu-link" href="#" id="menu-tiba"
                                        onclick="setActive(event, 'order-list3')">Tiba di Tujuan</a></li>
                                <li><a class="ps-menu-link" href="#" id="menu-dinilai"
                                        onclick="setActive(event, 'order-list4')">Selesai</a></li>
                                <li><a class="ps-menu-link" href="#" id="menu-dibatalkan"
                                        onclick="setActive(event, 'order-list5')">Dibatalkan</a></li>
                            </ul>
                        </div>

                        <div id="order-list1" class="order-list">
                            @forelse ($orders1 as $order)
                                <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                    class="ps-order-wrap">
                                    <div class="ps-order">
                                        <div class="ps-status-order">
                                            <h3>Pesanan #{{ $order->transactionID }}</h3>
                                            <div class="ps-info">
                                                <img src="\assets\information_green_button.svg" alt="info"
                                                    class="i">
                                                <div class="menunggu-konfirmasi">{{ $order->status->statusName }}</div>
                                            </div>
                                        </div>
                                        @foreach ($order->transactionDetail as $detail)
                                            <div class="ps-order-detail">
                                                <div class="ps-picture">
                                                    <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                                    <div class="ps-picture-text">
                                                        <h2 class="name">{{ $detail->product->productName }}</h2>
                                                        <p>Ukuran: {{ $detail->size->size }}</p>
                                                    </div>
                                                </div>
                                                <div class="ps-total">
                                                    <p>x{{ $detail->quantity }}</p>
                                                    <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-total-order">
                                            <p>Total Pesanan :</p>
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
                                <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                    class="ps-order-wrap">
                                    <div class="ps-order">
                                        <div class="ps-status-order">
                                            <h3>Pesanan #{{ $order->transactionID }}</h3>
                                            <div class="ps-info">
                                                <img src="\assets\information_green_button.svg" alt="info"
                                                    class="i">
                                                <div class="menunggu-konfirmasi">{{ $order->status->statusName }}</div>
                                            </div>
                                        </div>
                                        @foreach ($order->transactionDetail as $detail)
                                            <div class="ps-order-detail">
                                                <div class="ps-picture">
                                                    <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                                    <div class="ps-picture-text">
                                                        <h2 class="name">{{ $detail->product->productName }}</h2>
                                                        <p>Size: {{ $detail->size->size }}</p>
                                                    </div>
                                                </div>
                                                <div class="ps-total">
                                                    <p>x{{ $detail->quantity }}</p>
                                                    <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-total-order">
                                            <p>Total Pesanan :</p>
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
                                <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                    class="ps-order-wrap">
                                    <div class="ps-order">
                                        <div class="ps-status-order">
                                            <h3>Pesanan #{{ $order->transactionID }}</h3>
                                            <div class="ps-info">
                                                <img src="\assets\information_green_button.svg" alt="info"
                                                    class="i">
                                                <div class="menunggu-konfirmasi">Tiba di Tujuan</div>
                                            </div>
                                        </div>
                                        @foreach ($order->transactionDetail as $detail)
                                            <div class="ps-order-detail">
                                                <div class="ps-picture">
                                                    <img src="\assets\top2.png" class="ps-picture-img"
                                                        alt="">
                                                    <div class="ps-picture-text">
                                                        <h2 class="name">{{ $detail->product->productName }}</h2>
                                                        <p>Size: {{ $detail->size->size }}</p>
                                                    </div>
                                                </div>
                                                <div class="ps-total">
                                                    <p>x{{ $detail->quantity }}</p>
                                                    <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-total-order">
                                            <p>Total Pesanan :</p>
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
                                <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                    class="ps-order-wrap">
                                    <div class="ps-order">
                                        <div class="ps-status-order">
                                            <h3>Pesanan #{{ $order->transactionID }}</h3>
                                            <div class="ps-info">
                                                <img src="\assets\information_green_button.svg" alt="info"
                                                    class="i">
                                                <div class="menunggu-konfirmasi">Selesai</div>
                                            </div>
                                        </div>
                                        @foreach ($order->transactionDetail as $detail)
                                            <div class="ps-order-detail">
                                                <div class="ps-picture">
                                                    <img src="\assets\top2.png" class="ps-picture-img"
                                                        alt="">
                                                    <div class="ps-picture-text">
                                                        <h2 class="name">{{ $detail->product->productName }}</h2>
                                                        <p>Size: {{ $detail->size->size }}</p>
                                                    </div>
                                                </div>
                                                <div class="ps-total">
                                                    <p>x{{ $detail->quantity }}</p>
                                                    <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-total-order">
                                            <p>Total Pesanan :</p>
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
                                <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                    class="ps-order-wrap">
                                    <div class="ps-order">
                                        <div class="ps-status-order">
                                            <h3>Pesanan #{{ $order->transactionID }}</h3>
                                            <div class="ps-info">
                                                <img src="\assets\information_green_button.svg" alt="info"
                                                    class="i">
                                                <div class="menunggu-konfirmasi" id="batal">
                                                    {{ $order->status->statusName }}
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($order->transactionDetail as $detail)
                                            <div class="ps-order-detail">
                                                <div class="ps-picture">
                                                    <img src="\assets\top2.png" class="ps-picture-img"
                                                        alt="">
                                                    <div class="ps-picture-text">
                                                        <h2 class="name">{{ $detail->product->productName }}</h2>
                                                        <p>Size: {{ $detail->size->size }}</p>
                                                    </div>
                                                </div>
                                                <div class="ps-total">
                                                    <p>x{{ $detail->quantity }}</p>
                                                    <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-total-order">
                                            <p>Total Pesanan :</p>
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
                    <div class="" id="pengembalian"></div>
                    <div class="ps-header">
                        <h2 class="ps-title">Pengembalian Pesanan</h2>
                        <div class="padding-search-custom">
                            <form class="form-inline my-2 my-lg-0">
                                <div class="ps-search-custom-container">
                                    <img src="assets/search-white.svg" alt="search" width="19" height="19">
                                    <input class="ps-search-custom" type="text"
                                        placeholder="Kamu bisa cari berdasarkan Nomor Pesanan/Nama Produk">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="order-list1" class="order-list pengembalian">
                        @forelse ($orders6 as $order)
                            <a href="{{ route('CustomerDetailOrder', $order->transactionID) }}"
                                class="ps-order-wrap">
                                <div class="ps-order">
                                    <div class="ps-status-order">
                                        <h3>Pesanan #{{ $order->transactionID }}</h3>
                                        <div class="ps-info">
                                            <img src="\assets\information_green_button.svg" alt="info"
                                                class="i">
                                            <div id="batal" class="menunggu-konfirmasi">{{ $order->status->statusName }}</div>
                                        </div>
                                    </div>
                                    @foreach ($order->transactionDetail as $detail)
                                        <div class="ps-order-detail">
                                            <div class="ps-picture">
                                                <img src="\assets\top2.png" class="ps-picture-img" alt="">
                                                <div class="ps-picture-text">
                                                    <h2 class="name">{{ $detail->product->productName }}</h2>
                                                    <p>Ukuran: {{ $detail->size->size }}</p>
                                                </div>
                                            </div>
                                            <div class="ps-total">
                                                <p>x{{ $detail->quantity }}</p>
                                                <p class="fw-bold">Rp. {{ $detail->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-total-order">
                                        <p>Total Pesanan :</p>
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
    </div>
    @include('components.customer.footercustomer')
    <script>
        function setActive(event, listId) {
            event.preventDefault();
            const links = document.querySelectorAll('.ps-menu-link');
            const orderLists = document.querySelectorAll('.order-list');

            links.forEach(link => link.classList.remove('active-menus'));
            orderLists.forEach(list => list.style.display = 'none');

            event.currentTarget.classList.add('active-menus');
            document.getElementById(listId).style.display = 'block';
        }
    </script>
</body>

</html>
