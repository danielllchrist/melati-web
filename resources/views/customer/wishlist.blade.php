<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Favorit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
    @vite('resources/css/customer/wishlist.css')
    <style>
        .card-custom-body {
            padding: 10px 50px 50px 15px;
            background-image: url('assets/backgroundHargaKatalog.png');
            background-position: center;
            background-size: cover;
            width: 100%;
            filter: sepia(0.8);
        }
    </style>
</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <div class="atas">
        <a href="{{ url()->previous() }}"><img src="\assets\dummy-img\back arrow.svg" alt=""
                class="back_icon"></a>
        <h1>Favorit</h1>
    </div>
    <div class="container mb-5 mt-0">
        <div class="d-flex flex-wrap mt-3 mb-3" id="content-wishlist">
            @if (!Auth::check())
                <a href="{{ route('LogIn') }}"></a>
            @else
                @php
                    // Fetch all wished products for the logged-in user
                    $userID = auth()->user()->userID;
                    $wishedProducts = DB::table('wishlists')->where('userID', $userID)->pluck('productID')->toArray();
                @endphp

                @if (count($wishedProducts) === 0)
                    <div class="kiri">
                        <div class="btn-wrap">
                            <h2>Favoritmu masih kosong nih..</h2>
                            <button class="btn-ctg" onclick="window.location.href='{{ route('Catalogue') }}'">
                                Belanja Sekarang</button>
                        </div>
                    </div>
                @else
                    @foreach ($product as $item)
                        @php
                            $isWished = in_array($item->productID, $wishedProducts);
                        @endphp

                        @if ($isWished)
                            <div class="catalog-item" data-price="{{ $item->productPrice }}">
                                <a href="{{ route('ProductDetail', ['id' => $item->productID]) }}">
                                    <div class="card-custom" style="">
                                        <div class="image-container">
                                            <img src="{{ Storage::url(json_decode($item->productPicturePath)[0]) }}"
                                                class="card-custom-top" alt="Catalog">
                                            <form action="{{ route('unwish') }}" method="POST" class="wishlist-form">
                                                @csrf
                                                <input type="hidden" name="productID" value="{{ $item->productID }}">
                                                <button type="submit" style="background: none; border: none;">
                                                    <i class="fa fa-heart fa-2x heart-color click-wish"
                                                        id="wishlist-heart" style="background: none;"></i>
                                                </button>
                                            </form>
                                            <div class="card-custom-body">
                                                <p class="productName">{{ $item->productName }}</p>
                                                <h3 class="productPrice">Rp
                                                    {{ number_format($item->productPrice, 2, ',', '.') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script>
        var data = [
                {"id":1,"quantity":0},
                {"id":2,"quantity":5},
                {"id":3,"quantity":1},
                {"id":4,"quantity":2},
                {"id":5,"quantity":10},
                {"id":6,"quantity":0},
                {"id":7,"quantity":15},
                {"id":8,"quantity":8},
                {"id":9,"quantity":10},
                {"id":10,"quantity":11},
                {"id":11,"quantity":2},
                {"id":12,"quantity":18},
                {"id":13,"quantity":11}
            ];

        function show() {
            var content = "";

            for(let i=0; i<data.length; i++){
                if(data[i].quantity > 0){
                    content += '<div class="card-content"><i class="fa fa-heart fa-2x heart-color" id="wishlist-heart-' + data[i].id + '" onclick="wishlist(' + data[i].id + ')"></i><div class="card-custom" onclick="accessLink()"><img src="assets/dressHijau.png" class="card-custom-top" alt="Catalog"><div class="card-custom-body"><p>Kamboja Kutubaru</p><h3>Rp 150.000,00</h3></div></div></div>';
                }
            }

            for(let i=0; i<data.length; i++){
                if(data[i].quantity <= 0){
                    content += '<div class="card-content"><i class="fa fa-heart fa-2x heart-color" id="wishlist-heart-' + data[i].id + '" onclick="wishlist(' + data[i].id + ')"></i><div class="card-custom sold-out" onclick="accessLink()"><img src="assets/dressHijau.png" class="card-custom-top" alt="Catalog"><div class="card-custom-body"><p>Kamboja Kutubaru</p><h3>Rp 150.000,00</h3></div></div><h1>SOLD OUT!</h1></div>';
                }
            }

            document.getElementById("content-wishlist").innerHTML = content;
        }

        function wishlist(id) {
            var flag = -1;
            var dataTemp = [];
            for(let i=0; i<data.length; i++){
                if(data[i].id != id){
                    dataTemp.push(data[i]);
                    flag = 1;
                }
            }

            if(flag != -1){
                data = dataTemp;
                show();
            }
        }

        window.onload = function() {
            show();
        }
    </script> --}}
    @include('components.customer.footercustomer')
</body>

</html>
