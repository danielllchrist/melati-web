<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Mix & Match Page</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Jquery --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <style>
        body {
            font-family: Poppins;
        }

        .ui-menu {
            z-index: 99;
        }

        .top-wrapper {
            background-image: url('assets/topMixnMatch.png');
            height: 340px;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }

        .top-wrapper>h1 {
            font-size: 50px;
            font-weight: bold;
            color: #F0F1E4;
        }

        .top-wrapper>h3 {
            font-size: 38px;
            font-weight: 400;
            color: #F0F1E4;
        }

        .card-custom-image {
            object-fit: cover;
        }

        .card-custom,
        .card-custom-image>img {
            max-width: 225px;
            width: 100%;
        }

        .card-custom-image>img {
            height: 300px;
            object-fit: cover;
        }

        .card-custom-text {
            padding: 10px 0;
            text-align: center;
            transition: 0.5s all ease-in-out;
        }

        .card-custom-text a:hover {
            box-shadow: 0 0 10px #F0F1E4;
            color: #4f290c;
        }

        .card-custom-text>a {
            text-decoration: none;
            width: 100%;
            color: #4f290c;
            font-weight: 600;
            background-color: #d5be9e;
            display: inline-block;
            padding: 5px 0;
            font-weight: 600;
            border-radius: 5em;
            text-align: center;
            transition: 0.3s all ease-in-out;
        }

        .carousel-inner {
            width: 287px;
            height: 360px;
        }

        .carousel-item {
            width: 287px;
            height: 360px;
        }

        .carousel-item>img {
            object-fit: cover;
            width: 287px;
            height: 360px;
        }

        .carousel {
            position: relative;
            display: flex;
            width: 100%;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: TranslateY(-50%);
            margin: 0 -25px;
        }

        .carousel-control-prev {
            right: auto;
        }

        .carousel-control-next {
            left: auto;
        }

        .mixmatch {
            padding: 40px 0px;
            display: flex;
        }

        .mix-match-page {
            display: flex;
            flex-wrap: wrap;
            width: 35%;

        }

        .banner {
            width: 30%;
            background-color: #F0F1E4;
            margin-right: 84px;
            height: 100%;
        }

        .mix-match {
            margin: 0px 55px;
            padding: 0 20px;
        }

        .mix-match h1 {
            color: #F0F1E4;
        }

        .search-box {
            padding: 20px 0;
            width: 100%;
        }

        .search-input {
            background: none;
            border: 2px solid white;
            padding: 10px;
            width: 100%;
        }

        .icon-search {
            position: absolute;
            right: 30px;
            top: 410px;
        }

        .carousel>h1 {
            font-size: 20px;
            font-weight: 700;
        }

        .modal-content {
            background-color: black;
        }

        .modal-dialog {
            display: flex;
            justify-content: center;
            padding: 0 20px;
        }

        .btn-close {
            color: #fff;
            opacity: 1;
            position: relative;
            right: 20px;
        }

        .modal-header {
            border: none;
            padding-bottom: 0;
        }

        .modal-body {
            padding-top: 0;
        }

        .catalog-item {
            position: relative;
        }

        .card-custom {
            border-radius: 0;
            color: white;
            width: 230px;
            height: 400px;
            margin: 10px;
            z-index: 9;
            /* position: absolute; */
        }

        .card-custom>i {
            position: relative;
            top: 240px;
            left: 190px;
        }

        .card-custom-top {
            border-radius: 0;
            height: 300px;
            width: 100%;
            object-fit: cover
        }

        .card-custom-body {
            padding: 10px 50px 50px 15px;
            background-image: url('assets/backgroundHargaKatalog.png');
            background-position: center;
            background-size: cover;
            width: 100%;
            filter: sepia(0.8);
        }

        .card-custom>img {
            /* max-height: 245px; */
        }

        .card-custom-body>p {
            margin-bottom: 10px;
        }

        .card-custom-body>h3 {
            font-size: 18px;
        }

        .heart-color {
            color: red;
        }

        .wishlist-form {
            position: absolute;
            bottom: 3px;
            /* Adjust as needed */
            right: 4px;
            /* Adjust as needed */
            z-index: 10;
            /* Ensure the form appears on top of the image */
            background: none;
            /* Ensure there's no background */
        }

        #wishlist-heart {
            position: absolute;
            bottom: 3px;
            /* Adjust as needed */
            right: 4px;
            /* Adjust as needed */
            background: none;
            /* Ensure there's no background */
            z-index: 10;
            /* Ensure the icon appears on top */
        }

        .ps-search-custom-container {
            display: flex;
            width: 100%;
            height: 40px;
            padding: 10px 18px;
            appearance: none;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #F0F1E4;
            border-radius: 5px;
            justify-content: start;
            align-items: center;
        }


        .ps-search-custom {
            width: 100%;
            display: block;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #F0F1E4;
            appearance: none;
            background-color: transparent;
            background-clip: padding-box;
            border: none;
            transition: none;
            margin-left: 15px;
            outline: none;
            font-family: 'Poppins';
        }

        .ps-search-custom:focus {
            border: none;
            outline: none;
        }

        .ps-search-custom::placeholder {
            color: #F0F1E4;
            opacity: 1;
            /* Firefox */
            border: none;
        }


        .ps-search-custom ::-ms-input-placeholder {
            /* Edge 12 -18 */
            color: #F0F1E4;
            border: none;
        }

        .creator-pick-wrapper h3 {
            color: #F0F1E4;
        }

        .mm-submit-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 100px;
        }

        .mm-title {
            color: #F0F1E4;
        }

        .mm-add-btn {
            margin-top: 12px;
            width: auto;
            font-family: "Poppins";
            font-size: 17px;
            background-color: #d5be9e;
            color: #4f290c;
            padding: 12px 30px;
            text-decoration: none;
            outline: none;
            border: none;
            border-radius: 999px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-add-btn {
            /* background-image: url('assets/backgroundCreatorsPick.png'); */
            padding: 10px 0;
            text-align: center;
        }

        .modal-add-btn>button {
            text-decoration: none;
            width: 300px;
            ;
            color: #4f290c;
            font-weight: 600;
            background-color: #d5be9e;
            display: inline-block;
            padding: 5px 0;
            font-weight: 600;
            border-radius: 5em;
            text-align: center;
        }
    </style>
</head>

<body class="bg-black">

    @include('components.customer.headercustomer')
    <div class="container">
        <div class="top-wrapper mb-5 mt-5 d-flex flex-column justify-content-center align-items-center">
            <h1>Koleksi Baru Menanti!</h1>
            <h3>Temukan Kombinasi Pakaianmu!</h3>
        </div>

        {{-- Rekomendasi --}}
        <div class="creator-pick-wrapper">
            <h3>Rekomendasi</h3>
            <div class="d-flex justify-content-between mt-3 mb-3">
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\rekomen\card 1.jpg" alt="">
                    </div>
                    <div class="card-custom-text">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showDataModal(1)">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\rekomen\card 2.jpg" alt="">
                    </div>
                    <div class="card-custom-text">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showDataModal(2)">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\rekomen\card 3.jpg" alt="">
                    </div>
                    <div class="card-custom-text">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showDataModal(3)">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\rekomen\card 4.jpg" alt="">
                    </div>
                    <div class="card-custom-text">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showDataModal(4)">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\rekomen\card 5.jpg" alt="">
                    </div>
                    <div class="card-custom-text">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="showDataModal(5)">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mix Match --}}
        <div class="mixmatch">
            <div class="banner justify-content-center">
                <img src="\assets\mixmatch\banner.png" alt="">
            </div>

            <div class="mix-match-page">
                <div id="carousel-top-mid" class="carousel slide mix-match d-flex flex-column text-center">
                    <h1>ATASAN</h1>
                    <div class="carousel-inner">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($atasan as $a)
                            <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                <img src="{{ Storage::url(json_decode($a->productPicturePath)[0]) }}" alt=""
                                    data-slide-to="{{ $a->productID }}">
                            </div>
                            @php
                                $i = 2;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-top-mid"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-top-mid"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="search-box">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="ps-search-custom-container"><img src = "assets/search-white.svg" alt = "search"
                                    width = "19" height = "19"><input class = "ps-search-custom" type="search"
                                    id ="Atasan" placeholder="Cari Atasan..." aria-label="Atasan">
                            </div>
                        </form>
                    </div>
                    {{-- passing id produk/size buat di submit jadi request, value diisi di js --}}
                </div>

                <div id="carousel-bottom-mid" class="carousel slide mix-match d-flex flex-column text-center">
                    <h1>BAWAHAN</h1>
                    <div class="carousel-inner">
                        @php
                            $j = 1;
                        @endphp
                        @foreach ($bawahan as $b)
                            <div class="carousel-item {{ $j == 1 ? 'active' : '' }}">
                                <img src="{{ Storage::url(json_decode($b->productPicturePath)[0]) }}" alt=""
                                    data-slide-to="{{ $b->productID }}">
                            </div>
                            @php
                                $j = 2;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-bottom-mid"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-bottom-mid"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="search-box">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="ps-search-custom-container"><img src = "assets/search-white.svg"
                                    alt = "search" width = "19" height = "19"><input class = "ps-search-custom"
                                    type="search" id ="Bawahan" placeholder="Cari Bawahan..."
                                    aria-label="Bawahan">
                            </div>
                        </form>
                    </div>
                    {{-- passing id produk/size buat di submit jadi request, value diisi di js --}}
                </div>
            </div>

            <div class="mix-match-page justify-content-center">
                <div id="carousel-accessories-right"
                    class="carousel slide mix-match d-flex flex-column text-center align-self-center">
                    <h1>AKSESORIS</h1>
                    <div class="carousel-inner">
                        @php
                            $k = 1;
                        @endphp
                        @foreach ($aksesoris as $c)
                            <div class="carousel-item {{ $k == 1 ? 'active' : '' }}">
                                <img src="{{ Storage::url(json_decode($c->productPicturePath)[0]) }}" alt=""
                                    data-slide-to="{{ $c->productID }}">
                            </div>
                            @php
                                $k = 2;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-accessories-right"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-accessories-right"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="search-box">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="ps-search-custom-container"><img src = "assets/search-white.svg"
                                    alt = "search" width = "19" height = "19"><input class = "ps-search-custom"
                                    type="search" id ="Aksesoris" placeholder="Cari Aksesoris..."
                                    aria-label="Aksesoris">
                            </div>
                        </form>
                    </div>
                </div>
                {{-- passing id produk/size buat di submit jadi request, value diisi di js --}}
            </div>
        </div>
        <div id="keluar" class="mm-submit-container">
            <h3 class="mm-title">Masukkan semua pilihanmu ke keranjang sekarang !</h3>
            <form action="{{ route('addCart') }}" method="POST">
                @csrf
                <input type="hidden" id="selected-atasan" name="atasan" value="">
                <input type="hidden" id="selected-bawahan" name="bawahan" value="">
                <input type="hidden" id="selected-aksesoris" name="aksesoris" value="">
                <button class="mm-add-btn" type="submit">Masukkan ke
                    Keranjang</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title w-100" id="exampleModalLabel">Shop Now!</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center pb-5" id="content-catalog">
                </div>
                <form action="{{ route('addCart') }}" method = "POST">
                    @csrf
                    {{-- hidden input to store product id --}}
                    <input type="hidden" id="produk1" name="produk1" value="">
                    <input type="hidden" id="produk2" name="produk2" value="">
                    <input type="hidden" id="produk3" name="produk3" value="">
                    <div class="modal-add-btn">
                        <button type = "submit">
                            <i class="fa fa-shopping-cart"></i>
                            Masukkan ke Keranjang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    {{-- Search Autocomplete --}}
    {{-- Atasan --}}
    <script>
        var category = $("#Atasan").attr("id");
        var availableTags = [];

        $.ajax({
            method: "GET",
            url: "/ambil-produk/" + category,
            success: function(data) {

                data.forEach(function(data) {
                    availableTags.push({
                        label: data[0],
                        id: data[1],
                        imageUrl: data[2]
                    });
                });

                // foreach available tags to put all the product names into an array
                var dataName = availableTags.map(function(item) {
                    return item.label;
                });

                startAutoComplete(dataName);
            }
        });

        function startAutoComplete(dataName) {
            $("#Atasan").autocomplete({
                source: dataName,
                // Store the selected item's ID and image URL
                select: function(event, ui) {
                    // find the availableTags based on ui
                    var selected = availableTags.find(function(item) {
                        return item.label === ui.item.label;
                    });

                    // fill the value in the hidden input id selected-atasan-id
                    $("#selected-atasan").val(selected.id);

                    // remove active class from all carousel items
                    $('#carousel-top-mid .carousel-item').removeClass('active');
                    var selectedIndex = availableTags.indexOf(selected);

                    // add active class to the selected carousel item
                    $($('#carousel-top-mid .carousel-item')[selectedIndex]).addClass('active');
                }
            });
        }

        var categoryBawahan = $("#Bawahan").attr("id");
        var availableTagsBawahan = [];

        $.ajax({
            method: "GET",
            url: "/ambil-produk/" + categoryBawahan,
            success: function(data) {
                data.forEach(function(data) {
                    availableTagsBawahan.push({
                        label: data[0],
                        id: data[1],
                        imageUrl: data[2]
                    });
                });

                // foreach available tags to put all the product names into an array
                var dataNameBawahan = availableTagsBawahan.map(function(item) {
                    return item.label;
                });
                startAutoCompleteBawahan(dataNameBawahan);
            }
        });

        function startAutoCompleteBawahan(dataNameBawahan) {
            $("#Bawahan").autocomplete({
                source: dataNameBawahan,
                // Store the selected item's ID and image URL
                select: function(event, ui) {
                    // find the availableTagsBawahan based on ui
                    var selected = availableTagsBawahan.find(function(item) {
                        return item.label === ui.item.label;
                    });

                    // fill the value in the hidden input id selected-bawahan-id
                    $("#selected-bawahan").val(selected.id);

                    // remove active class from all carousel items
                    $('#carousel-bottom-mid .carousel-item').removeClass('active');
                    var selectedIndex = availableTagsBawahan.indexOf(selected);

                    // add active class to the selected carousel item
                    $($('#carousel-bottom-mid .carousel-item')[selectedIndex]).addClass('active');

                }
            });
        }

        var categoryAksesoris = $("#Aksesoris").attr("id");
        var availableTagsAksesoris = [];

        $.ajax({
            method: "GET",
            url: "/ambil-produk/" + categoryAksesoris,
            success: function(data) {
                data.forEach(function(data) {
                    availableTagsAksesoris.push({
                        label: data[0],
                        id: data[1],
                        imageUrl: data[2]
                    });
                });

                // foreach available tags to put all the product names into an array
                var dataNameAksesoris = availableTagsAksesoris.map(function(item) {
                    return item.label;
                });

                startAutoCompleteAksesoris(dataNameAksesoris);
            }
        });

        function startAutoCompleteAksesoris(dataNameAksesoris) {
            $("#Aksesoris").autocomplete({
                source: dataNameAksesoris,
                // Store the selected item's ID and image URL
                select: function(event, ui) {
                    // find the availableTagsAksesoris based on ui
                    var selected = availableTagsAksesoris.find(function(item) {
                        return item.label === ui.item.label;
                    });

                    // fill the value in the hidden input id selected-aksesoris-id
                    $("#selected-aksesoris").val(selected.id);

                    // remove active class from all carousel items
                    $('#carousel-accessories-right .carousel-item').removeClass('active');

                    var selectedIndex = availableTagsAksesoris.indexOf(selected);
                    // add active class to the selected carousel item
                    $($('#carousel-accessories-right .carousel-item')[selectedIndex]).addClass('active');
                }
            });
        }
    </script>

    {{-- Modal --}}
    <script>
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        var cardDetail = [];

        // showDataModal

        function showDataModal(card) {
            var count = 0;
            var cardDetail = [];
            $.ajax({
                method: "GET",
                url: "/ambil-produk-modal/" + card,
                success: function(data) {
                    data.forEach(function(data) {
                        cardDetail.push({
                            label: data[0],
                            id: data[1],
                            imageUrl: data[2],
                            count: data[3],
                            price: data[4],
                        });
                        count++;
                    });
                    var name = cardDetail.map(function(item) {
                        return item.label;
                    });
                    console.log(name);
                    var img = cardDetail.map(function(item) {
                        return item.imageUrl;
                    });
                    console.log(img)
                    showProduct(cardDetail)
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });

            function showProduct(cardDetail) {
                document.getElementById("content-catalog").innerHTML = "";

                var count = cardDetail.length;
                console.log(count)

                if (count == 1) {
                    document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "400px";
                } else if (count == 2) {
                    document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "700px";
                } else if (count == 3) {
                    document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "900px";
                }

                var content = "";

                var i = 1;
                cardDetail.forEach(function(item) {
                    if (item.wishlist) {
                        content +=
                            "<div class=\"catalog-item\"><a href=\"/produk/" + item.id +
                            "\"> <div class=\"card-custom\"><img src=\"" +
                            item.imageUrl +
                            "\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>" +
                            item.label + "</p><h3>" + rupiah(item.price) +
                            "</h3></div></div></a></div>";
                    } else {
                        content +=
                            "<div class=\"catalog-item\"><a href=\"/produk/{" + item.id +
                            "}\"> <div class=\"card-custom\"><img src=\"" +
                            item.imageUrl +
                            "\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>" +
                            item.label + "</p><h3>" + rupiah(item.price) +
                            "</h3></div></div></a> </div>";
                    }
                    // concat
                    productID = '#produk' + i;
                    $(productID).val(item.id);
                    i++;
                });
                i = 1;

                document.getElementById("content-catalog").innerHTML = content;
            }
        }
    </script>

    {{-- Carousel --}}
    <script>
        $('#carousel-top-mid').on('slide.bs.carousel', function(e) {
            var activeIndex = $(this).find('.active').index();
            var nextIndex = (activeIndex + 1) % $(this).find('.carousel-item').length;
            var prevIndex = (activeIndex - 1 + $(this).find('.carousel-item').length) % $(this).find(
                '.carousel-item').length;

            if (e.direction === 'left') { // sliding to next slide
                var nextImageId = $(this).find('.carousel-item').eq(nextIndex).find('img').data('slide-to');
                $('#selected-atasan').val(nextImageId);
                console.log(nextImageId);
                console.log('sekarang' + activeIndex + 'sebelumnya' + nextIndex);
            } else if (e.direction === 'right') { // sliding to previous slide
                var prevImageId = $(this).find('.carousel-item').eq(prevIndex).find('img').data('slide-to');
                $('#selected-atasan').val(prevImageId);
                console.log(nextImageId);
                console.log('sekarang' + activeIndex + 'sebelumnya' + prevIndex);
            }
        });

        $('#carousel-bottom-mid').on('slide.bs.carousel', function(e) {
            var activeIndex = $(this).find('.active').index();
            var nextIndex = (activeIndex + 1) % $(this).find('.carousel-item').length;
            var prevIndex = (activeIndex - 1 + $(this).find('.carousel-item').length) % $(this).find(
                '.carousel-item').length;

            if (e.direction === 'left') { // sliding to next slide
                var nextImageId = $(this).find('.carousel-item').eq(nextIndex).find('img').data('slide-to');
                $('#selected-bawahan').val(nextImageId);
            } else if (e.direction === 'right') { // sliding to previous slide
                var prevImageId = $(this).find('.carousel-item').eq(prevIndex).find('img').data('slide-to');
                $('#selected-bawahan').val(prevImageId);
            }
        });

        $('#carousel-accessories-right').on('slide.bs.carousel', function(e) {
            var activeIndex = $(this).find('.active').index();
            var nextIndex = (activeIndex + 1) % $(this).find('.carousel-item').length;
            var prevIndex = (activeIndex - 1 + $(this).find('.carousel-item').length) % $(this).find(
                '.carousel-item').length;

            if (e.direction === 'left') { // sliding to next slide
                var nextImageId = $(this).find('.carousel-item').eq(nextIndex).find('img').data('slide-to');
                $('#selected-aksesoris').val(nextImageId);
                console.log(nextImageId);
                console.log('sekarang' + activeIndex + 'sebelumnya' + nextIndex);
            } else if (e.direction === 'right') { // sliding to previous slide
                var prevImageId = $(this).find('.carousel-item').eq(prevIndex).find('img').data('slide-to');
                $('#selected-aksesoris').val(prevImageId);
                console.log(nextImageId);
                console.log('sekarang' + activeIndex + 'sebelumnya' + prevIndex);
            }
        });
    </script>

    @include('components.customer.footercustomer')
</body>

</html>
