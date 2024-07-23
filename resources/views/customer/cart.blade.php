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
            <div class="kiri">
                @forelse ($carts as $cart)
                    <div class="product" data-sizeid="{{ $cart->sizeID }}"
                        data-price="{{ $cart->size->product->productPrice }}"
                        data-productstock="{{ $cart->size->stock }}">
                        <img id="productimg" src="{{ asset('assets/perfume.svg') }}">
                        <div class="wraps">
                            <h1>{{ $cart->size->product->productName }}</h1>
                            <h2>Rp {{ number_format($cart->size->product->productPrice, 0, ',', '.') }}</h2>
                            <p>Ukuran : {{ $cart->size->size }}</p>
                            <select name="sizeID" class="size-select">
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
                @empty
                    <div class="btn-wrap">
                        <h2>Keranjangmu masih kosong nih..</h2>
                        <button class="btn-ctg" onclick="window.location.href='{{ route('Catalogue') }}'">Belanja
                            Sekarang</button>
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
        </div>
    </div>
    @include('components.customer.footercustomer')
    <div id="error-message" class="alert alert-danger" style="display: none;"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     @if (session('showPopup'))
        //         $('#address-popup').show();
        //     @endif

        //     $('.close').click(function() {
        //         $('#address-popup').hide();
        //     });
        // });

        // $(document).ready(function() {
        //     $('.size-select').change(function() {
        //         let sizeID = $(this).val();
        //         let oldsizeID = productElement.dataset.sizeid;
        //         // Kirim request ke server menggunakan Ajax
        //         $.ajax({
        //             url: '/keranjang/update/' + oldsizeID,
        //             type: 'PUT',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 sizeID: newSizeID,
        //             },
        //             success: function(response) {
        //                 console.log(response);
        //                 if (response.success) {
        //                     location.reload();
        //                 } else {
        //                     $('#error-message').text(response.message).show();
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 console.log(xhr.responseText);
        //                 $('#error-message').text('Error updating size.').show();
        //             }
        //         });
        //     });
        // });

        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari submit secara default
            // Mengumpulkan data produk dari keranjang
            let products = [];
            document.querySelectorAll('.product').forEach((product) => {
                let sizeID = product.dataset.sizeid;
                let productPrice = parseFloat(product.querySelector('input[name="product_prices[]"]')
                    .value);
                let quantity = parseInt(product.querySelector('.transparent-number-input').value);
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
                document.querySelectorAll('.product').forEach((product) => {
                    const price = parseFloat(product.dataset.price);
                    const quantity = parseInt(product.querySelector('.transparent-number-input').value);
                    total += price * quantity;
                });
                totalPriceElement.textContent = formatRupiah(total);
                hiddenTotalPriceElement.value = total;
            };

            const updateSize = (productElement) => {
                const newSizeID = $(productElement).find('.size-select').val();
                const oldSizeID = productElement.dataset.sizeid;

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
                let sizeID = productElement.dataset.sizeid;
                let newQuantity = parseInt(productElement.querySelector('.transparent-number-input').value);

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

            document.querySelectorAll('.product').forEach((product) => {
                const numberInput = product.querySelector('.transparent-number-input');
                const trashMinusIcon = product.querySelector('.trash-minus-icon');
                const plusButton = product.querySelector('.plus');
                const trashMinusButton = product.querySelector('.trash-minus-button');
                const productStock = parseInt(product.dataset
                    .productstock); // Ambil productStock dari dataset
                const sizeSelect = product.querySelector('.size-select');

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
                        updateProduct(product);
                    }
                });

                trashMinusButton.addEventListener('click', () => {
                    let currentQuantity = parseInt(numberInput.value);
                    if (currentQuantity > 1) {
                        numberInput.value = currentQuantity - 1;
                        updateIcon();
                        calculateTotal();
                        updateProduct(product);
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
                    updateProduct(product);
                });

                // Event listener untuk size-select
                if (sizeSelect) {
                    sizeSelect.addEventListener('change', () => {
                        console.log("Size changed for product:", product);
                        updateSize(product);
                    });
                }
            });

            calculateTotal();
        });
    </script>
</body>

</html>
