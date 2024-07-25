<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/customer/payment.css')
    @vite('resources/css/customer/ordersuccess.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="atas">
        <div class="nonactive active">
            <h1>Keranjang</h1>
        </div>
        <div class="nonactive active">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pesan</h1>
        </div>
        <div class="nonactive active">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pembayaran</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pesanan Dibuat </h1>
        </div>
    </div>

    <div class="bawah">
        <h2>Scan QR Code untuk menyelesaikan pembayaran</h2>
        <div class="wrap">
            <img src="https://qrcode.tec-it.com/API/QRCode?data={{ $otp }}" id="qrcode" alt="">
        </div>
        <p>Rp {{ number_format($total, 0, ',', '.') }}</p>
        <form class="custom-form">
            <input type="number" placeholder="Ketik kode OTP disini" id="otp" oninput="removeSpaces(this)"
                required>
            <div class="button-wrapper">
                <a class="no-bootstrap bayar" href="#"
                    onclick="event.preventDefault(); document.getElementById('form-batal').submit();">Batal</a>
                <button id="bayar" class="no-bootstrap bayar">Bayar</button>
            </div>
        </form>
        <form id="form-batal" action="{{ route('CancelOrder', ['transactionID' => $id]) }}" method="POST"
            style="display: none;">
            @csrf
        </form>
    </div>

    @include('components.customer.ordersuccess')

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
            // Mencegah perilaku default dari tombol 'Bayar'
            event.preventDefault();

            var actualOTP = {{ $otp }};
            var otpValue = $('#otp').val().trim().toUpperCase();
            console.log(otpValue);
            if (otpValue === '') {
                alert('Kode OTP tidak boleh kosong!');
                return;
            } else if (otpValue != actualOTP) {
                alert('Kode OTP salah!');
            }

            // Jika nilai otpValue adalah 'actualOTP', maka lanjutkan ke sini
            $('.atas div:nth-child(4)').addClass('active');
            alert('Selamat! Pembayaran berhasil.');
            fetch('{{ route('PayOrder', ['transactionID' => $id]) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        // Add any necessary data here
                    })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to a new page after successful payment
                        window.location.href =
                            '{{ route('CustomerDetailOrder', ['orderID' => $id]) }}'; // Replace with your success route
                    } else {
                        alert('Gagal memproses pembayaran!');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
        });
    });
</script>

</html>
