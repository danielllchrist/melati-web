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
            <form action="/masuk" method="post">
                @csrf
                <div class="top">
                    <div class="wrap-header"><br>
                        <img src="\assets\Group 33862.png" alt="image">
                    </div>
                    <h1>Masuk</h1>
                    <p>Pembayaran cepat dan aman.<br> Masuk untuk menyimpan informasi<br>pengiriman Anda.</p><br>
                    @if (session()->has('success'))
                        <div class="alert">
                            <strong>{{ session()->get('success') }}</strong>
                        </div><br>
                    @endif
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder=" Masukan Email Anda" required autofocus value="{{ old('email') }}"><br>

                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Masukan Kata Sandi" required><br>
                    @error('password')
                        <div class="alert">
                            {{ $message }}
                        </div><br>
                    @enderror

                    @if (session()->has('loginError'))
                        <div class="alert">
                            <strong>{{ session()->get('loginError') }}</strong>
                        </div><br>
                    @endif
                </div>

                <div class="bottom">
                    <button type="submit">Masuk</button><br>
                    <p>Tidak punya akun? <a href="/daftar">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
