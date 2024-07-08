<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
    @vite('resources/css/admin/profile.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="withsidebar">
        @include('components.admin.sidebaradmin')
        <div class="main-content ">
            <div class="pf-inner-container">
                <div class="pf-profile">
                    <div class="pf-profile-info">
                        <h3 class="pf-title">Profil</h3>
                        <form action="{{ route('profileUpdate', $data->userID) }}" class="pf-profileform " method = "post">
                            @csrf
                            <div class="pf-formdetail">
                                <div class="pf-name">Nama</div>
                                <input class="pf-textfield" type="text" id="nama" name="name"
                                    placeholder="{{ $data->name ? $data->name : 'Nama sebelumnya' }} " value="{{ $data->name ? $data->name : '' }}" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Umur</div>
                                <input class="pf-textfield" type="number" id="age" name="age"
                                    placeholder="{{ $data->age ? $data->age : 'Umur sebelumnya' }}" value="{{ $data->age ? $data->age : '' }}" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Jenis Kelamin</div>
                                <div class="pf-gender">
                                    <div class="pf-radio"><input type="radio" id="pria" name="gender"
                                            value="pria" {{ strtolower($data->gender) == "pria" ? "checked" : "" }}  required>
                                        <label for="pria">Pria</label>
                                    </div>
                                    <div class="pf-radio">
                                        <input type="radio" id="wanita" name="gender"
                                            value="wanita" {{ strtolower($data->gender) == "wanita" ? "checked" : "" }}  required>
                                        <label for="wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Nomor Telepon</div>
                                <input class="pf-textfield" type="text" id="nama" name="phoneNum"
                                    placeholder="Nomor sebelumnya" value="{{ $data->phoneNum ? $data->phoneNum : '' }}" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Email</div>
                                <input class="pf-textfield" type="text" id="nama" name="email"
                                    placeholder="Email sebelumnya" value="{{ $data->email ? $data->email : 'Nama sebelumnya' }}" required>
                            </div>
                            <div class="pf-submit-btn-container">
                                <a href={{route('profileUpdate', $data->userID)}}>
                                <button class="pf-submit-btn">Simpan</button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="pf-profile-pp">
                        <!-- Profile Photo File Input -->
                        <input name = "profile_photo_path" type="file" id="photo" class="hidden"
                            wire:model.defer="photo" x-ref="photo"
                            x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

                        <!-- Current Profile Photo -->
                        <div x-show="! photoPreview">
                            <img class="pfp-image" src="\assets\top1.png" alt="profile"
                                class="rounded-full h-40 w-40 object-cover">
                        </div>
                        {{-- <!-- New Profile Photo Preview -->
                            <div class="my-10" x-show="photoPreview" style="display: none;">
                                <span class="block rounded-full w-40 h-40 bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div> --}}

                        {{-- Upload Button --}}
                        <button class="pf-pp-btn" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Pilih Gambar') }}
                        </button>
                    </div>
                </div>
                <div class="pf-pass">
                    <h3 class="pf-title">Ganti Kata Sandi</h3>
                    <form action="{{ route('passUpdate', $data->userID) }}" class="pf-profileform " method = "post">
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Lama</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="passlama"
                                    name="nama" placeholder="Silahkan Mengisi Kata Sandi Lama" required> <img
                                    class = "hide-pass-icon" src="\assets\eye.svg" alt = "hide" id = "eyehidelama"
                                    onclick = "hidePasswordLama()"></div>
                        </div>
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Baru</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="passbaru"
                                    name="nama" placeholder="Silahkan Mengisi Kata Sandi Baru" required> <img
                                    class = "hide-pass-icon" src="\assets\eye.svg" alt = "hide" id = "eyehidebaru"
                                    onclick = "hidePasswordBaru()"></div>
                        </div>
                        <div class="pf-submit-btn-container"><button class="pf-submit-btn">Ganti</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.admin.footeradmin')
    <script>
        function hidePasswordLama() {
            var x = document.getElementById('passlama');
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
            var y = document.getElementById('passbaru');
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
