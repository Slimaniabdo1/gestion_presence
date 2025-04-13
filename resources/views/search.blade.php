<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher un etudiant  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-4">Chercher Un Etudiant</h2>
        @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif
        <form action="{{ route('search.student') }}" method="POST">
            @csrf
            <label for="apogee" class="block mb-2">Enter Numero Appogge</label>
            <input type="text" id="apogee" name="apogee" class="w-full p-2 border rounded mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Chercher
            </button>
        </form>
    </div>
</body>
</html>

