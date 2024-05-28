<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melati</title>
</head>

<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="pf-main-content ">
            <div class="pf-inner-container">
                <div class="pf-profile">
                    <div class="pf-profile-info">
                        <h3 class="pf-title">Profil</h3>
                        <form action="" class="pf-profileform " method = "">
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
                                    <div class="pf-radio"><input type="radio" id="pria" name="gender"
                                            value="pria" required>
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
                            <div class="d-flex justify-content-end"><button class="pf-submit-btn">Simpan</button></div>
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
                            <img class="pfp-image" src="assets/top1.png" alt="profile"
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
                    <form action="" class="pf-profileform">
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Lama</div>
                            <input class="pf-textfield" type="password" id="nama" name="nama"
                                placeholder="Silahkan Mengisi Kata Sandi Lama" required>

                        </div>
                        <div class="pf-formdetail">
                            <div class="pf-name">Kata Sandi Baru</div>
                            <input class="pf-textfield" type="password" id="nama" name="nama"
                                placeholder="Silahkan Mengisi Kata Sandi Baru" required>
                        </div>
                        <div class="d-flex justify-content-end"><button class="pf-submit-btn">Ganti</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.customer.footercustomer')
</body>

</html>
