<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/customer/checkout.css')
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="main-content">
    <div class="atas">
        <div class="nonactive active">
            <a href="/keranjang">
                <h1>Keranjang</h1>
            </a>
        </div> 
        <div class="nonactive active">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pesan</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pembayaran</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pesanan Dibuat </h1>
        </div>
    </div>
    <div class="bottom">
        <div class="left">
            <h2>Alamat Pengiriman</h2>
            <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#alamatDetail">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1"> -->
                <div class="alamat dis">
                    <div class="wrap">
                        <!-- <p>Pilih alamat pengirimanmu</p> -->
                        <h3>
                            Grace | (+62)123456789<br>
                        </h3>
                        <p>
                            Jalan Pakuan No.3<br>
                            Sentul, Kabupaten Bogor<br>
                            Jawa Barat
                        </p>
                    </div>
                    <div class="wrap2">
                        <img class="back_icon" src="{{asset('assets/back.svg')}}">
                    </div>
                </div>
            </button>

            @include('customer.modal.alamatDetail')

            <h2>Voucher</h2>
            <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#vouchers">
                <div class="voucher dis">
                    <div class="wrap">
                        <p>Gunakan voucher</p>
                    </div>
                    <div class="wrap2">
                        <img class="back_icon" src="{{asset('assets/back.svg')}}">
                    </div>
                </div>
            </button>

            @include('customer.modal.vouchers')


            <h2>Metode Pembayaran</h2>
            <div class="pembayaran">
                <label class="square">
                    <input type="radio" name="payment" value="credit_card">
                    <p>Kartu Kredit</p>
                </label>
                <label class="square">
                    <input type="radio" name="payment" value="bank_transfer">
                    <p>Transfer Bank</p>
                </label>
                <label class="square">
                    <input type="radio" name="payment" value="e_wallet">
                    <p>E-Wallet</p>
                </label>
            </div>
        </div>
        <div class="right">
            <h2>Pesanan</h2>
            <div class="detail">
                <div class="content">
                    @for ($i = 0; $i <10; $i++)
                    <div class="product">
                        <img id="productimg" src="{{asset('assets/perfume.svg')}}">
                        <div class="wraps">
                            <h1>Eu da Toilette</h1>
                            <p>M</p>
                        </div>
                        <div class="wraps2">
                            <p>1 x 10.000
                            </p>
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="w2">
                <p>3 Items</p>
            </div>
            <div class="w1 brdr">
                <h3>Subtotal</h3>
                <p>Rp 200.000</p>
            </div>
            <div class="w1">
                <h3>Discounts</h3>
                <p>Rp 200.000</p>
            </div>
            <div class="w1">
                <h3>Shipping</h3>
                <p>Rp 200.000</p>
            </div>
            <div class="w1 brdr">
                <h2>Total</h2>
                <h2>Rp 400.000</h2>
            </div>
            </div>
            <div class="wrap3">
                <button class="bayar">Konfirmasi Pesanan</button>
            </div>
        </div>
    </div>
    @include('components.customer.footercustomer')

    @include('customer.modal.alamatDetail')
    @include('customer.modal.tambahAlamat')
</div>

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