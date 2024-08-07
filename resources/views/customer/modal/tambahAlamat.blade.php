<div class="modal fade" id="tambahAlamat" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alamat Baru</h5>
                <button class="btn" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{ asset('assets/cross.svg') }}">
                </button>
            </div>
            <form action="{{ route('simpan-alamat') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; , margin-top: 40px">Nama Tempat</label>
                            <input type="text" name="nama_tempat" id="nama_tempat" class="form-control"
                                placeholder="cth : Rumah, Kantor, Apartemen"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                            @error('nama_tempat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Nama Penerima</label>
                            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control"
                                placeholder="cth : Daniel Matata"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                            @error('nama_penerima')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                                placeholder="cth : 08970934221"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                            @error('nomor_telepon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Provinsi</label>
                            <select name="province" id="province" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="province_name" id="province_name">
                            @error('province')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Kota/Region</label>
                            <select name="city" id="city" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                                <option value="">Pilih Kota/Region</option>
                            </select>
                            <input type="hidden" name="city_name" id="city_name">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Kecamatan</label>
                            <select name="district" id="district" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;">
                                <option value="">Pilih Kelurahan</option>
                            </select>
                            <input type="hidden" name="district_name" id="district_name">
                            @error('district')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" placeholder="cth : Jalan Talenta No 32"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;"></textarea>
                            @error('nama_tempat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #F0F1E4; margin-top: 40px">Deskripsi Alamat</label>
                            <textarea name="deskripsi_alamat" id="deskripsi_alamat" class="form-control" placeholder="Rumah kedua dari Lapangan"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;"></textarea>
                            @error('nama_tempat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class= "btn-submit" type="submit" class="btn btn-submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>