<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Melati</title>
    @vite('resources/css/customer/addaddres.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content ">
            <div class="inner-container">
                <div class = "ps-header">
                    <h2 class="ps-title">Alamat</h2>
                </div>
                <div class="tambah-alamat">
                    <button class="btn-add-popup" data-bs-toggle="modal" data-bs-target="#tambahAlamat">
                      <img class="add_icon" src="{{asset('assets/add.svg')}}">
                      Tambah Alamat
                    </button>
                </div>
                </div>
                <div class="right">
                    <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#alamatDetail">
                        <div class="alamat dis">
                            <div class="wrap">
                                <h3>
                                    Grace
                                </h3>
                                <p>
                                    (+62)123456789<br>
                                    Jalan Pakuan No.3<br>
                                    Sentul, Kabupaten Bogor<br>
                                    Jawa Barat
                                    Pagar Hijau yg ada anjing galak banget hati-hati ya 
                                </p>
                            </div>
                            <div class="wrap2">
                                <img class="back_icon" src="{{asset('assets/edit form.png')}}">
                            </div>
                        </div>
                    </button>

                    <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#alamatDetail">
                        <div class="alamat dis">
                            <div class="wrap">
                                <h3>
                                    Grace
                                </h3>
                                <p>
                                    (+62)123456789<br>
                                    Jalan Pakuan No.3<br>
                                    Sentul, Kabupaten Bogor<br>
                                    Jawa Barat<br>
                                    Pagar Hijau yg ada anjing galak banget hati-hati ya 
                                </p>
                            </div>
                            <div class="wrap2">
                                <img class="back_icon" src="{{asset('assets/edit form.png')}}">
                            </div>
                        </div>
                    </button>

                    @include('customer.modal.alamatDetail')

                </div>
               
            </div>
        </div>
    </div>
    
</body>

</html>
