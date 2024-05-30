<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penilaian</title>
    @vite('resources/css/app.css')
    @vite('resources/css/customer/review.css')
    <script src="https://kit.fontawesome.com/5ea815c1d0.js"></script>
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="container">
        <section>
            <div class="page-title">
                <div class="title-wrapper">
                    <a href="">
                        <div class="title">
                            <img src="assets\dummy-img\back arrow.svg" alt="">
                            <h1>Penilaian Produk</h1>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <form action="" method="post">
            @csrf
            <section>
                <div class="product-detail">
                    <div class="img-wrapper">
                        <img src="assets/dummy-img/Rectangle 28.png" alt="">
                    </div>
                    <div class="details-and-stars">
                        <h3 class="product-name">Eau De Toilette</h3>
                        <h3 class="product-size">Size : M</h3>
                        <div class="rating">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="review">
                    <div class="text-area-wrapper">
                        <textarea name="" id="" placeholder="Beri tahu kami tentang produk ini."></textarea>
                    </div>
                </div>
            </section>
        </form>

        <section>
            <div class="submit">
                <div class="submit-btn-wrapper">
                    <button class="submit-btn">Nilai</button>
                </div>
            </div>
        </section>

    </div>
    @include('components.customer.footercustomer')
</body>

</html>
