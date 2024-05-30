<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title>
    @vite('resources/css/app.css')
    @vite('resources/css/customer/orderdetail.css')
</head>
<body>
    @include('components.customer.headercustomer')
    <div class="withsidebar">
        @include('components.customer.sidebarcustomer')
        <div class="main-content">

        </div>
    </div>
    @include('components.customer.footercustomer')
</body>
</html>
