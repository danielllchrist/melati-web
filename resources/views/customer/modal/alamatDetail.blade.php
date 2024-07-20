<div class="modal fade" id="alamatDetail" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alamat Saya</h5>
                <button class="btn" type ="button" data-dismiss="modal" aria-label="Close">
                    <img class="x_icon" src="{{ asset('assets/cross.svg') }}">
                </button>
            </div>
            <div class="modal-body" id = "modalAddress">
                {{-- @for ($i = 0; $i < 10; $i++)
                    <button class="no-bootstrap flex">
                        <div class="address-card">
                            <h6>Grace | (+62)123456789</h6>
                            <p>Jalan Pakuan No.3<br>
                                Sentul, Kabupaten Bogor<br>
                                Jawa Barat</p>
                        </div>
                    </button>
                @endfor --}}
                @forelse ($addresses as $a)
                    <button class="no-bootstrap flex" type="button">
                        <div class="address-card" data-address-id="{{ $a->addressID }}">
                            <h6>{{ $a->nameAddress }} | {{ $a->phoneNum }}</h6>
                            <p id = "detail">{{ $a->detailAddress }}</p>
                            <p id = "regency">{{ $a->cityOrRegency }}, {{ $a->ward }}</p>
                            <p id = "province">{{ $a->province }}</p>
                        </div>
                    </button>
                @empty
                    <div class="address-card">
                        <h6>Belum ada alamat</h6>
                    </div>
                @endforelse

            </div>
            <div class="modal-footer">
                <button class=btn-submit-popup type="button" data-dismiss="modal" aria-label="Close">Pilih</button>
            </div>
        </div>
    </div>
</div>
