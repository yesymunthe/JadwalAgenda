<!DOCTYPE html>
<html>
<head>
    <title>Edit Agenda</title>
</head>
<body>
    <h1>Edit Agenda</h1>

    <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="jam">Jam:</label>
        <input type="time" id="jam" name="jam" value="{{ $agenda->jam }}">
        <br>
        <label for="kegiatan">Kegiatan:</label>
        <input type="text" id="kegiatan" name="kegiatan" value="{{ $agenda->kegiatan }}">
        <br>
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" value="{{ $agenda->deskripsi }}">
        <br>
        <label for="pj">PJ:</label>
        <input type="text" id="pj" name="pj" value="{{ $agenda->pj }}">
        <br>
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" value="{{ $agenda->lokasi }}">
        <br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ $agenda->tanggal }}">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
