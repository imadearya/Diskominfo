@extends('pemkot.layouts.pemkot-layouts')

@section('title', 'Bencana')

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
                  <h6 class="font-weight-semibold text-lg mb-0">Data Korban</h6>
                  <p class="text-sm">Data semua korban pada setiap kecamatan</p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom pt-3 px-3 d-sm-flex align-items-center">
                <form action="/download-pdf" method="GET">
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
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">NIK</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Umur</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Bencana ID</th>
                    </tr>
                  </thead>
                  <tbody id="korbanTableBody">
                    @foreach ($korbans as $korban)
                    <tr>
                      <td class="text-sm align-middle text-center">
                        {{ $korbans->firstItem() + $loop->index }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $korban->NIK}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $korban->nama }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $korban->umur}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $korban->status }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $korban->bencana_id}}
                      </td>
                    </tr>
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
                <p class="font-weight-semibold mb-0 text-dark text-sm ms-2 my-0">Page {{ $korbans->currentPage() }} of {{ $korbans->lastPage() }}</p>
                <ul class="pagination pagination-secondary ms-auto">
                    <li class="page-item">
                        <a class="page-link" href="{{ $korbans->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    @foreach ($korbans->getUrlRange(1, $korbans->lastPage()) as $page => $url)
                        <li class="page-item{{ $page == $korbans->currentPage() ? ' active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item">
                        <a class="page-link" href="{{ $korbans->nextPageUrl() }}" aria-label="Next">
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