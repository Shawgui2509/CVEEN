<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVVEN - Destinations de Rêve</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #ff385c;
            --secondary: #007bff;
            --text-dark: #222222;
            --text-light: #717171;
            --bg-gray: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-gray);
            margin: 0;
            color: var(--text-dark);
            padding-bottom: 50px;
        }

        /* En-tête de page */
        .hero-section {
            text-align: center;
            padding: 60px 20px 40px;
            background: white;
            margin-bottom: 40px;
            border-bottom: 1px solid #eee;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .hero-section p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        /* Container des offres */
        .offer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Style des Cartes */
        .offer-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            border: 1px solid #eaeaea;
        }

        .offer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Image et Badge de prix */
        .image-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .offer-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .offer-card:hover img {
            transform: scale(1.1);
        }

        .price-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: white;
            padding: 8px 12px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Contenu de la carte */
        .offer-card-content {
            padding: 20px;
        }

        .offer-card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0 0 5px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rating {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .rating i { color: #f59e0b; }

        .location {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Liste des équipements stylisée */
        .amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            padding-top: 15px;
            border-top: 1px solid #f1f1f1;
        }

        .amenity-tag {
            font-size: 0.8rem;
            color: var(--text-light);
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .offer-card-button {
            background-color: var(--text-dark);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            font-weight: 500;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .offer-card-button:hover {
            background-color: #000;
        }

        .dates {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 15px;
            display: block;
        }
    </style>
</head>
<body>

    <header class="hero-section">
        <h1>Où souhaitez-vous partir ?</h1>
        <p>Découvrez nos sélections exclusives pour vos prochaines vacances.</p>
    </header>

    <div class="offer-container">
        
        <div class="offer-card">
            <div class="image-wrapper">
                <img src="<?=base_url('img/Villa.jpg');?>" alt="Villa Corleane">
                <div class="price-badge">72 € <span style="font-weight:400; font-size:0.8rem">/nuit</span></div>
            </div>
            <div class="offer-card-content">
                <h2 class="offer-card-title">
                    Villa Corleane 
                    <span class="rating"><i class="fa fa-star"></i> 4.8</span>
                </h2>
                <div class="location"><i class="fa fa-map-marker-alt"></i> Barcelone, Espagne</div>
                
                <span class="dates"><i class="fa fa-calendar-alt"></i> 16 avr. - 22 avr.</span>

                <div class="amenities">
                    <span class="amenity-tag"><i class="fa fa-wifi"></i> Wifi</span>
                    <span class="amenity-tag"><i class="fa fa-utensils"></i> Cuisine</span>
                    <span class="amenity-tag"><i class="fa fa-wind"></i> Clim</span>
                    <span class="amenity-tag"><i class="fa fa-swimming-pool"></i> Piscine</span>
                </div>

                <button class="offer-card-button" onclick="window.location.href='offre1'">Voir les détails</button>
            </div>
        </div>

        <div class="offer-card">
            <div class="image-wrapper">
                <img src="<?=base_url('img/Hotel.jpg');?>" alt="Indico Rock Hotel">
                <div class="price-badge">89 € <span style="font-weight:400; font-size:0.8rem">/nuit</span></div>
            </div>
            <div class="offer-card-content">
                <h2 class="offer-card-title">
                    Indico Rock Hotel 
                    <span class="rating"><i class="fa fa-star"></i> 4.5</span>
                </h2>
                <div class="location"><i class="fa fa-map-marker-alt"></i> Londres, Royaume-Uni</div>
                
                <span class="dates"><i class="fa fa-calendar-alt"></i> 16 avr. - 22 avr.</span>

                <div class="amenities">
                    <span class="amenity-tag"><i class="fa fa-glass-martini-alt"></i> Bar</span>
                    <span class="amenity-tag"><i class="fa fa-wifi"></i> Wifi</span>
                    <span class="amenity-tag"><i class="fa fa-dumbbell"></i> Gym</span>
                    <span class="amenity-tag"><i class="fa fa-coffee"></i> Breakfast</span>
                </div>

                <button class="offer-card-button" onclick="window.location.href='offre2'">Voir les détails</button>
            </div>
        </div>

        <div class="offer-card">
            <div class="image-wrapper">
                <img src="<?=base_url('img/Big_House.jpg');?>" alt="Central Park Hotel">
                <div class="price-badge">115 € <span style="font-weight:400; font-size:0.8rem">/nuit</span></div>
            </div>
            <div class="offer-card-content">
                <h2 class="offer-card-title">
                    Central Park Hotel 
                    <span class="rating"><i class="fa fa-star"></i> 4.9</span>
                </h2>
                <div class="location"><i class="fa fa-map-marker-alt"></i> Rome, Italie</div>
                
                <span class="dates"><i class="fa fa-calendar-alt"></i> 16 avr. - 22 avr.</span>

                <div class="amenities">
                    <span class="amenity-tag"><i class="fa fa-leaf"></i> Jardin</span>
                    <span class="amenity-tag"><i class="fa fa-wifi"></i> Wifi</span>
                    <span class="amenity-tag"><i class="fa fa-parking"></i> Parking</span>
                    <span class="amenity-tag"><i class="fa fa-concierge-bell"></i> Spa</span>
                </div>

                <button class="offer-card-button" onclick="window.location.href='offre3'">Voir les détails</button>
            </div>
        </div>

    </div>

</body>
</html>