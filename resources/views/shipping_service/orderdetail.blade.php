<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="">
                    <div class="title">
                        <img src="\assets\dummy-img\back arrow coklat.svg" alt="">
                        <h1>Pesanan #001</h1>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section>
        <div class="order-detail">
            <div class="status-img">
                <img src="\assets\dummy-img\order state 1 for ss.svg" alt="">
            </div>
            <div class="segment delivery-address">
                <h4 class="segment-title">Alamat Pengiriman</h4>
                <p class="penerima">Grace</p>
                <p class="no-telp">(+62)123456789</p>
                <p class="alamat">Jalan Pakuan No.3</p>
                <p class="kelurahan-kota-kabupaten">Sentul, Kabupaten Bogor</p>
                <p class="provinsi">Jawa Barat</p>
            </div>
            <div class="segment order">
                <h4 class="segment-title" id="product-title">Pesanan</h4>
                <div class="products">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="product">
                            <div class="product-img">
                                <img src="\assets\dummy-img\Rectangle 28.png" alt="">
                            </div>
                            <div class="product-info">
                                <h4 class="product-name">Eau De Toilette</h4>
                                <div class="product-size-and-quantity">
                                    <h4 class="product-size">Ukuran : M</h4>
                                    <h4 class="product-qty">x1</h4>
                                </div>
                                <h4 class="product-price">Rp 100,000.00</h4>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="segment order-amount">
                <div class="amount">
                    <div class="amount-item">
                        <p class="amount-item-name">Subtotal</p>
                        <p class="amount-item-value">Rp 450,000</p>
                    </div>
                    <div class="amount-item">
                        <p class="amount-item-name">Diskon</p>
                        <p class="amount-item-value">- Rp 10,000</p>
                    </div>
                    <div class="amount-item last-item">
                        <p class="amount-item-name">Ongkos Kirim</p>
                        <p class="amount-item-value">Rp 10,000</p>
                    </div>
                    <div class="total">
                        <h3 class="amount-item-name">Total</h3>
                        <h3 class="amount-item-value">Rp 450,000</h3>
                    </div>
                    <div class="payment-method">
                        <img src="\assets\dummy-img\cc.svg" alt="">
                        <p class="amount-item-value">Kartu Kredit</p>
                    </div>
            </div>
        </div>
        <div class="submit">
            <div class="btn-wrapper"><a href=""><div class="button">Ambil Pesanan</div></a></div>
        </div>
    </section>
    @include('components.shipping_service.footerss')
</body>
</html>
