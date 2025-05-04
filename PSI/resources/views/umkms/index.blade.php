<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data UMKM</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        .table th, .table td {
            vertical-align: middle !important;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h4 class="text-center fw-bold mb-4">Data UMKM</h4>

    {{-- Tombol Add UMKM --}}
    <div class="mb-3 text-end">
        <a href="{{ route('umkms.create') }}" class="btn btn-success btn-sm">+ Add UMKM</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No Req</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Jenis Perusahaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($umkms as $index => $umkm)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $umkm->nama }}</td>
                    <td>{{ $umkm->instansi }}</td>
                    <td>{{ $umkm->jenis_perusahaan }}</td>
                    <td>
                        @if ($umkm->status === 'open')
                            <span class="badge bg-success">Open</span>
                        @elseif ($umkm->status === 'verifikasi')
                            <span class="badge bg-info">Verifikasi</span>
                        @elseif ($umkm->status === 'cancel')
                            <span class="badge bg-danger">Cancel</span>
                        @elseif ($umkm->status === 'close')
                            <span class="badge bg-secondary">Close</span>
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ route('layanans.create', ['umkm' => $umkm->id]) }}" class="btn btn-primary btn-sm">Lanjut</a>
                        <a href="{{ route('umkms.edit', $umkm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('umkms.updateStatus', ['id' => $umkm->id, 'status' => 'cancel']) }}" class="btn btn-danger btn-sm">Cancel</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $umkms->links() }}
    </div>
</div>

<!-- Bootstrap JS (optional, for dropdowns or other interaction) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
