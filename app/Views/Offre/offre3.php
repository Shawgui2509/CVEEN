<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central Park Hotel</title>
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
            <h1 class="text-2xl font-bold">Central Park Hotel, - Appt 26</h1>

            <!-- Section des Photos -->
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <img src="img/offre1c.jpeg" alt="Photo 1" class="w-full h-auto rounded-lg shadow">
                    <img src="img/offre2c.jpeg" alt="Photo 2" class="w-full h-auto rounded-lg shadow">
                    <img src="img/offre3c.jpeg" alt="Photo 3" class="w-full h-auto rounded-lg shadow">
                    <img src="img/offre4c.jpeg" alt="Photo 4" class="w-full h-auto rounded-lg shadow">
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

        <!-- Right content (fixed) -->
        <div class="bg-white shadow-lg p-6 rounded-xl fixed">
            <div class="flex items-end justify-between">
                <p class="text-xl font-bold" id="nightlyRate">115 €</p>
                <p class="text-gray-600 text-sm">par nuit</p>
            </div>

            <!-- Booking Form -->
            <div class="border rounded-lg mt-4 divide-y">
                <div class="grid grid-cols-2 text-sm">
                    <div class="p-2 border-b border-black">
                        <label class="text-gray-600 uppercase text-xs font-semibold">ARRIVÉE</label>
                        <input type="date" id="arrivalDate" class="w-full border border-black rounded px-2 py-1 mt-1" />
                    </div>
                    <div class="p-2 border-b border-black">
                        <label class="text-gray-600 uppercase text-xs font-semibold">DÉPART</label>
                        <input type="date" id="departureDate" class="w-full border border-black rounded px-2 py-1 mt-1" />
                    </div>
                </div>
                <div class="p-2 relative border-b border-black">
                    <label class="text-gray-600 uppercase text-xs font-semibold">VOYAGEURS</label>
                    <button id="voyageurBtn" class="w-full border border-black rounded px-2 py-1 mt-1 text-left bg-white">
                        <span id="voyageurCount">1 voyageur</span>
                    </button>
                    <!-- Dropdown voyageur -->
                    <div id="voyageurDropdown" class="dropdown absolute top-full mt-2 left-0 bg-white border border-black rounded shadow p-4 w-full z-10">
                        <div class="flex justify-between items-center mb-2">
                            <span>Adultes</span>
                            <div>
                                <button onclick="changeCount('adult', -1)" class="px-2 bg-gray-200">-</button>
                                <span id="adultCount">1</span>
                                <button onclick="changeCount('adult', 1)" class="px-2 bg-gray-200">+</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span>Enfants</span>
                            <div>
                                <button onclick="changeCount('child', -1)" class="px-2 bg-gray-200">-</button>
                                <span id="childCount">0</span>
                                <button onclick="changeCount('child', 1)" class="px-2 bg-gray-200">+</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Bébés</span>
                            <div>
                                <button onclick="changeCount('baby', -1)" class="px-2 bg-gray-200">-</button>
                                <span id="babyCount">0</span>
                                <button onclick="changeCount('baby', 1)" class="px-2 bg-gray-200">+</button>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button onclick="closeDropdown()" class="px-4 py-1 border border-black rounded text-sm">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <button id="reserveBtn" class="mt-4 w-full bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold py-2 rounded-lg border border-black">Réserver</button>
            <p class="text-center text-xs text-gray-500 mt-2">Aucun montant ne vous sera débité pour le moment</p>

            <div id="priceDetails" class="mt-4 space-y-2 text-sm">
                <div class="flex justify-between"><span id="priceDetailsNights">115 € x 1 nuit</span><span id="totalPrice">115 €</span></div>
                <div class="flex justify-between"><span class="underline">Frais de ménage</span><span>35 €</span></div>
                <div class="flex justify-between"><span class="underline">Taxes</span><span>12 €</span></div>
                <hr>
                <div class="flex justify-between font-bold text-lg"><span>Total</span><span id="finalTotal">162 €</span></div>
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

    <script>
        const dropdown = document.getElementById("voyageurDropdown");
        const btn = document.getElementById("voyageurBtn");
        const notification = document.getElementById("notification");
        const errorNotification = document.getElementById("errorNotification");
        const reserveBtn = document.getElementById("reserveBtn");
        const arrivalDateInput = document.getElementById("arrivalDate");
        const departureDateInput = document.getElementById("departureDate");

        btn.addEventListener("click", () => {
            dropdown.classList.toggle("active");
        });

        function closeDropdown() {
            dropdown.classList.remove("active");
        }

        function changeCount(type, value) {
            const countEl = document.getElementById(type + "Count");
            let count = parseInt(countEl.textContent);
            count += value;
            if (count < 0) count = 0;
            if (type === 'adult' && count < 1) count = 1;
            countEl.textContent = count;

            updateTotalVoyageurs();
            updateTotalPrice();
        }

        function updateTotalVoyageurs() {
            const adults = parseInt(document.getElementById("adultCount").textContent);
            const children = parseInt(document.getElementById("childCount").textContent);
            const babies = parseInt(document.getElementById("babyCount").textContent);
            const total = adults + children + babies;
            document.getElementById("voyageurCount").textContent = total + (total > 1 ? " voyageurs" : " voyageur");
        }

        function updateTotalPrice() {
            const adults = parseInt(document.getElementById("adultCount").textContent);
            const children = parseInt(document.getElementById("childCount").textContent);
            const babies = parseInt(document.getElementById("babyCount").textContent);
            const basePrice = 115;
            const adultPriceIncrease = 12;

            // Calculate number of nights
            const arrivalDate = new Date(arrivalDateInput.value);
            const departureDate = new Date(departureDateInput.value);
            const nights = (departureDate - arrivalDate) / (1000 * 60 * 60 * 24); // Convert milliseconds to days
            const validNights = Math.max(nights, 0); // Ensure at least 0 nights

            let total = basePrice + (adults - 1) * adultPriceIncrease; // only charge extra for additional adults
            total += children * 6; // assume children cost 6€ each
            total += babies * 4; // assume babies cost 4€ each

            const finalTotal = (total * validNights) + 35 + 12; // adding cleaning fee and tax

            document.getElementById("priceDetailsNights").textContent = `${total} € x ${validNights} nuits`;
            document.getElementById("totalPrice").textContent = `${total * validNights} €`;
            document.getElementById("finalTotal").textContent = `${finalTotal} €`;
        }

        // Add event listeners to update total price when dates change
        arrivalDateInput.addEventListener("change", updateTotalPrice);
        departureDateInput.addEventListener("change", updateTotalPrice);

        reserveBtn.addEventListener("click", () => {
            const arrivalDate = arrivalDateInput.value;
            const departureDate = departureDateInput.value;
            const adults = parseInt(document.getElementById("adultCount").textContent);
            const children = parseInt(document.getElementById("childCount").textContent);
            const babies = parseInt(document.getElementById("babyCount").textContent);

            // Vérifiez si tous les champs sont remplis
            if (!arrivalDate || !departureDate || (adults + children + babies === 0)) {
                errorNotification.style.display = "block";
                setTimeout(() => {
                    errorNotification.style.display = "none";
                }, 2000);
                return; // Arrêtez l'exécution si la réservation est incomplète
            }

            notification.style.display = "block";
            setTimeout(() => {
                window.location.href = "confirmation.html"; // Changez vers votre page de confirmation
            }, 2000); // Attendez 2 secondes avant de rediriger
        });

        // Fermer le tableau voyageurs
        updateTotalVoyageurs();
        updateTotalPrice();
    </script>

</body>
</html>