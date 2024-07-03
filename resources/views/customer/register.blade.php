<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="icon" type="image/x-icon" href="\assets\Group 33862.png">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/customer/register.css')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="content-container">
        <div class="wrap-left">
            <div class="top">
                <div class="wrap-header">
                    <img src="/assets/Group 33862.png" alt="image">
                </div>
                <h1>Daftar</h1>
                <p>Dapatkan akses dan Jadilah anggota hari ini.</p><br>
                <form action="/daftar" method="POST">
                    @csrf
                    <label for="name">Nama</label><br>
                    <input type="text" id="name" name="name" placeholder=" Masukan nama Anda" required
                        value="{{ old('name') }}"><br>
                    @error('name')
                        {{ $message }}
                    @enderror
                    <br>

                    <div class="gender-container">
                        <input type="radio" id="pria" name="gender" value="Pria" required>
                        <label for="pria">Pria</label>
                        <input type="radio" id="wanita" name="gender" value="Wanita" required>
                        <label for="wanita">Wanita</label>
                    </div>

                    <label for="phoneNum">Nomor Telepon</label><br>
                    <input type="number" id="phoneNum" name="phoneNum" placeholder="Masukan Nomor Telepon" required
                        value="{{ old('phoneNum') }}"><br>
                    @error('phoneNum')
                        {{ $message }}
                    @enderror
                    <br>

                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Masukan Email" required
                        value="{{ old('email') }}"><br>
                    @error('email')
                        {{ $message }}
                    @enderror
                    <br>

                    <label for="age">Usia</label><br>
                    <input type="number" id="age" name="age" placeholder="Masukan Usia" required
                        value="{{ old('age') }}"><br>
                    @error('age')
                        {{ $message }}
                    @enderror
                    <br>

                    <label for="password">Kata Sandi</label><br>
                    <input type="password" id="password" name="password" placeholder="Masukan Kata Sandi" required><br>
                    @error('password')
                        {{ $message }}
                    @enderror
                    <br>

                    <label for="confirm-password">Konfirmasi Kata Sandi</label><br>
                    <input type="password" id="confirm-password" name="confirm-password"
                        placeholder="Konfirmasi Kata Sandi" required><br>
                    @error('confirm-password')
                        {{ $message }}
                    @enderror
                    <br>

            </div>
            <div class="bottom">
                <button type="submit">Daftar</button><br>
                <p>Sudah memiliki akun? <a href="/masuk">Masuk</a></p>
            </div>
            </form>
        </div>
        <div class="wrap-right">
            <img src="assets/top1.png" alt="image">
        </div>
    </div>

</body>

</html>
