<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVVEN - Réservation de Séjours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset et styles globaux */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f8f8;
            color: #333;
        }

        /* Bannière */
        .banner {
            position: relative;
            width: 100%;
            height: 350px;
            background: url('https://i.postimg.cc/3N7wnb75/background.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .banner h1 {
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* Conteneur des cartes */
        .container {
            max-width: 1100px;
            margin: 50px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
            text-align: center;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            background: #ff385c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .card a:hover {
            background: #e60042;
        }

        /* Pied de page */
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 50px;
        }
    </style>
</head>
<body>
   <!-- Bannière -->
    <section class="banner">
        <h1>CVVEN - Partez à l'aventure avec nous !</h1>
    </section>

    <!-- Conteneur des cartes -->
    <div class="container">
        <div class="card">
            <img src="<?= base_url('img/Big_House.jpg'); ?>" alt="Appartement Italien">
            <div class="card-content">
                <h3>Appartement Italien</h3>
                <a href="noface1" class="btn btn-primary btn-lg">En savoir +</a>
            </div>
        </div>
        <div class="card">
            <img src="<?= base_url('img/Bedroom.jpeg'); ?>" alt="Chambre Double">
            <div class="card-content">
                <h3>Chambre Double</h3>
                <a href="noface2" class="btn btn-primary btn-lg">En savoir +</a>
            </div>
        </div>
        <div class="card">
            <img src="<?= base_url('img/Hotel.jpg'); ?>" alt="Hôtel Arueco">
            <div class="card-content">
                <h3>Indico Rock Hotel</h3>
                <a href="noface3" class="btn btn-primary btn-lg">En savoir +</a>
            </div>
        </div>
        <div class="card">
            <img src="<?= base_url('img/Villa.jpg'); ?>" alt="Villa Corleane">
            <div class="card-content">
                <h3>Villa Corleane</h3>
                <a href="noface4" class="btn btn-primary btn-lg">En savoir +</a>"
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <footer>
        Copyright CVVEN Project © SLAM Descartes 2020-2021
    </footer>

</body>
</html>