<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/customer/checkout.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.customer.headercustomer')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="main-content">
        <form
            action="{{ route('prepayment', ['transactionID' => $transaction->transactionID, 'tempTotalPrice' => $tempTotalPrice, 'voucherID' => $targetVoucher]) }}"
            method = "post">
            @csrf
            <div class="atas">
                <div class="nonactive active">
                    <h1>Keranjang</h1>
                </div>
                <div class="nonactive active">
                    <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                    <h1>Pesan</h1>
                </div>
                <div class="nonactive">
                    <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                    <h1>Pembayaran</h1>
                </div>
                <div class="nonactive">
                    <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                    <h1>Pesanan Dibuat </h1>
                </div>
            </div>
            <div class="bottom">
                <div class="left">
                    <h2>Alamat Pengiriman</h2>
                    @if ($latestAddress)
                        <button type="button" class="square no-bootstrap" data-toggle="modal"
                            data-target="#alamatDetail" id="alamatModal"
                            data-address-id="{{ $latestAddress->addressID }}">
                            <div class="alamat dis">
                                <div class="wrap">
                                    <!-- <p>Pilih alamat pengirimanmu</p> -->
                                    <h3 id = "mainName">
                                        {{ $latestAddress->nameAddress }} | {{ $latestAddress->phoneNum }}<br>
                                    </h3>
                                    <p id = "mainDetail">{{ $latestAddress->detailAddress }}</p>
                                    <p id = "mainCity">{{ $latestAddress->cityOrRegency }},
                                        {{ $latestAddress->ward }}
                                    </p>
                                    <p id = "mainProvince">{{ $latestAddress->province }}</p>
                                </div>
                                <div class="wrap2">
                                    <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                                </div>
                            </div>
                        </button>
                    @else
                        <button type="button" class="square no-bootstrap no-address" data-toggle="modal"
                            data-target="#alamatDetail" id="alamatModal">
                            <div class="alamat dis">
                                <div class="wrap">
                                    Tambah Alamat
                                </div>
                                <div class="wrap2">
                                    <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                                </div>
                            </div>
                        </button>
                    @endif
                    <input type="hidden" id="selected-address" name="selected_address" value="">

                    @include('customer.modal.alamatDetail')

                    <h2>Voucher</h2>
                    <button type="button" class="square no-bootstrap" data-toggle="modal" data-target="#vouchers">
                        <div class="voucher dis">
                            <div class="wrap">
                                <p>Gunakan {{ $targetVoucher == null ? 'voucher' : $targetVoucher->voucherName }}</p>
                            </div>
                            <div class="wrap2">
                                <img class="back_icon" src="{{ asset('assets/back.svg') }}">
                            </div>
                        </div>
                    </button>
                    <input type="hidden" id="selected-voucher" name="selected_voucher_name" value="">

                    @include('customer.modal.vouchers')


                    <h2>Metode Pembayaran</h2>
                    <div class="pembayaran">
                        <label class="square">
                            <input type="radio" name="payment" value="Kartu Kredit" required>
                            <p>Kartu Kredit</p>
                        </label>
                        <label class="square">
                            <input type="radio" name="payment" value="Transfer Bank" required>
                            <p>Transfer Bank</p>
                        </label>
                        <label class="square">
                            <input type="radio" name="payment" value="E-Wallet" required>
                            <p>E-Wallet</p>
                        </label>
                    </div>
                </div>
                <div class="right">
                    <h2>Pesanan</h2>
                    <div class="detail">
                        <div class="content">
                            @forelse ($items as $i)
                                <div class="product">
                                    <img id="productimg"
                                        src="{{ Storage::url(json_decode($i->size->product->productPicturePath)[0]) }}">
                                    <div class="wraps">
                                        <h1>{{ $i->size->product->productName }}</h1>
                                        {{-- {{dd($i->size->product->size)}} --}}
                                        <p>{{ $i->size->size }}</p>
                                    </div>
                                    <div class="wraps2">
                                        <p>{{ $i->quantity }} x
                                            {{ 'Rp ' . number_format($i->size->product->productPrice, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="product">
                                    <p>Belum ada produk, ERROR</p>
                                </div>
                            @endforelse
                            {{-- <input type="hidden" id="cart_ids" name="cart_ids" value=""> --}}
                        </div>
                        <div class="w2">
                            {{-- count of different items --}}

                            <p>{{ $items->count() }} Items</p>
                        </div>
                        <div class="w1 brdr">
                            <h3>Subtotal</h3>
                            <p>{{ 'Rp ' . number_format($transaction->subTotalPrice, 0, ',', '.') }}</p>
                        </div>
                        <div class="w1">
                            <h3>Discounts</h3>
                            {{-- <p>{{"Rp " . number_format($i->size->product->productPrice, 0, ',', '.')}}</p> --}}
                            <p>{{ $targetVoucher == null ? '-Rp. 0' : '-Rp. ' . number_format($targetVoucher->voucherNominal, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w1">
                            <h3>Shipping</h3>
                            <p>{{ 'Rp ' . number_format($transaction->shippingFee, 0, ',', '.') }}</p>
                        </div>
                        <div class="w1 brdr">
                            <h2>Total</h2>
                            <h2>{{ 'Rp ' . number_format($tempTotalPrice ? $tempTotalPrice : $transaction->totalPrice, 0, ',', '.') }}
                            </h2>
                        </div>
                    </div>
                    <div class="wrap3">
                        <button class="bayar" type="submit">Konfirmasi Pesanan</button>
                    </div>
                </div>
            </div>
            @include('components.customer.footercustomer')
        </form>
        @include('customer.modal.alamatDetail')
        @include('customer.modal.tambahAlamat')

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @php
        $tempID = $transaction->transactionID;
    @endphp
    {{-- Buka Tutup, Save Data Modal --}}

    <script>
        $(document).ready(function() {

            // ALAMAT
            var oldID = $('#alamatModal').data('address-id');
            var oldName = $('#alamatModal').find('#mainName').text();
            var oldDetail = $('#alamatModal').find('#mainDetail').text();
            var oldCity = $('#alamatModal').find('#mainCity').text();
            var oldProvince = $('#alamatModal').find('#mainProvince').text();

            // Ketika modal alamatDetail ditutup, semua modal ditutup
            $('#alamatDetail').on('hidden.bs.modal', function() {
                addressId = oldID;
                $('#alamatModal').find('#mainName').text(oldName);
                $('#alamatModal').find('#mainDetail').text(oldDetail);
                $('#alamatModal').find('#mainCity').text(oldCity);
                $('#alamatModal').find('#mainProvince').text(oldProvince);
                $('.tambahAlamat').modal('hide');
            });

            // Event listener untuk kartu address
            $('.address-card').on('click', function() {
                // Hapus kelas 'selected' dari semua kartu
                $('.address-card').removeClass('selected');
                // Tambahkan kelas 'selected' ke kartu yang diklik
                $(this).addClass('selected');
            });

            // Kalau diklick address card, alamat di main HTML berubah
            $('#alamatDetail .address-card').on('click', function() {
                var addressId = $(this).data('address-id');
                var addressName = $(this).find('h6').text();
                var addressDetail = $(this).find('#detail').text();
                var addressCity = $(this).find('#regency').text();
                var addressProvince = $(this).find('#province').text();

                $('#alamatDetail .btn-submit-popup').on('click', function() {
                    oldID = addressId;
                    oldName = addressName
                    oldDetail = addressDetail
                    oldCity = addressCity
                    oldProvince = addressProvince

                    $('#alamatModal').find('#mainName').text(oldName);
                    $('#alamatModal').find('#mainDetail').text(oldDetail);
                    $('#alamatModal').find('#mainCity').text(oldCity);
                    $('#alamatModal').find('#mainProvince').text(oldProvince);
                    $('.tambahAlamat').modal('hide');
                });

                // Update the selected address display
                $('#alamatModal').find('#mainName').text(addressName);
                $('#alamatModal').find('#mainDetail').text(addressDetail);
                $('#alamatModal').find('#mainCity').text(addressCity);
                $('#alamatModal').find('#mainProvince').text(addressProvince);

                $('#selected-address').val(addressId);
            });

            // Jika dia klik modal 'x' button, ubah alamat menjadi alamat sebelumnya
            $('#alamatDetail .btn').on('click', function() {
                var addressId = oldID;
                $('#alamatModal').find('#mainName').text(oldName);
                $('#alamatModal').find('#mainDetail').text(oldDetail);
                $('#alamatModal').find('#mainCity').text(oldCity);
                $('#alamatModal').find('#mainProvince').text(oldProvince);

                // hide alamatDetail
                $('#alamatDetail').modal('hide');
            })


            // VOUCHER

            var isPilihButtonClicked = false;

            var voucherID = null;

            // Ketika modal voucher ditutup, semua modal ditutup
            $('#vouchers').on('hidden.bs.modal', function() {
                // If the "Pilih" button was not clicked, reset the voucher card text to the default name
                if (!isPilihButtonClicked) {
                    console.log(isPilihButtonClicked)
                    $('.voucher.dis p').text('Gunakan Voucher');
                }

                // Reset the flag
                isPilihButtonClicked = false;
            });

            // Jika klik 'x' button, maka ganti jadi 'Gunakan voucher'
            $('#vouchers .btn').on('click', function() {
                $('.voucher.dis p').text('Gunakan voucher');
            });

            // Jika voucher klik submit button, dropdown diganti nama menjadi voucher yang terselected
            $('#vouchers .btn-submit-popup').on('click', function() {
                // Get the selected voucher name from the voucher card with the 'selected' class
                var voucherName = $('.voucher-card.selected').find('h6').text();

                // Update the main HTML with the selected voucher name
                $('.voucher.dis p').text('Gunakan ' + voucherName);

                // Save the selected voucher name in a hidden input field
                $('#selected-voucher').val(voucherID);


                // console.log(isPilihButtonClicked)
                // Set the flag to true
                isPilihButtonClicked = true;
                // console.log(isPilihButtonClicked)

                $('#vouchers').modal('hide');
                event.preventDefault();

                var transactionID = <?php echo json_encode($tempID); ?>;
                // console.log the value of id selected-voucher
                window.location.href = '/konfirmasi-pesanan/' + transactionID + '/' + voucherID;
            });

            // Event listener untuk kartu voucher
            $('.voucher-card').on('click', function() {
                // Hapus kelas 'selected' dari semua kartu
                $('.voucher-card').removeClass('selected');
                // Tambahkan kelas 'selected' ke kartu yang diklik
                $(this).addClass('selected');
                voucherID = $(this).data('voucher-id');

                // Get the voucher name from the selected voucher card
                var voucherName = $(this).find('h6').text();

                // Update the main HTML with the selected voucher name
                $('.voucher.dis p').text(voucherName);
            });
        });
    </script>

</body>

</html>
