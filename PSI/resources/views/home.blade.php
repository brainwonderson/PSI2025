<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard LOKA POM TOBA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-blue-500">
    <div class="text-center">
        <h1 class="text-xl font-bold text-black">WELCOME TO Dashboard LOKA POM TOBA</h1>
        <div class="flex justify-center my-4">
            <img src="/image/lokapom.png" alt="Badan POM" class="h-32 w-24">
        </div>
        <a href="{{ route('account.login') }}" class="bg-green-500 text-black font-bold py-2 px-6 rounded-lg hover:bg-green-600">LOGIN</a>
    </div>
</body>
</html>
