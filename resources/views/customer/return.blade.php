<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengembalian Barang</title>
    @vite('resources/css/app.css')
    @vite('resources/css/customer/return.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="container">
        <section>
            <div class="page-title">
                <div class="title-wrapper">
                    <a href="">
                        <div class="title">
                            <img src="assets\dummy-img\back arrow.svg" alt="">
                            <h1>Pengembalian Barang</h1>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section>
            <div class="products">

            </div>
        </section>

        <section>
            <form action="" method="post">
                @csrf
                <div class="reason">
                    <div class="text-area-wrapper">
                        <textarea name="" id="" placeholder="Beri tahu kami tentang pesanan Anda."></textarea>
                    </div>
                </div>
            </form>
        </section>

        <section>
            <div class="refund">

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
