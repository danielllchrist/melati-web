<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/customer/cart.css')
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.customer.headercustomer')
    <div id="address-popup" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Silakan tambahkan alamat di halaman profil Anda.</p>
            <a href="{{ route('CustomerProfile') }}">Ke halaman profil</a>
        </div>
    </div>
    <div class="atas">
        <div class="nonactive active">
            <h1>Keranjang</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pesan</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pembayaran</h1>
        </div>
        <div class="nonactive">
            <img class="back_icon" src="{{ asset('assets/back.svg') }}">
            <h1>Pesanan Dibuat </h1>
        </div>
    </div>
    <div class="bawah">
        @if ($addressExists)
            <div class="container-cart">
                @forelse ($carts as $cart)
                    <div class="kiri">
                        <div class="product" data-sizeid="{{ $cart->sizeID }}"
                            data-price="{{ $cart->size->product->productPrice }}"
                            data-productstock="{{ $cart->size->stock }}">
                            <a href="{{ route('ProductDetail', $cart->size->product->productID) }}" class="product-in">
                                <img id="productimg"
                                    src="{{ Storage::url(json_decode($cart->size->product->productPicturePath)[0]) }}">
                                <div class="wraps">
                                    <h1>{{ $cart->size->product->productName }}</h1>
                                    <h2>Rp {{ number_format($cart->size->product->productPrice, 0, ',', '.') }}</h2>
                                    <p>Ukuran : {{ $cart->size->size }}</p>
                                </div>
                            </a>
                        </div>

                        <div class="wrapper">
                            <div class="no-link">
                                <select name="sizeID" class="size-select" id="size-select-{{ $cart->sizeID }}">
                                    @php
                                        $sizeOrder = ['S', 'M', 'L', 'XL'];
                                        $sortedSizes = $cart->size->product->size ?? collect();
                                        $sortedSizes = $sortedSizes->sortBy(function ($size) use ($sizeOrder) {
                                            return array_search($size->size, $sizeOrder);
                                        });
                                    @endphp
                                    @foreach ($sortedSizes as $size)
                                        <option value="{{ $size->sizeID }}"
                                            {{ $size->sizeID == $cart->sizeID ? 'selected' : '' }}>
                                            {{ $size->size }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="wrapper">
                            <div class="wraps2">
                                <button class="trash-minus-button" type="button">
                                    <img class="icon trash-minus-icon" src="{{ asset('assets/trash_icon.svg') }}">
                                </button>
                                <input type="number" class="transparent-number-input" min="1" max="100"
                                    value="{{ $cart->quantity }}" name="quantities[]">
                                <button class="plus" type="button">
                                    <img class="icon plus-icon" src="{{ asset('assets/plus_icon.svg') }}">
                                </button>
                                <input type="hidden" name="product_ids[]" value="{{ $cart->size->product->id }}">
                                <input type="hidden" name="product_names[]"
                                    value="{{ $cart->size->product->productName }}">
                                <input type="hidden" name="product_prices[]"
                                    value="{{ $cart->size->product->productPrice }}">
                                <input type="hidden" name="cart_ids[]" value="{{ $cart->sizeID }}">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="kiri">
                        <div class="btn-wrap">
                            <h2>Keranjangmu masih kosong nih..</h2>
                            <button class="btn-ctg" onclick="window.location.href='{{ route('Catalogue') }}'">
                                Belanja Sekarang</button>
                        </div>
                    </div>
                @endforelse
            </div>
        @else
            <div class="kiri">
                <div class="btn-wrap">
                    <h2>Isi Alamat Terlebih Dahulu..</h2>
                    <button class="btn-ctg" onclick="window.location.href='{{ route('alamat-saya.index') }}'">Tambah
                        Alamat</button>
                </div>
            </div>
        @endif


        <div class="kanan">
            <form id="checkout-form" method="POST" action="{{ route('keranjang.store') }}">
                @csrf
                <div class="wrap">
                    <p>TOTAL</p>
                    <h2 id="total-price">Rp {{ number_format($total, 0, ',', '.') }}</h2>
                    <input type="hidden" name="total_price" id="hidden-total-price" value="{{ $total }}">
                </div>
                <div class="wrap small">
                    <button type="submit" class="checkout @if (!$addressExists) button disabled @endif"
                        id="checkout-button" class="button" @if (!$addressExists) disabled @endif>
                        Pesan Sekarang
                    </button>
                </div>
            </form>
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        </div>
    </div>
    
    @include('components.customer.footercustomer')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            document.getElementById('checkout-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form dari submit secara default
                // Mengumpulkan data produk dari keranjang
                let products = [];
                document.querySelectorAll('.kiri').forEach((kiri) => {
                    const product = kiri.querySelector('.product');
                    const wraps2 = kiri.querySelector('.wraps2');

                    let sizeID = product.dataset.sizeid;
                    let productPrice = parseFloat(wraps2.querySelector('input[name="product_prices[]"]')
                        .value);
                    let quantity = parseInt(wraps2.querySelector('.transparent-number-input').value);
                    products.push({
                        sizeID: sizeID,
                        price: productPrice,
                        quantity: quantity
                    });
                });
                // Mengumpulkan total harga
                let totalPrice = parseFloat(document.getElementById('hidden-total-price').value);
                console.log(products);
                // Mengirim data ke backend
                $.ajax({
                    url: '/keranjang/buat-pesanan',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        products: products,
                        totalPrice: totalPrice
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.success) {
                            window.location.href = '/konfirmasi-pesanan/' + response.transactionID;
                        } else {
                            $('#error-message').text(response.message).show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Tambahkan logging error response
                        $('#error-message').text('Error sending order.').show();
                    }
                });
            });

            // $(document).ready(function() {
            //     // Tambahkan listener untuk setiap elemen dengan class .size-select
            //     $(".size-select").change(function() {
            //         var selectedValue = $(this).val();
            //         var productElement = $(this).closest('.kiri'); // Cari elemen produk terkait
            //         console.log("Nilai yang dipilih: " + selectedValue);
            //         updateSize(productElement, selectedValue); // Panggil updateSize dengan nilai baru dan elemen produk
            //     });
            // });

            document.addEventListener('DOMContentLoaded', (event) => {
                const totalPriceElement = document.getElementById('total-price');
                const hiddenTotalPriceElement = document.getElementById('hidden-total-price');
                const formatRupiah = (number) => {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(number);
                };

                const calculateTotal = () => {
                    let total = 0;
                    document.querySelectorAll('.kiri').forEach((kiri) => {
                        const product = kiri.querySelector('.product');
                        const wraps2 = kiri.querySelector('.wraps2');

                        const price = parseFloat(product.dataset.price);
                        const quantity = parseInt(wraps2.querySelector('.transparent-number-input').value);
                        total += price * quantity;
                    });
                    totalPriceElement.textContent = formatRupiah(total);
                    hiddenTotalPriceElement.value = total;
                };

                const updateSize = (productElement, newSizeID) => {
                    const size = productElement.querySelector('.no-link');
                    const product = productElement.querySelector('.product');

                    const oldSizeID = product.dataset.sizeid;
                    console.log(newSizeID);
                    console.log("old " + oldSizeID);

                    $.ajax({
                        url: `/keranjang/update/${oldSizeID}`,
                        type: 'POST', // Using POST with _method for PUT
                        data: {
                            _token: '{{ csrf_token() }}',
                            newSizeID: newSizeID,
                            _method: 'PUT' // Laravel will treat this as a PUT request
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                // Reload the page to reflect the changes
                                location.reload();
                            } else {
                                $('#error-message').text(response.message).show();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            $('#error-message').text('Error updating size.').show();
                        }
                    });
                };

                const removeProduct = (productElement) => {
                    const product = productElement.querySelector('.product');
                    const id = productElement.dataset.sizeid;
                    fetch(`/keranjang/delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                productElement.remove();
                                calculateTotal();
                            } else {
                                alert('Gagal menghapus item dari keranjang.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                };

                const updateProduct = (productElement) => {
                    const product = productElement.querySelector('.product');
                    const quantity = productElement.querySelector('.wraps2');
                    let sizeID = product.dataset.sizeid;
                    let newQuantity = parseInt(quantity.querySelector('.transparent-number-input').value);

                    // Kirim request ke server menggunakan Ajax
                    $.ajax({
                        url: '/keranjang/update/' + sizeID,
                        type: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            quantity: newQuantity
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                location.reload();
                            } else {
                                $('#error-message').text(response.message).show();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            $('#error-message').text('Error updating quantity.').show();
                        }
                    });
                };

                document.querySelectorAll('.kiri').forEach((kiri) => {
                    const product = kiri.querySelector('.product');
                    const wraps2 = kiri.querySelector('.wraps2');
                    const size = kiri.querySelector('.no-link');

                    const numberInput = wraps2.querySelector('.transparent-number-input');
                    const trashMinusIcon = wraps2.querySelector('.trash-minus-icon');
                    const plusButton = wraps2.querySelector('.plus');
                    const trashMinusButton = wraps2.querySelector('.trash-minus-button');
                    const productStock = parseInt(product.dataset
                        .productstock); // Ambil productStock dari dataset
                    const sizeSelect = size.querySelector('.size-select');

                    console.log(productStock);
                    const updateIcon = () => {
                        if (numberInput.value == 1) {
                            trashMinusIcon.src = '{{ asset('assets/trash_icon.svg') }}';
                        } else {
                            trashMinusIcon.src = '{{ asset('assets/min_icon.svg') }}';
                        }
                    };

                    updateIcon();

                    plusButton.addEventListener('click', () => {
                        let currentQuantity = parseInt(numberInput.value);
                        if (currentQuantity < productStock) {
                            numberInput.value = currentQuantity + 1;
                            updateIcon();
                            calculateTotal();
                            updateProduct(kiri);
                        }
                    });

                    trashMinusButton.addEventListener('click', () => {
                        let currentQuantity = parseInt(numberInput.value);
                        if (currentQuantity > 1) {
                            numberInput.value = currentQuantity - 1;
                            updateIcon();
                            calculateTotal();
                            updateProduct(kiri);
                        } else if (currentQuantity === 1) {
                            removeProduct(product);
                        }
                    });

                    numberInput.addEventListener('input', () => {
                        let currentQuantity = parseInt(numberInput.value);
                        if (currentQuantity < 1) {
                            numberInput.value = 1;
                        } else if (currentQuantity > productStock) {
                            numberInput.value = productStock;
                        }
                        updateIcon();
                        calculateTotal();
                        updateProduct(kiri);
                    });
                    console.log("yes");
                    // Event listener untuk size-select
                    if (sizeSelect) {
                        sizeSelect.addEventListener('change', () => {
                            console.log("Size changed for product:", product);
                            var newSizeID = sizeSelect.value; // Ambil nilai yang dipilih
                            console.log("newSize:", newSizeID);
                            updateSize(kiri,
                                newSizeID); // Panggil updateSize dengan elemen produk dan newSizeID
                        });
                    }
                });

                calculateTotal();
            });
        </script>

</body>

</html>
