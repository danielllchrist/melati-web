<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite('resources/css/app.css')
    @vite('resources/css/shipping_service/profile.css')
</head>

<body>
    @include('components.shipping_service.headerss')
    <div class="withsidebar">
        @include('components.shipping_service.sidebar')
        <div id="main-content" class="main-content">
            <div id="profil" class="pf-inner-container">
                <div class="pf-profile">
                    <div class="pf-profile-info">
                        <h3 class="pf-title">Profil</h3>
                        <form action="{{ route('ShippingServiceUpdateProfile') }}" class="pf-profileform " method="POST">
                            @csrf
                            <div class="pf-formdetail">
                                <div class="pf-name">Nama</div>
                                <input class="pf-textfield" type="text" id="nama" name="name"
                                placeholder="Nama" required value="{{ old('name') ? old('name') : $user->name }}">
                            </div>
                            <div class="error-message">
                                @error('name')
                                {{ str_replace('name', 'Nama', $message) }}
                                @enderror
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Usia</div>
                                <input class="pf-textfield" type="number" id="age" name="age"
                                placeholder="Usia" required value="{{ old('age') ? old('age') : $user->age }}">
                            </div>
                            <div class="error-message">
                                @error('age')
                                {{ str_replace('age', 'Usia', $message) }}
                                @enderror
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Jenis Kelamin</div>
                                <div class="pf-gender">
                                    <div class="pf-radio"><input type="radio" id="pria" name="gender"
                                            value="Pria" {{ strtolower($user->gender) == 'pria' ? 'checked' : '' }}
                                            required>
                                        <label for="pria">Pria</label>
                                    </div>
                                    <div class="pf-radio">
                                        <input type="radio" id="wanita" name="gender" value="Wanita"
                                            {{ strtolower($user->gender) == 'wanita' ? 'checked' : '' }} required>
                                        <label for="wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="error-message">
                                @error('gender')
                                {{ str_replace('gender', 'Gender', $message) }}
                                @enderror
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Nomor Telepon</div>
                                <input class="pf-textfield" type="number" id="phoneNum" name="phoneNum"
                                    placeholder="Nomor Telepon" required value="{{ old('phoneNum') ? old('phoneNum') : $user->phoneNum }}">
                            </div>
                            <div class="error-message">
                                @error('phoneNum')
                                {{ str_replace('phone num', 'Nomor Telepon', $message) }}
                                @enderror
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Email</div>
                                <input class="pf-textfield" type="email" id="email" name="email"
                                placeholder="Email" required value="{{ old('email') ? old('email') : $user->email }}">
                        </div>
                        <div class="error-message">
                            @error('email')
                            {{ str_replace('email', 'Email', $message) }}
                            @enderror
                        </div>
                        <div class="pf-submit-btn-container"><button class="pf-submit-btn"
                            type="submit">Simpan</button></div>
                        </form>
                    </div>
                    <div class="pf-profile-pp">
                        <!-- Profile Photo -->
                        <div x-show="! photoPreview">
                            <img class="pfp-image rounded-full h-40 w-40 object-cover"
                                src="{{ $user->profilePicturePath ? $user->profilePicturePath : '/storage/uploads/daniel.png' }}" alt="profile" id="profilepicture1">
                        </div>
                        <form>
                            @csrf
                            <!-- Upload Button -->
                            <button class="pf-pp-btn" type="button"
                                onclick="document.getElementById('fileInput').click()">Ubah Gambar</button>
                            <input type="file" id="fileInput" style="display:none;" onchange="uploadImage(event)"
                                required accept="image/png,image/jpg,image/jpeg">
                        </form>
                    </div>
                </div>
                <div id="ganti_password" class="pf-pass section">
                    <h3 class="pf-title">Ganti Kata Sandi</h3>
                    <form action="{{ route('CustomerUpdatePassword') }}" class="pf-profileform" method="POST">
                        @csrf
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Lama</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="old_password"
                                    name="old_password" placeholder="Silahkan Mengisi Kata Sandi Lama" required> <img
                                    class="hide-pass-icon" src="/assets/eye.svg" alt="hide" id="eyehidelama"
                                    onclick="hidePasswordLama()"></div>
                        </div>
                        <div class="error-message">
                            @error('old_password')
                            {{ str_replace('old password', 'Kata Sandi Lama', $message) }}
                            @enderror
                        </div>
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Baru</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="password"
                                    name="password" placeholder="Silahkan Mengisi Kata Sandi Baru" required> <img
                                    class="hide-pass-icon" src="/assets/eye.svg" alt="hide" id="eyehidebaru"
                                    onclick="hidePasswordBaru()"></div>
                        </div>
                        <div class="error-message">
                            @error('password')
                            {{ str_replace('password', 'Kata Sandi Baru', $message) }}
                            @enderror
                        </div>
                        <div class="pf-submit-btn-container"><button class="pf-submit-btn"
                                type="submit">Ganti</button></div>
                    </form>
                </div>
                <div id="keluar" class="pf-keluar section">
                    <h3 class="pf-title">Keluar</h3>
                    <a class="pf-logout-btn" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar dari
                        akun</a>
                    <form id="logout-form" action="{{ route('ShippingServiceLogOut') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.shipping_service.footerss')
    <script>
        function uploadImage(event) {
            event.preventDefault(); // Prevent form submission

            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];
            const formData = new FormData();
            formData.append('image', file);

            fetch('{{ route('ShippingServiceUpdateProfilePicture') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('profilepicture').src = data.filePath;
                        document.getElementById('profilepicture1').src = data.filePath;
                    } else {
                        alert('Gagal mengunggah foto profil!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
        }

        function hidePasswordLama() {
            var x = document.getElementById('old_password');
            var eyel = document.getElementById('eyehidelama');

            if (x.type === "password") {
                x.type = "text";
                eyel.style.opacity = 0.5;
            } else {
                x.type = "password";
                eyel.style.opacity = 1;
            }
        }

        function hidePasswordBaru() {
            var y = document.getElementById('password');
            var eyeb = document.getElementById('eyehidebaru');

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
