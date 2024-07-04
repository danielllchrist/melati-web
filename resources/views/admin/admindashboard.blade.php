<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="\assets\Logo.svg">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite('resources/css/app.css')
    @vite('resources/css/admin/admindashboard.css')
    <style>
        .box-1 {
            background-image: url('\assets\backgroundHijau.png');
        }

        .box-2 {
            background-image: url('\assets\backgroundMerah.png');
        }

        .box-3 {
            background-image: url('\assets\backgroundCream.png');
        }

        .box-4 {
            background-image: url('\assets\backgroundCoklat.png');
        }
    </style>

</head>
<body class="bg-black">
@include('components.admin.headeradmin')
    <div class="container mb-5 mt-5">
        <div class="d-flex justify-content-between mt-5 mb-5">
            <div class="d-flex box-1 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Earnings</p>
                    <p class="count">Rp 1.000.000</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalEarning.png" class="earning-img">
                </div>
            </div>

            <div class="d-flex box-2 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Disc + Refund</p>
                    <p class="count">Rp 1.000.000</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalDiscount.png" class="discount-img">
                </div>
            </div>

            <div class="d-flex box-3 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Order</p>
                    <p class="count" id="total-order">543</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalOrder.png" class="order-img">
                </div>
            </div>

            <div class="d-flex box-4 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Users</p>
                    <p class="count" id="total-order">1234</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalUser.png" class="user-img">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="revenue-report">
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="d-flex flex-column">
                <div class="month mb-5">
                    <div class="month-title mb-4">
                        <h3>This Month</h3>
                    </div>
                    <div class="month-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div class="data-count">
                                        <p>123</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Orders</p>
                                    </div>
                                </td>

                                <td>
                                    <div class="data-count">
                                        <p>Rp. 1.000.000</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Earnings</p>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="data-count">
                                        <p>Rp. 150.000</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Discount</p>
                                    </div>
                                </td>

                                <td>
                                    <div class="data-count">
                                        <p>Rp. 100.000</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Refund</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="gender">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('revenueChart');

        var revenue = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    data: [1000000, 1800000, 4100000, 6000000, 6100000, 8200000, 8000000, 8400000, 8000000, 7800000, 7900000, 8100000],
                    borderColor: 'rgb(0, 0, 0)',
                    lineTension: 0.4,
                    pointRadius: 0
                }]
            },
            options : {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 10000000
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Revenue Report',
                        position: 'top',
                        align: 'start',
                        color: 'rgb(0, 0, 0)',
                        font: {
                            size: 40
                        },
                        padding: {
                            bottom: 30
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });

        const ctxGender = document.getElementById('genderChart');

        new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: [
                    'Male',
                    'Female'
                ],
                datasets: [{
                    data: [384, 850],
                    backgroundColor: [
                        'rgb(71, 51, 32)',
                        'rgb(236, 190, 146)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Customers',
                        position: 'top',
                        align: 'start',
                        color: 'rgb(0, 0, 0)',
                        font: {
                            size: 24
                        }
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 15
                        }
                    }
                }
            }
        });
    </script>
@include('components.admin.footeradmin')
</body>
</html>
