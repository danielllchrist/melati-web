<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mix & Match Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .top-wrapper{
            background-image: url('assets/topMixnMatch.png');
            height: 340px;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }

        .top-wrapper > h1 {
            font-size: 50px;
            font-weight: 700;
        }

        .top-wrapper > h3 {
            font-size: 38px;
            font-weight: 400;
        }

        .card-custom, .card-custom-image > img {
            max-width: 225px;
            width: 100%;
        }

        .card-custom-image > img {
            height: 300px;
        }

        .card-custom-text{
            /* background-image: url('assets/backgroundCreatorsPick.png'); */
            padding: 10px 0;
            text-align: center;
        }

        .card-custom-text > a {
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

        .carousel-item > img {
            width: 100%;
            height: 350px;
        }

        .carousel {
            position: relative;
            display: flex;
            width: 100%;
        }           
     
        .carousel-control-prev , .carousel-control-next {
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

        .mixmatch{
            display: flex;
        }
        .mix-match-page{
            display: flex;
            flex-wrap: wrap;
            width: 35%;
        }

        .banner{
            width: 40%;
            height: 1000px;
            background-color: #F0F1E4;
        }

        .mix-match{
            width: 100%;
            margin: 20px 50px;
            padding: 0 20px;
            height: 475px;
        }

        .search-box{
            padding: 10px 0;
            width: 100%;
        }

        .search-input{
            background: none;
            border: 2px solid white;
            padding: 10px;
            width: 100%;
        }

        .icon-search{
            position: absolute;
            right: 30px;
            top: 410px;
        }

        .carousel > h1 {
            font-size: 30px;
            font-weight: 700;
        }

        .ps-search-custom-container {
    display : flex;
    width : 100%;
    height : 45px;
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
    width : 100%;
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
    margin-left : 15px;
    outline : none;
    font-family: 'Poppins';
}

.ps-search-custom:focus{
    border : none;
    outline : none;
}

.ps-search-custom::placeholder {
    color: #F0F1E4;
    opacity: 1; /* Firefox */
    border : none;
  }


.ps-search-custom  ::-ms-input-placeholder { /* Edge 12 -18 */
    color: #F0F1E4;
    border : none;
  }
    </style>
</head>
<body class="bg-black text-light">
@include('components.customer.headercustomer')
    <div class="container">
        <div class="top-wrapper mb-5 mt-5 d-flex flex-column justify-content-center align-items-center">
            <h1>Perfect Outfit Await</h1>
            <h3>Discover Your Best Mix and Match!</h3>
        </div>

        <div class="creator-pick-wrapper">
            <h3>Rekomendasi</h3>
            <div class="d-flex justify-content-between mt-3 mb-3">
                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\dressHijau.png">
                    </div>
                    <div class="card-custom-text">
                        <a href="detail">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\dressHijau.png">
                    </div>
                    <div class="card-custom-text">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\dressHijau.png">
                    </div>
                    <div class="card-custom-text">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\dressHijau.png">
                    </div>
                    <div class="card-custom-text">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="card-custom-image">
                        <img src="\assets\dressHijau.png">
                    </div>
                    <div class="card-custom-text">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            Belanja Tampilan Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mixmatch pt-5">

            <div class="banner">

            </div>
            
            <div class="mix-match-page">
            <div id="carousel-top-mid" class="carousel slide mix-match d-flex flex-column text-center">
                <h1>ATASAN</h1>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="\assets\top.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\top.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\top.png" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-top-mid" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-top-mid" data-bs-slide="next">
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
                    <div class="carousel-item active">
                        <img src="\assets\bottom.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\bottom.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\bottom.png" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-bottom-mid" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-bottom-mid" data-bs-slide="next">
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

            <div class="mix-match-page">
            <div id="carousel-accessories-right" class="carousel slide mix-match d-flex flex-column text-center align-self-center">
                <h1>AKSESORIS</h1>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="\assets\accessories.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\accessories.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="\assets\accessories.png" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-accessories-right" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-accessories-right" data-bs-slide="next">
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
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    @include('components.customer.footercustomer')
</body>
</html>