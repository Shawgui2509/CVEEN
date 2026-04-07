<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="max-w-xl w-full bg-white rounded-2xl shadow-xl p-8 text-center">
        <div class="mx-auto w-16 h-16 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-3xl mb-4">✓</div>
        <h1 class="text-2xl font-bold text-gray-900 mb-3">Reservation envoyee</h1>
        <p class="text-gray-600 mb-8">
            Votre reservation a bien ete envoyee. Vous recevrez une confirmation apres validation.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="<?= site_url('PageUser'); ?>" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-3 rounded-lg">
                Voir mes reservations
            </a>
            <a href="<?= site_url('Home'); ?>" class="inline-block border border-gray-300 hover:bg-gray-50 text-gray-800 font-semibold px-5 py-3 rounded-lg">
                Retour a l'accueil
            </a>
        </div>
    </div>
</body>
</html>
