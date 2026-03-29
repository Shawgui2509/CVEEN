<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Adèle1, - Appt 04</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .dropdown { display: none; }
        .dropdown.active { display: block; }
        .border-black { border-color: black; }
        .fixed {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
        }
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4caf50; /* Vert pour le succès */
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
        .error {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f44336; /* Rouge pour l'erreur */
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="notification" id="notification">Réservation réussie !</div>
    <div class="notification error" id="errorNotification">Réservation Incomplète</div>

    <div class="max-w-7xl mx-auto p-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left content -->
        <div class="lg:col-span-2 space-y-6">
            <h1 class="text-2xl font-bold">Villa Adèle, - Appt 04</h1>

            <!-- Section des Photos -->
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="<?php echo base_url('img/offre1v.jpg'); ?>" class="w-full h-auto rounded-lg shadow" alt="Photo 1">
                    <img src="<?php echo base_url('img/offre2v.jpg'); ?>" class="w-full h-auto rounded-lg shadow" alt="Photo 2">;
                    <img src="<?php echo base_url('img/offre3v.jpg'); ?>" class="w-full h-auto rounded-lg shadow" alt="Photo 3">
                    <img src="<?php echo base_url('img/offre4v.jpg'); ?>" class="w-full h-auto rounded-lg shadow" alt="Photo 4">
                </div>
            </div>

            <p class="text-gray-600">Logement entier · hébergement · Rome, Italie,...</p>

            <div class="flex items-center space-x-4">
                <span>4 voyageurs</span>
                <span>· 1 chambre</span>
                <span>· 2 lits</span>
                <span>· 1 salle de bain</span>
            </div>

            <div class="border rounded p-4 bg-white">
                <p><strong>Hôte :</strong> Compagnie Des Bains Du Nord</p>
                <p>Superhôte · Hôte depuis 4 ans</p>
            </div>

            <div class="flex flex-col space-y-2">
                <div class="flex items-center space-x-2">
                    <span>🏖️</span><span>À 4 minutes à pied de la plage</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span>🔑</span><span>Arrivée autonome</span>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow mt-6">
                <h2 class="text-lg font-semibold mb-2">Ce que propose ce logement</h2>
                <ul class="space-y-1 text-sm">
                    <li>🌊 Vue sur l'océan</li>
                    <li>🌅 Vue sur la mer</li>
                    <li>🏖️ Accès partagé à la plage</li>
                    <li>🍽️ Cuisine</li>
                    <li>📶 Wifi</li>
                    <li><s>🚫 Détecteur de monoxyde de carbone</s></li>
                </ul>
                <button class="mt-3 px-4 py-2 border rounded">Afficher les 48 équipements</button>
            </div>
        </div>

       
          
        </div>
    </div>

    <!-- Avis et Évaluation Section -->
    <div class="max-w-7xl mx-auto p-4 mt-10">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold">4,89 - 71 commentaires</h2>
            <span class="text-gray-500">⭐</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between">
                    <span class="font-bold">Évaluation globale</span>
                    <span class="text-gray-500">4,89</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">Propriété</span>
                    <span class="text-gray-500">4,8</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">Précision</span>
                    <span class="text-gray-500">4,9</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">Arrivée</span>
                    <span class="text-gray-500">4,9</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">Communication</span>
                    <span class="text-gray-500">4,9</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold">Emplacement</span>
                    <span class="text-gray-500">4,9</span>
                </div>
            </div>
        </div>
        <div class="space-y-4 mt-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between">
                    <span class="font-bold">Tristan</span>
                    <span class="text-gray-500 text-sm">3 ans sur Airbnb</span>
                </div>
                <p class="text-gray-600 mt-1">Parfait ! L'appartement est décoré avec beaucoup de goût, la propriété est irréprochable, et la vue sur la mer est un vrai plus, surtout au lever du soleil !</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between">
                    <span class="font-bold">Hélène</span>
                    <span class="text-gray-500 text-sm">1 janvier 2025</span>
                </div>
                <p class="text-gray-600 mt-1">Parfait ! L'appartement est très agréable, on s'y sent tout de suite bien. Coup de cœur pour Mers les Bains ! Tous les commerces sont accessibles à pied depuis l'appartement.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between">
                    <span class="font-bold">Lea</span>
                    <span class="text-gray-500 text-sm">novembre 2024</span>
                </div>
                <p class="text-gray-600 mt-1">Nous avons passé un bon week-end dans ce logement : il est calme, tout proche de la mer et du centre. Je le recommande vivement !</p>
            </div>
        </div>
    </div>

  

</body>
</html>