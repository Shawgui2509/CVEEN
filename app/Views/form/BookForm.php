<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Recherche de Voyage</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center; /* Centrer verticalement */
            height: 100vh;
            margin: 0;
            flex-direction: column;
            padding: 20px;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
            margin-top: 20px; /* Ajustez si besoin pour décaler vers le bas */
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            width: 180px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #ff4081;
        }

        .search-button {
            padding: 10px 15px;
            background-color: #ff4081;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 8px;
            align-self: center;
        }

        .search-button:hover {
            background-color: #e91e63;
        }

        .modal {
            display: none;
            position: fixed;
            background: white;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 8px;
        }

        .traveler-count {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        .traveler-count button {
            width: 30px;
            height: 30px;
            border: none;
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .total-travelers {
            margin-top: 20px;
            font-weight: bold;
        }

        .modal-background {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }

        .offer-container {
            display: flex; 
            justify-content: space-around; 
            flex-wrap: wrap; 
            width: 100%; 
            max-width: 1200px; 
            margin-top: 20px; 
        }

        .offer-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: calc(30% - 20px); 
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px; 
            display: flex;
            flex-direction: column; 
            justify-content: space-between; 
            margin: auto;
        }

        .offer-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .offer-card-content {
            padding: 16px;
            flex-grow: 1; 
        }

        .offer-card-title {
            margin-bottom: 8px;
        }

        .offer-card-rating {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
        }

        .offer-card-discount {
            background-color: #f0f0f0;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-bottom: 16px;
        }

        .offer-card-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .offer-card-price {
            font-size: 24px;
            font-weight: bold;
        }

        .offer-card-dates {
            font-size: 14px;
            color: #666;
        }

        .offer-card-button {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="input-group">
            <label for="destination">Destination</label>
            <input type="text" id="destination" placeholder="Rechercher une destination" class="input-field">
        </div>
        <div class="input-group">
            <label for="arrival">Arrivée</label>
            <input type="text" id="arrival" placeholder="Quand ?" class="input-field">
        </div>
        <div class="input-group">
            <label for="departure">Départ</label>
            <input type="text" id="departure" placeholder="Quand ?" class="input-field">
        </div>
        <div class="input-group">
            <label for="travelers">Voyageurs</label>
            <input type="text" id="travelers" placeholder="Ajouter des voyageurs" class="input-field" readonly>
        </div>
        <button class="search-button">Rechercher</button>
    </div>

    <div class="modal-background" id="modal-background"></div>
    <div id="traveler-modal" class="modal">
        <h2>Ajouter des Voyageurs</h2>
        <div class="traveler-count">
            <span>Adultes (13 ans et plus)</span>
            <div>
                <button onclick="updateCount('adult', -1)">-</button>
                <span id="adult-count">0</span>
                <button onclick="updateCount('adult', 1)">+</button>
            </div>
        </div>
        <div class="traveler-count">
            <span>Enfants (De 2 à 12 ans)</span>
            <div>
                <button onclick="updateCount('child', -1)">-</button>
                <span id="child-count">0</span>
                <button onclick="updateCount('child', 1)">+</button>
            </div>
        </div>
        <div class="traveler-count">
            <span>Bébés (Moins de 2 ans)</span>
            <div>
                <button onclick="updateCount('baby', -1)">-</button>
                <span id="baby-count">0</span>
                <button onclick="updateCount('baby', 1)">+</button>
            </div>
        </div>
        <div class="total-travelers" id="total-travelers">Total des voyageurs : 0</div>
        <button id="close-modal" class="search-button">Fermer</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialiser flatpickr pour les champs de date en français
        flatpickr("#arrival", {
            dateFormat: "Y-m-d",
            allowInput: true,
            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                    longhand: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
                },
                months: {
                    shorthand: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
                    longhand: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                },
                ordinal: function() {
                    return "er";
                },
                rangeSeparator: " au ",
                weekAbbreviation: "Sem",
            },
            onClose: function(selectedDates, dateStr, instance) {
                document.getElementById('arrival').value = dateStr;
            }
        });

        flatpickr("#departure", {
            dateFormat: "Y-m-d",
            allowInput: true,
            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                    longhand: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
                },
                months: {
                    shorthand: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
                    longhand: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                },
                ordinal: function() {
                    return "er";
                },
                rangeSeparator: " au ",
                weekAbbreviation: "Sem",
            },
            onClose: function(selectedDates, dateStr, instance) {
                document.getElementById('departure').value = dateStr;
            }
        });

        document.getElementById('travelers').onclick = function() {
            document.getElementById('modal-background').style.display = 'block';
            document.getElementById('traveler-modal').style.display = 'block';
        };

        document.getElementById('close-modal').onclick = function() {
            document.getElementById('modal-background').style.display = 'none';
            document.getElementById('traveler-modal').style.display = 'none';
        };

        function updateCount(type, change) {
            const adultCountElement = document.getElementById('adult-count');
            const childCountElement = document.getElementById('child-count');
            const babyCountElement = document.getElementById('baby-count'); 
            
            if (type === 'adult') {
                let count = parseInt(adultCountElement.innerText) + change;
                adultCountElement.innerText = count < 0 ? 0 : count;
            } else if (type === 'child') {
                let count = parseInt(childCountElement.innerText) + change;
                childCountElement.innerText = count < 0 ? 0 : count;
            } else if (type === 'baby') {
                let count = parseInt(babyCountElement.innerText) + change;
                babyCountElement.innerText = count < 0 ? 0 : count;
            }
            
            updateTotal();
        }

        function updateTotal() {
            const adultCount = parseInt(document.getElementById('adult-count').innerText);
            const childCount = parseInt(document.getElementById('child-count').innerText);
            const babyCount = parseInt(document.getElementById('baby-count').innerText);
            const total = adultCount + childCount + babyCount;

            document.getElementById('total-travelers').innerText = `Total des voyageurs : ${total}`;
            document.getElementById('travelers').value = total > 0 ? `Total des voyageurs : ${total}` : "Ajouter des voyageurs";
        }
    </script>

    <div class="offer-container">
        <div class="offer-card">
            <img src="<?=base_url('img/Villa.jpg');?>" alt="Indico Rock Hotel"> 
            <div class="offer-card-content">
                <h2 class="offer-card-title">Villa Corleane </h2>
                <p class="offer-card-rating">7.3 - Convenable <br>Barcelone, Espagne,... </p>
                <div class="offer-card-discount">  Ce que propose ce logement <br><br>
                    -  🍽️ Cuisine <br>
                    -  📶 Wifi <br>
                    - 🧺 Lave-linge <br>
                    - 🛁 Baignoire <br>
                    - 💇‍♀️ Sèche-cheveux <br></div>
                <div class="offer-card-details">
                    <div>
                        <p class="offer-card-price">Environ 72 € <br> par nuit</p>
                    </div>
                    <div>
                        <p>Petit déjeuner inclus</p>
                        <p class="offer-card-dates">16 avr. - 22 avr.</p>
                    </div>
                </div>
                <button class="offer-card-button" onclick="window.location.href='test'">Consulter l'offre</button>
            </div>
        </div>
        <div class="offer-card">
            <img src="<?=base_url('img/Hotel.jpg');?>" alt="Park Plaza London"> 
            <div class="offer-card-content">
                <h2 class="offer-card-title">Indico Rock Hotel</h2>
                <p class="offer-card-rating">8.2 - Très bien <br>Londres, Royaume-Uni,...</p>
                <div class="offer-card-discount">
                    Ce que propose ce logement <br><br>
                    -  🍽️ Cuisine <br>
                    -  📶 Wifi <br>
                    - 🧺 Lave-linge <br>
                    - 🛁 Baignoire <br>
                    - 💇‍♀️ Sèche-cheveux <br>
                </div>
                <div class="offer-card-details">
                    <div>
                        <p class="offer-card-price">Environ 89 € <br> par nuit</p>
                    </div>
                    <div>
                        <p>Petit déjeuner inclus</p>
                        <p class="offer-card-dates">16 avr. - 22 avr.</p>
                    </div>
                </div>
                <button class="offer-card-button" onclick="window.location.href='offre2'">Consulter l'offre</button>
            </div>
        </div>
        <div class="offer-card">
            <img src="<?=base_url('img/Big_House.jpg');?>" alt="Central Park Hotel"> 
            <div class="offer-card-content">
                <h2 class="offer-card-title">Central Park Hotel</h2>
                <p class="offer-card-rating">9.5 - Excellent <br>Rome, Italie,...</p>
                <div class="offer-card-discount">        Ce que propose ce logement <br><br>
                    -  🍽️ Cuisine <br>
                    -  📶 Wifi <br>
                    - 🧺 Lave-linge <br>
                    - 🛁 Baignoire <br>
                    - 💇‍♀️ Sèche-cheveux <br></div>
                <div class="offer-card-details">
                    <div>
                        <p class="offer-card-price">Environ 115 € <br> par nuit</p>
                    </div>
                    <div>
                        <p>Petit déjeuner inclus</p>
                        <p class="offer-card-dates">16 avr. - 22 avr.</p>
                    </div>
                </div>
                <button class="offer-card-button" onclick="window.location.href='offre3'">Consulter l'offre</button>
            </div>
        </div>
    </div>
</body>
</html>