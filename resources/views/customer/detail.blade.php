<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
        <title>Detail Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @vite('resources/css/app.css')
        @vite('resources/css/customer/detail.css')

    </head>
    <body class="bg-black">
        @include('components.customer.headercustomer')
        <!-- <div class="atas">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1></h1>
        </div> -->
        <div class="container">
            <div class="d-flex flex-column mt-5 mb-5">
                <div class="product-content d-flex justify-content-start ms-5 me-5">
                    <div class="image-content">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active" id="carousel-1">
                                    <img src="\assets\dressPink.png" class="d-block w-100">
                                </div>
                                <div class="carousel-item" id="carousel-2">
                                    <img src="\assets\dressHijau.png" class="d-block w-100">
                                </div>
                                <div class="carousel-item" id="carousel-3">
                                  <img src="\assets\dressPink.png" class="d-block w-100">
                                </div>
                                <div class="carousel-item" id="carousel-4">
                                    <img src="\assets\dressPink.png" class="d-block w-100">
                                </div>
                                <div class="carousel-item" id="carousel-5">
                                    <img src="\assets\dressPink.png" class="d-block w-100">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="detail-image d-flex justify-content-between">
                            <img src="\assets\dressPink.png" width="16%" onclick="switchCarousel(1)">
                            <img src="\assets\dressHijau.png" width="16%" onclick="switchCarousel(2)">
                            <img src="\assets\dressPink.png" width="16%" onclick="switchCarousel(3)">
                            <img src="\assets\dressPink.png" width="16%" onclick="switchCarousel(4)">
                            <img src="\assets\dressPink.png" width="16%" onclick="switchCarousel(5)">
                        </div>
                    </div>

                    <div class="detail-content">
                        <div class="detail-content-header d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <h1>Dress Pink</h1>
                                </div>
                                <div class="wishlist-content">
                                    <i class="fa fa-heart-o fa-2x mt-2 heart" id="wishlist-heart" onclick="wishlist()"></i>
                                </div>
                            </div>
                            <div class="star-products d-flex align-items-center mb-4">
                                <i class="fa fa-star rating-color me-2"></i>
                                <i class="fa fa-star rating-color me-2"></i>
                                <i class="fa fa-star rating-color me-2"></i>
                                <i class="fa fa-star rating-color me-2"></i>
                                <i class="fa fa-star me-2"></i>
                                <p>(1234 ulasan)</p>
                            </div>
                            <h1>Rp 399.000</h1>
                            <div class="mt-3 mb-3">
                                <p>Size :</p>
                                <div class="btn-sizes">
                                    <button class="btn btn-light rounded-circle ps-2 pe-2">XS</button>
                                    <button class="btn btn-light rounded-circle ps-2 pe-2">S</button>
                                    <button class="btn btn-light rounded-circle ps-2 pe-2">M</button>
                                    <button class="btn btn-light rounded-circle ps-2 pe-2">L</button>
                                    <button class="btn btn-light rounded-circle ps-2 pe-2">XL</button>
                                </div>
                            </div>
                            <div class="quantity mb-4">
                                <p>Quantity :</p>
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="btn-qty">
                                        <input type="text" value="0" id="qty-value" onkeypress='validate(event)'>
                                        <i class="fa fa-minus minus" onclick="minus()"></i>
                                        <i class="fa fa-plus plus" onclick="plus()"></i>
                                    </div>
                                    <button class="btn-cart">TAMBAHKAN KE KERANJANG</button>
                                </div>
                            </div>
                        </div>
                        <div class="detail-content-body">
                            <p>Description :</p>
                            <p class="detail-review">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi eos nostrum perferendis labore ab, amet similique odit mollitia nihil quam consequuntur voluptatem quo at repudiandae consequatur dolorum sit. Expedita ullam ea magnam consequuntur enim repellendus saepe unde obcaecati quisquam ratione nemo nostrum praesentium fugiat voluptatem cumque, modi aut quidem provident. Iusto, atque sed nisi ratione saepe id nemo labore necessitatibus voluptatem aliquam autem aperiam voluptas sunt enim! Blanditiis debitis tenetur eligendi dicta omnis quia, obcaecati iusto exercitationem nemo quae beatae non ex illo harum, in vero voluptatibus consequuntur magnam doloremque quos, distinctio amet atque! Quod neque iste harum reiciendis id aut rem velit quia, dolorum explicabo incidunt dicta tempora iure exercitationem vitae error soluta, natus itaque temporibus ipsa, corrupti vero? Voluptate iure consequatur quam quod sint officia doloremque nihil, ducimus molestias rerum libero earum corrupti ut porro quisquam aut quibusdam sequi dignissimos. Ipsa dignissimos minus quo itaque. Repellendus ducimus eos dignissimos deleniti saepe quia asperiores cumque aliquid maxime voluptatibus! Magni, odio. Sit officia voluptatum molestias ipsa quisquam quas. Vero corrupti quae fuga voluptas iure dolores nisi nam, aspernatur cumque natus autem, ut illo nemo consectetur? Aliquid animi voluptatum, suscipit accusamus reiciendis blanditiis cupiditate laborum corporis quam sit obcaecati tempora mollitia enim. Autem voluptate eveniet sequi saepe qui maxime inventore modi, eos molestias nesciunt adipisci reprehenderit nemo! Enim velit omnis excepturi fugit quos, corporis vitae esse mollitia repudiandae? Est dolores ut voluptate eveniet excepturi, nisi illo iste amet aspernatur consequuntur itaque blanditiis veritatis eius maiores iure alias dolorem quam atque iusto aliquam animi repellendus! Dolorum illo perferendis quidem rem autem totam officiis, ad doloremque saepe, magni, iusto perspiciatis libero. Eos magni autem fuga optio deserunt culpa laudantium, doloribus quasi dolore sapiente eligendi ea esse minus iure nemo delectus quam quo. In deleniti fugit voluptatem saepe, ea odit, at minus ex quis incidunt explicabo quam ducimus maxime quasi perspiciatis facere nam quaerat voluptatum. Quas quis optio eveniet ratione quia neque non corrupti placeat, magni itaque, dolorem eum unde? Dolore numquam laudantium est corrupti adipisci expedita deserunt exercitationem error quaerat! Laborum alias laboriosam unde fugiat, porro assumenda. Iusto veritatis esse a excepturi corrupti deleniti, quis praesentium officiis reiciendis explicabo, ducimus asperiores? Iusto, fuga. Error, dolor? Quibusdam explicabo excepturi facilis optio alias, iure distinctio hic id! Dolore explicabo, beatae sapiente sed alias maxime rerum unde labore vero laborum sit, eveniet aspernatur! Ea autem totam blanditiis repellendus vitae earum dolorum ipsam, fuga eligendi? Quae perferendis debitis doloribus nesciunt quos corrupti, obcaecati sed tenetur autem nostrum, nisi magnam tempora porro neque, voluptates minima incidunt error temporibus illum! Animi repellat eaque illum nobis itaque at ea magni hic natus, rem, inventore numquam quia pariatur quae blanditiis, explicabo sunt labore eum neque eligendi delectus! Autem, aliquam ea ullam quas soluta iste ipsam nulla porro in doloremque suscipit esse voluptatem, dolores natus aut amet nihil sapiente ad est ipsum! Eos libero, pariatur nostrum rerum odio, nulla commodi unde eligendi laboriosam, autem provident nisi? Ipsa quod provident, repellendus nesciunt magni expedita, veritatis placeat enim veniam distinctio exercitationem hic, pariatur ut.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex wrap-review mt-5 mb-5">
                <div class="graph w-25">
                    <h5>Ulasan Pelanggan</h5>
                    <div class="d-flex">
                        <div class="number">
                            <h1>4.6</h1>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mt-3 ms-3">
                            <div class="stars">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>(1234 Ulasan)</p>
                        </div>
                    </div>

                    <div class="detail-star">
                        <div class="star">
                            <p>5</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <p>50%</p>
                        </div>

                        <div class="star">
                            <p>4</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <p>20%</p>
                        </div>

                        <div class="star">
                            <p>3</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                            <p>10%</p>
                        </div>

                        <div class="star">
                            <p>2</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                            <p>10%</p>
                        </div>

                        <div class="star">
                            <p>1</p>
                            <i class="fa fa-star ms-1 me-1"></i>
                            <div class="progress ms-1 me-1" style="width: 100%;" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 10%;"></div>
                            </div>
                            <p>10%</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="reviews w-75">
                    <div class="d-flex align-items-center sort-by">
                        <h5>Sort By</h5>
                        <button class="btn btn-light rounded-pill fw-bolder category-review-color" onclick="showSort(this.id, 6)" id="newest">Newest</button>
                        <button class="btn btn-light rounded-pill fw-bolder" onclick="showSort(this.id, 5)" id="star5">5 Star</button>
                        <button class="btn btn-light rounded-pill fw-bolder" onclick="showSort(this.id, 4)" id="star4">4 Star</button>
                        <button class="btn btn-light rounded-pill fw-bolder" onclick="showSort(this.id, 3)" id="star3">3 Star</button>
                        <button class="btn btn-light rounded-pill fw-bolder" onclick="showSort(this.id, 2)" id="star2">2 Star</button>
                        <button class="btn btn-light rounded-pill fw-bolder" onclick="showSort(this.id, 1)" id="star1">1 Star</button>
                    </div>

                    <div class="content-review mt-5 mb-5" id="content-review">

                    </div>
                </div>
            </div>
            <!-- <div class="d-flex end" style="height: 20vh;">
            @include('components.customer.footercustomer')
            </div> -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            var data = [
                {"name" : "El Xavier", "rating": 5, "date":"2024-05-29T12:34:56", "size":"XL", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, fuga, illum officia ipsam itaque, nulla ex voluptatibus molestiae tempore corrupti exercitationem voluptatem consectetur quam! Molestiae earum repudiandae, consectetur aspernatur beatae dolores incidunt assumenda praesentium velit ex doloremque voluptatibus nulla similique esse adipisci cum blanditiis, id non sapiente obcaecati exercitationem? Error?"},
                {"name" : "El Klemer", "rating": 4, "date":"2024-05-28T08:15:00", "size":"L", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, fuga, illum officia ipsam itaque, nulla ex voluptatibus molestiae tempore corrupti exercitationem voluptatem consectetur quam!"},
                {"name" : "El Chef", "rating": 1, "date":"2024-05-22T18:45:50", "size":"M", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit."},
                {"name" : "El Gemoy", "rating": 2, "date":"2024-05-27T20:25:20", "size":"XXL", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti itaque doloremque ullam exercitationem quam nobis omnis repudiandae, a sint aspernatur nihil accusantium cumque obcaecati dolorem dolore perspiciatis? Pariatur, corporis laudantium provident asperiores debitis quos cumque cupiditate voluptatem tempore deserunt a necessitatibus suscipit laborum voluptas veniam. Velit doloremque veritatis, at repellat placeat cumque saepe blanditiis voluptates. Aspernatur blanditiis, eius repudiandae eveniet vel iure suscipit molestias ipsa itaque, eos officiis odit laudantium."},
                {"name" : "El Chudai", "rating": 3, "date":"2024-05-25T06:35:01", "size":"S", "review":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti itaque doloremque ullam exercitationem quam nobis omnis repudiandae, a sint aspernatur nihil accusantium cumque obcaecati dolorem dolore perspiciatis? Pariatur, corporis laudantium provident asperiores debitis quos cumque cupiditate voluptatem tempore deserunt a necessitatibus suscipit laborum voluptas veniam. Velit doloremque veritatis, at repellat placeat cumque saepe blanditiis voluptates."}
            ];

            function showSort(id, sortBy){
                console.log(id);
                for(let i=0; i<6; i++){
                    if(i > 0){
                        document.getElementById("star" + i).classList.remove("category-review-color");
                    }else{
                        document.getElementById("newest").classList.remove("category-review-color");
                    }
                }
                document.getElementById(id).classList.add("category-review-color");

                var tempData = [];

                for(let i=0; i<data.length; i++){
                    if(sortBy >= 1 && sortBy <= 5 && data[i].rating == sortBy){
                        tempData.push(data[i]);
                    }else if(sortBy == 6){
                        tempData.push(data[i]);
                    }
                }

                for(let i=0; i<tempData.length; i++){
                    for(let j=0; j<tempData.length-1; j++){
                        var tempDateNext = new Date(tempData[j+1].date).valueOf();
                        var tempDateCurrent = new Date(tempData[j].date).valueOf();

                        if(tempDateNext > tempDateCurrent){
                            var temp = tempData[j+1];
                            tempData[j+1] = tempData[j];
                            tempData[j] = temp;
                        }
                    }
                }

                var content = "";
                for(let i=0; i<tempData.length; i++){
                    content += "<div class=\"review\"><div class=\"name-review\"><h3>" + tempData[i].name + "</h3></div><div class=\"stars-review\">";
                    let tempStar = 5;
                    for(let j=0; j<tempData[i].rating; j++){
                        content += "<i class=\"fa fa-star rating-color me-1\"></i>";
                        tempStar -= 1;
                    }

                    for(let j=0; j<tempStar; j++){
                        content += "<i class=\"fa fa-star me-1\"></i>";
                    }

                    content += "</div><div class=\"date-review\">";

                    const dateNow = new Date();
                    const dateReview = new Date(tempData[i].date);

                    const diffTime = Math.abs(dateNow - dateReview);
                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                    if(diffDays > 0){
                        content += "<h4>" + diffDays + " day ago - ";
                    }else{
                        let seconds = diffTime / 1000;

                        const hDiff = parseInt( seconds / 3600 );
                        seconds = seconds % 3600;

                        const minDiff = parseInt( seconds / 60 );
                        seconds = parseInt(seconds % 60);

                        if(hDiff > 0){
                            content += "<h4>" + hDiff + " hour " + minDiff + " minute " + seconds + " second ago - ";
                        }else if(minDiff > 0){
                            content += "<h4>" + minDiff + " minute " + seconds + " second ago - ";
                        }else{
                            content += "<h4>" + seconds + " second ago - ";
                        }
                    }

                    content += tempData[i].size + "</h4></div><div class=\"body-review\"><p>" + tempData[i].review + "</p></div></div>";
                }

                document.getElementById("content-review").innerHTML = content;
            }

            window.onload = function(e){
                showSort("newest",6);
            }

            function wishlist(){
                var element = document.getElementById("wishlist-heart");

                if(element.classList.contains("fa-heart-o")){
                    element.classList.add("fa-heart");
                    element.classList.add("heart-color");

                    element.classList.remove("fa-heart-o");
                }else{
                    element.classList.remove("fa-heart");
                    element.classList.remove("heart-color");

                    element.classList.add("fa-heart-o");
                }
            }

            function switchCarousel(id){
                //Reset active carousel
                let i=1;
                while(document.getElementById("carousel-" + i) != undefined){
                    document.getElementById("carousel-" + i).classList.remove("active");
                    i += 1;
                }

                document.getElementById("carousel-" + id).classList.add("active");
            }

            function validate(evt) {
                var theEvent = evt || window.event;

                if (theEvent.type === 'paste') {
                    key = event.clipboardData.getData('text/plain');
                } else {
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode(key);
                }
                var regex = /[0-9]|\./;
                if( !regex.test(key) ) {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            }

            function minus() {
                if(document.getElementById("qty-value").value == ""){
                    document.getElementById("qty-value").value = 0;
                }
                document.getElementById("qty-value").value -= 1;
            }

            function plus() {
                if(document.getElementById("qty-value").value == ""){
                    document.getElementById("qty-value").value = 0;
                }
                document.getElementById("qty-value").value = parseInt(document.getElementById("qty-value").value) + 1;
            }
        </script>
    </body>
</html>
