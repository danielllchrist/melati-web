<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/customer/payment.css')
    @vite('resources/css/customer/pesananberhasil.css')
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="atas">
        <div class="nonactive active">
            <h1>Keranjang</h1>
        </div> 
        <div class="nonactive active">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Checkout</h1>
        </div>
        <div class="nonactive active">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pembayaran</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{asset('assets/back.svg')}}">
            <h1>Pesanan Dibuat </h1>
        </div>
    </div>

    <div class="bawah">
        <h2>Scan QR Code untuk menyelesaikan pembayaran</h2>
        <div class="wrap">
            <img src="https://barcode.orcascan.com/?data=12345" id="qrcode" alt="">
        </div>
        <p>Rp. 100.000</p>
        <form class="custom-form">
            <input type="text" placeholder="Ketik kode OTP disini" id="otp" oninput="removeSpaces(this)" required>
            <button id="bayar" class="no-bootstrap bayar">Bayar</button>
        </form>
    </div>

    @include('components.customer.pesananberhasil')
    @include('components.customer.pesanangagal')

</body>
@include('components.customer.footercustomer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
    function removeSpaces(input) {
        input.value = input.value.replace(/\s+/g, '').toUpperCase();
        if (input.value.length > 5) {
            input.value = input.value.substring(0, 5);
        }
    }   
    $(document).ready(function() {
        $('#bayar').click(function(event) {
            event.preventDefault(); // Mencegah perilaku default dari tombol 'Bayar'

            var otpValue = $('#otp').val().trim().toUpperCase();
            console.log(otpValue);
            if (otpValue === '') {
                // Jika belum terisi, kembalikan (tidak melakukan apa pun)
                return;
            } else if (otpValue !== 'TEST1') {
                alert('Kode OTP salah!');
                return;
            }

            // Jika nilai otpValue adalah 'TEST1', maka lanjutkan ke sini
            $('.atas div:nth-child(4)').addClass('active');
            var toastElement = $('#pembayaranberhasil');
            toastElement.toast({
                delay: 1000 
            });
            toastElement.toast('show');
            setTimeout(function() {
                console.log("Redirecting to /pesanan-saya");
                window.location.href = '/pesanan-saya';
            }, 1000);
        });
    });


</script>
</html>