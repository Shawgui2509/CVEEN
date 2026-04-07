<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background-color: #f5f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        width: 380px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #d2d2d7;
        background: #f5f5f7;
        font-size: 14px;
        margin-bottom: 12px;
        outline: none;
        transition: 0.2s;
        box-sizing: border-box;
    }

    input:focus, select:focus {
        border-color: #0071e3;
        background: #fff;
    }

    button, input[type="submit"] {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        border: none;
        background: #ffffff;
        color: #000;
        font-size: 16px;
        cursor: pointer;
        border: 1px solid #d2d2d7;
        transition: 0.2s;
    }

    button:hover, input[type="submit"]:hover {
        background: #f0f0f0;
    }

    .error {
        color: red;
        margin-bottom: 10px;
        text-align: center;
        font-size: 14px;
    }

    .link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .link a {
        color: #0071e3;
        text-decoration: none;
    }

    .link a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div style="position:absolute; top:20px; width:100%; text-align:center;">
    <h1 style="margin:0; font-weight:600;">Inscription</h1>
</div>

<div class="form-container">
    <h2>Créer un compte</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <p class="error"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <?php if (isset($validation)) : ?>
        <div class="error">
            <?php if (is_object($validation)) : ?>
                <?= $validation->listErrors() ?>
            <?php else : ?>
                <?= esc($validation) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('CreateUser/register') ?>" method="post">

        <input type="text" name="prenom" placeholder="Prénom" value="<?= old('prenom') ?>" required>

        <input type="text" name="nom" placeholder="Nom" value="<?= old('nom') ?>" required>

        <input type="date" name="date_naissance" value="<?= old('date_naissance') ?>" required>

        <select name="genre">
            <option value="">Genre</option>
            <option value="Homme" <?= old('genre') === 'Homme' ? 'selected' : '' ?>>Homme</option>
            <option value="Femme" <?= old('genre') === 'Femme' ? 'selected' : '' ?>>Femme</option>
            <option value="Autre" <?= old('genre') === 'Autre' ? 'selected' : '' ?>>Autre</option>
        </select>

        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>

        <input type="password" name="password" placeholder="Mot de passe" required>

        <input type="submit" value="S'inscrire">
    </form>

    <div class="link">
        Déjà inscrit ? <a href="<?= site_url('Connexion') ?>">Se connecter</a>
    </div>
</div>

</body>
</html>
