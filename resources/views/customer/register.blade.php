<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/customer/register.css')
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
  <div class="wrap-left">
	<div class="wrap-header">
		<img src="/assets/Group 33862.png" alt="image">
	</div>
	<h1>Daftar</h1>
	<p>Dapatkan akses dan Jadilah anggota hari ini.</p><br>
    <form>
      <label for="nama">Nama</label><br>
      <input type="text" id="nama" name="nama" placeholder=" Masukan Nama Anda" required><br>

	  <div class="gender-container">
        <input type="radio" id="pria" name="gender" value="pria" required>
        <label for="pria">Pria</label>
        <input type="radio" id="wanita" name="gender" value="wanita" required>
        <label for="wanita">Wanita</label>
      </div>

      <label for="telepon">Nomor Telepon</label><br>
      <input type="number" id="telepon" name="telepon" placeholder="Masukan Nomor Telepon" required><br>

      <label for="tanggal_lahir">Tanggal Lahir</label><br>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required><br>

      <label for="kata_sandi">Password</label><br>
      <input type="password" id="kata_sandi" name="kata_sandi" placeholder="Masukan Kata Sandi" required><br>

	  <label for="konfirmasi-kata-sandi">Konfirmasi Kata Sandi</label><br>
      <input type="password" id="konfirmasi-kata-sandi" name="konfirmasi-kata-sandi" placeholder="Konfirmasi Kata Sandi" required><br>
		<div class="bottom">
      <button type="submit">Daftar</button><br>
      <p>Sudah memiliki akun? <a href="login">Masuk</a></p>
	  </div>
    </form>
  </div>
  <div class="wrap-right">
    <img src="assets/top1.png" alt="image">
  </div>
</div>

</body>
</html>
