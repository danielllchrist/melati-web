<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Detail Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/app.css')
    @vite('resources/css/customer/detail.css')
    <style>
        .btn-clicked {
            color: #F0F1E4;
            background-color: rgb(73, 51, 25);
            background-color: rgb(73, 51, 25);
            border: rgb(73, 51, 25);
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .no-spinner {
            -moz-appearance: textfield;
            color: rgb(73, 51, 25);
            background-color: #F0F1E4;
            width: 100px;
        }

        button.btn.btn-light.rounded-circle.ps-2.pe-2.btn-size.btn-clicked {
            height: 40px;
        }

        button.btn.btn-light.rounded-circle.ps-2.pe-2.btn-size {
            height: 40px;
        }
    </style>

</head>

<body class="bg-black">
    @include('components.customer.headercustomer')
    <!-- <div class="atas">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1></h1>
        </div> -->
    <div class="container">
        <div class="d-flex flex-column mt-5 mb-5">
            <div class="back-wrapper">
                <div class="back">
                    <a href="{{ route('Catalogue') }}"><img src="\assets\dummy-img\back arrow.svg" alt=""></a>
                </div>
            </div>
            <div class="product-content d-flex justify-content-start ms-5 me-5">
                <div class="image-content">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @php
                                $productPictures = json_decode($product->productPicturePath, true);
                            @endphp

                            @foreach ($productPictures as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
                                    id="carousel-{{ $index + 1 }}">
                                    <img src="{{ Storage::url($photo) }}" class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Sebelumnya</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Selanjutnya</span>
                        </button>
                    </div>

                    <div class="detail-image d-flex justify-content-between">
                        @foreach ($productPictures as $index => $photo)
                            <img src="{{ Storage::url($photo) }}" width="16%"
                                onclick="switchCarousel({{ $index + 1 }})">
                        @endforeach
                    </div>

                </div>
                @php
                    $ratings = $product->review->pluck('rating');
                    $averageRating = $ratings->avg();
                @endphp

                <div class="detail-content">
                    <div class="detail-content-header d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="title" style="color: #F0F1E4;">
                                <h1>{{ $product->productName }}</h1>
                            </div>
                            <div class="wishlist-content">
                                @if (auth()->user() != null)
                                    @php
                                        $query = 'SELECT * FROM `wishlists` WHERE `productID` = ? AND `userID` = ?';
                                        $wished = DB::select($query, [$product->productID, auth()->user()->userID]);
                                    @endphp
                                    @if (!$wished)
                                        <form action="{{ route('wish') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="productID" value="{{ $product->productID }}">
                                            <button type="submit"
                                                style="background: none; border: none; color: #F0F1E4;">
                                                <i class="fa fa-heart-o fa-2x mt-2 heart" id="fa-heart-o"
                                                    onclick="wishlist()"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('unwish') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="productID" value="{{ $product->productID }}">
                                            <button type="submit" style="background: none; border: none;">
                                                <i class="fa fa-heart fa-2x mt-2 heart-color" id="fa-heart-o"
                                                    onclick="wishlist()"></i>
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('LogIn') }}">
                                        <i class="fa fa-heart-o fa-2x mt-2 heart" id="fa-heart-o"
                                            onclick="wishlist()"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="star-products d-flex align-items-center mb-4">
                            <i class="fa fa-star @if (floor($averageRating) >= 1) rating-color @endif me-2"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 2) rating-color @endif me-2"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 3) rating-color @endif me-2"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 4) rating-color @endif me-2"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 5) rating-color @endif me-2"></i>
                            <p>({{ $product->review->count() }} ulasan)</p>
                        </div>
                        <h1>Rp {{ number_format($product->productPrice, 2, ',', '.') }}</h1>
                        <div class="mt-3 mb-3">
                            <p>Ukuran :</p>
                            <div class="btn-sizes">
                                @php
                                    // Urutan yang diinginkan
                                    $order = ['S' => 1, 'M' => 2, 'L' => 3, 'XL' => 4];

                                    // Urutkan ukuran
                                    $sizes = $product->size->sortBy(function ($size) use ($order) {
                                        return $order[$size->size];
                                    });
                                @endphp

                                @foreach ($sizes as $size)
                                    <button class="btn btn-light rounded-circle ps-2 pe-2 btn-size"
                                        value="{{ $size->size }}" data-stock="{{ $size->stock }}"
                                        onclick="showStock('{{ $size->stock }}')">{{ $size->size }}</button>
                                @endforeach

                                <p id="stock-message" class="stock" style="margin-top: 20px; margin-bottom:none;"></p>
                            </div>
                        </div>
                        <div class="quantity mb-4">
                            <form action="{{ route('add_cart') }}" method="POST">
                                @csrf
                                <p>Jumlah :</p>
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="btn-qty">
                                        <input type="hidden" name="productID" value="{{ $product->productID }}">
                                        <input type="number" value="0" id="qty-value" max="0"
                                            min="0" name="quantity" class="no-spinner">
                                        <input type="hidden" name="size" id="productSize">
                                        <i class="fa fa-minus minus" style="color: rgb(73, 51, 25);"
                                            onclick="minus()"></i>
                                        <i class="fa fa-plus plus" style="color: rgb(73, 51, 25);"
                                            onclick="plus()"></i>
                                    </div>

                                    @auth
                                        <!-- Jika pengguna sudah login, tampilkan tombol submit -->
                                        <button class="btn-cart" type="submit">TAMBAHKAN KE KERANJANG</button>
                                    @else
                                        <!-- Jika pengguna belum login, arahkan ke halaman login -->
                                        <a href="{{ route('LogIn') }}" class="btn-cart centered"
                                            style="background-color: #F0F1E4; color: black;">
                                            TAMBAHKAN KE KERANJANG
                                        </a>
                                    @endauth
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="detail-content-body">
                        <p>Deskripsi :</p>
                        <p class="detail-review">{{ $product->productDescription }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex wrap-review mt-5 mb-5">
            <div class="graph w-25">
                <h5>Ulasan Pelanggan</h5>
                <div class="d-flex">
                    <div class="number">
                        <h1>
                            @if (floor($averageRating) == $averageRating)
                                {{ $averageRating }}
                            @elseif($averageRating == round($averageRating, 1))
                                {{ number_format($averageRating, 1) }}
                            @else
                                {{ number_format($averageRating, 2) }}
                            @endif
                        </h1>
                    </div>

                    <div class="d-flex flex-column justify-content-center align-items-center mt-3 ms-3">
                        <div class="stars">
                            <i class="fa fa-star @if (floor($averageRating) >= 1) rating-color @endif"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 2) rating-color @endif"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 3) rating-color @endif"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 4) rating-color @endif"></i>
                            <i class="fa fa-star @if (floor($averageRating) >= 5) rating-color @endif"></i>
                        </div>
                        <p>({{ $product->review->count() }} ulasan)</p>
                    </div>
                </div>

                <div class="detail-star">
                    @for ($i = 5; $i >= 1; $i--)
                        @php
                            $countRating = $product->review->where('rating', $i)->count();
                            $percentageRating =
                                $product->review->count() > 0 ? $countRating / $product->review->count() : 0;
                        @endphp
                        <div class="star">
                            <p>{{ $i }}</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow=""
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: {{ floor($percentageRating * 100) }}%"></div>
                            </div>
                            <p>{{ floor($percentageRating * 100) }}%</p>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="reviews w-75">
                <div class="d-flex align-items-center justify-content-around sort-by ">
                    <h5 class="mb-0">Urut Berdasarkan</h5>
                    <form action="">
                        <input type="hidden" name="rating" value="">
                        <button
                            class="btn btn-light rounded-pill fw-bolder @if (!request()->query('rating')) category-review-color @endif"
                            id="newest" type="submit">Terbaru</button>
                    </form>
                    @for ($i = 5; $i >= 1; $i--)
                        <form action="">
                            <input type="hidden" name="rating" value="{{ $i }}">
                            <button
                                class="btn btn-light rounded-pill fw-bolder @if (request()->query('rating') == $i) category-review-color @endif"
                                id="star{{ $i }}" type="submit">Bintang {{ $i }}</button>
                        </form>
                    @endfor
                </div>

                <div class="content-review mt-5 mb-5" id="content-review">
                    @php
                        $ratingFilter = request()->query('rating');
                        $content_review =
                            $ratingFilter !== null
                                ? $product->review->where('rating', $ratingFilter)
                                : $product->review;
                    @endphp
                    @if ($content_review->count() == 0)
                        <div class="review">
                            <div class="body-review pb-2">
                                Belum ada rating
                            </div>
                        </div>
                    @endif
                    @foreach ($content_review as $item)
                        <div class="review">
                            <div class="name-review">
                                <h3>{{ $item->transaction->user->name }}</h3>
                            </div>

                            <div class="stars-review">
                                @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="fa fa-star rating-color me-1"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $item->rating; $i++)
                                    <i class="fa fa-star me-1"></i>
                                @endfor
                            </div>
                            <div class="date-review">
                                <h4>{{ $item->transaction->created_at->format('d F Y') }}</h4>
                            </div>
                            <div class="body-review">
                                <p>{{ $item->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- <div class="d-flex end" style="height: 20vh;">
            @include('components.customer.footercustomer')
            </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer>
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" defer></script>

    <script>
        function showStock(stock) {
            // Menampilkan pesan stok tersisa di dalam elemen dengan ID stock-message
            document.getElementById('stock-message').innerText = 'Tersisa ' + stock;
        }

        $(document).ready(function() {
            $('.btn-size').click(function() {
                $('.btn-size').removeClass('btn-clicked');
                $(this).addClass('btn-clicked');

                var size = $(this).val();
                $('#productSize').val(size);

                var productID = encodeURIComponent('{{ $product->productID }}');

                $.ajax({
                    url: '{{ url('/get_stock') }}/' + productID + '/' + size,
                    method: 'GET',
                    success: function(response) {
                        if (response.error) {
                            console.error('Error:', response.error);
                            $('#qty-value').attr('max', 0);
                        } else {
                            $('#qty-value').attr('max', response.stock);
                        }
                        // Reset nilai quantity ke 0
                        $('#qty-value').val(0);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

    <script>
        // var data = [
        //     {"name" : "El Xavier", "rating": 5, "date":"2024-05-29T12:34:56", "size":"XL", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, fuga, illum officia ipsam itaque, nulla ex voluptatibus molestiae tempore corrupti exercitationem voluptatem consectetur quam! Molestiae earum repudiandae, consectetur aspernatur beatae dolores incidunt assumenda praesentium velit ex doloremque voluptatibus nulla similique esse adipisci cum blanditiis, id non sapiente obcaecati exercitationem? Error?"},
        //     {"name" : "El Klemer", "rating": 4, "date":"2024-05-28T08:15:00", "size":"L", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, fuga, illum officia ipsam itaque, nulla ex voluptatibus molestiae tempore corrupti exercitationem voluptatem consectetur quam!"},
        //     {"name" : "El Chef", "rating": 1, "date":"2024-05-22T18:45:50", "size":"M", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit."},
        //     {"name" : "El Gemoy", "rating": 2, "date":"2024-05-27T20:25:20", "size":"XXL", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti itaque doloremque ullam exercitationem quam nobis omnis repudiandae, a sint aspernatur nihil accusantium cumque obcaecati dolorem dolore perspiciatis? Pariatur, corporis laudantium provident asperiores debitis quos cumque cupiditate voluptatem tempore deserunt a necessitatibus suscipit laborum voluptas veniam. Velit doloremque veritatis, at repellat placeat cumque saepe blanditiis voluptates. Aspernatur blanditiis, eius repudiandae eveniet vel iure suscipit molestias ipsa itaque, eos officiis odit laudantium."},
        //     {"name" : "El Chudai", "rating": 3, "date":"2024-05-25T06:35:01", "size":"S", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti itaque doloremque ullam exercitationem quam nobis omnis repudiandae, a sint aspernatur nihil accusantium cumque obcaecati dolorem dolore perspiciatis? Pariatur, corporis laudantium provident asperiores debitis quos cumque cupiditate voluptatem tempore deserunt a necessitatibus suscipit laborum voluptas veniam. Velit doloremque veritatis, at repellat placeat cumque saepe blanditiis voluptates."}
        // ];

        // function showSort(id, sortBy){
        //     console.log(id);
        //     for(let i=0; i<6; i++){
        //         if(i > 0){
        //             document.getElementById("star" + i).classList.remove("category-review-color");
        //         }else{
        //             document.getElementById("newest").classList.remove("category-review-color");
        //         }
        //     }
        //     document.getElementById(id).classList.add("category-review-color");

        //     var tempData = [];

        //     for(let i=0; i<data.length; i++){
        //         if(sortBy >= 1 && sortBy <= 5 && data[i].rating == sortBy){
        //             tempData.push(data[i]);
        //         }else if(sortBy == 6){
        //             tempData.push(data[i]);
        //         }
        //     }

        //     for(let i=0; i<tempData.length; i++){
        //         for(let j=0; j<tempData.length-1; j++){
        //             var tempDateNext = new Date(tempData[j+1].date).valueOf();
        //             var tempDateCurrent = new Date(tempData[j].date).valueOf();

        //             if(tempDateNext > tempDateCurrent){
        //                 var temp = tempData[j+1];
        //                 tempData[j+1] = tempData[j];
        //                 tempData[j] = temp;
        //             }
        //         }
        //     }

        //     var content = "";
        //     for(let i=0; i<tempData.length; i++){
        //         content += "<div class=\"review\"><div class=\"name-review\"><h3>" + tempData[i].name + "</h3></div><div class=\"stars-review\">";
        //         let tempStar = 5;
        //         for(let j=0; j<tempData[i].rating; j++){
        //             content += "<i class=\"fa fa-star rating-color me-1\"></i>";
        //             tempStar -= 1;
        //         }

        //         for(let j=0; j<tempStar; j++){
        //             content += "<i class=\"fa fa-star me-1\"></i>";
        //         }

        //         content += "</div><div class=\"date-review\">";

        //         const dateNow = new Date();
        //         const dateReview = new Date(tempData[i].date);

        //         const diffTime = Math.abs(dateNow - dateReview);
        //         const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

        //         if(diffDays > 0){
        //             content += "<h4>" + diffDays + " day ago - ";
        //         }else{
        //             let seconds = diffTime / 1000;

        //             const hDiff = parseInt( seconds / 3600 );
        //             seconds = seconds % 3600;

        //             const minDiff = parseInt( seconds / 60 );
        //             seconds = parseInt(seconds % 60);

        //             if(hDiff > 0){
        //                 content += "<h4>" + hDiff + " hour " + minDiff + " minute " + seconds + " second ago - ";
        //             }else if(minDiff > 0){
        //                 content += "<h4>" + minDiff + " minute " + seconds + " second ago - ";
        //             }else{
        //                 content += "<h4>" + seconds + " second ago - ";
        //             }
        //         }

        //         content += tempData[i].size + "</h4></div><div class=\"body-review\"><p>" + tempData[i].review + "</p></div></div>";
        //     }

        //     document.getElementById("content-review").innerHTML = content;
        //     console.log(content);
        // }

        // window.onload = function(e){
        //     showSort("newest",6);
        // }

        // function wishlist(){
        //     var element = document.getElementById("wishlist-heart");

        //     if(element.classList.contains("fa-heart-o")){
        //         element.classList.add("fa-heart");
        //         element.classList.add("heart-color");

        //         element.classList.remove("fa-heart-o");
        //     }else{
        //         element.classList.remove("fa-heart");
        //         element.classList.remove("heart-color");

        //         element.classList.add("fa-heart-o");
        //     }
        // }

        function switchCarousel(id) {
            // Reset active carousel
            let i = 1;
            while (document.getElementById("carousel-" + i) !== null) {
                document.getElementById("carousel-" + i).classList.remove("active");
                i++;
            }

            document.getElementById("carousel-" + id).classList.add("active");
        }

        document.addEventListener('DOMContentLoaded', function() {
            var sizeButtons = document.querySelectorAll('.btn-size');
            var qtyInput = document.getElementById('qty-value');
            var sizeInput = document.getElementById('productSize');

            sizeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var selectedSize = button.value;
                    var stock = button.getAttribute('data-stock');

                    sizeInput.value = selectedSize;
                    qtyInput.setAttribute('max', stock);
                    qtyInput.value = 0; // Reset quantity input value when size changes
                });
            });
        });

        function minus() {
            var qtyInput = document.getElementById("qty-value");
            if (qtyInput.value === "") {
                qtyInput.value = 0;
            }
            var currentValue = parseInt(qtyInput.value);
            if (currentValue > 0) {
                qtyInput.value = currentValue - 1;
            }
        }

        function plus() {
            var qtyInput = document.getElementById("qty-value");
            var maxStock = parseInt(qtyInput.getAttribute("max")); // Get the maximum stock from the input attribute

            if (qtyInput.value === "") {
                qtyInput.value = 0;
            }
            var currentValue = parseInt(qtyInput.value);
            if (currentValue < maxStock) {
                qtyInput.value = currentValue + 1;
            } else {
                alert("You have reached the maximum stock available."); // Optional: Alert the user if max stock is reached
            }
        }
    </script>
</body>

</html>
