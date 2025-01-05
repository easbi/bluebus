@extends('layouts.template2')
@section('content')


<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById("myBarChart");

    if (ctx) {
        var driverOrders = @json($driverOrders);

        var labels = Object.keys(driverOrders);
        var dataValues = Object.values(driverOrders);

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Jumlah Orderan",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: dataValues,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: { left: 10, right: 25, top: 25, bottom: 0 }
                },
                scales: {
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: { maxTicksLimit: 6 },
                        maxBarThickness: 25,
                    },
                    y: {
                        ticks: {
                            suggestedMin: 0, // Menggunakan suggestedMin untuk memastikan sumbu Y dimulai dari 0
                            max: Math.max(...dataValues) + 1,
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value) {
                                return value; // Menampilkan nilai tanpa tambahan simbol
                            }
                        },
                        grid: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }
                },
                legend: { display: false },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || 'Data';
                            return datasetLabel + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        });
    } else {
        console.error("Canvas element with id 'myBarChart' not found.");
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById("myPieChart");

    if (ctx) {
        // Data driverOrders dari PHP
        var driverOrders = @json($driverOrders);

        // Menyusun data untuk Doughnut Chart
        var labels = Object.keys(driverOrders);  // Nama Driver
        var dataValues = Object.values(driverOrders);  // Jumlah Orderan per Driver

        // Membuat Doughnut Chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: "Jumlah Orderan",
                    data: dataValues,
                    backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"], // Warna untuk setiap bagian
                    hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"], // Warna saat hover
                    hoverBorderColor: "#ffffff", // Warna border saat hover
                }],
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                cutoutPercentage: 70,  // Mengatur ukuran hole tengah pada doughnut
                legend: {
                    display: true,  // Menampilkan legenda
                    position: 'top',
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || 'Data';
                            return datasetLabel + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        });
    } else {
        console.error("Canvas element with id 'myDoughnutChart' not found.");
    }
});
</script>



<!-- DataTales Example -->
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orderan Driver</h1>
<p class="mb-4">Orderan yang diperoleh oleh driver dan sudah dalam bentuk SPJ final dapat dilihat dalam grafik berikut.</a>.</p>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-lg-12">
        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('sbadmin/js/demo/chart-area-demo.js')}}"></script>
@endpush