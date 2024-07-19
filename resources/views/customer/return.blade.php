<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengembalian Barang</title>
    @vite('resources/css/app.css')
    @vite('resources/css/customer/return.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="container">
        <div class="page-title">
            <a href="">
                <div class="title">
                    <img src="assets\dummy-img\back arrow.svg" alt="">
                    <h1>Pengembalian Barang</h1>
                </div>
            </a>
        </div>

        <section>
            <div class="title-div">
                <h2>Produk yang ingin Anda kembalikan :</h2>
            </div>
            <div class="products">
                @foreach ($transaction->transactionDetail as $detail)
                <div class="product">
                    <div class="product-img">
                        <img src="\assets\dummy-img\Rectangle 28.png" alt="">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">{{ $detail->product->productName }}</h4>
                        <div class="product-size-and-quantity">
                            <h4 class="product-size">Ukuran : {{ $detail->size->size }}</h4>
                            <h4 class="product-qty">x{{ $detail->quantity }}</h4>
                        </div>
                        <h4 class="product-price">Rp {{ number_format($detail->product->productPrice ,2)}}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="title-div">
                <h2>Kenapa Anda ingin mengembalikan pesanan ini?</h2>
            </div>
            <div class="reason">
                <form action="{{ route('CustomerReturn.store', ['transactionID' => $transaction->transactionID]) }}" method="post">
                    @csrf
                    <div class="text-area-wrapper">
                        <textarea name="reason" id="reason" maxlength="1000" placeholder="Beri tahu kami tentang pesanan Anda." required></textarea>
                    </div>
                    <div class="submit-btn-wrapper">
                        <button type="submit" class="submit-btn">Kirim</button>
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div class="title-div">
                <h2>Detail Pengembalian</h2>
            </div>
            <div class="refund">
                <div class="refund-detail">
                    <p class="fund">Subtotal</p>
                    <p class="fund-value">Rp {{ number_format($transaction->subTotalPrice, 2) }}</p>
                </div>
                <div class="refund-detail">
                    <p class="fund">Diskon</p>
                    <p class="fund-value">- Rp {{ number_format($transaction->totalDiscount, 2) }}</p>
                </div>
                <div class="refund-detail">
                    <p class="fund">Ongkos Kirim</p>
                    <p class="fund-value">Rp {{ number_format($transaction->shippingFee, 2) }}</p>
                </div>
                <div class="refund-details">
                    <h3 class="fund">Total Pengembalian Dana</h3>
                    <h3 class="fund-value">Rp {{ number_format($transaction->totalPrice, 2) }}</h3>
                </div>
            </div>
        </section>
    </div>
    @include('components.customer.footercustomer')
</body>

</html>
