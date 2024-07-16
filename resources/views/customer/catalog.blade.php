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
                <h3 class="text-light mb-4">Kategori</h3>
                <div class="kategori-pria">
                    <div class="collapsed-text">
                        <a class="collapse-btn text-white-50" data-bs-toggle="collapse" href="#collapsePria"
                            role="button" aria-expanded="false" aria-controls="collapsePria" id="btnPria">
                            Pria
                        </a>
                        <img src="https://cdn0.iconfinder.com/data/icons/arrows-android-l-lollipop-icon-pack/24/collapse2-512.png"
                            width="25px" id="arrowCollapsePria">
                        @php

                        @endphp
                    </div>

                    <div class="collapse multi-collapse" id="collapsePria">
                        <form action="">
                            <input type="hidden" name="gender" value="pria">
                            <input type="hidden" name="category" value="atasan">
                            <button id="pria-atasan">Atasan</button>
                        </form>
                        <form action="">
                            <input type="hidden" name="gender" value="pria">
                            <input type="hidden" name="category" value="bawahan">
                            <button id="pria-bawahan">Bawahan</button>
                        </form>
                        <form action="">
                            <input type="hidden" name="gender" value="pria">
                            <input type="hidden" name="category" value="aksesoris">
                            <button id="pria-aksesoris">Aksesoris</button>
                        </form>
                    </div>
                </div>

                <div class="kategori-wanita">
                    <div class="collapsed-text">
                        <a class="collapse-btn text-white-50" data-bs-toggle="collapse" href="#collapseWanita"
                            role="button" aria-expanded="false" aria-controls="collapseWanita" id="btnWanita">
                            Wanita
                        </a>
                        <img src="https://cdn0.iconfinder.com/data/icons/arrows-android-l-lollipop-icon-pack/24/collapse2-512.png"
                            width="25px" id="arrowCollapseWanita">
                    </div>

                    <div class="collapse multi-collapse" id="collapseWanita">
                        <form action="">
                            <input type="hidden" name="gender" value="wanita">
                            <input type="hidden" name="category" value="atasan">
                            <button id="wanita-atasan">Atasan</button>
                        </form>
                        <form action="">
                            <input type="hidden" name="gender" value="wanita">
                            <input type="hidden" name="category" value="bawahan">
                            <button id="wanita-bawahan">Bawahan</button>
                        </form>
                        <form action="">
                            <input type="hidden" name="gender" value="wanita">
                            <input type="hidden" name="category" value="aksesoris">
                            <button id="wanita-aksesoris">Aksesoris</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="catalog d-flex flex-column mb-5 w-100">
                <div class="d-flex justify-content-end align-items-center header-catalog">
                    <p class="text-light me-4 mt-3">Urut berdasarkan</p>
                    <select name="sortBy" id="sortBy">
                        <option value="0" selected disabled>Select one</option>
                        <option value="1">Harga Tertinggi</option>
                        <option value="2">Harga Terendah</option>
                    </select>
                </div>
                <div class="content-catalog d-flex flex-wrap justify-content-around mt-3 mb-3" id="content-catalog">
                    @foreach ($product as $item)
                        <div class="catalog-item" data-price="{{ $item->productPrice }}">
                            <a href="{{route('ProductDetail', ['id' => $item->productID])}}">
                                <div class="card-custom" style="">
                                    <style></style>
                                    <img src="assets/kambojaKutubaru.png" class="card-custom-top" alt="Catalog">
                                    @if (!Auth::check())
                                        <a href="{{ route('LogIn') }}" style="text-decoration: none;">
                                            <i class="fa fa-heart-o fa-2x heart" id="wishlist-heart"></i>
                                        </a>
                                    @else
                                        @php
                                            $query = "SELECT * FROM `wishlists` WHERE `productID` = ? AND `userID` = ?";
                                            $wished = DB::select($query, [$item->productID, auth()->user()->userID]);
                                        @endphp
                                        <input name="productID" type="hidden" value="{{ $item->productID }}">
                                        @if ($wished)
                                            <form action="{{ route('unwish') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="productID"
                                                    value="{{ $item->productID }}">
                                                <button type="submit">
                                                    <i class="fa fa-heart fa-2x heart click-wish"
                                                        id="wishlist-heart"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('wish') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="productID"
                                                    value="{{ $item->productID }}">
                                                <button type="submit">
                                                    <i class="fa fa-heart-o fa-2x heart click-wish"
                                                        id="wishlist-heart"></i>
                                                </button>
                                            </form>
                                        @endif

                                    @endif

                                    <div class="card-custom-body">
                                        <p class="productName">{{ $item->productName }}</p>
                                        <h3 class="productPrice">Rupiah {{ $item->productPrice }}</h3>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('.click-wish').on('click', function(e) {
            //     e.preventDefault();

            //     let $icon = $(this);
            //     let productID = $icon.data('product-id');
            //     let wished = $icon.data('wished') === 'true';
            //     let url = wished ? '{{ route('unwish') }}' : '{{ route('wish') }}';

            //     // Update the URL with the productID
            //     url = url.replace(':productID', productID);

            //     $.ajax({
            //         type: 'POST',
            //         url: url,
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             productID: productID // Include productID in the data
            //         },
            //         success: function(response) {
            //             if (response.status === 'wished') {
            //                 $icon.removeClass('fa-heart-o').addClass('fa-heart').data('wished', 'true');
            //             } else if (response.status === 'unwished') {
            //                 $icon.removeClass('fa-heart').addClass('fa-heart-o').data('wished', 'false');
            //             }
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.responseText);
            //             // Handle error gracefully if needed
            //         }
            //     });
            // });
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

    <script>
        // var data = [
        //     {"id":1,"jk":"pria","kategori":"atasan","harga":120000,"wishlist":true},
        //     {"id":2,"jk":"pria","kategori":"bawahan","harga":150000,"wishlist":false},
        //     {"id":3,"jk":"pria","kategori":"aksesoris","harga":110000,"wishlist":true},
        //     {"id":4,"jk":"wanita","kategori":"atasan","harga":100000,"wishlist":true},
        //     {"id":5,"jk":"wanita","kategori":"bawahan","harga":125000,"wishlist":false},
        //     {"id":6,"jk":"wanita","kategori":"aksesoris","harga":149000,"wishlist":true},
        //     {"id":7,"jk":"pria","kategori":"atasan","harga":115000,"wishlist":true},
        //     {"id":8,"jk":"pria","kategori":"bawahan","harga":105000,"wishlist":true},
        //     {"id":9,"jk":"pria","kategori":"aksesoris","harga":90000,"wishlist":false},
        //     {"id":10,"jk":"wanita","kategori":"atasan","harga":50000,"wishlist":false},
        //     {"id":11,"jk":"wanita","kategori":"bawahan","harga":80000,"wishlist":false},
        //     {"id":12,"jk":"wanita","kategori":"aksesoris","harga":99000,"wishlist":true},
        //     {"id":13,"jk":"pria","kategori":"atasan","harga":119000,"wishlist":true},
        //     {"id":14,"jk":"pria","kategori":"bawahan","harga":109000,"wishlist":true},
        //     {"id":15,"jk":"pria","kategori":"bawahan","harga":104900,"wishlist":false},
        //     {"id":16,"jk":"wanita","kategori":"atasan","harga":105900,"wishlist":false}
        // ];


        // var data = "{{ $product->toJson() }}";
        // console.log(data);

        // var sortBy = Object.values(1); //default sort
        // var data = {{ $product->toJson() }};
        // var dataTemp = data;
        // var dataTemp = {{ $product->toJson() }};

        // console.log(dataTemp);

        // window.onload = function() {
        //     sort(Object.values(1));
        //     resetSelection();
        // }

        // const rupiah = (number) => {
        //     return new Intl.NumberFormat("id-ID", {
        //     style: "currency",
        //     currency: "IDR"
        //     }).format(number);
        // }

        // function sort(id) {
        //     sortBy = id;

        //     for(let i=0; i<dataTemp.length; i++){
        //         for(let j=0; j<dataTemp.length-1; j++){
        //             if(id.value == 2){
        //                 if(dataTemp[j+1].harga < dataTemp[j].harga){
        //                     var temp = dataTemp[j+1];
        //                     dataTemp[j+1] = dataTemp[j];
        //                     dataTemp[j] = temp;
        //                 }
        //             }else{
        //                 if(dataTemp[j+1].harga > dataTemp[j].harga){
        //                     var temp = dataTemp[j+1];
        //                     dataTemp[j+1] = dataTemp[j];
        //                     dataTemp[j] = temp;
        //                 }
        //             }
        //         }
        //     }

        //     document.getElementById("content-catalog").innerHTML = "";
        //     var content = "";
        //     for(let i=0; i<dataTemp.length; i++){
        //         if(dataTemp[i].wishlist){
        //             content += "<div class=\"catalog-item\"><a href=\"detail.html\"><div class=\"card-custom\"><img src=\"assets/kambojaKutubaru.png\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>Kamboja Kutubaru</p><h3>" + rupiah(dataTemp[i].harga) + "</h3></div></div></a><i class=\"fa fa-heart fa-2x heart-color\" id=\"wishlist-heart-" + dataTemp[i].id + "\" onclick=\"wishlist(event, " + dataTemp[i].id + ")\"></i></div>";
        //         }else{
        //             content += "<div class=\"catalog-item\"><a href=\"detail.html\"><div class=\"card-custom\"><img src=\"assets/kambojaKutubaru.png\" class=\"card-custom-top\" alt=\"Catalog\"><div class=\"card-custom-body\"><p>Kamboja Kutubaru</p><h3>" + rupiah(dataTemp[i].harga) + "</h3></div></div></a><i class=\"fa fa-heart-o fa-2x heart\" id=\"wishlist-heart-" + dataTemp[i].id + "\" onclick=\"wishlist(event, " + dataTemp[i].id + ")\"></i></div>";
        //         }
        //     }

        //     document.getElementById("content-catalog").innerHTML = content;

        //     if(dataTemp.length < 4){
        //         document.getElementById("content-catalog").classList.remove("justify-content-around");
        //         document.getElementById("content-catalog").classList.add("justify-content-start");
        //         var cards = document.getElementsByClassName("card-custom");
        //         for(let i=0; i<cards.length; i++){
        //             cards[i].classList.add("ms-5");
        //         }
        //     }else{
        //         document.getElementById("content-catalog").classList.add("justify-content-around");
        //         document.getElementById("content-catalog").classList.remove("justify-content-start");
        //     }
        // }

        // $('#collapsePria').on('show.bs.collapse', function () {
        //     document.getElementById("arrowCollapsePria").style.transform = "rotate(180deg)"
        //     document.getElementById("btnPria").classList.remove("text-white-50");
        // })

        // $('#collapsePria').on('hidden.bs.collapse', function () {
        //     document.getElementById("arrowCollapsePria").style.transform = "rotate(0deg)"
        //     document.getElementById("btnPria").classList.add("text-white-50");
        //     selectionData(null, null);
        // })

        // $('#collapseWanita').on('show.bs.collapse', function () {
        //     document.getElementById("arrowCollapseWanita").style.transform = "rotate(180deg)"
        //     document.getElementById("btnWanita").classList.remove("text-white-50");
        // })

        // $('#collapseWanita').on('hidden.bs.collapse', function () {
        //     document.getElementById("arrowCollapseWanita").style.transform = "rotate(0deg)"
        //     document.getElementById("btnWanita").classList.add("text-white-50");
        //     selectionData(null, null);
        // })

        // function resetSelection() {
        //     document.getElementById("pria-atasan").classList.add("text-white-50");
        //     document.getElementById("pria-bawahan").classList.add("text-white-50");
        //     document.getElementById("pria-aksesoris").classList.add("text-white-50");
        //     document.getElementById("wanita-atasan").classList.add("text-white-50");
        //     document.getElementById("wanita-bawahan").classList.add("text-white-50");
        //     document.getElementById("wanita-aksesoris").classList.add("text-white-50");
        // }

        // function selectionData(jk, kategori){
        //     dataTemp = [];
        //     for(let i=0; i<data.length; i++){
        //         if((data[i].jk == jk && data[i].kategori == kategori) || (jk == null && kategori == null)){
        //             dataTemp.push(data[i]);
        //         }
        //     }

        //     //Reset Selection
        //     resetSelection();

        //     if((jk != null && kategori != null)){
        //         document.getElementById(jk + "-" + kategori).classList.remove("text-white-50");
        //     }

        //     sort(Object.values(1));
        // }

        // function wishlist(event, id){
        //     event.preventDefault();

        //     for(let i=0; i<data.length; i++){
        //         if(data[i].id == id){
        //             data[i].wishlist = !data[i].wishlist;

        //             if(data[i].wishlist){
        //                 document.getElementById("wishlist-heart-" + id).classList.remove("fa-heart-o");
        //                 document.getElementById("wishlist-heart-" + id).classList.remove("heart");
        //                 document.getElementById("wishlist-heart-" + id).classList.add("fa-heart");
        //                 document.getElementById("wishlist-heart-" + id).classList.add("heart-color");
        //             }else{
        //                 document.getElementById("wishlist-heart-" + id).classList.remove("fa-heart");
        //                 document.getElementById("wishlist-heart-" + id).classList.remove("heart-color");
        //                 document.getElementById("wishlist-heart-" + id).classList.add("fa-heart-o");
        //                 document.getElementById("wishlist-heart-" + id).classList.add("heart");
        //             }
        //             break;
        //         }
        //     }
        // }
    </script>
    @include('components.customer.footercustomer')
</body>

</html>
