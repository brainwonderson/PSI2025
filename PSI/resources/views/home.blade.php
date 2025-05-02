<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard LOKA POM TOBA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); } 
            to { opacity: 1; transform: scale(1); } 
        }
        
        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-br from-blue-400 to-blue-600">
    <!-- Container utama yang menampilkan kotak login -->
    <div class="bg-white shadow-lg rounded-xl p-8 text-center max-w-md w-full 
                animate-fadeIn transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
        
        <!-- Judul utama -->
        <h1 class="text-2xl font-bold text-gray-800 mb-4">WELCOME TO</h1>
        
        <!-- Subjudul -->
        <h2 class="text-xl font-semibold text-blue-700 mb-6">Dashboard LOKA POM TOBA</h2>
        
        <!-- Logo Badan POM -->
        <div class="flex justify-center mb-6">
            <img src="/image/lokapom.png" alt="Badan POM" 
                 class="h-32 w-32 object-contain transition-transform duration-500 hover:scale-110">
        </div>
        
        <!-- Tombol LOGIN -->
        <a href="{{ route('account.login') }}" 
           class="bg-green-500 text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-300 transform 
                  hover:scale-110 hover:bg-green-600 hover:shadow-lg hover:shadow-blue-400 
                  focus:bg-blue-500 active:bg-blue-700">
           LOGIN
        </a>
    </div>
</body>
</html>
