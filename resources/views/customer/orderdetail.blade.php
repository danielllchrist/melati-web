<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title>
    @vite('resources/css/app.css')
    @vite('resources/css/customer/orderdetail.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content">
            <section>
                <div class="page-title">
                    <div class="title-wrapper">
                        <a href="">
                            <div class="title">
                                <img src="assets\dummy-img\back arrow coklat.svg" alt="">
                                <h1>Pesanan #001</h1>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <section>
                <div class="order-detail">
                    <div class="status-img">
                        <img src="assets\dummy-img\order state 1.svg" alt="">
                    </div>
                    <div class="delivery-address">

                    </div>
                    <div class="order">

                    </div>
                    <div class="order-amount">
                        
                    </div>
                    <div class="submit">

                    </div>
                </div>
            </section>

        </div>
    </div>
    @include('components.customer.footercustomer')
</body>
</html>
