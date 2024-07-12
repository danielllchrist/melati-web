<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, and other head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title>
    <!-- Include CSS files here -->
    @vite('resources/css/app.css')
    @vite('resources/css/customer/orderdetail.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content">
            <div class="content">
                <section>
                    <div class="page-title">
                        <div class="title-wrapper">
                            <a href="{{ route('CustomerMyOrder') }}">
                                <div class="title">
                                    <img src="\assets\dummy-img\back arrow.svg" alt="">
                                    <h1>Pesanan #001</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="order-detail">
                        <div class="status-img">
                            @if ($order->status->statusName == 'Menunggu Konfirmasi')
                                <img src="\assets\dummy-img\status1.svg" alt="">
                            @elseif ($order->status->statusName == 'Sedang di Proses')
                                <img src="\assets\dummy-img\status2.svg" alt="">
                            @elseif ($order->status->statusName == 'Dalam Pengiriman')
                                <img src="\assets\dummy-img\status3.svg" alt="">
                            @elseif ($order->status->statusName == 'Tiba di Tujuan')
                                <img src="\assets\dummy-img\status4.svg" alt="">
                            @elseif ($order->status->statusName == 'Penilaian')
                                <img src="\assets\dummy-img\status5.svg" alt="">
                            @elseif ($order->status->statusName == 'Dibatalkan')
                                <img id="batal" src="\assets\dummy-img\status6.svg" alt="">
                            @elseif ($order->status->statusName == 'Dikembalikan')
                                <img id="batal" src="\assets\dummy-img\status7.svg" alt="">
                            @endif
                        </div>
                        <div class="segment delivery-address">
                            <h4 class="segment-title">Alamat Pengiriman</h4>
                            <p class="penerima">{{$order->address->receiver}}</p>
                            <p class="no-telp">{{$order->address->phoneNum}}</p>
                            <p class="alamat">{{$order->address->detailAddress}}</p>
                            <p class="kelurahan-kota-kabupaten">{{$order->address->cityOrRegency}}, {{$order->address->province}}</p>
                            <p class="provinsi">{{$order->address->description}}</p>
                        </div>
                        <div class="segment order">
                            <h4 class="segment-title" id="product-title">Pesanan</h4>
                            <div class="products">
                                @foreach ($order->transactionDetail as $o)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="\assets\dummy-img\Rectangle 28.png" alt="">
                                        </div>
                                        <div class="product-info">
                                            <h4 class="product-name">{{ $o->product->productName }}</h4>
                                            <div class="product-size-and-quantity">
                                                <h4 class="product-size">Ukuran : {{ $o->size->size }}</h4>
                                                <h4 class="product-qty">x{{ $o->quantity }}</h4>
                                            </div>
                                            <h4 class="product-price">Rp {{ $o->product->productPrice }}</h4>
                                            @if ($order->status->statusName == 'Penilaian')
                                                <div class="rate"><div class="rate-wrapper"><a href=""><div class="rate-btn">Nilai</div></a></div></div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="segment order-amount">
                            <div class="amount">
                                <div class="amount-item">
                                    <p class="amount-item-name">Subtotal</p>
                                    <p class="amount-item-value">Rp {{ $order->subTotalPrice }}</p>
                                </div>
                                <div class="amount-item">
                                    <p class="amount-item-name">Diskon</p>
                                    <p class="amount-item-value">- Rp {{ $order->totalDiscount }}</p>
                                </div>
                                <div class="amount-item last-item">
                                    <p class="amount-item-name">Ongkos Kirim</p>
                                    <p class="amount-item-value">Rp {{ $order->shippingFee }}</p>
                                </div>
                                <div class="total">
                                    <h3 class="amount-item-name">Total</h3>
                                    <h3 class="amount-item-value">Rp {{ $order->totalPrice }}</h3>
                                </div>
                                <div class="payment-method">
                                    <img src="\assets\dummy-img\cc.svg" alt="">
                                    <p class="amount-item-value">{{ $order->paymentMethod }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="submit">
                            @if ($order->status->statusName == 'Menunggu Konfirmasi')
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="button" onclick="cancelOrder('{{ $order->transactionID }}')">Batalkan Pesanan</a>
                                </div>
                            @elseif ($order->status->statusName == 'Tiba di Tujuan')
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="button" onclick="accOrder('{{ $order->transactionID }}')">Pesanan diterima</a>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="button" onclick="returnOrder('{{ $order->transactionID }}')">Ajukan Pengembalian</a>
                                </div>
                            @elseif ($order->status->statusName == 'Penilaian')
                                {{-- <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="button" onclick="rateOrder('{{ $order->transactionID }}')">Pesanan diterima</a>
                                </div> --}}
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @include('components.customer.footercustomer')
        <!-- Ensure jQuery is loaded -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function cancelOrder(transactionID) {
                $.ajax({
                    url: '{{ route('CustomerCancelOrder') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        transactionID: transactionID
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Berhasil membatalkan pesanan');
                            location.reload();
                        } else {
                            alert('Gagal membatalkan pesanan');
                        }
                    },
                    error: function() {
                        alert('Error.');
                    }
                });
            }
            function accOrder(transactionID) {
                $.ajax({
                    url: '{{ route('CustomerAcceptOrder') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        transactionID: transactionID
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Berhasil menerima pesanan');
                            location.reload();
                        } else {
                            alert('Gagal menerima pesanan');
                        }
                    },
                    error: function() {
                        alert('Error order.');
                    }
                });
            }
            function returnOrder(transactionID) {
                $.ajax({
                    url: '{{ route('CustomerReturnOrder') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        transactionID: transactionID
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Berhasil mengembalikan pesanan');
                            location.reload();
                        } else {
                            alert('Gagal mengembalikan pesanan');
                        }
                    },
                    error: function() {
                        alert('Error order.');
                    }
                });
            }
        </script>
    </body>
</html>
