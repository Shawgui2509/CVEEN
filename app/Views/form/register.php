<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= site_url('CreateUser/register') ?>" method="post">


        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" pattern="\d{4}-\d{2}-\d{2}" required>

        <label for="genre">Genre :</label>
        <select name="genre">
            <option value="">Veuillez sélectionner</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <!-- Correction du bouton d'inscription -->
        <input type="submit" value="S'inscrire" class="btn btn-primary btn-lg">
    </form>

    <!-- Ajout d'un lien vers la page de connexion -->
    <p>Déjà inscrit ? <a href="<?= site_url('Connexion') ?>">Se connecter</a></p>
</body>
</html>
