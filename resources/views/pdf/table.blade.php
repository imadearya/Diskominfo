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
        <h1>Data Korban</h1>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Umur</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Bencana ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($korbans as $korban)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $korban->NIK }}</td>
                    <td class="text-center">{{ $korban->nama }}</td>
                    <td class="text-center">{{ $korban->umur }}</td>
                    <td class="text-center">{{ $korban->status }}</td>
                    <td class="text-center">{{ $korban->bencana_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>