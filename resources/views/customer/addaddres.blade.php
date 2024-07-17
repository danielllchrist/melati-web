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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <img class="add_icon" src="{{ asset('assets/add.svg') }}">
                        Tambah Alamat
                    </button>
                </div>
                <div class="right">
                    @foreach ($addresses as $address)
                        <button type="button" class="square no-bootstrap edit-alamat-btn" data-toggle="modal"
                            data-target="#alamatEdit-{{ $address->addressID }}" data-id="{{ $address->addressID }}">
                            <div class="alamat dis">
                                <div class="wrap">
                                    <h3>{{ $address->receiver }}</h3>
                                    <p>
                                        {{ $address->nameAddress }}<br>
                                        {{ $address->phoneNum }}<br>
                                        {{ $address->detailAddress }},<br>
                                        {{ $address->ward }}, {{ $address->cityOrRegency }},
                                        {{ $address->province }}<br>
                                        {{ $address->description }}
                                    </p>
                                </div>
                                <div class="wrap2">
                                    <img class="back_icon" src="{{ asset('assets/edit form.png') }}">
                                </div>
                            </div>
                        </button>
                        @include('customer.modal.alamatEdit', ['address' => $address])
                    @endforeach

                    @include('customer.modal.tambahAlamat')

                </div>
            </div>
        </div>
    </div>

    @include('components.customer.footercustomer')


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    {{-- Script Tambah Alamat --}}

    <script>
        $(document).ready(function() {
            console.log($('#province'));
            $('#province').change(function() {
                var provinsiId = $(this).val();
                console.log(provinsiId);
                if (provinsiId) {
                    $.ajax({
                        url: '/getRegencies/' + provinsiId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // Tambahkan ini untuk debugging
                            $('#city').empty();
                            $('#district').empty();
                            $('#city').append('<option value="">Pilih Kota/Kabupaten</option>');
                            $.each(data.regencies, function(key, value) {
                                $('#city').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus,
                                errorThrown); // Tambahkan ini untuk debugging
                        }
                    });
                } else {

                    $('#city').empty();
                    $('#district').empty();
                }
            });

            $('#city').change(function() {
                var kotaId = $(this).val();
                if (kotaId) {
                    $.ajax({
                        url: '/getDistricts/' + kotaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // Tambahkan ini untuk debugging
                            $('#district').empty();
                            $('#district').append('<option value="">Pilih Kecamatan</option>');
                            $.each(data.districts, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus,
                                errorThrown); // Tambahkan ini untuk debugging
                        }
                    });
                } else {
                    $('#district').empty();
                }
            });
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}

    {{-- Script Modal --}}
    <script>
        $(document).ready(function() {
            // Ketika modal alamatDetail ditutup, semua modal ditutup
            $('#alamatDetail').on('hidden.bs.modal', function() {
                $('.tambahAlamat').modal('hide');
            });

            // Ketika tombol "Tambah Alamat" di dalam modal alamatDetail diklik, tutup modal alamatDetail dan buka modal tambahAlamat
            $('.btn-add-popup').on('click', function() {
                $('#alamatDetail').modal('hide');
                setTimeout(function() {
                    $('#tambahAlamat').modal('show');
                }, 500); // Waktu tunda untuk memastikan modal pertama benar-benar tertutup
            });

            // Ketika tombol "Pakai" di dalam modal vouchers diklik, tutup modal vouchers
            $('#vouchers .btn-submit-popup').on('click', function() {
                $('#vouchers').modal('hide');
            });

            // Event listener untuk kartu voucher
            $('.voucher-card').on('click', function() {
                // Hapus kelas 'selected' dari semua kartu
                $('.voucher-card').removeClass('selected');
                // Tambahkan kelas 'selected' ke kartu yang diklik
                $(this).addClass('selected');
            });

            // Event listener untuk kartu address
            $('.address-card').on('click', function() {
                // Hapus kelas 'selected' dari semua kartu
                $('.address-card').removeClass('selected');
                // Tambahkan kelas 'selected' ke kartu yang diklik
                $(this).addClass('selected');
            });
        });
    </script>

    {{-- EDIT ALAMAT --}}
    <script>
        $('.edit-alamat-btn').on('click', function() {
            var addressID = $(this).data('id');
            var provinsiSelect = $('#provinsi-' + addressID);
            var kotaSelect = $('#kota-' + addressID);
            var kecamatanSelect = $('#kecamatan-' + addressID);

            console.log(addressID);
            provinsiSelect.change(function() {
                var provinsiId = $(this).val();
                console.log(provinsiId);
                if (provinsiId) {
                    $.ajax({
                        url: '/getRegencies/' + provinsiId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // Tambahkan ini untuk debugging
                            kotaSelect.empty();
                            kecamatanSelect.empty();
                            kotaSelect.append('<option value="">Pilih Kota/Region</option>');
                            $.each(data.regencies, function(key, value) {
                                kotaSelect.append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus,
                                errorThrown); // Tambahkan ini untuk debugging
                        }
                    });
                } else {
                    kotaSelect.empty();
                    kecamatanSelect.empty();
                }
            });

            kotaSelect.change(function() {
                var kotaId = $(this).val();
                if (kotaId) {
                    $.ajax({
                        url: '/getDistricts/' + kotaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // Tambahkan ini untuk debugging
                            kecamatanSelect.empty();
                            kecamatanSelect.append('<option value="">Pilih Kecamatan</option>');
                            $.each(data.districts, function(key, value) {
                                kecamatanSelect.append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus,
                                errorThrown); // Tambahkan ini untuk debugging
                        }
                    });
                } else {
                    kecamatanSelect.empty();
                }
            });
        });
    </script>


</body>

</html>
