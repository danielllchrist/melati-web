<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    @vite('resources/css/customer/landingpage.css')
    <style>
        .card-custom {
            border-radius: 0;
            color: white;
            width: 230px;
            height: 400px;
            margin: 0 10px;
        }

        .card-custom-top {
            border-radius: 0;
            width: 100%;
        }

        .card-custom-body {
            padding: 10px 50px 50px 15px;
            background-image: url('/assets/backgroundHargaKatalog.png');
            background-position: center;
            background-size: cover;
            width: 100%;
            filter: sepia(0.8);
        }

        .card-custom>img {
            max-height: 245px;
        }

        .card-custom-body>p {
            margin-bottom: 10px;
        }

        .card-custom-body>h3 {
            font-size: 18px;
        }

        .catalog-item>a {
            padding: 0;
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <section>
        <div class="flex-row">
            <div class="carousel-wrapper">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $i = 1
                        @endphp
                        @foreach ($assets as $asset)
                            @if (!($asset->assetPath == 'https://fakeimg.pl/800x400'))
                                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                    <img src="{{$asset->assetPath}}" class="d-block w-100"
                                        alt="Promotion Banner">
                                    <a href="/katalog" class="carousel-product-link">
                                        <div class="belanja-sekarang-button">
                                            <h2>BELANJA SEKARANG</h2>
                                            <div class="belanja-sekarang"></div>
                                        </div>
                                    </a>
                                </div>
                                @php
                                    $i = 2
                                @endphp
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="flex-column">
                <div id="men" class="men-women-content">
                    <img src="\assets\dummy-img\top 2.png" alt="men">
                    <img src="\assets\dummy-img\top 2.png" alt="men">
                </div>
                <div id="women" class="men-women-content">
                    <img src="\assets\dummy-img\rok 3.png" alt="women">
                    <img src="\assets\dummy-img\rok 3.png" alt="women">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="product">
            <div class="recommendation-wrapper">
                <a href="?filter=produk-terbaik" class="recommendation">
                    <div class="recommendation-button">
                        <p>PRODUK TERBAIK</p>
                        <div class="active-recommendation"></div>
                    </div>
                </a>
                <a href="?filter=produk-terbaru" class="recommendation">
                    <div>
                        <p>PRODUK TERBARU</p>
                    </div>
                </a>
                <a href="?filter=rating-tertinggi" class="recommendation">
                    <div>
                        <p>RATING TERTINGGI</p>
                    </div>
                </a>
            </div>
            <div class="card-wrapper">
                @foreach ($products as $product)
                    <div class="catalog-item">
                        <a href="detail.html">
                            <div class="card-custom">
                                <img src="/assets/{{ $product->productPicturePath }}" class="card-custom-top"
                                    alt="Catalog">
                                <div class="card-custom-body">
                                    <p>{{ $product->productName }}</p>
                                    <h3>Rp {{ $product->productPrice }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div id="mix-and-match">
            <img src="\assets\dummy-img\Tenun Kediri by Didiet Maulana 1.png" alt="">
            <img src="\assets\dummy-img\Tenun Kediri by Didiet Maulana 1.png" alt="">
            <h1>Bebaskan kreativitasmu! Mix and match gaya favoritmu dengan mudah.</h1>
            <div id="button-mix-and-match-wrapper"><a href="/mixmatch">
                    <div id="button-mix-and-match" class="buttons">Kunjungi fitur Mix and Match</div>
                </a></div>
        </div>
    </section>

    <section>
        <div id="belanja-sekarang-banner">
            <h2>BATIK MELATI</h2>
            <h1>WARISAN BUDAYA , GAYA MODERN</h1>
            <div id="button-belanja-wrapper"><a href="/katalog">
                    <div id="button-belanja" class="buttons">Belanja Sekarang</div>
                </a></div>
        </div>
    </section>
    @include('components.customer.footercustomer')
</body>

</html>
