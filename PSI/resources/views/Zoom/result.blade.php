<!DOCTYPE html>
<html>
<head>
    <title>Meeting Created</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Meeting Created Successfully!</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Meeting ID:</strong> {{ $response['id'] ?? '-' }}</p>
            <p><strong>Topic:</strong> {{ $response['topic'] ?? '-' }}</p>
            <p><strong>Start Time:</strong> {{ $response['start_time'] ?? '-' }}</p>
            <p><strong>Duration:</strong> {{ $response['duration'] ?? '-' }} minutes</p>
            <p><strong>Join URL:</strong> <a href="{{ $response['join_url'] ?? '#' }}" target="_blank">{{ $response['join_url'] ?? 'N/A' }}</a></p>
            <p><strong>Password:</strong> {{ $response['password'] ?? '-' }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('account.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>

        {{-- Contoh tombol untuk mengirim WA --}}
        <form action="{{ route('send-wa') }}" method="POST">
            @csrf
            <input type="hidden" name="target" value="085362025601">
            <input type="hidden" name="message" value="{{ $response['join_url'] ?? 'No Link' }}">
            <button type="submit" class="btn btn-success">Send WhatsApp</button>
        </form>
    </div>

</body>
</html>
