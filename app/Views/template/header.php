<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVVEN - Réservation de Séjours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 15px 50px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <?php $isAdmin = session()->get('role') === 'admin'; ?>
    <nav class="navbar">
        <?php if(isset($iduser) && $isAdmin) {
            echo anchor('PageAdmin', '🏠 Accueil', 'class="nav-link text-primary"');
        } else {
            echo anchor('/', '🏠 Accueil', 'class="nav-link text-success"');
        } ?>
         
        <div>
            <?php if(isset($iduser)) { ?>
                <?= anchor('BookForm', '🔍 Rechercher', 'class="nav-link text-success"'); ?>
                <?= anchor('PageUser', '📌 Mes Réservations', 'class="nav-link text-success"'); ?>
                <?php if($isAdmin) { ?>
                    <?= anchor('GestionReservation', '📂 Gérer Réservations', 'class="nav-link text-primary"'); ?>
                    <?= anchor('GestionUser', '👥 Gérer Utilisateurs', 'class="nav-link text-primary"'); ?>
                    <?= anchor('AddUserAdmin', '➕ Ajouter Utilisateur', 'class="nav-link text-primary"'); ?>
                <?php } ?>
                <?= anchor('ModifyPassword', '⚙️ Paramètres', 'class="nav-link text-warning"'); ?>
                <?= anchor('Connexion/deconnexion', '🚪 Déconnexion', 'class="nav-link text-danger"'); ?>
            <?php } else { ?>
                <?= anchor('Connexion', '🔐Connexion', 'class="nav-link text-success"'); ?>
            <?php } ?>
        </div>
    </nav>
</body>
</html>
