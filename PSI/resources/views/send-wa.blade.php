<!DOCTYPE html>
<html>
<head>
    <title>Send WhatsApp Message</title>
</head>
<body>
    <h1>Kirim Pesan WhatsApp</h1>

    @if(session('status'))
        <div style="background: #e0ffe0; padding: 10px; margin-bottom: 10px;">
            <strong>Response:</strong>
            <pre>{{ print_r(session('status'), true) }}</pre>
        </div>
    @endif

    @if($errors->any())
        <div style="background: #ffe0e0; padding: 10px; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('send-wa') }}" method="POST">
        @csrf
        <label>Nomor Tujuan:</label><br>
        <input type="text" name="target" placeholder="0811111111" value="{{ old('target') }}"><br><br>

        <label>Pesan:</label><br>
        <textarea name="message" rows="4" cols="50">{{ old('message') }}</textarea><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
