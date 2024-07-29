<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
    @vite('resources/css/customer/catalog.css')
    <style>
        .card-custom-body {
            padding: 10px 50px 50px 15px;
            background-image: url('assets/backgroundHargaKatalog.png');
            background-position: center;
            background-size: cover;
            width: 100%;
            filter: sepia(0.8);
        }

        .kategori {
            padding: 20px;
            border-radius: 10px;
        }
        .kategori h3 {
            color: #F0F1E4;
        }
        .collapsed-text a, .dropdown-item {
            color: grey;
            text-decoration: none;
        }
        .collapsed-text img {
            margin-left: 10px;
            filter: invert(0.8);
        }
        .collapsed-text a.active, .dropdown-item.active {
            color: #F0F1E4;
        }
    </style>
</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <div class="container pt-5">
        <div class="carousel position-relative">
            <div id="carouselExampleIndicators"
                class="position-absolute top-50 start-50 translate-middle carousel slide">
                <!-- <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/carouselCatalog.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/carouselCatalog.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/carouselCatalog.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="d-flex pt-5">
            <div class="kategori me-3">
                <h3 class="text-light mb-4" style="color:#F0F1E4;">Kategori</h3>
                <div class="kategori-pria">
                    <div class="collapsed-text">
                        <a class="collapse-btn" data-bs-toggle="collapse" href="#collapsePria" role="button"
                            aria-expanded="false" aria-controls="collapsePria" id="btnPria">
                            Pria
                        </a>
                        <img src="https://cdn0.iconfinder.com/data/icons/arrows-android-l-lollipop-icon-pack/24/collapse2-512.png"
                            width="25px" id="arrowCollapsePria">
                    </div>
                    <div class="collapse multi-collapse" id="collapsePria">
                        <a class="dropdown-item" href="?gender=pria&category=atasan" id="pria-atasan">Atasan</a>
                        <a class="dropdown-item" href="?gender=pria&category=bawahan" id="pria-bawahan">Bawahan</a>
                        <a class="dropdown-item" href="?gender=pria&category=aksesoris"
                            id="pria-aksesoris">Aksesoris</a>
                    </div>
                </div>

                <div class="kategori-wanita">
                    <div class="collapsed-text">
                        <a class="collapse-btn" data-bs-toggle="collapse" href="#collapseWanita" role="button"
                            aria-expanded="false" aria-controls="collapseWanita" id="btnWanita">
                            Wanita
                        </a>
                        <img src="https://cdn0.iconfinder.com/data/icons/arrows-android-l-lollipop-icon-pack/24/collapse2-512.png"
                            width="25px" id="arrowCollapseWanita">
                    </div>
                    <div class="collapse multi-collapse" id="collapseWanita">
                        <a class="dropdown-item" href="?gender=wanita&category=atasan" id="wanita-atasan">Atasan</a>
                        <a class="dropdown-item" href="?gender=wanita&category=bawahan"
                            id="wanita-bawahan">Bawahan</a>
                        <a class="dropdown-item" href="?gender=wanita&category=aksesoris"
                            id="wanita-aksesoris">Aksesoris</a>
                    </div>
                </div>
            </div>
            <div class="catalog d-flex flex-column mb-5 w-100">
                <div class="d-flex justify-content-end align-items-center header-catalog">
                    <p class="me-4 mt-3" style="color: #F0F1E4;">Urut berdasarkan</p>
                    <select name="sortBy" id="sortBy">
                        <option value="0" selected disabled>Pilih</option>
                        <option value="1">Harga Tertinggi</option>
                        <option value="2">Harga Terendah</option>
                    </select>
                </div>
                <div class="content-catalog d-flex flex-wrap flex-row mt-3 mb-3" id="content-catalog">
                    @foreach ($product as $item)
                        <div class="catalog-item" data-price="{{ $item->productPrice }}">
                            <a href="{{ route('ProductDetail', ['id' => $item->productID]) }}">
                                <div class="card-custom" style="">
                                    <div class="image-container">
                                        <img src="{{ Storage::url(json_decode($item->productPicturePath)[0]) }}"
                                            class="card-custom-top" alt="{{ $item->productName }}">
                                        @if (!Auth::check())
                                            <a href="{{ route('LogIn') }}"
                                                style="text-decoration: none; background: none; border: none;">
                                                <i class="fa fa-heart-o fa-2x heart" id="wishlist-heart"
                                                    style="color: black"></i>
                                            </a>
                                        @else
                                            @php
                                                $query =
                                                    'SELECT * FROM `wishlists` WHERE `productID` = ? AND `userID` = ?';
                                                $wished = DB::select($query, [
                                                    $item->productID,
                                                    auth()->user()->userID,
                                                ]);
                                            @endphp
                                            <input name="productID" type="hidden" value="{{ $item->productID }}">
                                            @if ($wished)
                                                <form action="{{ route('unwish') }}" method="POST"
                                                    class="wishlist-form">
                                                    @csrf
                                                    <input type="hidden" name="productID"
                                                        value="{{ $item->productID }}">
                                                    <button type="submit" style="background: none; border: none;">
                                                        <i class="fa fa-heart fa-2x heart-color click-wish"
                                                            id="wishlist-heart" style="background: none;"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('wish') }}" method="POST"
                                                    class="wishlist-form">
                                                    @csrf
                                                    <input type="hidden" name="productID"
                                                        value="{{ $item->productID }}">
                                                    <button type="submit" style="background: none; border: none;">
                                                        <i class="fa fa-heart-o fa-2x heart click-wish"
                                                            id="wishlist-heart"
                                                            style="background-color: none; color: black"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="card-custom-body">
                                        <p class="productName">{{ $item->productName }}</p>
                                        <h3 class="productPrice">Rp {{ number_format($item->productPrice, 2, ',', '.') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Highlight the selected category
        $('.dropdown-item, .collapse-btn').on('click', function() {
            $('.dropdown-item, .collapse-btn').removeClass('active');
            $(this).addClass('active');

            // Save selected category to local storage
            localStorage.setItem('selectedCategory', $(this).attr('id'));
        });

        // Function to get query parameters
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                gender: params.get('gender') ? params.get('gender').toLowerCase() : null,
                category: params.get('category') ? params.get('category').toLowerCase() : null
            };
        }

        const queryParams = getQueryParams();

        // Construct the combined category id based on query parameters
        if (queryParams.gender && queryParams.category) {
            const selectedCategory = `${queryParams.gender}-${queryParams.category}`;

            // If there's a matching element, change its color
            $('#' + selectedCategory).addClass('active');
        } else if (queryParams.gender) {
            // If only gender is selected
            $('#btn' + queryParams.gender.charAt(0).toUpperCase() + queryParams.gender.slice(1)).addClass('active');
        }
    });
</script>






    <script>
        $(document).ready(function() {
            $('#sortBy').on('change', function() {
                var sortBy = $(this).val();
                var items = $('.catalog-item');

                items.sort(function(a, b) {
                    var priceA = parseFloat($(a).data('price'));
                    var priceB = parseFloat($(b).data('price'));

                    if (sortBy == '1') { // Harga Tertinggi
                        return priceB - priceA;
                    } else { // Harga Terendah
                        return priceA - priceB;
                    }
                });

                $('#content-catalog').html(items);
            });
        });
    </script>
        
    @include('components.customer.footercustomer')
</body>

</html>
