<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
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
        <div class="main-content">
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
                <div class="right">
                    @for($i=0;$i<10;$i++)
                        <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#alamatEdit">
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
                    @endfor

                    @include('customer.modal.alamatEdit')
                    @include('customer.modal.tambahAlamat')

                </div>
            </div>
        </div>
    </div>

    @include('components.customer.footercustomer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    // Ketika modal alamatDetail ditutup, semua modal ditutup
    $('#alamatDetail').on('hidden.bs.modal', function () {
      $('.tambahAlamat').modal('hide');
    });

    // Ketika tombol "Tambah Alamat" di dalam modal alamatDetail diklik, tutup modal alamatDetail dan buka modal tambahAlamat
    $('.btn-add-popup').on('click', function () {
      $('#alamatDetail').modal('hide');
      setTimeout(function() {
        $('#tambahAlamat').modal('show');
      }, 500); // Waktu tunda untuk memastikan modal pertama benar-benar tertutup
    });

    // Ketika tombol "Pakai" di dalam modal vouchers diklik, tutup modal vouchers
    $('#vouchers .btn-submit-popup').on('click', function () {
      $('#vouchers').modal('hide');
    });

    // Event listener untuk kartu voucher
    $('.voucher-card').on('click', function () {
      // Hapus kelas 'selected' dari semua kartu
      $('.voucher-card').removeClass('selected');
      // Tambahkan kelas 'selected' ke kartu yang diklik
      $(this).addClass('selected');
    });

    // Event listener untuk kartu address
    $('.address-card').on('click', function () {
      // Hapus kelas 'selected' dari semua kartu
      $('.address-card').removeClass('selected');
      // Tambahkan kelas 'selected' ke kartu yang diklik
      $(this).addClass('selected');
    });
  });
</script>
</body>

</html>
