@extends('pemkot.layouts.pemkot-layouts')

@section('title', 'Dashboard')
@section('content')
 <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mx-2">
          </div>
        </div>
      </div>
      <hr class="my-0 mb-4">
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <a href="/pemkot/bencana">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Bencana</p>
                    <h4 class="font-weight-bold">{{ $totalbencana }} Kasus</h4>
                    <div class="d-flex align-items-center">
                      <p class="text-sm text-secondary mb-0 ms-1">Tahun 2023</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card border shadow-xs mb-4">
            <a href="/pemkot/kerusakan">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H326.4L288 448l80.8-67.3c7.8-6.5 7.6-18.6-.4-24.9L250.6 263.2c-14.6-11.5-33.8 7-22.8 22L288 368l-85.5 71.2c-6.1 5-7.5 13.8-3.5 20.5L230.4 512H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L416 100.7V64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32V185l52.8 46.4c8 7 12 15 11 24z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Kerusakan</p>
                    <h4 class="mb-2 font-weight-bold">{{ $totalkerusakan }} Kasus</h4>
                    <div class="d-flex align-items-center">
                      <p class="text-sm text-secondary mb-0 ms-1">Tahun 2023</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-xl-4 col-md-6">
          <a href="/pemkot/korban">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M192 64c0-17.7-14.3-32-32-32s-32 14.3-32 32V96.2c0 54.1 23.5 104 62.2 138.3l-21 146.7c7.8 2.1 15.5 3.3 22.8 3.3c21.1 0 42-8.5 59.2-20.3c22.1-15.5 51.6-15.5 73.7 0c12.4 8.5 26.1 14.8 39.7 18l17.7-97.6c10.7-1.2 21.3-3.1 31.9-5.5l105-23.9c17.2-3.9 28-21.1 24.1-38.3s-21.1-28-38.3-24.1L400 216.6c-41 9.3-83.7 7.5-123.7-5.2c-50.2-16-84.3-62.6-84.3-115.3V64zM320 192a64 64 0 1 0 0-128 64 64 0 1 0 0 128zM306.5 389.9c-11.1-7.9-25.9-7.9-37 0C247 405.4 219.5 416 192 416c-26.9 0-55.3-10.8-77.4-26.1l0 0c-11.9-8.5-28.1-7.8-39.2 1.7c-14.4 11.9-32.5 21-50.6 25.2c-17.2 4-27.9 21.2-23.9 38.4s21.2 27.9 38.4 23.9c24.5-5.7 44.9-16.5 58.2-25C126.5 469.7 159 480 192 480c31.9 0 60.6-9.9 80.4-18.9c5.8-2.7 11.1-5.3 15.6-7.7c4.5 2.4 9.7 5.1 15.6 7.7c19.8 9 48.5 18.9 80.4 18.9c33 0 65.5-10.3 94.5-25.8c13.4 8.4 33.7 19.3 58.2 25c17.2 4 34.4-6.7 38.4-23.9s-6.7-34.4-23.9-38.4c-18.1-4.2-36.2-13.3-50.6-25.2c-11.1-9.4-27.3-10.1-39.2-1.7l0 0C439.4 405.2 410.9 416 384 416c-27.5 0-55-10.6-77.5-26.1z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Korban</p>
                    <h4 class="mb-2 font-weight-bold">{{ $totalkorban }} Kasus</h4>
                    <div class="d-flex align-items-center">
                      <p class="text-sm text-secondary mb-0 ms-1">Tahun 2023</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="card shadow-xs border mb-4">
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line1" class="chart-canvas" height="300px"></canvas>
          </div>
        </div>
      </div>
      </div>
    </div>
  </main>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-line1").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(45,168,255,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(45,168,255,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(45,168,255,0)'); //blue colors

    var gradientStroke2 = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke2.addColorStop(1, 'rgba(119,77,211,0.4)');
    gradientStroke2.addColorStop(0.7, 'rgba(119,77,211,0.1)');
    gradientStroke2.addColorStop(0, 'rgba(119,77,211,0)'); //purple colors

    var gradientStroke3 = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke3.addColorStop(1, 'rgba(255,64,64,0.4)');
    gradientStroke3.addColorStop(0.7, 'rgba(255,64,64,0.1)');
    gradientStroke3.addColorStop(0, 'rgba(255,64,64,0)'); //red colors

    new Chart(ctx, {
        plugins: [{
            beforeInit(chart) {
                const originalFit = chart.legend.fit;
                chart.legend.fit = function fit() {
                    originalFit.bind(chart.legend)();
                    this.height += 40;
                }
            },
        }],
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Bencana",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                borderColor: "#2ca8ff",
                pointBorderColor: '#2ca8ff',
                pointBackgroundColor: '#2ca8ff',
                backgroundColor: gradientStroke1,
                fill: true,
                data:[{{ implode(",", $jumlahBencanasPerBulan) }}],
            },
            {
                label: "Kerusakan",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                borderColor: "#832bf9",
                pointBorderColor: '#832bf9',
                pointBackgroundColor: '#832bf9',
                backgroundColor: gradientStroke2,
                fill: true,
                data: [{{ implode(",", $jumlahRusaksPerBulan) }}],
                maxBarThickness: 6
            },
            {
                label: "Korban",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                borderColor: "#ff4040",
                pointBorderColor: '#ff4040',
                pointBackgroundColor: '#ff4040',
                backgroundColor: gradientStroke3,
                fill: true,
                data: [{{ implode(",", $jumlahKorbansPerBulan) }}],
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    align: 'end',
                    labels: {
                        boxWidth: 6,
                        boxHeight: 6,
                        padding: 20,
                        pointStyle: 'circle',
                        borderRadius: 50,
                        usePointStyle: true,
                        font: {
                            weight: 400,
                        },
                    },
                },
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#1e293b',
                    bodyColor: '#1e293b',
                    borderColor: '#e9ecef',
                    borderWidth: 1,
                    pointRadius: 2,
                    usePointStyle: true,
                    boxWidth: 8,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [4, 4]
                    },
                    ticks: {
                        callback: function(value, index, ticks) {
                            return parseInt(value).toLocaleString() + ' Kasus';
                        },
                        display: true,
                        padding: 10,
                        color: '#b2b9bf',
                        font: {
                            size: 12,
                            family: "Noto Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#64748B"
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [4, 4]
                    },
                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,
                        font: {
                            size: 12,
                            family: "Noto Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#64748B"
                    }
                },
            },
        },
    });
</script>
@endsection