<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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


    <form action="{{ route('produk.update', $size) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="producTID">ID*</label>
        <input value = "{{ old('productID') ?? $size->productID }}"type="text" id="productID" name="productID"
            class="underline-input-full text-white" disabled>
        <span class="small-text">ID Produk. Tidak bisa Diubah.</span>

        <label for="productName">Nama*</label>
        <input value = "{{ old('productName') ?? $size->product->productName }}" type="text" id="productName"
            name="productName" class="underline-input-full" required>
        <span class="small-text">Nama Produk. Contoh: Batik Keris, Peci, dll</span>

        <label for="size">Ukuran*</label>
        <select id="size" name="size" required>
            @foreach (['S', 'M', 'L', 'XL'] as $option)
                <option value="{{ $option }}" {{ $size->size == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Ukuran Produk. Wajib. Pilih salah satu</span>

        <label for="stock">Stok*</label>
        <input value = "{{ old('stock') ?? $size->stock }}" type="text" id="stock" name="stock"
            class="underline-input-full" required>
        <span class="small-text">Jumlah Stok Produk. Contoh: 5, 20, 100 dll</span>

        <label for="productCategory">Kategori*</label>
        <select id="productCategory" name="productCategory" required>
            @foreach (['Atasan', 'Bawahan', 'Aksesoris'] as $option)
                <option class = "dcs" value="{{ $option }}"
                    {{ $size->product->productCategory == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Kategori Produk. Wajib. Pilih salah satu</span>

        <label for="productPrice">Harga*</label>
        <input value = "{{ old('productPrice') ?? $size->product->productPrice }}" type="text" id="productPrice"
            name="productPrice" class="underline-input-full" required>
        <span class="small-text">Harga Produk. Contoh: 230000, 400000, dll. Wajib</span>

        <label for="productWeight">Berat
            (gr)*</label>
        <input value = "{{ old('productWeight') ?? $size->product->productWeight }}" type="text" id="productWeight"
            name="productWeight" class="underline-input-full" required>
        <span class="small-text">Berat Produk Dalam Satuan Gram. Contoh : 200, 50, 1500, dll. Wajib. </span>

        <label for="productDescription">Deskripsi</label>
        <input value = "{{ old('productDescription') ?? $size->product->productDescription }}" type="text"
            id="productDescription" name="productDescription" class="underline-input-full">
        <span class="small-text">Deskripsi Produk. Contoh : “Size sesuai dengan chart”, “Jangan Dicuci pake Pemutih” ,
            dll. Tidak Wajib. </span>

        <label for="forGender">Gender*</label>
        <select id="forGender" name="forGender" required>
            {{-- <option value="Atasan">Atasan</option>
            <option value="Bawahan">Bawahan</option>
            <option value="Aksesoris">Aksesoris</option> --}}
            @foreach (['Pria', 'Wanita'] as $option)
                <option value="{{ $option }}" {{ $size->product->forGender == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Baju digunakan untuk Pria atau Wanita. Wajib. Pilih salah satu</span>

        <label for="productPicturePath">Gambar Produk</label>
        <div class="product-image-section">
            <div class="product-image">
                <img src="\assets\images\image76.svg" alt="Product Image" id="productImage">
            </div>
            <div class="image-buttons">
                <button type="button" class="upload">Pilih Gambar</button>
                <button type="button" class="delete">Hapus Gambar</button>
            </div>
        </div>


        <div class="save-button">
            <button type="submit">Simpan</button>
        </div>



    </form>



    @include('components.admin.footeradmin')

</body>

</html>
