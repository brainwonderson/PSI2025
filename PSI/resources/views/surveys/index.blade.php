<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Gunakan Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">Data Survey</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>UMKM</th>
                <th>Jenis layanan</th>
                <th>Tanggal Layanan</th>
                <th>Rating</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($surveys as $survey)
                <tr>
                    <td>{{ $survey->layanan->umkm->nama ?? '-' }}</td>
                    <td>{{ $survey->layanan->jenis_layanan ?? '-' }}</td>
                    <td>{{ $survey->layanan->tanggal_layanan ?? '-' }}</td>
                    <td>{{ $survey->survey }}</td>

                    <td>
                        <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('surveys.show', $survey->id) }}" class="btn btn-sm btn-warning">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data survey.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol bawah -->
    <div class="d-flex justify-content-between mt-4">
        {{-- <a href="{{ route('survey.create', ['layanan' => session('last_layanan_id') ?? 1]) }}" class="btn btn-outline-secondary">
            ← Kembali
        </a> --}}
        
        <a href="{{ route('account.dashboard') }}" class="btn btn-primary">
            Selesai →
        </a>
    </div>
</div>

</body>
</html>

