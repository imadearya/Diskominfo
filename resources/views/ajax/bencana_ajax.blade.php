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