<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Optional: Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h1 class="text-center mb-4">Survey</h1>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('surveys.store') }}" method="POST">
            @csrf
            <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Jenis Layanan</label>
                    <input type="text" class="form-control" value="{{ $layanan->jenis_layanan }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Petugas Layanan</label>
                    <input type="text" class="form-control" value="{{ $layanan->petugas_layanan }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Isi Layanan</label>
                    <input type="text" class="form-control" value="{{ $layanan->isi_layanan }}" readonly>
                </div>
                {{-- <div class="col-md-6">
                    <label class="form-label">Zoom</label>
                    <input type="text" class="form-control" value="{{ $layanan->zoom }}" readonly>
                </div>
            </div> --}}

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tanggal Layanan</label>
                    <input type="text" class="form-control" value="{{ $layanan->tanggal_layanan }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" value="{{ $layanan->no_telpon }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="survey" class="form-label">Nilai (1-5)</label>
                    <input type="number" name="survey" id="survey" class="form-control" min="1" max="5" required>
                </div>
                <div class="col-md-6">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea name="text" name="komentar" id="komentar" class="form-control"></textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Kirim Survey</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
