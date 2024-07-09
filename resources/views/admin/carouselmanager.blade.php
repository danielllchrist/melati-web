<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carousel Manager</title>
    @vite('resources/css/app.css')
    @vite('resources/css/admin/carouselmanager.css')
</head>

<body>
    @include('components.admin.headeradmin')
    <div class="page-title">
        <div class="title-wrapper">
            <div class="title">
                <img src="\assets\dummy-img\back arrow.svg" alt="">
                <h1>Atur Promosi</h1>
            </div>
        </div>
    </div>

    <section>
        <div class="asset-item">
            <div class="image-container">
                <img src="{{ asset($manageAsset[0]->assetPath) }}" alt="Product Image"
                    id="productImage{{ $manageAsset[0]->assetID }}">
            </div>
            <div class="button-container">
                @csrf
                <button class="edit"
                    onclick="document.getElementById('fileInput{{ $manageAsset[0]->assetID }}').click()">Sunting</button>
                <button class="delete" data-id="{{ $manageAsset[0]->assetID }}"
                    onclick="deleteImage('{{ $manageAsset[0]->assetID }}')">Hapus</button>
                <input type="file" id="fileInput{{ $manageAsset[0]->assetID }}" style="display:none;"
                    onchange="uploadImage(event, '{{ $manageAsset[0]->assetID }}')" required
                    accept="image/png,image/jpg,image/jpeg">
            </div>
        </div>

        <div class="asset-item">
            <div class="image-container">
                <img src="{{ asset($manageAsset[1]->assetPath) }}" alt="Product Image"
                    id="productImage{{ $manageAsset[1]->assetID }}">
            </div>
            <div class="button-container">
                @csrf
                <button class="edit"
                    onclick="document.getElementById('fileInput{{ $manageAsset[1]->assetID }}').click()">Sunting</button>
                <button class="delete" data-id="{{ $manageAsset[1]->assetID }}"
                    onclick="deleteImage('{{ $manageAsset[1]->assetID }}')">Hapus</button>
                <input type="file" id="fileInput{{ $manageAsset[1]->assetID }}" style="display:none;"
                    onchange="uploadImage(event, '{{ $manageAsset[1]->assetID }}')" required
                    accept="image/png,image/jpg,image/jpeg">
            </div>
        </div>

        <div class="asset-item">
            <div class="image-container">
                <img src="{{ asset($manageAsset[2]->assetPath) }}" alt="Product Image"
                    id="productImage{{ $manageAsset[2]->assetID }}">
            </div>
            <div class="button-container">
                @csrf
                <button class="edit"
                    onclick="document.getElementById('fileInput{{ $manageAsset[2]->assetID }}').click()">Sunting</button>
                <button class="delete" data-id="{{ $manageAsset[2]->assetID }}"
                    onclick="deleteImage('{{ $manageAsset[2]->assetID }}')">Hapus</button>
                <input type="file" id="fileInput{{ $manageAsset[2]->assetID }}" style="display:none;"
                    onchange="uploadImage(event, '{{ $manageAsset[2]->assetID }}')" required
                    accept="image/png,image/jpg,image/jpeg">
            </div>
        </div>
    </section>

    @include('components.admin.footeradmin')

    <script>
        function uploadImage(event, id) {
            const fileInput = document.getElementById('fileInput' + id);
            console.log(fileInput);
            const file = fileInput.files[0];
            console.log(id);
            const formData = new FormData();
            formData.append('image', file);
            console.log(formData);

            fetch('/admin/unggah-gambar/' + id, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // alert('babi kau');
                    console.log(data);
                    if (data.success) {
                        document.getElementById('productImage' + id).src = data.filePath;
                    } else {
                        alert('Gagal mengupload gambar.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
        }

        function deleteImage(id) {
            if (confirm('Anda yakin ingin mengganti gambar ini dengan placeholder?')) {
                fetch('/admin/hapus-gambar/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('productImage' + id).src = 'https://fakeimg.pl/800x400';
                        } else {
                            alert('Gagal mengganti gambar.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan.');
                    });
            }
        }
    </script>
</body>



</html>
