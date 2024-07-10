<div class="modal fade" id="tambahAlamat" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alamat Baru</h5>
                <button class="btn" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{ asset('assets/cross.svg') }}">
                </button>
            </div>

            <form action="{{ route('add-address') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label style="color: #ffffff;">Nama Penerima</label>
                            <input type="text" id="nama_penerima" name="nama_penerima" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label style="color: #ffffff;">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="color: #ffffff;">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="form-control" required>
                                <option value="test1">Pilih Provinsi</option>
                                <!-- isi option provinsi disini -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label style="color: #ffffff;">Kota/Region</label>
                            <select id="kota" name="kota" class="form-control" required>
                                <option value="test2">Pilih Kota/Region</option>
                                <!-- isi option kota/region disini -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #ffffff;">Alamat Lengkap</label>
                            <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
