<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
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
        height: 50px;
    }
    .container {
        background: rgba(80, 48, 52, 0.5); 
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.8);
        padding: 20px;
        max-width: 1200px;
        margin: auto;
        margin-top: 100px;
        position: relative;
    }
    h1 {
        color: #503034; 
        margin-bottom: 30px;
        font-size: 2rem;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        font-family: 'Roboto', sans-serif; 
        font-weight: 700;
        text-align: center;
    }
    table {
        background: #fff; 
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        margin-bottom: 20px;
    }
    thead {
    background-color: rgba(80, 48, 52, 0.8); 
    color: black; 
    }
    th, td {
        text-align: center;
        padding: 20px;
        font-size: 1rem;
        font-weight: 400;
        border: 1px solid rgba(139, 69, 19, 0.8); 
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
    .btn-success {
        background-color: #1d643b; 
        border: none;
    }
    .btn-success:hover {
        background-color: #155d27; 
    }
    .btn-danger {
        background-color: #991f2d; 
        border: none;
    }
    .btn-danger:hover {
        background-color: #7a1a24; 
    }
    .btn-warning {
        background-color: #cc8b37; 
        border: none;
    }
    .btn-warning:hover {
        background-color: #b0792d; 
    }
</style>

</head>
<body>
    <div class="header">
        <img src="/image/logo.png" alt="Logo Desa" class="logo">
    </div>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <div class="mb-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Agenda</button>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Penanggung Jawab</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->jam }}</td>
                        <td>{{ $agenda->kegiatan }}</td>
                        <td>{{ $agenda->deskripsi }}</td>
                        <td>{{ $agenda->pj }}</td>
                        <td>{{ $agenda->lokasi }}</td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editModal" data-id="{{ $agenda->id }}">Edit</button>
                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $agenda->id }}">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $agendas->links() }}

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.agenda.store') }}" method="POST" id="createForm">
                            @csrf
                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pj">Penanggung Jawab</label>
                                <input type="text" name="pj" id="pj" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="edit-jam">Jam</label>
                                <input type="time" name="jam" id="edit-jam" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-kegiatan">Kegiatan</label>
                                <input type="text" name="kegiatan" id="edit-kegiatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="edit-deskripsi" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit-pj">PJ</label>
                                <input type="text" name="pj" id="edit-pj" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-lokasi">Lokasi</label>
                                <input type="text" name="lokasi" id="edit-lokasi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="edit-tanggal" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Konfirmasi sebelum menghapus data
        $('.delete-btn').on('click', function (event) {
            event.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Konfirmasi Penghapusan',
                text: "Apakah Anda yakin ingin menghapus agenda ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);

            $.ajax({
                url: '/admin/agenda/' + id + '/edit',
                method: 'GET',
                success: function (data) {
                    if (data.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.error
                        });
                        return;
                    }
                    
                    modal.find('#editForm').attr('action', '/admin/agenda/' + id);
                    modal.find('#edit-jam').val(data.jam);
                    modal.find('#edit-kegiatan').val(data.kegiatan);
                    modal.find('#edit-deskripsi').val(data.deskripsi);
                    modal.find('#edit-pj').val(data.pj);
                    modal.find('#edit-lokasi').val(data.lokasi);
                    modal.find('#edit-tanggal').val(data.tanggal);
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat data.'
                    });
                }
            });
        });

        // Konfirmasi sebelum menyimpan data baru
        $('#createForm').on('submit', function (event) {
            event.preventDefault();
            var form = $(this);

            Swal.fire({
                title: 'Konfirmasi Simpan',
                text: "Apakah Anda yakin ingin menyimpan agenda ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.off('submit').submit();
                }
            });
        });

        // Konfirmasi sebelum menyimpan perubahan data
        $('#editForm').on('submit', function (event) {
            event.preventDefault();
            var form = $(this);

            Swal.fire({
                title: 'Konfirmasi Update',
                text: "Apakah Anda yakin ingin menyimpan perubahan agenda ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.off('submit').submit();
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}'
            });
        @endif
    </script>
</body>
</html>
