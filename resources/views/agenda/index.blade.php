<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Hari Ini</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@700&display=swap">
    <style>
        body {
            background: #D9D9D9;
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: rgba(80, 48, 52, 0.8); 
            padding: 10px 20px; 
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .logo {
            height: 55px; 
        }
        .container {
            background: rgba(80, 48, 52, 0.3); 
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            margin-top: 90px; 
            position: relative;
        }
        h1 {
            color: rgba(80, 48, 52, 0.9); 
            margin-bottom: 30px;
            font-size: 2.5rem;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            font-family: 'Roboto', sans-serif; 
            font-weight: 700;
            text-align: center;
        }
        table {
            background: rgba(80, 48, 52, 0.3); 
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            margin-bottom: 20px;
        }
        thead {
            background-color: rgba(80, 48, 52, 0.6); 
            color: white; 
        }
        th, td {
            text-align: center;
            padding: 15px;
            font-size: 1rem;
            font-weight: 400;
            border: 1px solid black; 
            color: black; 
        }
        tbody tr:nth-child(even) {
            background-color: rgba(248, 249, 250, 0.7); 
        }
        tbody tr:hover {
            background-color: rgba(226, 230, 234, 0.7); 
            cursor: pointer;
            transform: scale(1.02);
            transition: transform 0.2s ease, background-color 0.2s ease;
        }
        .btn {
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 0; 
        }
        .btn-primary {
            background-color: rgba(80, 48, 52, 0.8); 
            border: none;
        }
        .btn-primary:hover {
            background-color: rgba(80, 48, 52, 0.8);
        }
        .btn-secondary {
            background-color: rgba(80, 48, 52, 0.8);
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .pagination {
            justify-content: center;
        }
        .bottom-buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="/image/logo.png" alt="Logo Desa" class="logo">
    </div>
    <div class="container mt-5">
        <h1>Agenda Hari Ini</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Penanggung</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($agenda->jam)->format('H:i') }}</td>
                        <td>{{ $agenda->kegiatan }}</td>
                        <td>{{ $agenda->deskripsi }}</td>
                        <td>{{ $agenda->pj }}</td>
                        <td>{{ $agenda->lokasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $agendas->links() }}

        <div class="bottom-buttons mt-3">
            <a href="{{ route('agenda.besok') }}" class="btn btn-primary">Agenda Besok</a>
            <a href="{{ route('admin.login.form') }}" class="btn btn-secondary">Login Admin</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
