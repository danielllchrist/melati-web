<div class="modal fade" id="vouchers" tabindex="-1"  role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voucher Saya</h5>
                <button class="btn" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{asset('assets/cross.svg')}}">
                </button>
            </div>
            <div class="modal-body">
                @for ($i = 0; $i <10; $i++)
                <button class="no-bootstrap flex">
                  <div class="voucher-card">
                      <h6>Gratis Ongkir</h6>
                      <p>Minimal belanja Rp 30.000</p>
                      <p>EXPIRED 31/12/2024</p>
                  </div>
                </button>
                @endfor
            </div>
            <div class="modal-footer">
                    <!-- <button class="btn-add-popup" data-dismiss="modal">
                      Pakai
                    </button> -->
                <button class=btn-submit-popup type="button" class="btn btn-submit" data-dismiss="modal" aria-label="Close">PAKAI</button>


            </div>
        </div>
    </div>
</div>
