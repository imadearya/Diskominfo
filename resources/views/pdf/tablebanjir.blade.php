<!DOCTYPE html>
<html>
<head>
    <title>Data Korban</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Banjir</h1>

        <table class="table">
            <thead>
                <tr>
                    <<th class="text-secondary text-xs font-weight-semibold opacity-7 text-center">No</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Bencana ID</th>
                    <th class="text-secondary text-xs font-weight-semibold opacity-7 text-center ps-2">Nama</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tanggal</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Kecamatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bencanas as $bencana)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-sm align-middle text-center">
                        {{ $bencana->bencana_id}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->nama }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->tanggal}}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->status }}
                      </td>
                      <td class="text-sm align-middle text-center">
                        {{ $bencana->kecamatan->nama}}
                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>