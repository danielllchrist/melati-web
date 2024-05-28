<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya</title>
    @vite('resources/css/customer/cart.css')
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="atas">
        <div class="nonactive active">
            <h1>Keranjang</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Checkout</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pembayaran</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pesanan Dibuat </h1>
        </div>
    </div>
    <div class="bawah">
        <div class="kiri">
            @for ($i = 0; $i < 10; $i++)
            <div class="product">
                <img id="productimg" src="{{asset('assets/perfume.svg')}}">
                <div class="wraps">
                    <h1>Eu da Toilette</h1>
                    <h2>Rp 100.000</h2>
                    <p>M</p>
                </div>
                <div class="wraps2">
                    <button class=trash>
                        <img class="trash icon" src="{{asset('assets/trash_icon.svg')}}">
                        <!-- <img class="min icon" src="{{asset('assets/min_icon.svg')}}"> -->
                    </button>
                    <input type="number" id="transparent-number-input" min="0" max="100" placeholder="0">
                    <button class=plus>
                        <img class="plus icon" src="{{asset('assets/plus_icon.svg')}}">
                    </button>
                </div>
            </div>
            @endfor

        </div>

        <div class="kanan">
            <div class="wrap">
                <p>TOTAL</p>
                <h2>Rp 100.000</h2>
            </div>
            <div class="wrap small">
                <button class="checkout">CHECK OUT</button>
            </div>
        </div>
    </div>

    @include('components.customer.footercustomer')
</body>
</html>
