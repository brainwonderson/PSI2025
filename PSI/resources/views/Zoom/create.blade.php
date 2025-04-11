<!-- resources/views/zoom/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Zoom Meeting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Zoom Meeting Scheduler</h1>

    <form method="POST" action="{{ route('meet') }}">
        @csrf
        <div class="mb-3">
            <label for="topic" class="form-label">Topic</label>
            <input type="text" class="form-control" id="topic" name="topic" required>
        </div>
    
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="30" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Create Meeting</button>
    </form>
    

</body>
</html>
