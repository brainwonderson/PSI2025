<!-- resources/views/zoom/result.blade.php -->

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

</body>
</html>
    