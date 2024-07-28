<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Assets</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    @vite('resources/css/admin/manageasset.css')
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
            max-width: 230px;
            max-height: 275px;
            object-fit: cover;
        }

        .card-custom-body>p {
            font-size: 1rem;
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
    @include('components.admin.headeradmin')
    <section>
        <div class="flex-row">
            <div class="carousel-wrapper">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($assets as $asset)
                            @if (!($asset->assetPath == 'https://fakeimg.pl/800x400'))
                                <a href="/admin/manajer-carousel">
                                    <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                        <img src="{{ $asset->assetPath }}" class="d-block w-100" alt="Promotion Banner">
                                        <a href="" class="carousel-product-link">
                                            <div class="belanja-sekarang-button">
                                                <h2>BELANJA SEKARANG</h2>
                                                <div class="belanja-sekarang"></div>
                                            </div>
                                        </a>
                                    </div>
                                </a>
                                @php
                                    $i = 2;
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
                    <a href="">
                        <img src="\assets\landing\men.png" alt="men" class="hover-image"
                            data-hover="\assets/landing/menHover.png">
                    </a>
                    {{-- <img src="\assets\dummy-img\top 2.png" alt="men"> --}}
                </div>
                <div id="women" class="men-women-content">
                    {{-- <img src="\assets\dummy-img\rok 3.png" alt="women"> --}}
                    <a href="">
                        <img src="\assets\landing\women.png" alt="women" class="hover-image"
                            data-hover="\assets/landing/womenHover.png">
                    </a>
                </div>
            </div>
            
        </div>
    </section>

    <section>
        <div class="product">
            <div class="recommendation-wrapper">
                <a href="javascript:void(0)" id="terbaik" class="recommendation" onclick="showTab('terbaik')">
                    <div class="recommendation-button">
                        <p>PRODUK TERBAIK</p>
                        <div class="active-recommendation" id="terbaik-indicator"></div>
                    </div>
                </a>
                <a href="javascript:void(0)" id="terbaru" class="recommendation" onclick="showTab('terbaru')">
                    <div class="recommendation-button">
                        <p>PRODUK TERBARU</p>
                        <div class="active-recommendation" id="terbaru-indicator"></div>
                    </div>
                </a>
                <a href="javascript:void(0)" id="tertinggi" class="recommendation" onclick="showTab('tertinggi')">
                    <div class="recommendation-button">
                        <p>RATING TERTINGGI</p>
                        <div class="active-recommendation" id="tertinggi-indicator"></div>
                    </div>
                </a>
            </div>
            <div class="tabs">
                <div id="terbaik-content" class="card-wrapper tab-content">
                    @foreach ($product_terbaik as $product)
                        <div class="catalog-item">
                            {{-- <a href="{{ route('ProductDetail', $product->productID) }}"> --}}
                                <div class="card-custom">
                                    <img src="{{ Storage::url(json_decode($product->productPicturePath)[0]) }}"
                                        class="card-custom-top" alt="Catalog">
                                    <div class="card-custom-body">
                                        <p>{{ $product->productName }}</p>
                                        <h3>{{ 'Rp ' . number_format($product->productPrice, 0, ',', '.') }}</h3>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                    @endforeach
                </div>
                <div id="terbaru-content" class="card-wrapper tab-content">
                    @foreach ($product_terbaru as $product)
                        <div class="catalog-item">
                            {{-- <a href="{{ route('ProductDetail', $product->productID) }}"> --}}
                                <div class="card-custom">
                                    <img src="{{ Storage::url(json_decode($product->productPicturePath)[0]) }}"
                                        class="card-custom-top" alt="Catalog">
                                    <div class="card-custom-body">
                                        <p>{{ $product->productName }}</p>
                                        <h3>{{ 'Rp ' . number_format($product->productPrice, 0, ',', '.') }}</h3>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                    @endforeach
                </div>
                <div id="tertinggi-content" class="card-wrapper tab-content">
                    @foreach ($product_tertinggi as $product)
                        <div class="catalog-item">
                            {{-- <a href="{{ route('ProductDetail', $product->productID) }}"> --}}
                                <div class="card-custom">
                                    <img src="{{ Storage::url(json_decode($product->productPicturePath)[0]) }}"
                                        class="card-custom-top" alt="Catalog">
                                    <div class="card-custom-body">
                                        <p>{{ $product->productName }}</p>
                                        <h3>{{ 'Rp ' . number_format($product->productPrice, 0, ',', '.') }}</h3>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section>
        <div id="mix-and-match">
            <img src="\assets\dummy-img\Tenun Kediri by Didiet Maulana 1.png" alt="">
            <h1>Bebaskan kreativitasmu! Mix and match gaya favoritmu dengan mudah.</h1>
            <div id="button-mix-and-match-wrapper">
                    <div id="button-mix-and-match" class="buttons">Kunjungi fitur Mix and Match</div>
                </div>
        </div>
    </section>

    <section>
        <div id="belanja-sekarang-banner">
            <h2>BATIK MELATI</h2>
            <h1>WARISAN BUDAYA , GAYA MODERN</h1>
            <div id="button-belanja-wrapper">
                    <div id="button-belanja" class="buttons">Belanja Sekarang</div>
                </div>
        </div>
    </section>
    @include('components.admin.footeradmin')

    <script>
        function showTab(tabId) {
            // Hapus kelas 'active' dari semua tab konten
            var tabs = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }

            // Hapus kelas 'active' dari semua tab link
            var links = document.getElementsByClassName('recommendation');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove('active');
            }

            // Tambahkan kelas 'active' ke tab konten yang dipilih
            document.getElementById(tabId + '-content').classList.add('active');

            // Tambahkan kelas 'active' ke tab link yang dipilih
            document.getElementById(tabId).classList.add('active');

            // Tambahkan kelas 'active' ke indikator yang dipilih
            var indicators = document.getElementsByClassName('active-recommendation');
            for (var i = 0; i < indicators.length; i++) {
                indicators[i].style.display = 'none';
            }
            document.getElementById(tabId + '-indicator').style.display = 'block';
        }

        // Tampilkan tab 'terbaik' secara default saat halaman dimuat
        window.onload = function() {
            showTab('terbaik');
        }

        document.querySelectorAll('.hover-image').forEach(img => {
            const originalSrc = img.src;
            const hoverSrc = img.getAttribute('data-hover');

            img.addEventListener('mouseover', () => {
                img.src = hoverSrc;
            });

            img.addEventListener('mouseout', () => {
                img.src = originalSrc;
            });
        });
    
        // // Mendapatkan semua tombol rekomendasi
        // const buttons = document.querySelectorAll('.recommendation');

        // // Menambahkan event listener ke setiap tombol rekomendasi
        // buttons.forEach(button => {
        //     button.addEventListener('click', () => {
        //         // Menghapus kelas active-button dan active-recommendation dari tombol sebelumnya
        //         buttons.forEach(b => {
        //             b.classList.remove('active-button');
        //             b.querySelector('.active-recommendation').classList.remove(
        //                 'active-recommendation');
        //         });

        //         // Menambahkan kelas active-button dan active-recommendation ke tombol yang diklik
        //         button.classList.add('active-button');
        //         button.querySelector('.active-recommendation').classList.add('active-recommendation');
        //     });
        // });

        document.querySelectorAll('.hover-image').forEach(img => {
            const originalSrc = img.src;
            const hoverSrc = img.getAttribute('data-hover');

            img.addEventListener('mouseover', () => {
                img.src = hoverSrc;
            });

            img.addEventListener('mouseout', () => {
                img.src = originalSrc;
            });
        });
    </script>
</body>

</html>
