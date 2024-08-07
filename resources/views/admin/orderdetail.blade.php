<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detil Pesanan</title>
    @vite('resources/css/app.css')
    @vite('resources/css/admin/orderdetail.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="page-title">
        <div class="title-wrapper">
            <div class="title">
                <a href="{{ route('AdminStatus') }}"><img src="\assets\dummy-img\back arrow.svg" alt=""></a>
                <h1>Pesanan #{{ $order->transactionID }}</h1>
            </div>
        </div>
    </div>

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
                <p class="penerima">{{ $order->address->receiver }}</p>
                <p class="no-telp">{{ $order->address->phoneNum }}</p>
                <p class="alamat">{{ $order->address->detailAddress }}</p>
                <p class="kelurahan-kota-kabupaten">{{ $order->address->cityOrRegency }},
                    {{ $order->address->province }}</p>
                <p class="provinsi">{{ $order->address->description }}</p>
            </div>
            <div class="segment order">
                <h4 class="segment-title" id="product-title">Pesanan</h4>
                <div class="products">
                    @foreach ($order->transactionDetail as $o)
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ Storage::url(json_decode($o->product->productPicturePath)[0]) }}" alt="">
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">{{ $o->product->productName }}</h4>
                                <div class="product-size-and-quantity">
                                    <h4 class="product-size">Ukuran : {{ $o->size->size }}</h4>
                                </div>
                                <div class="wrap">
                                    <h4 class="product-qty">x{{ $o->quantity }}</h4>
                                    <h4 class="product-price">{{ 'Rp ' . number_format($o->product->productPrice , 0, ',', '.') }}</</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="segment order-amount">
                <div class="amount">
                    <div class="amount-item">
                        <p class="amount-item-name">Subtotal</p>
                        <p class="amount-item-value">{{ 'Rp ' . number_format($order->subTotalPrice, 0, ',', '.') }}</</p>
                    </div>
                    <div class="amount-item">
                        <p class="amount-item-name">Diskon</p>
                        <p class="amount-item-value">{{ '-Rp ' . number_format($order->totalDiscount , 0, ',', '.') }}</p>
                    </div>
                    <div class="amount-item last-item">
                        <p class="amount-item-name">Ongkos Kirim</p>
                        <p class="amount-item-value">{{ 'Rp ' . number_format($order->shippingFee , 0, ',', '.') }}<//p>
                    </div>
                    <div class="total">
                        <h3 class="amount-item-name">Total</h3>
                        <h3 class="amount-item-value">{{ 'Rp ' . number_format($order->totalPrice , 0, ',', '.') }}</h3>
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
                        <a href="javascript:void(0)" class="button"
                            onclick="confirmOrder('{{ $order->transactionID }}')">Konfirmasi Pesanan</a>
                    </div>
                    <div class="btn-wrapper">
                        <a href="javascript:void(0)" class="button"
                            onclick="rejectOrder('{{ $order->transactionID }}')">Tolak Pesanan</a>
                    </div>
                @endif
            </div>
    </section>
    @include('components.admin.footeradmin')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmOrder(transactionID) {
            $.ajax({
                url: '{{ route('AdminConfirmOrder') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    transactionID: transactionID
                },
                success: function(response) {
                    if (response.success) {
                        alert('Berhasil mengonfirmasi pesanan');
                        location.reload();
                    } else {
                        alert('Pesanan gagal');
                    }
                }
            });
        }

        function rejectOrder(transactionID) {
            $.ajax({
                url: '{{ route('AdminRejectOrder') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    transactionID: transactionID
                },
                success: function(response) {
                    if (response.success) {
                        alert('Berhasil menolak pesanan');
                        location.reload();
                    } else {
                        alert('Gagal menolak pesanan');
                    }
                },
                error: function() {
                    alert('Error rejecting order.');
                }
            });
        }

        function sendOrder(transactionID) {
            $.ajax({
                url: '{{ route('AdminSendOrder') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    transactionID: transactionID
                },
                success: function(response) {
                    if (response.success) {
                        alert('Tunggu Jasa Pengiriman Datang!');
                        location.reload(); // Reload halaman untuk memperbarui status
                    } else {
                        alert('Gagal mengirim pesanan');
                    }
                },
                error: function() {
                    alert('Error sending order.');
                }
            });
        }
    </script>
</body>

</html>
