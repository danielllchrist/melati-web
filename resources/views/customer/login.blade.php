<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Masuk</title>
    @vite('resources/css/customer/login.css')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="content-container">
        <div class="wrap-left">
            <img src="\assets\top2.png" alt="image">
        </div>
        <div class="wrap-right">
            <form action="{{ route('LogIns') }}" method="post">
                @csrf
                <div class="top"><br>
                    <div class="wrap-header">
                        <img src="\assets\Group 33862.png" alt="image">
                    </div>
                    <h1>Masuk</h1>
                    <p>Pembayaran cepat dan aman. Masuk untuk menyimpan informasi pengiriman Anda.</p>
                    @if (session()->has('success'))
                        <div class="alert">
                            <strong>{{ session()->get('success') }}</strong>
                        </div>
                    @endif
                    <div class="wrap">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukan Email Anda" required
                            autofocus value="{{ old('email') }}">
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

                    @if (session()->has('loginError'))
                        <div class="alert">
                            <strong>{{ session()->get('loginError') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="bottom">
                    <button type="submit">Masuk</button>
                    <p>Tidak punya akun? <a href="/daftar">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
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
    </script>
</body>

</html>
