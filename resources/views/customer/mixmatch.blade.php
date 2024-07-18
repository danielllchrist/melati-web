<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Mix & Match Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Poppins;
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

        .card-custom,
        .card-custom-image>img {
            max-width: 225px;
            width: 100%;
        }

        .card-custom-image>img {
            height: 300px;
        }

        .card-custom-text {
            /* background-image: url('assets/backgroundCreatorsPick.png'); */
            padding: 10px 0;
            text-align: center;
        }

        .card-custom-text>a {
            text-decoration: none;
            width: 100%;
            color: rgb(48, 34, 18);
            font-weight: 600;
            background-color: rgb(211, 160, 97);
            display: inline-block;
            padding: 5px 0;
            font-weight: 600;
            border-radius: 5em;
            text-align: center;
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

        .card-custom {
            border-radius: 0;
            color: white;
            width: 230px;
            height: 400px;
            margin: 10px;
        }

        .card-custom>i {
            position: relative;
            top: 240px;
            left: 190px;
        }

        .card-custom-top {
            border-radius: 0;
            width: 100%;
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
            max-height: 245px;
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
    </style>
</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <div class="container">
        <div class="top-wrapper mb-5 mt-5 d-flex flex-column justify-content-center align-items-center">
            <h1>Koleksi Baru Menanti!</h1>
            <h3>Temukan Kombinasi Pakaianmu!</h3>
        </div>

        <div class="creator-pick-wrapper">
            <h3>Rekomendasi</h3>
            <div class="d-flex justify-content-between mt-3 mb-3">
                @foreach ($products as $i)
                    <div class="card-custom">
                        <div class="card-custom-image">
                            {{ $i->productName }}
                        </div>
                        <div class="card-custom-text">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                onclick="showDataModal()">
                                <i class="fa fa-shopping-cart"></i>
                                Belanja Tampilan Ini
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mixmatch">

            <div class="banner justify-content-center">

            </div>

            <div class="mix-match-page">
                <div id="carousel-top-mid" class="carousel slide mix-match d-flex flex-column text-center">
                    <h1>ATASAN</h1>
                    <div class="carousel-inner">
                        @foreach ($atasan as $a)
                            <div class="carousel-item active">
                                {{-- <img src="{{ url("'". $a->profilePicturePath) . "'"}}" class="d-block w-100"> --}}
                                <p class = "text-light">{{ $a->productName }}</p>
                            </div>
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
                                    width = "19" height = "19"><input class = "ps-search-custom" type="text"
                                    placeholder="cari">
                            </div>
                        </form>
                    </div>
                </div>

                <div id="carousel-bottom-mid" class="carousel slide mix-match d-flex flex-column text-center">
                    <h1>BAWAHAN</h1>
                    <div class="carousel-inner">
                        @foreach ($bawahan as $b)
                            <div class="carousel-item active">
                                {{-- <img src="{{ url("'". $a->profilePicturePath) . "'"}}" class="d-block w-100"> --}}
                                <p class = "text-light">{{ $b->productName }}</p>
                            </div>
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
                            <div class="ps-search-custom-container"><img src = "assets/search-white.svg" alt = "search"
                                    width = "19" height = "19"><input class = "ps-search-custom" type="text"
                                    placeholder="cari">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mix-match-page justify-content-center">
                <div id="carousel-accessories-right"
                    class="carousel slide mix-match d-flex flex-column text-center align-self-center">
                    <h1>AKSESORIS</h1>
                    <div class="carousel-inner">
                        @foreach ($aksesoris as $c)
                            <div class="carousel-item active">
                                {{-- <img src="{{ url("'". $a->profilePicturePath) . "'"}}" class="d-block w-100"> --}}
                                <p class = "text-light">{{ $c->productName }}</p>
                            </div>
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
                                    type="text" placeholder="cari">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script>
        var data = [{
                "id": 1,
                "harga": 120000,
                "wishlist": true
            },
            {
                "id": 2,
                "harga": 150000,
                "wishlist": false
            },
            {
                "id": 3,
                "harga": 110000,
                "wishlist": true
            }
        ];

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        function showDataModal() {
            document.getElementById("content-catalog").innerHTML = "";

            const randNumber = Math.floor(Math.random() * 3 + 1);

            if (randNumber == 1) {
                document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "400px";
            } else if (randNumber == 2) {
                document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "700px";
            } else {
                document.getElementsByClassName("modal-dialog")[0].style.maxWidth = "900px";
            }

            var content = "";
            for (let i = 0; i < randNumber; i++) {
                if (data[i].wishlist) {
                    content +=
                        "<div class=\"catalog-item\"><a href=\"detail.html\"><div class=\"card-custom\"><img src=\"assets/kambojaKutubaru.png\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>Kamboja Kutubaru</p><h3>" +
                        rupiah(data[i].harga) +
                        "</h3></div></div></a><i class=\"fa fa-heart fa-2x heart-color\" id=\"wishlist-heart-" + data[i]
                        .id + "\" onclick=\"wishlist(event, " + data[i].id + ")\"></i></div>";
                } else {
                    content +=
                        "<div class=\"catalog-item\"><a href=\"detail.html\"><div class=\"card-custom\"><img src=\"assets/kambojaKutubaru.png\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>Kamboja Kutubaru</p><h3>" +
                        rupiah(data[i].harga) +
                        "</h3></div></div></a><i class=\"fa fa-heart-o fa-2x heart\" id=\"wishlist-heart-" + data[i].id +
                        "\" onclick=\"wishlist(event, " + data[i].id + ")\"></i></div>";
                }
            }

            document.getElementById("content-catalog").innerHTML = content;
        }

        function wishlist(event, id) {
            event.preventDefault();

            for (let i = 0; i < data.length; i++) {
                if (data[i].id == id) {
                    data[i].wishlist = !data[i].wishlist;

                    if (data[i].wishlist) {
                        document.getElementById("wishlist-heart-" + id).classList.remove("fa-heart-o");
                        document.getElementById("wishlist-heart-" + id).classList.remove("heart");
                        document.getElementById("wishlist-heart-" + id).classList.add("fa-heart");
                        document.getElementById("wishlist-heart-" + id).classList.add("heart-color");
                    } else {
                        document.getElementById("wishlist-heart-" + id).classList.remove("fa-heart");
                        document.getElementById("wishlist-heart-" + id).classList.remove("heart-color");
                        document.getElementById("wishlist-heart-" + id).classList.add("fa-heart-o");
                        document.getElementById("wishlist-heart-" + id).classList.add("heart");
                    }
                    break;
                }
            }
        }
    </script>

    @include('components.customer.footercustomer')
</body>

</html>
