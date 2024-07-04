<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Melati</title>
    @vite('resources/css/admin/index.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="main-content ">
        <div class="upper-section">
            <a href="#" class="back-btn"><img src="\assets\side_bar\back_arrow.svg" alt="Back">
                <div class="profile">
                    <p>Produk</p>
                </div>
            </a>
            <button class="add-btn"><img src="\assets\crud_admin\add-white.svg" class = "add-img"alt="">Tambah
                Produk</button>
        </div>
        <div class="inner-container">
            <div class = "ai-header">
                <div class = "padding-search-custom">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="ai-search-custom-container"><img src = "\assets\search-white.svg" alt = "search"
                                width = "19" height = "19"><input class = "ai-search-custom" type="text"
                                placeholder="Search">
                        </div>
                    </form>
                </div>
                <button class="ctg-btn">Kategori
                    Produk<img src="\assets\crud_admin\collapse.svg" class = "collapse-img"alt=""></button>
            </div>
            <div class="ai-content">
                <div class="ai-order">
                    <table id="dataTable">
                        <thead>
                            <tr class = "table-cell">
                                <th class = "id-cell">No</th>
                                <th>Gambar</th>
                                <th>Alamat Pengiriman</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Berat (gr)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>1</td>
                                    <td><img src="\assets\dressHijau.png" alt="" width ="120" height = "120">
                                    </td>
                                    <td>Jalan Pakuan No.3
                                        Sentul, Kabupaten Bogor
                                        Jawa Barat</td>
                                    <td>Batik Hijau</td>
                                    <td>
                                        125,000
                                    </td>
                                    <td>
                                        50
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        <div class="action-btn-container"><button class="action-btn"><img src="\assets\crud_admin\edit.svg" width = "15" height = "15" alt=""></button><button
                                                class="action-btn"><img src="\assets\crud_admin\delete.svg" width = "15" height = "15" alt=""></button></div>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @include('components.admin.footeradmin')
</body>

</html>
