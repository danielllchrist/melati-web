<div class="modal fade" id="alamatEdit-{{$address->addressID}}" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button class="btn" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{ asset('assets/cross.svg') }}">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/updateAddress/'.$address->addressID) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="address_id" value="{{ $address->addressID }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Nama Tempat</label>
                            <input type="text" name="nama_tempat" class="form-control"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px"
                                value="{{ old('nama_tempat', $address->nameAddress) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px"
                                value="{{ old('nama_penerima', $address->receiver) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" class="form-control"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px"
                                value="{{ old('nomor_telepon', $address->phoneNum) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Provinsi</label>
                            <select name="provinsi" id="provinsi-{{ $address->addressID }}" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}" {{ old('provinsi', $address->province_id) == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Kota/Region</label>
                            <select name="kota" id="kota-{{ $address->addressID }}" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px">
                                <option value="">Pilih Kota/Region</option>
                                @foreach ($regencies as $regency)
                                    <option value="{{ $regency->id }}" {{ old('kota', $address->cityOrRegency_id) == $regency->id ? 'selected' : '' }}>
                                        {{ $regency->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Kelurahan</label>
                            <select name="kecamatan" id="kecamatan-{{ $address->addressID }}" class="form-control"
                                style="font-family: Poppins; display: flex; background: black; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px">
                                <option value="">Pilih Kelurahan</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ old('kecamatan', $address->ward_id) == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" class="form-control"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px">{{ old('alamat_lengkap', $address->detailAddress) }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Deskripsi Alamat</label>
                            <textarea name="deskripsi_alamat" class="form-control"
                                style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom: 40px">{{ old('deskripsi_alamat', $address->description) }}</textarea>
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
