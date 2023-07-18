@extends('pemkot.layouts.pemkot-layouts')

@section('title', 'Bencana')
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
          <a href="/pemkot/bencana/banjir">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Banjir</p>
                    <h4 class="font-weight-bold">{{ $banjir }} Kasus</h4>
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
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Kebakaran</p>
                    <h4 class="mb-2 font-weight-bold">{{ $kebakaran }} Kasus</h4>
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
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Puting Beliung</p>
                    <h4 class="mb-2 font-weight-bold">{{ $puting }} Kasus</h4>
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
                    <p class="text-sm text-secondary mb-1">Gempa Bumi</p>
                    <h4 class="font-weight-bold">{{ $gempa }} Kasus</h4>
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
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Longsor</p>
                    <h4 class="mb-2 font-weight-bold">{{ $longsor }} Kasus</h4>
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
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M252.4 103.8l27 48c2.8 5 8.2 8.2 13.9 8.2l53.3 0c5.8 0 11.1-3.1 13.9-8.2l27-48c2.7-4.9 2.7-10.8 0-15.7l-27-48c-2.8-5-8.2-8.2-13.9-8.2H293.4c-5.8 0-11.1 3.1-13.9 8.2l-27 48c-2.7 4.9-2.7 10.8 0 15.7zM68.3 87C43.1 61.8 0 79.7 0 115.3V432c0 44.2 35.8 80 80 80H396.7c35.6 0 53.5-43.1 28.3-68.3L68.3 87zM504.2 403.6c4.9 2.7 10.8 2.7 15.7 0l48-27c5-2.8 8.2-8.2 8.2-13.9V309.4c0-5.8-3.1-11.1-8.2-13.9l-48-27c-4.9-2.7-10.8-2.7-15.7 0l-48 27c-5 2.8-8.2 8.2-8.2 13.9v53.3c0 5.8 3.1 11.1 8.2 13.9l48 27zM192 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Rob</p>
                    <h4 class="mb-2 font-weight-bold">{{ $rob }} Kasus</h4>
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