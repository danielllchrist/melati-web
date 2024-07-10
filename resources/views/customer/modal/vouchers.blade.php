<div class="modal fade" id="vouchers" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voucher Saya</h5>
                <button class="btn" type = "button" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{ asset('assets/cross.svg') }}">
                </button>
            </div>
            <div class="modal-body">
                {{-- @for ($i = 0; $i < 10; $i++)
                    <button class="no-bootstrap flex">
                        <div class="voucher-card">
                            <h6>Gratis Ongkir</h6>
                            <p>Minimal belanja Rp 30.000</p>
                            <p>EXPIRED 31/12/2024</p>
                        </div>
                    </button>
                @endfor --}}
                @forelse($vouchers as $v)
                    <button class="no-bootstrap flex" type ="button">
                        <div class="voucher-card" data-voucher-id="{{ $v->voucherID }}">
                            <h6>{{ $v->voucherName }}</h6>
                            <p>Minimal belanja Rp {{ $v->minimumSpending }}</p>
                            <p>EXPIRED {{ $v->expiredDate }}</p>
                        </div>
                    </button>
                @empty
                    <button class="no-bootstrap flex">
                        <div class="voucher-card">
                            <h6>Anda belum memiliki voucher</h6>
                        </div>
                    </button>
                @endforelse
            </div>
            <div class="modal-footer">
                <!-- <button class="btn-add-popup" data-dismiss="modal">
                      Pakai
                    </button> -->
                <button class=btn-submit-popup type="button" class="btn btn-submit" data-dismiss="modal"
                    aria-label="Close"><a id = "getVoucher" href="#">PILIH</a></button>
            </div>
        </div>
    </div>
</div>
