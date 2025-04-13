<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant Infosmations </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4"> Etudiant :</h2>
        <p><strong>Nom :</strong> {{ $student->nom }} {{ $student->prenom }}</p>
        <p><strong>Appogee:</strong> {{ $student->apogee }}</p>
        <p><strong>Filiere:</strong> {{ $student->filiere->nomF }}</p>
        <p><strong>Semestre :</strong> {{ $student->semestre->nom }}</p>

        <a href="{{ route('search.form') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Rechercher</a>
    </div>
</body>
</html>
