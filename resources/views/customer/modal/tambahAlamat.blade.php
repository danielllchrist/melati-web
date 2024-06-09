<div class="modal fade" id="tambahAlamat" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alamat Baru</h5>
                <button class="btn" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{asset('assets/cross.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="color: #ffffff;">Nama Penerima</label>
                            <input type="text" id="nama_penerima" class="form-control" style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom : 40px">
                        </div>
                        <div class="col-md-6">
                        <label style="color: #ffffff;">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" class="form-control" style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none;" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <label style="color: #ffffff;">Provinsi</label>
                            <select id="provinsi" class="form-control" style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom : 40px">
                                <option value="">Pilih Provinsi</option>
                                <!-- isi option provinsi disini -->
                            </select>
                        </div>
                        <div class="col-md-6">
                        <label style="color: #ffffff;">Kota/Region</label>
                            <select id="kota" class="form-control" style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom : 40px">
                                <option value="">Pilih Kota/Region</option>
                                <!-- isi option kota/region disini -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <label style="color: #ffffff;">Alamat Lengkap</label>
                            <textarea id="alamat_lengkap" class="form-control" style="font-family: Poppins; display: flex; background: transparent; text-decoration: none; color: #F0F1E4; border: none; border-bottom: 2px solid #F0F1E4; background-clip: padding-box; appearance: none; outline: none; margin-bottom : 40px"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-submit-popup" type="button" class="btn btn-submit" data-dismiss="modal" aria-label="Close">SUBMIT</button>
            </div>
        </div>
    </div>
</div>