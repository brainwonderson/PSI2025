<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Layanan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('layanans.update', $layanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" value="{{ old('jenis_layanan', $layanan->jenis_layanan) }}" required>
            </div>

            <div class="mb-3">
                <label for="isi_layanan" class="form-label">Isi Layanan</label>
                <textarea name="isi_layanan" class="form-control" rows="4" required>{{ old('isi_layanan', $layanan->isi_layanan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_layanan" class="form-label">Tanggal Layanan</label>
                <input type="date" name="tanggal_layanan" class="form-control" value="{{ old('tanggal_layanan', $layanan->tanggal_layanan) }}" required>
            </div>

            <div class="mb-3">
                <label for="petugas_layanan" class="form-label">Petugas Layanan</label>
                <input type="text" name="petugas_layanan" class="form-control" value="{{ old('petugas_layanan', $layanan->petugas_layanan) }}" required>
            </div>

            <div class="mb-3">
                <label for="zoom" class="form-label">Link Zoom (Opsional)</label>
                <input type="text" name="zoom" class="form-control" value="{{ old('zoom', $layanan->zoom) }}">
            </div>

            <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telepon</label>
                <input type="text" name="no_telpon" class="form-control" value="{{ old('no_telpon', $layanan->no_telpon) }}" required>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan (Opsional)</label>
                <textarea name="pesan" class="form-control">{{ old('pesan', $layanan->pesan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="buka" {{ old('status', $layanan->status) === 'buka' ? 'selected' : '' }}>Buka</option>
                    <option value="selesai" {{ old('status', $layanan->status) === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('layanans.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
