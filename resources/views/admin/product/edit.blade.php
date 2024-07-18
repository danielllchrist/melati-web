<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
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
        <div class="error-message">
            @error('productName')
                {{ str_replace('productName', 'Nama Produk', $message) }}
            @enderror
        </div>
        <label for="size">Ukuran*</label>
        <select id="size" name="size" required>
            @foreach (['S', 'M', 'L', 'XL'] as $option)
                <option value="{{ $option }}" {{ $size->size == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Ukuran Produk. Wajib. Pilih salah satu</span>
        <div class="error-message">
            @error('size')
                {{ str_replace('size', 'Ukuran Produk', $message) }}
            @enderror
        </div>
        <label for="stock">Stok*</label>
        <input value = "{{ old('stock') ?? $size->stock }}" type="text" id="stock" name="stock"
            class="underline-input-full" required>
        <span class="small-text">Jumlah Stok Produk. Contoh: 5, 20, 100 dll</span>
        <div class="error-message">
            @error('stock')
                {{ str_replace('stock', 'Stok', $message) }}
            @enderror
        </div>
        <label for="productCategory">Kategori*</label>
        <select id="productCategory" name="productCategory" required>
            @foreach (['Atasan', 'Bawahan', 'Aksesoris'] as $option)
                <option class = "dcs" value="{{ $option }}"
                    {{ $size->product->productCategory == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
        <span class="small-text">Kategori Produk. Wajib. Pilih salah satu</span>
        <div class="error-message">
            @error('productCategory')
                {{ str_replace('productCategory', 'Kategori Produk', $message) }}
            @enderror
        </div>
        <label for="productPrice">Harga*</label>
        <input value = "{{ old('productPrice') ?? $size->product->productPrice }}" type="text" id="productPrice"
            name="productPrice" class="underline-input-full" required>
        <span class="small-text">Harga Produk. Contoh: 230000, 400000, dll. Wajib</span>
        <div class="error-message">
            @error('productPrice')
                {{ str_replace('productPrice', 'Harga Produk', $message) }}
            @enderror
        </div>
        <label for="productWeight">Berat
            (gr)*</label>
        <input value = "{{ old('productWeight') ?? $size->product->productWeight }}" type="text" id="productWeight"
            name="productWeight" class="underline-input-full" required>
        <span class="small-text">Berat Produk Dalam Satuan Gram. Contoh : 200, 50, 1500, dll. Wajib. </span>
        <div class="error-message">
            @error('productWeight')
                {{ str_replace('productWeight', 'Berat Produk', $message) }}
            @enderror
        </div>
        <label for="productDescription">Deskripsi</label>
        <input value = "{{ old('productDescription') ?? $size->product->productDescription }}" type="text"
            id="productDescription" name="productDescription" class="underline-input-full">
        <span class="small-text">Deskripsi Produk. Contoh : “Size sesuai dengan chart”, “Jangan Dicuci pake Pemutih” ,
            dll. Tidak Wajib. </span>
        <div class="error-message">
            @error('productDescription')
                {{ str_replace('productDescription', 'Deskripsi Produk', $message) }}
            @enderror
        </div>
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
        <div class="error-message">
            @error('forGender')
                {{ $message }}
            @enderror
        </div>
        <label for="picture">Gambar Produk</label>
        <input name="picture[]" id="picture" class="underline-input-full"
            placeholder="Max 5 photos" accept="image/png,image/jpg,image/jpeg" type="file" multiple>
        <span class="small-text">Gambar Produk. Wajib. Pilih minimal 1 gambar</span>
        <div class="error-message">
            @error('picture')
                {{ str_replace('picture', 'Gambar Produk', $message) }}
            @enderror
        </div>
        @if ($size->product->productPicturePath)
            <div class="picture-wrapper">
                @foreach (json_decode($size->product->productPicturePath) as $picture)
                    <img src="{{ Storage::url($picture) }}" alt="product picture">
                @endforeach
            </div>
        @endif

        <div class="save-button">
            <button type="submit">Simpan</button>
        </div>



    </form>



    @include('components.admin.footeradmin')

</body>

</html>
