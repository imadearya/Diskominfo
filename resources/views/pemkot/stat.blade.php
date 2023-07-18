@extends('pemkot.layouts.pemkot-layouts')

@section('title', 'Statistik')
@section('content')
<div class="container-fluid py-4 px-5">
    <hr class="my-0 mb-2">
    <h3>Statistik Bencana</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card border shadow-xs mb-4">
          <div class="card-header">
            <h5 class="card-title text-center mb-0">Presentase</h5>
          </div>
          <div class="card-body text-start p-3 w-100">
            <div class="chart">
              <canvas id="chart-doughnut1" class="chart-canvas" height="300px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #546e7a;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                      <p class="text-sm text-secondary mb-0">
                        <span class="me-1">Kebakaran</span>
                        <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                        <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                      </p>
                      <h4 class="mb-2 font-weight-bold">{{ $kebakaran }}</h4>
                      <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #ffe0b2;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Banjir</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $banjir }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Duplikat card di sebelah kanannya -->
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #4caf50;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Puting Beliung</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $puting }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #ffcc80;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Gempa Bumi</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $gempa }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir duplikat card -->
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #e0e0e0;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Longsor</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $longsor }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #795548;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Rob</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $rob }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4 px-5">
    <h3>Statistik Kerusakan</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card border shadow-xs mb-4">
          <div class="card-header">
            <h5 class="card-title text-center mb-0">Presentase</h5>
          </div>
          <div class="card-body text-start p-3 w-100">
            <div class="chart">
              <canvas id="chart-doughnut2" class="chart-canvas" height="300px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #263238;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                      <p class="text-sm text-secondary mb-0">
                        <span class="me-1">Rumah Terendam</span>
                        <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                        <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                      </p>
                      <h4 class="mb-2 font-weight-bold">{{ $rumaht }}</h4>
                      <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #4e342e;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Kantor Rusak</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $kantor }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Duplikat card di sebelah kanannya -->
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #424242;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Jembatan Rusak</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $jembatan }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #37474f;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Sarana Publik Rusak</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $publik }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir duplikat card -->
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #455a64;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Rumah Rusak Ringan</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $rumahr }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border shadow-xs mb-4">
              <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm  text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3" style="background-color: #3e2723;">
                  <!-- Tempatkan ikon di sini -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="w-100">
                        <p class="text-sm text-secondary mb-0">
                            <span class="me-1">Rumah Rusak Berat</span>
                            <!-- Tulisan "Kebakaran" dengan margin kanan 1 (me-1) -->
                            <!-- Jika Anda ingin menambahkan ikon di sebelah tulisan, Anda dapat memasukkan ikon di sini -->
                          </p>
                          <h4 class="mb-2 font-weight-bold">{{ $rumahb }}</h4>
                          <p class="mb-0">Jumlah Kasus</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-doughnut1").getContext("2d");
    
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Kebakaran", "Banjir", "Puting Beliung", "Gempa Bumi", "Longsor","Rob"],
        datasets: [{
          label: "Bencana",
          cutout: 40,
          backgroundColor: ["#546e7a", "#ffe0b2", "#4caf50", "#ffcc80", "#e0e0e0", "#795548"],
          data: [{{ implode(",", $data) }}],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            backgroundColor: '#fff',
            bodyColor: '#1e293b',
            borderColor: '#e9ecef',
            borderWidth: 1,
            usePointStyle: true
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
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });

    var ctx = document.getElementById("chart-doughnut2").getContext("2d");
    
    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Rumah Terendam", "Kantor Rusak", "Jembatan Rusak", "Sarana Publik Rusak", "Rumah Rusak Ringan","Rumah Rusak Berat"],
        datasets: [{
          label: "Kerusakan",
          cutout: 40,
          backgroundColor: ["#263238", "#4e342e", "#424242", "#37474f", "#455a64", "#3e2723"],
          data: [{{ implode(",", $dataRusak) }}],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            backgroundColor: '#fff',
            bodyColor: '#1e293b',
            borderColor: '#e9ecef',
            borderWidth: 1,
            usePointStyle: true
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
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });

    function selectYear(year) {
    // Aksi yang ingin Anda lakukan saat item dropdown dipilih
    console.log('Tahun yang dipilih:', year);
    // Contoh aksi: Ubah judul dengan tahun yang dipilih
    document.getElementById('judulTahun').innerText = year;
    }
    </script>
  
@endsection