<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
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
        <a href="{{ route('AdminDashboard') }}" class = "back-arrow"><img class="back_icon"
                src="{{ asset('assets/back.svg') }}"></a>
        <h1>Produk</h1>
    </div>
    <div class="main-content ">
        <div class="inner-container">
            <div class = "ai-header">
                <div class="dropdown dropdown-custom">
                    <a href="{{ route('produk.create') }}" class = "add-btn"><img src="\assets\crud_admin\add-white.svg"
                            class = "add-img"alt="">Tambah Produk</a>

                    <div class="dropdown-menu category-slide-cs dropdown-custom" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item add-btn-menu" href="{{ route('produk.create') }}"><img
                                src="\assets\crud_admin\item-btn.svg" class = "add-img"alt=""> Produk Baru</a>
                        <a class="dropdown-item add-btn-menu" href="/"><img src="\assets\crud_admin\size-btn.svg"
                                class = "add-img"alt=""> Tambah Size</a>
                    </div>
                </div>

                <div class="dropdown dropdown-custom">
                    <button class="ctg-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip"
                        data-bs-title="Another tooltip">
                        Kategori Produk
                    </button>
                    <div class="dropdown-menu category-slide-cs dropdown-custom" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item category-slide-cs-menu" href="/admin/produk"><img
                                src="\assets\crud_admin\semua.svg" class = "add-img"alt=""> Semua</a>
                        <a class="dropdown-item category-slide-cs-menu"
                            href="{{ route('Category', ['category' => 'Atasan']) }}"><img
                                src="\assets\crud_admin\atasan.svg" class = "add-img"alt=""> Atasan</a>
                        <a class="dropdown-item category-slide-cs-menu add-fs"
                            href="{{ route('Category', ['category' => 'Bawahan']) }}"> <img
                                src="\assets\crud_admin\bawahan.svg" class = "add-img" alt=""> Bawahan</a>
                        <a class="dropdown-item category-slide-cs-menu add-fs"
                            href="{{ route('Category', ['category' => 'Aksesoris']) }}"><img
                                src="\assets\crud_admin\accessories.svg" class = "add-img"alt=""> Aksesoris</a>
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
                                <th class="user-table-title">Ukuran</th>
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

            "language":{
                "url":"//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidak ada data yang tersedia"
            },
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'product.productID',
                    name: 'product.productID',
                },
                {
                    data: 'thumbnail',
                    name: 'thumbnail',
                    class: 'thumbnailwrapper',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'product.productName',
                    name: 'product.productName',
                },
                {
                    data: 'product.productPrice',
                    name: 'product.productPrice',
                },
                {
                    data: 'size',
                    name: 'size',
                },
                {
                    data: 'stock',
                    name: 'stock',
                },
                {
                    data: 'product.productWeight',
                    name: 'product.productWeight',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%',
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>




</html>
