@extends('admin.layouts.admin-layouts')

@section('title', 'penampungan')

@section('content')

    <div class="container-fluid py-4 px-5">
      @if(session()->has('insertSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('insertSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('insertError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('insertError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('deleteSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('deleteSuccess') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('successUpdate'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successUpdate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('errorUpdate'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('errorUpdate') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Data Pos Penampungan</h6>
                  <p class="text-sm">Data semua penampungan</p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom pt-3 px-3 d-sm-flex align-items-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#Modalpenampungan"><i class="fa-solid fa-plus me-2"></i>
                  Tambah Data
                </button>

                {{-- MODAL TAMBAH DATAA --}}
                <div class="modal fade" id="Modalpenampungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="p-0 modal-body">
                        <div class="card card-plain">
                          <div class="pb-0 text-left card-header">
                              <h3 class="font-weight-bolder text-dark">Data penampungan <i class="	fas fa-tools"></i></h3>
                              <p class="mb-0">Tambahkan data penampungan yang belum ada.</p>
                          </div>
                          <div class="pb-3 card-body">
                            <form role="form text-left" method="post" action="{{ route('penampunganStore') }}">
                              @csrf
                              <label>Nama</label>
                              <div class="mb-3 input-group">
                                <input name="nama" id="Nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Penampungan" aria-label="Name" aria-describedby="name-addon" required>
                                @error('nama') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Alamat</label>
                              <div class="mb-3 input-group">
                                <input name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" aria-label="Email" aria-describedby="email-addon" required>
                                @error('alamat') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Kapasitas</label>
                              <div class="mb-3 input-group">
                                <input name="kapasitas" id="kapasitas" type="number" class="form-control @error('kapasitas') is-invalid @enderror"" placeholder="Kapasitas" aria-label="Email" aria-describedby="email-addon" required>
                                @error('kapasitas') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label for="kecamatan">Kecamatan</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                                  <option value="">-------- Pilih Kecamatan --------</option>
                                  @foreach($kecamatans as $kecamatan)
                                  <option value="{{ $kecamatan->id}}">{{ $kecamatan->nama }}</option>
                                  @endforeach 
                                </select>
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
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">No</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Alamat</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Kapasitas</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Kecamatan</th>
                      <th class="text-secondary opacity-7 text-xs font-weight-semibold text-center">Edit</th>
                      <th class="text-secondary opacity-7 text-xs font-weight-semibold text-center">Hapus</th>
                    </tr>
                  </thead>
                  <tbody id="penampunganTableBody">
                    @foreach ($penampungans as $penampungan)
                    <tr>
                      <td class="text-sm align-middle text-center">
                        {{ $penampungans->firstItem() + $loop->index }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $penampungan->nama }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $penampungan->alamat }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $penampungan->kapasitas }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $penampungan->kecamatan->nama }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        <button type="button" class="btn btn-dark btn-icon my-0 px-2 py-2" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $penampungan->id }}"><i class="fas fa-pencil-alt"></i>
                        </button>
                      </td>
                      <td class="text-sm align-middle text-center">
                        <form action="{{ route('penampunganDestroy', $penampungan->id) }}" method="post">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-dark btn-icon my-0 px-2 py-2" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                      {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user"><i class="fas fa-window-close text-danger"></i>
                      </a> --}}
                    </tr>
                {{-- MODAL UPDATE DATA --}}
                <div class="modal fade" id="ModalUpdate{{ $penampungan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="p-0 modal-body">
                        <div class="card card-plain">
                          <div class="pb-0 text-left card-header">
                              <h3 class="font-weight-bolder text-dark">Update penampungan</h3>
                              <p class="mb-0">Update data penampungan yang sudah ada.</p>
                          </div>
                          <div class="pb-3 card-body">
                            
                            <form role="form text-left" method="post" action="{{ route('penampunganUpdate',$penampungan->id) }}">
                              @method('PUT')
                              @csrf
                              <label>Nama</label>
                              <div class="mb-3 input-group">
                                <input name="nama" id="Nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Penampungan" aria-label="Name" aria-describedby="name-addon" required value="{{ $penampungan->nama }}">
                                @error('nama') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Alamat</label>
                              <div class="mb-3 input-group">
                                <input name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"" placeholder="Alamat" aria-label="Email" aria-describedby="email-addon" required value="{{ $penampungan->alamat }}">
                                @error('alamat') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Kapasitas</label>
                              <div class="mb-3 input-group">
                                <input name="kapasitas" id="kapasitas" type="number" class="form-control @error('kapasitas') is-invalid @enderror"" placeholder="Kapasitas" aria-label="Email" aria-describedby="email-addon" required value="{{ $penampungan->kapasitas }}">
                                @error('kapasitas') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label for="kecamatan">Kecamatan</label>
                              <div class="mb-3 input-group">
                                <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                                  <option value="">-------- Pilih Kecamatan --------</option>
                                  @foreach($kecamatans as $kecamatan)
                                  @if($penampungan->kecamatan_id == $kecamatan->id)
                                    <option value="{{ $kecamatan->id}}" selected>{{ $kecamatan->nama }}</option>
                                  @else 
                                  <option value="{{ $kecamatan->id}}">{{ $kecamatan->nama }}</option>
                                  @endif 
                                  @endforeach
                                </select>
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
                <p class="font-weight-semibold mb-0 text-dark text-sm ms-2 my-0">Page {{ $penampungans->currentPage() }} of {{ $penampungans->lastPage() }}</p>
                <ul class="pagination pagination-secondary ms-auto">
                    <li class="page-item">
                        <a class="page-link" href="{{ $penampungans->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    @foreach ($penampungans->getUrlRange(1, $penampungans->lastPage()) as $page => $url)
                        <li class="page-item{{ $page == $penampungans->currentPage() ? ' active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item">
                        <a class="page-link" href="{{ $penampungans->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection