<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/customer/login.css')
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
  <div class="wrap-left">
    <img src="assets/top2.png" alt="image">
  </div>

  <div class="wrap-right">
	<div class="wrap-header"><br>
		<img src="/assets/Group 33862.png" alt="image">
	</div>
	<h1>Masuk</h1>
	<p>Pembayaran cepat dan aman.<br> Masuk untuk menyimpan informasi<br>pengiriman Anda.</p><br>
    <form>
      <label for="nama">Nama</label><br>
      <input type="text" id="nama" name="nama" placeholder=" Masukan Nama Anda" required><br>

      <label for="kata_sandi">Password</label><br>
      <input type="password" id="kata_sandi" name="kata_sandi" placeholder="Masukan Kata Sandi" required><br>


		<div class="bottom">
      <button type="submit">Masuk</button><br>
      <p>Tidak punya akun? <a href="daftar">Daftar</a></p>
	  </div>
    </form>
  </div>

</div>

</body>
</html>
