@extends('admin.layouts.admin-layouts')

@section('title', 'Bencana')

@section('content')
    <div class="container-fluid py-4 px-5">
      @if(session()->has('insertSuccess'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('insertSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('insertError'))
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('insertError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('deleteSuccess'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('deleteSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('successUpdate'))
      <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successUpdate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('errorUpdate'))
      <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('errorUpdate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('slow');
        }, 2000); // Menghilangkan alert setelah 3 detik (3000 milidetik)
      </script>

      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Data Bencana</h6>
                  <p class="text-sm">Data semua bencana pada setiap kecamatan</p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom pt-3 px-3 d-sm-flex align-items-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalAlat">
                  <i class="fa-solid fa-plus me-2"></i>Tambah Data Bencana
                </button>
                <div class="mb-3 mx-2 w-auto input-group align-items-center">
                  <select class="form-select form-select-sm" name="status" aria-label="Default select example"id="status-dropdown">
                    <option value="">Pilih Status</option>
                    <option value="Belum Ditangani">Belum Ditangani</option>
                    <option value="Sedang Ditangani">Sedang Ditangani</option>
                    <option value="Sudah Ditangani">Sudah Ditangani</option>
                  </select>
                </div>


                {{-- MODAL TAMBAH DATAA --}}
                <div class="modal fade" id="ModalAlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="p-0 modal-body">
                        <div class="card card-plain">
                          <div class="pb-0 text-left card-header">
                              <h3 class="font-weight-bolder text-dark">Data Bencana <i class="	fas fa-tools"></i></h3>
                              <p class="mb-0">Tambahkan data bencana yang belum ada.</p>
                          </div>
                          <div class="pb-3 card-body">
                            <form id="tambahForm"role="form text-left" method="post" action="{{ route('bencanaStore') }}">
                              @csrf
                              <label>Nama</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="nama" aria-label="Default select example">
                                  <option value="">-------- Pilih Bencana --------</option>
                                  <option value="Banjir">Banjir</option>
                                  <option value="Kebakaran">Kebakaran</option>
                                  <option value="Puting Beliung">Puting Beliung</option>
                                  <option value="Gempa Bumi">Gempa Bumi</option>
                                  <option value="Longsor">Longsor</option>
                                  <option value="Rob">Rob</option>
                                </select>
                              </div>
                              <label for="alamat">Tanggal</label>
                              <div class="mb-3 input-group">
                                <input name="tanggal" id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal" aria-label="tanggal" aria-describedby="Bulan-addon" required>
                                @error('tanggal') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Status</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="status" aria-label="Default select example">
                                  <option value="">-------- Pilih Status --------</option>
                                  <option value="Belum Ditangani">Belum Ditangani</option>
                                  <option value="Sedang Ditangani">Sedang Ditangani</option>
                                  <option value="Sudah Ditangani">Sudah Ditangani</option>
                                </select>
                              </div>
                              <label for="kecamatan">Kecamatan</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                                  <option value="">-------- Pilih Kecamatan --------</option>
                                  @foreach($kecamatans->unique('nama') as $kecamatan)
                                  <option value="{{ $kecamatan->id}}">{{ $kecamatan->nama }}</option>
                                  @endforeach 
                                </select>
                              </div>
                              <label>Deskripsi</label>
                              <div class="mb-3 input-group">
                                <textarea name="deskripsi" id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" aria-label="deskripsi" aria-describedby="status-addon" required></textarea>
                                @error('deskripsi') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="text-center py-4">
                                <button type="submit" class="mb-0 btn btn-dark btn-lg btn-rounded w-100">Tambah</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="input-group pb-3 w-sm-25 ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="searchInput" placeholder="Search for...">
                </div>
              </div>
              <div class="table-responsive p-0" id="items-table">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">No</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">ID</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tanggal</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Kecamatan</th>
                      <th class="text-secondary opacity-7 text-xs font-weight-semibold text-center">Edit</th>
                      <th class="text-secondary opacity-7 text-xs font-weight-semibold text-center">Hapus</th>
                    </tr>
                  </thead>
                  <tbody id="alatTableBody">
                    @foreach ($bencanas as $bencana)
                    <tr>
                      <td class="text-sm align-middle text-center">
                        {{ $bencanas->firstItem() + $loop->index }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->bencana_id}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->nama}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->tanggal}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        @if($bencana->status == 'Sudah Ditangani')
                          <span class="badge bg-gradient-success">
                            {{ $bencana->status }}
                          </span>
                        @elseif($bencana->status == 'Belum Ditangani')
                          <span class="badge bg-gradient-danger">
                            {{ $bencana->status }}
                          </span>
                        @else
                        <span class="badge bg-gradient-warning">
                          {{ $bencana->status }}
                        </span>
                        @endif
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->kecamatan->nama}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        <button type="button" class="btn btn-dark btn-icon my-0 px-2 py-2" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $bencana->bencana_id }}"><i class="fas fa-pencil-alt"></i>
                        </button>
                      </td>
                      <td class="text-sm align-middle text-center">
                        <form action="{{ route('bencanaDestroy', ['bencana_id' => $bencana->bencana_id]) }}" method="post">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-dark btn-icon my-0 px-2 py-2" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                      {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user"><i class="fas fa-window-close text-danger"></i>
                      </a> --}}
                    </tr>
                {{-- MODAL UPDATE DATA --}}
                <div class="modal fade" id="ModalUpdate{{ $bencana->bencana_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="p-0 modal-body">
                        <div class="card card-plain">
                          <div class="pb-0 text-left card-header">
                              <h3 class="font-weight-bolder text-dark">Update Data Bencana</h3>
                              <p class="mb-0">Update data bencana yang sudah ada.</p>
                          </div>
                          <div class="pb-3 card-body">
                            
                            <form role="form text-left" method="post" action="{{ route('bencanaUpdate',$bencana->bencana_id) }}">
                              @method('PUT')
                              @csrf
                              <label>ID Bencana</label>
                              <div class="mb-3 input-group">
                                <input name="bencana_id" id="bencana_id" type="text" class="form-control @error('bencana_id') is-invalid @enderror" placeholder="ID Bencana" aria-label="Name" aria-describedby="name-addon" required value="{{ $bencana->bencana_id }}">
                                @error('bencana_id') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Nama</label>
                              <div class="mb-3 input-group">
                                <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Alat" aria-label="Name" aria-describedby="name-addon" required value="{{ $bencana->nama }}">
                                @error('nama') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label for="alamat">Tanggal</label>
                              <div class="mb-3 input-group">
                                <input name="tanggal" id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal" aria-label="tanggal" aria-describedby="Bulan-addon" required value="{{ $bencana->tanggal }}">
                                @error('tanggal') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Status</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="status" aria-label="Default select example">
                                  <option value="">-------- Pilih Status --------</option>
                                  @if($bencana->status == "Belum Ditangani")
                                      <option value="Belum Ditangani" selected>Belum Ditangani</option>
                                      <option value="Sedang Ditangani">Sedang Ditangani</option>
                                      <option value="Sudah Ditangani">Sudah Ditangani</option>
                                  @elseif($bencana->status == "Sedang Ditangani")
                                      <option value="Belum Ditangani">Belum Ditangani</option>
                                      <option value="Sedang Ditangani" selected>Sedang Ditangani</option>
                                      <option value="Sudah Ditangani">Sudah Ditangani</option>
                                  @elseif($bencana->status == "Sudah Ditangani")
                                      <option value="Belum Ditangani">Belum Ditangani</option>
                                      <option value="Sedang Ditangani">Sedang Ditangani</option>
                                      <option value="Sudah Ditangani" selected>Sudah Ditangani</option>
                                  @else
                                      <option value="Belum Ditangani">Belum Ditangani</option>
                                      <option value="Sedang Ditangani">Sedang Ditangani</option>
                                      <option value="Sudah Ditangani">Sudah Ditangani</option>
                                  @endif
                                </select>
                              </div>
                              <label for="alamat">Kecamatan</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                                  <option value="">-------- Pilih Kecamatan --------</option>
                                  @foreach($kecamatans->unique('nama') as $kecamatan)
                                  @if($bencana->kecamatan_id == $kecamatan->id)
                                    <option value="{{ $kecamatan->id}}" selected>{{ $kecamatan->nama }}</option>
                                  @else 
                                    <option value="{{ $kecamatan->id}}">{{ $kecamatan->nama }}</option>
                                  @endif
                                  @endforeach 
                                </select>
                              </div>
                              <label>Deskripsi</label>
                              <div class="mb-3 input-group">
                                <textarea name="deskripsi" id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" aria-label="deskripsi" aria-describedby="status-addon" required>{{ isset($bencana) ? $bencana->deskripsi : '' }}</textarea>
                                @error('deskripsi') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="text-center py-4">
                                <button type="submit" class="mb-0 btn btn-dark btn-lg btn-rounded w-100">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
              </div>
                <script>
                  $(document).ready(function(){
                      $("#searchInput").on("keyup", function() {
                          var value = $(this).val().toLowerCase();
                          $("tbody tr").filter(function() {
                              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                          });
                      });
                  });
              </script>
              </div>
              <div class="pagination-container border-top py-3 px-3 d-flex align-items-center">
                <p class="font-weight-semibold mb-0 text-dark text-sm ms-2 my-0">Page {{ $bencanas->currentPage() }} of {{ $bencanas->lastPage() }}</p>
                <ul class="pagination pagination-secondary ms-auto">
                    <li class="page-item">
                        <a class="page-link" href="{{ $bencanas->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    @foreach ($bencanas->getUrlRange(1, $bencanas->lastPage()) as $page => $url)
                        <li class="page-item{{ $page == $bencanas->currentPage() ? ' active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item">
                        <a class="page-link" href="{{ $bencanas->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script>
        $(document).ready(function () {
            $('#status-dropdown').change(function () {
                var status = $(this).val();
    
                $.ajax({
                    url: "{{ route('getCategoryBencana') }}",
                    type: "GET",
                    data: { status: status },
                    success: function (data) {
                        $('#items-table').html(data);
                    }
                });
            });
        });
    </script>

@endsection
{{-- if (selectedOption === 'Banjir') {
  idPrefix = 'BJR-';
} else if (selectedOption === 'Kebakaran') {
  idPrefix = 'KBR-';
}else if (selectedOption === 'Puting Beliung') {
  idPrefix = 'PBE-';
}else if (selectedOption === 'Gempa Bumi') {
  idPrefix = 'GPB-';
}else if (selectedOption === 'Longsor') {
  idPrefix = 'LSR-';
}else if (selectedOption === 'Rob') {
  idPrefix = 'ROB-';
} --}}
{{-- <label>ID Bencana</label>
                              <div class="mb-3 input-group">
                                <input name="bencana_id" id="bencana_id" type="text" class="form-control @error('bencana_id') is-invalid @enderror" placeholder="ID Bencana" aria-label="Name" aria-describedby="name-addon" required>
                                @error('bencana_id') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div> --}}