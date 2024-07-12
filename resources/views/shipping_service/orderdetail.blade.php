<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detil Pesanan</title>
    @vite('resources/css/app.css')
    @vite('resources/css/shipping_service/orderdetail.css')
</head>

<body>
    @include('components.shipping_service.headerss')
    <section>
        <div class="page-title">
            <div class="title-wrapper">
                <div class="title">
                    <a href="{{ route('ShippingServiceDashboard') }}">
                        <img src="\assets\dummy-img\back arrow.svg" alt="">
                    </a>
                    <h1>Pesanan #{{ $order->transactionID }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="order-detail">
            <div class="status-img">
                @if ($order->status->statusName == 'Sedang di Proses')
                    <img src="\assets\dummy-img\status ss 1.svg" alt="">
                @elseif ($order->status->statusName == 'Dalam Pengiriman')
                    <img src="\assets\dummy-img\status ss 2.svg" alt="">
                @elseif ($order->status->statusName == 'Tiba di Tujuan')
                    <img src="\assets\dummy-img\status ss 3.svg" alt="">
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
                                <img src="\assets\dummy-img\Rectangle 28.png" alt="">
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">{{ $o->product->productName }}</h4>
                                <div class="product-size-and-quantity">
                                    <h4 class="product-size">Ukuran : {{ $o->size->size }}</h4>
                                </div>
                                <div class="wrap">
                                    <h4 class="product-qty">x{{ $o->quantity }}</h4>
                                    <h4 class="product-price">Rp {{ $o->product->productPrice }}</h4>
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
                @if ($order->status->statusName == 'Sedang di Proses')
                    <div class="btn-wrapper">
                        <a href="javascript:void(0)" class="button"
                            onclick="sendOrder('{{ $order->transactionID }}')">Antar Pesanan</a>
                    </div>
                @elseif ($order->status->statusName == 'Dalam Pengiriman')
                    <div class="btn-wrapper">
                        <a href="javascript:void(0)" class="button"
                            onclick="doneOrder('{{ $order->transactionID }}')">Selesai Mengantar Pesanan</a>
                    </div>
                @endif
            </div>
    </section>
    @include('components.shipping_service.footerss')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function sendOrder(transactionID) {
            $.ajax({
                url: '{{ route('ShippingServiceSendOrder') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    transactionID: transactionID
                },
                success: function(response) {
                    if (response.success) {
                        alert('Antar Pesanan Sekarang!');
                        location.reload();
                    } else {
                        alert('Pesanan gagal');
                    }
                }
            });
        }
        function doneOrder(transactionID) {
            $.ajax({
                url: '{{ route('ShippingServiceDoneOrder') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    transactionID: transactionID
                },
                success: function(response) {
                    if (response.success) {
                        alert('Pesanan Selesai Diantar');
                        location.reload();
                    } else {
                        alert('Pesanan gagal');
                    }
                }
            });
        }
    </script>
</body>

</html>
