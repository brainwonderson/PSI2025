<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center">Detail Survey</h2>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">UMKM</dt>
                <dd class="col-sm-8">{{ $survey->layanan->umkm->nama ?? '-' }}</dd>

                <dt class="col-sm-4">Jenis Layanan</dt>
                <dd class="col-sm-8">{{ $survey->layanan->jenis_layanan ?? '-' }}</dd>

                <dt class="col-sm-4">Tanggal Layanan</dt>
                <dd class="col-sm-8">{{ $survey->layanan->tanggal_layanan ?? '-' }}</dd>

                <dt class="col-sm-4">Rating</dt>
                <dd class="col-sm-8">{{ $survey->survey }}</dd>
            </dl>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary">← Kembali</a>
        <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning ms-2">Edit</a>
    </div>
</div>

</body>
</html>
