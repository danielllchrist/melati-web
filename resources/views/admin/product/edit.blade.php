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
        <img class="back_icon" src="{{asset('assets/back.svg')}}">
        <h1>Produk</h1>
    </div>

    <form>
        <label for="id_produk">ID*</label>
        <input type="text" id="id_produk" name="id_produk" class="underline-input-full" required>
        <span class="small-text">ID Produk Contoh: 001, 002, 003, dll</span>
      
        <label for="nama_produk">Nama*</label>
        <input type="text" id="nama_produk" name="nama_produk" class="underline-input-full" required>
        <span class="small-text">Nama Produk. Contoh: Batik Keris, Peci, dll</span>

        <label for="kategori">Kategori*</label>
            <select id="kategori" name="kategori" required>
            <option value="Atasan">Atasan</option>
            <option value="Bawahan">Bawahan</option>
            <option value="Aksesoris">Aksesoris</option>
            </select>
            <span class="small-text">Kategori Produk. Wajib. Pilih salah satu</span>

        <label for="nama_produk">Harga*</label>
        <input type="text" id="nama_produk" name="nama_produk" class="underline-input-full" required>
        <span class="small-text">Harga Produk. Contoh: 230000, 400000, dll. Wajib</span>

        <label for="nama_produk">Berat (gr)*</label>
        <input type="text" id="nama_produk" name="nama_produk" class="underline-input-full" required>
        <span class="small-text">Berat Produk Dalam Satuan Gram. Contoh : 200, 50, 1500, dll. Wajib. </span>

        <label for="nama_produk">Deskripsi</label>
        <input type="text" id="nama_produk" name="nama_produk" class="underline-input-full">
        <span class="small-text">Deskripsi Produk. Contoh : “Size sesuai dengan chart”, “Jangan Dicuci pake Pemutih” , dll. Tidak Wajib. </span>

      </form>

    @include('components.admin.footeradmin')

</body>
</html>
