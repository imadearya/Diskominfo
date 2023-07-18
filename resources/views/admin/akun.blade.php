@extends('admin.layouts.admin-layouts')

@section('title', 'Akun')

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
                  <h6 class="font-weight-semibold text-lg mb-0">Data akun</h6>
                  <p class="text-sm">Data semua akun pada sistem</p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom pt-3 px-3 d-sm-flex align-items-center">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalAkun"><i class="fa-solid fa-plus me-2"></i>
                  Tambah Data akun
                </button>
                {{-- MODAL TAMBAH DATAA --}}
                <div class="modal fade" id="ModalAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="p-0 modal-body">
                        <div class="card card-plain">
                          <div class="pb-0 text-left card-header">
                              <h3 class="font-weight-bolder text-dark">Data Akun </h3>
                              <p class="mb-0">Tambahkan data akun.</p>
                          </div>
                          <div class="pb-3 card-body">
                            <form role="form text-left" method="post" action="{{ route('akunStore') }}">
                              @csrf
                              <label>Nama</label>
                              <div class="mb-3 input-group">
                                <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Akun" aria-label="Name" aria-describedby="name-addon" required>
                                @error('nama') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Email</label>
                              <div class="mb-3 input-group">
                                <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Name" aria-describedby="name-addon" required>
                                @error('email') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Password</label>
                              <div class="mb-3 input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                              </div>
                              <label>Role</label>
                              <div class="mb-3 input-group">
                                <input name="role" id="role" type="number" class="form-control @error('role') is-invalid @enderror"" placeholder="Role" aria-label="Email" aria-describedby="email-addon" required>
                                @error('role') 
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
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">Email</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Role</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Kecamatan</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Edit</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Hapus</th>
                    </tr>
                  </thead>
                  <tbody id="alatTableBody">
                    @foreach ($akuns as $akun)
                    <tr>
                      <td class="text-sm align-middle text-center">
                        {{ $loop->iteration}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $akun->email}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $akun->nama}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $akun->role}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $akun->kecamatan->nama}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        <button type="button" class="btn btn-dark btn-icon my-0 px-2 py-2" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $akun->id }}"><i class="fas fa-pencil-alt"></i>
                        </button>
                      </td>
                      <td class="text-sm align-middle text-center">
                        <form action="{{ route('akunDestroy', $akun->id) }}" method="post">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-dark btn-icon my-0 px-2 py-2" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                      {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user"><i class="fas fa-window-close text-danger"></i>
                      </a> --}}
                    </tr>
                    <div class="modal fade" id="ModalUpdate{{ $akun->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">
                          <div class="p-0 modal-body">
                            <div class="card card-plain">
                              <div class="pb-0 text-left card-header">
                                  <h3 class="font-weight-bolder text-dark">Update akun</h3>
                                  <p class="mb-0">Update data akun yang sudah ada.</p>
                              </div>
                              <div class="pb-3 card-body">
                                <form role="form text-left" method="post" action="{{ route('akunUpdate',$akun->id) }}">
                                  @method('PUT')
                                  @csrf
                                  <label>Nama</label>
                              <div class="mb-3 input-group">
                                <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Akun" aria-label="Name" aria-describedby="name-addon" required value="{{ $akun->nama }}">
                                @error('nama') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Email</label>
                              <div class="mb-3 input-group">
                                <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Name" aria-describedby="name-addon" required value="{{ $akun->email }}">
                                @error('email') 
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <label>Password</label>
                              <div class="mb-3 input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" value="{{ $akun->password }}">
                              </div>
                              <label>Role</label>
                              <div class="mb-3 input-group">
                                <input name="role" id="role" type="number" class="form-control @error('role') is-invalid @enderror" placeholder="Role" aria-label="Email" aria-describedby="email-addon" required value="{{ $akun->role }}">
                                @error('role') 
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
                                      @if($akun->kecamatan_id == $kecamatan->id)
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
                    </div>
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
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection