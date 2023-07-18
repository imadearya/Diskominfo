@extends('pemkot.layouts.pemkot-layouts')

@section('title', 'Kantor')
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
        <h4>Data Kantor Rusak</h4>
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
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Data kerusakan</h6>
              <p class="text-sm">Data semua kerusakan pada setiap kecamatan</p>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="border-bottom pt-3 px-3 d-sm-flex align-items-center">
            <form action="/download-pdf-kantor" method="GET">
                <button type="submit" class="btn btn-dark"><i class="fa-solid fa-file-arrow-down mr-2"></i>Unduh</button>
            </form>
            <div class="input-group pb-3 w-sm-25 ms-auto">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                </svg>
              </span>
              <input type="text" class="form-control" id="searchInput" placeholder="Search for...">
            </div>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="bg-gray-100">
                <tr>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">No</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Total</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Bencana ID</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nama Bencana</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tanggal</th>
                </tr>
              </thead>
              <tbody id="kerusakanTableBody">
                @foreach ($kerusakans as $kerusakan)
                <tr>
                  <td class="text-sm align-middle text-center">
                    {{ $loop->iteration }}
                  </td>
                  <td class="text-sm align-middle text-center">
                    {{ $kerusakan->nama}}
                  </td>
                  <td class="text-sm align-middle text-center">
                    {{ $kerusakan->total }}
                  </td>
                  <td class="text-sm align-middle text-center">
                    {{ $kerusakan->bencana_id}}
                  </td>
                  <td class="text-sm align-middle text-center">
                    {{ $kerusakan->bencana->nama }}
                  </td>
                  <td class="text-sm align-middle text-center">
                    {{ $kerusakan->bencana->tanggal}}
                  </td>
                </tr>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
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
                label: "Kantor Rusak",
                tension: 0,
                borderWidth: 2,
                pointRadius: 3,
                borderColor: "#2ca8ff",
                pointBorderColor: '#2ca8ff',
                pointBackgroundColor: '#2ca8ff',
                backgroundColor: gradientStroke1,
                fill: true,
                data:[{{ implode(",", $nilaibulan) }}],
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