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
                    <p class="count">{{ "Rp " . number_format($earnings_total->total, 0, ",", ".") }}</p>
                </div>
                <div class="box-right">
                    <img src="\assets\iconTotalEarning.png" class="earning-img">
                </div>
            </div>

            <div class="d-flex box-2 justify-content-between align-items-center">
                <div class="box-left">
                    <p>Total Diskon + Kembalian</p>
                    <p class="count">{{ "Rp " . number_format($disc_return, 0, ",", ".") }}</p>
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
                {{-- <script src="path/to/your/chart-setup.js"></script> --}}
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
                                        <p>{{ "Rp " . number_format($earnings_this_month->total, 0, ",", ".") }}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Pendapatan</p>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{ "Rp " . number_format($discount_this_month->total, 0, ",", ".") }}</p>
                                    </div>
                                    <div class="data-title">
                                        <p>Diskon</p>
                                    </div>
                                </td>

                                <td style="background-color:#F0F1E4;">
                                    <div class="data-count">
                                        <p>{{ "Rp " . number_format($return_this_month->total, 0, ",", ".") }}</p>
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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');

        let gender_pria = parseInt({{$user_by_gender[0]->total}});
        let gender_wanita = parseInt({{$user_by_gender[1]->total}});
        let dataset_gender = [gender_pria,gender_wanita];

        let revenue_month = '{{ $month_revenue }}';
        let total_revenue = '{{ $total_revenue }}';

        let revenue_month_data = revenue_month.split('-');
        let total_revenue_data = total_revenue.split('-');


        // var ctx = document.getElementById('myChart').getContext('2d');
        var hoveredIndex = null; // Variable untuk menyimpan indeks elemen yang di-hover

        var revenue = new Chart(ctx, {
            type: 'line',
            data: {
                labels: revenue_month_data,
                datasets: [{
                    data: total_revenue_data,
                    borderColor: 'rgb(0, 0, 0)',
                    tension: 0.4, // Mengatur tension untuk membuat garis menjadi spline
                    pointRadius: 3, // Menampilkan poin untuk bisa di klik atau di hover
                    pointBackgroundColor: 'rgb(0, 0, 0)',
                }]
            },
            options: {
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
                    },
                    datalabels: {
                        display: function(context) {
                            // Menampilkan data label hanya pada titik data yang di-hover
                            return context.dataIndex === hoveredIndex;
                        },
                        align: 'top',
                        color: 'rgb(165, 42, 42)', // Mengubah warna menjadi coklat
                        formatter: function(value, context) {
                            return 'Rp ' + number_format(value, 0, ',', '.');
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Rp ' + number_format(tooltipItem.raw, 0, ',', '.');
                            }
                        },
                        displayColors: false // Menghapus kotak warna di tooltip
                    }
                },
                hover: {
                    onHover: function(event, elements) {
                        // Mengupdate indeks elemen yang di-hover
                        if (elements.length) {
                            hoveredIndex = elements[0].index;
                        } else {
                            hoveredIndex = null;
                        }
                        revenue.update();
                    }
                }
            },
            plugins: [ChartDataLabels]
        });


// Fungsi number_format seperti sebelumnya
        function number_format(number, decimals, dec_point, thousands_sep) {
            number = number.toString().replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

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
