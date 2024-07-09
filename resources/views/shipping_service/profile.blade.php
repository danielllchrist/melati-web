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
                        <form action="" class="pf-profileform " method="">
                            <div class="pf-formdetail">
                                <div class="pf-name">Nama</div>
                                <input class="pf-textfield" type="text" id="nama" name="nama"
                                    placeholder="Nama sebelumnya" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Tanggal Lahir</div>
                                <input class="pf-textfield" type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    placeholder="12/12/1222" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Jenis Kelamin</div>
                                <div class="pf-gender">
                                    <div class="pf-radio"><input type="radio" id="pria" name="gender" value="pria"
                                            required>
                                        <label for="pria">Pria</label>
                                    </div>
                                    <div class="pf-radio"><input type="radio" id="wanita" name="gender"
                                            value="wanita" required>
                                        <label for="wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Nomor Telepon</div>
                                <input class="pf-textfield" type="text" id="nama" name="nama"
                                    placeholder="Nomor sebelumnya" required>
                            </div>
                            <div class="pf-formdetail">
                                <div class="pf-name">Email</div>
                                <input class="pf-textfield" type="text" id="nama" name="nama"
                                    placeholder="Email sebelumnya" required>
                            </div>
                            <div class="pf-submit-btn-container"><button class="pf-submit-btn">Simpan</button></div>
                        </form>
                    </div>
                    <div class="pf-profile-pp">
                        <!-- Profile Photo File Input -->
                        <input name="profile_photo_path" type="file" id="photo" class="hidden"
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
                        <div x-show="!photoPreview">
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
                <div id="ganti_password" class="pf-pass">
                    <h3 class="pf-title">Ganti Kata Sandi</h3>
                    <form action="" class="pf-profileform">
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Lama</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="passlama"
                                    name="nama" placeholder="Silahkan Mengisi Kata Sandi Lama" required> <img
                                    class="hide-pass-icon" src="\assets\eye.svg" alt="hide" id="eyehidelama"
                                    onclick="hidePasswordLama()"></div>
                        </div>
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Baru</div>
                            <div class="pf-textfield"><input class="pf-inputpass" type="password" id="passbaru"
                                    name="nama" placeholder="Silahkan Mengisi Kata Sandi Baru" required> <img
                                    class="hide-pass-icon" src="\assets\eye.svg" alt="hide" id="eyehidebaru"
                                    onclick="hidePasswordBaru()"></div>
                        </div>
                        <div class="pf-submit-btn-container"><button class="pf-submit-btn">Ganti</button></div>
                    </form>
                </div>
                <div id="keluar" class="pf-keluar">
                    <h3 class="pf-title">Keluar</h3>
                    <button class="pf-logout-btn" onclick="window.location.href = '/keluar';">Keluar dari akun</button>
                </div>
            </div>
        </div>
    </div>
    @include('components.shipping_service.footerss')
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