<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    @vite('resources/css/customer/landingpage.css')
</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <section>
        <div class="flex-row">
            <div class="carousel-wrapper">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="carousel-item active">
                                <img src="assets\dummy-img\Screenshot 2024-05-18 162312.png" class="d-block w-100"
                                    alt="Promotion Banner 1">
                                    <a href="" class="carousel-product-link">
                                        <div class="belanja-sekarang-button">
                                            <h2>BELANJA SEKARANG</h2>
                                            <div class="belanja-sekarang"></div>
                                        </div>
                                    </a>
                            </div>
                        @endfor
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
                    <img src="assets\dummy-img\top 2.png" alt="men">
                </div>
                <div id="women" class="men-women-content">
                    <img src="assets\dummy-img\rok 3.png" alt="women">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="product">
            <div class="recommendation-wrapper">
                <a href="" class="recommendation active-button">
                    <div class="recommendation-button">
                        <p>PRODUK TERBAIK</p>
                        <div class="active-recommendation"></div>
                    </div>
                </a>
                <a href="" class="recommendation">
                    <div>
                        <p>PRODUK TERBARU</p>
                    </div>
                </a>
                <a href="" class="recommendation">
                    <div>
                        <p>RATING TERTINGGI</p>
                    </div>
                </a>
            </div>
            <div class="card-wrapper">
                @for ($i = 0; $i < 3; $i++)
                    <a href="">
                        <div class="product-card">
                            <div class="product-img"><img src="assets\dummy-img\Snapinsta.png" alt=""></div>
                            <div class="information">
                                <img src="assets\dummy-img\Rectangle 657.png" alt="">
                                <p class="product-name">Kamboja Kutubaru</p>
                                <p class="price">Rp 120,000</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
    </section>

    <section>
        <div id="mix-and-match">
            <img src="assets\dummy-img\Tenun Kediri by Didiet Maulana 1.png" alt="">
            <h1>Bebaskan kreativitasmu! Mix and match gaya favoritmu dengan mudah.</h1>
            <div id="button-mix-and-match-wrapper"><a href="/mixmatch"><div id="button-mix-and-match" class="buttons">Kunjungi fitur Mix and Match</div></a></div>
        </div>
    </section>

    <section>
        <div id="belanja-sekarang-banner">
            <h2>BATIK MELATI</h2>
            <h1>WARISAN BUDAYA , GAYA MODERN</h1>
            <div id="button-belanja-wrapper"><a href="/katalog"><div id="button-belanja" class="buttons">Belanja Sekarang</div></a></div>
        </div>
    </section>
    @include('components.customer.footercustomer')
</body>

</html>
