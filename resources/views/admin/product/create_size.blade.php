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
    @vite('resources/css/admin/editproduct.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="header_title">
        <a href="/admin/produk/" class = "no-text-decoration">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
        </a>
        <h1>Produk</h1>
    </div>


    <form action="{{ route('store_size', ['id' => $size->product->productID]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <label for="producTID">ID*</label>
        <input value = "{{ old('productID') ?? $size->product->productID }}"type="text" id="productID" name="productID"
            class="underline-input-full text-white" disabled>
        <span class="small-text">ID Produk. Tidak bisa Diubah.</span>

        <label for="productName">Nama*</label>
        <input value = "{{ old('productName') ?? $size->product->productName }}" type="text" id="productName"
            name="productName" class="underline-input-full" disabled>
        <span class="small-text">Nama Produk. Tidak Bisa Diubah</span>

        <label for="size">Ukuran*</label>
        <select id="size" name="size" required>
            @foreach (['S', 'M', 'L', 'XL'] as $option)
                <option value="{{ $option }}">
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Ukuran Produk Baru. Ukuran Harus Berbeda Dengan Yang Sudah Tersimpan. Wajib. Pilih
            salah satu</span>

        <label for="stock">Stok*</label>
        <input value = "{{ old('stock') }}" type="text" id="stock" name="stock" class="underline-input-full"
            required>
        <span class="small-text">Jumlah Stok Produk. Contoh: 5, 20, 100 dll. Wajib</span>


        <div class="save-button">
            <button type="submit">Simpan</button>
        </div>

    </form>

    @include('components.admin.footeradmin')

</body>




</html>
