<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 text-center">Edit Survey</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surveys.update', $survey->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="survey" class="form-label">Rating</label>
            <select class="form-select" name="survey" id="survey" required>
                <option value="">-- Pilih Rating --</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $survey->survey == $i ? 'selected' : '' }}>
                        {{ $i }} {{ $i == 1 ? '(Sangat Buruk)' : ($i == 5 ? '(Sangat Baik)' : '') }}
                    </option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('surveys.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

</body>
</html>
