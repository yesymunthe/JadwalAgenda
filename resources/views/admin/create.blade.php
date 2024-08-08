<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Agenda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5 form-container">
        <h1>Tambah Agenda</h1>

        <form id="agendaForm" action="{{ route('admin.agenda.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jam">Jam:</label>
                <input type="text" id="jam" name="jam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kegiatan">Kegiatan:</label>
                <input type="text" id="kegiatan" name="kegiatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pj">PJ:</label>
                <input type="text" id="pj" name="pj" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Agenda berhasil ditambahkan!
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        @if(session('success'))
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        @endif
    </script>
</body>
</html>
