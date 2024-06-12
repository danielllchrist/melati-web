<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carousel Manager</title>
    @vite('resources/css/app.css')
    @vite('resources/css/admin/orderdetail.css')
</head>
<body>
    @include('components.admin.headeradmin')
    <section>
        <div class="page-title">
            <div class="title-wrapper">
                <a href="">
                    <div class="title">
                        <img src="assets\dummy-img\back arrow coklat.svg" alt="">
                        <h1>Carousel Manager</h1>
                    </div>
                </a>
            </div>
        </div>
    @include('components.admin.footeradmin')
</body>
</html>
