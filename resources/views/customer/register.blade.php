<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/Logo.svg">
    <title>Daftar</title>
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
                <form action="{{ route('Registers') }}" method="POST">
                    @csrf
                    <div class="wrap">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukan nama Anda" required
                            value="{{ old('name') }}">
                        <div class="error-message">
                        @error('name')
                            {{ str_replace('name', 'Nama', $message) }}
                        @enderror
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="gender">Gender</label>
                        <div class="gender-container">
                            <input type="radio" id="pria" name="gender" value="Pria" required>
                            <label for="pria">Pria</label>
                            <input type="radio" id="wanita" name="gender" value="Wanita" required>
                            <label for="wanita">Wanita</label>
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="phoneNum">Nomor Telepon</label>
                        <input type="number" id="phoneNum" name="phoneNum" placeholder="Masukan Nomor Telepon" required min="0"
                            value="{{ old('phoneNum') }}">
                        <div class="error-message">
                        @error('phoneNum')
                            {{ str_replace('phone num', 'Nomor Telepon', $message) }}
                        @enderror
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukan Email" required
                            value="{{ old('email') }}">
                        <div class="error-message">
                        @error('email')
                            {{ str_replace('email', 'Email', $message) }}
                        @enderror
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="age">Usia</label>
                        <input type="number" id="age" name="age" placeholder="Masukan Usia" required min="0"
                            value="{{ old('age') }}">
                        <div class="error-message">
                        @error('age')
                            {{ str_replace('age', 'Usia', $message) }}
                        @enderror
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="password">Kata Sandi</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukan Kata Sandi" required>
                            <img class="hide-pass-icon" src="/assets/eye.svg" alt="hide" id="eyehidepassword" onclick="hidePassword()">
                        </div>
                        <div class="error-message">
                        @error('password')
                            {{ str_replace('password', 'Kata Sandi', $message) }}
                        @enderror
                        </div>
                    </div>
                    <div class="wrap">
                        <label for="confirm-password">Konfirmasi Kata Sandi</label>
                        <div class="password-wrapper">
                            <input type="password" id="confirm-password" name="confirm-password"
                                placeholder="Konfirmasi Kata Sandi" required>
                            <img class="hide-pass-icon" src="/assets/eye.svg" alt="hide" id="eyehidekonfirmasi" onclick="hideConfirmPassword()">
                        </div>
                        <div class="error-message">
                        @error('confirm-password')
                            {{ str_replace(['confirm-password', 'password'], ['Konfirmasi Kata Sandi', 'Kata Sandi'], $message) }}
                        @enderror
                        </div>
                    </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneNumInput = document.getElementById('phoneNum');
            const ageInput = document.getElementById('age');

            phoneNumInput.addEventListener('input', function () {
                if (this.value < 0) {
                    this.value = 0;
                }
            });

            ageInput.addEventListener('input', function () {
                if (this.value < 0) {
                    this.value = 0;
                }
            });
        });

        function hidePassword() {
            var x = document.getElementById('password');
            var eyel = document.getElementById('eyehidepassword');

            if (x.type === "password") {
                x.type = "text";
                eyel.style.opacity = 0.5;
            } else {
                x.type = "password";
                eyel.style.opacity = 1;
            }
        }

        function hideConfirmPassword() {
            var y = document.getElementById('confirm-password');
            var eyeb = document.getElementById('eyehidekonfirmasi');

            if (y.type === "password") {
                y.type = "text";
                eyeb.style.opacity = 0.5;
            } else {
                y.type = "password";
                eyeb.style.opacity = 1;
            }
        }
    </script>
</body>

</html>
