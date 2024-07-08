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
            background-image: url('assets/backgroundHijau.png');
        }

        .box-2 {
            background-image: url('assets/backgroundMerah.png');
        }

        .box-3 {
            background-image: url('assets/backgroundCream.png');
        }

        .box-4 {
            background-image: url('assets/backgroundCoklat.png');
        }
    </style>

</head>
<body class="bg-black">
@include('components.admin.headeradmin')
    <div class="container mb-5 mt-5">
        <div class="d-flex justify-content-between mt-5 mb-5">
            <div class="d-flex box-1 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Pendapatan</p>
                    <p class="count">{{ "Rp " . number_format($earnings_total->total, 0, ",", "."); }}</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalEarning.png" class="earning-img">
                </div>
            </div>

            <div class="d-flex box-2 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Diskon + Kembalian</p>
                    <p class="count">{{ "Rp " . number_format($discount_total->total, 0, ",", "."); }}</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalDiscount.png" class="discount-img">
                </div>
            </div>

            <div class="d-flex box-3 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Pesanan</p>
                    <p class="count" id="total-order">{{$transaction_total}}</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalOrder.png" class="order-img">
                </div>
            </div>

            <div class="d-flex box-4 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Pengguna</p>
                    <p class="count" id="total-order">{{$user_total}}</p>
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
                        <h3 style="color: black">Bulan Ini</h3>
                    </div>
                    <div class="month-data">
                        <table class="table table-bordered" style="background-color:#F0F1E4;">
                            <tr>
                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{$transaction_this_month}}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Pesanan</p>
                                    </div>
                                </td>

                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{ "Rp " . number_format($earnings_this_month->total, 0, ",", "."); }}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Pendapatan</p>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{ "Rp " . number_format($discount_this_month->total, 0, ",", "."); }}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Diskon</p>
                                    </div>
                                </td>

                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{ "Rp " . number_format($return_this_month->total, 0, ",", "."); }}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Kembalian</p>
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

        let gender_pria = parseInt({{$user_by_gender[0]->total}});
        let gender_wanita = parseInt({{$user_by_gender[1]->total}});
        let dataset_gender = [gender_pria,gender_wanita];

        let revenue_month = '{{ $month_revenue }}';
        let total_revenue = '{{ $total_revenue }}';

        let revenue_month_data = revenue_month.split('-');
        let total_revenue_data = total_revenue.split('-');


        var revenue = new Chart(ctx, {
            type: 'line',
            data: {
                labels: revenue_month_data,
                datasets: [{
                    data: total_revenue_data,
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
                        text: 'Laporan Keuangan',
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
                    'Pria',
                    'Wanita'
                ],
                datasets: [{
                    data: dataset_gender,
                    backgroundColor: [
                        '#4F290C',
                        '#D5BE9E'
                    ],
                    hoverOffset: 4
                }]  
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Pelanggan',
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
