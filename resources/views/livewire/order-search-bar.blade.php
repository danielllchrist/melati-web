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
