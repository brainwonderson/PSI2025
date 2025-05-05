<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center fw-bold mb-4">Data Layanan</h2>
        <div class="text-end mb-3">
            <a href="{{ route('layanan.create') }}" class="btn btn-success">Tambah Layanan</a>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No Layanan</th>
                    <th>Nama UMKM</th>
                    <th>Tanggal</th>
                    <th>Jenis Layanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $index => $layanan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $layanan->umkm->nama ?? '-' }}</td>
                        <td>{{ $layanan->tanggal_layanan }}</td>
                        <td>{{ $layanan->jenis_layanan }}</td>
                        {{-- <td>{{ $layanan->status }}</td> --}}
                        <td>
                            @if ($layanan->status === 'buka')
                                <span class="badge bg-success">Buka</span>
                            @elseif ($layanan->status === 'selesai')
                                <span class="badge bg-secondary">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('survey.create', ['layanans' => $layanan->id]) }}"  class="btn btn-primary btn-sm">Survey</a>
                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
