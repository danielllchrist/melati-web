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
                @for ($i = 0; $i < 10; $i++)
                <div class="product">
                    <div class="product-img">
                        <img src="assets/dummy-img/Rectangle 28.png" alt="">
                    </div>
                    <div class="product-info">
                        <div class="left">
                            <h4 class="product-name">Eau De Toilette</h4>
                            <h4 class="product-size">Ukuran : M</h4>

                        </div>
                        <div class="right">
                            <h4 class="product-qty">x1</h4>
                            <h4 class="product-price">Rp 100,000.00</h4>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </section>

        <section>
            <div class="title-div">
                <h2>Kenapa Anda ingin mengembalikan pesanan ini?</h2>
            </div>
            <div class="reason">
                <form action="" method="post">
                    @csrf
                    <div class="text-area-wrapper">
                        <textarea name="" id="" maxlength="1000" placeholder="Beri tahu kami tentang pesanan Anda."></textarea>
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
                    <p class="fund">Total Harga</p>
                    <p class="fund-value">Rp 450,000</p>
                </div>
                <div class="refund-detail">
                    <p class="fund">Diskon</p>
                    <p class="fund-value">- Rp 10,000</p>
                </div>
                <div class="refund-detail">
                    <p class="fund">Ongkos Kirim</p>
                    <p class="fund-value">Rp 10,000</p>
                </div>
                <div class="refund-details">
                    <h3 class="fund">Total Pengembalian Dana</h3>
                    <h3 class="fund-value">Rp 450,000</h3>
                </div>
            </div>
        </section>

        <section>
            <div class="submit">
                <div class="submit-btn-wrapper">
                    <button class="submit-btn">Kirim</button>
                </div>
            </div>
        </section>
    </div>
    @include('components.customer.footercustomer')
</body>

</html>
