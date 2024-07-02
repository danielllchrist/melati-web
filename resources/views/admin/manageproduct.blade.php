<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <title>Melati</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/css/admin/manageproduct.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="atas">
        <img class="back_icon" src="{{ asset('assets/back.svg') }}">
        <h1>Produk</h1>
        <button class="add-btn"><img src="\assets\crud_admin\add-white.svg" class = "add-img"alt="">
            Tambah Produk
        </button>
    </div>
    <div class="main-content ">
        <div class="inner-container">
            <div class = "ai-header">
                <div class="dropdown">
                    <button class="ctg-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori Produk
                    </button>
                    <div class="dropdown-menu category-slide-cs" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item category-slide-cs-menu" href="/admin/produk">Semua</a>
                        <a class="dropdown-item category-slide-cs-menu"
                            href="{{ route('category', ['category' => 'Atasan']) }}">Atasan</a>
                        <a class="dropdown-item category-slide-cs-menu"
                            href="{{ route('category', ['category' => 'Bawahan']) }}">Bawahan</a>
                        <a class="dropdown-item category-slide-cs-menu"
                            href="{{ route('category', ['category' => 'Aksesoris']) }}">Aksesoris</a>
                    </div>
                </div>
            </div>
            <div class="ai-content">
                <div class="ai-order">
                    <table id="dataTable">
                        <thead>
                            <tr class = "table-cell">
                                <th class="user-table-title">No</th>
                                <th class="user-table-title">Gambar</th>
                                <th class="user-table-title">Nama</th>
                                <th class="user-table-title">Harga</th>
                                <th class="user-table-title">Size</th>
                                <th class="user-table-title">Stok</th>
                                <th class="user-table-title">Berat (gr)</th>
                                <th class="user-table-title">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('components.admin.footeradmin')
    <script>
        // AJAX DataTable
        var datatable = $('#dataTable').DataTable({

            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'product.productID',
                    name: 'product.productID',
                    class: 'text-center'
                },
                {
                    data: 'product.productPicturePath',
                    name: 'product.productPicturePath',
                    class: 'text-center',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'product.productName',
                    name: 'product.productName',
                    class: 'text-center'
                },
                {
                    data: 'product.productPrice',
                    name: 'product.productPrice',
                    class: 'text-center'
                },
                {
                    data: 'size',
                    name: 'size',
                    class: 'text-center'
                },
                {
                    data: 'stock',
                    name: 'stock',
                    class: 'text-center'
                },
                {
                    data: 'product.productWeight',
                    name: 'product.productWeight',
                    class: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%',
                    class: 'text-center'
                },
            ],
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>




</body>




</html>
