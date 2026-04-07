<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de réservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Gestion de réservations COUCOU</h1>

    <?php $bannerMessage = session()->getFlashdata('banner_message'); ?>
    <?php $bannerType = session()->getFlashdata('banner_type') ?? 'success'; ?>
    <?php if ($bannerMessage): ?>
        <div class="alert alert-<?= esc($bannerType) ?> text-center fw-bold rounded-0 mb-4" role="alert">
            <?= esc($bannerMessage) ?>
        </div>
    <?php endif; ?>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Nombre de personnes</th>
                    <th scope="col">Pension</th>
                    <th scope="col">État de la réservation</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($tabReservation) && !empty($tabReservation)) {
                    foreach ($tabReservation as $LesReservations) {
                        echo "<tr>";
                        echo "<td>{$LesReservations['nom']}</td>";
                        echo "<td>{$LesReservations['datedebut']}</td>";
                        echo "<td>{$LesReservations['nbpersonne']}</td>";
                        echo "<td>{$LesReservations['pension']}</td>";
                        echo "<td>{$LesReservations['valide']}</td>";
                        echo "<td>";

                        if ($LesReservations['valide'] === "En attente de validation" || $LesReservations['valide'] === "Modifiee") {
                            echo '<form method="post" action="'.site_url('PageAdmin').'" class="d-flex gap-2">';
                            echo '<input type="hidden" name="idReservation" value="'.$LesReservations['id_reservation'].'">';
                            echo '<button type="submit" name="action" value="valider" class="btn btn-success btn-sm">';
                            echo '<i class="fa fa-check-circle"></i> Valider';
                            echo '</button>';
                            echo '<button type="submit" name="action" value="annuler" class="btn btn-danger btn-sm">';
                            echo '<i class="fa fa-times-circle"></i> Annuler';
                            echo '</button>';
                            echo '</form>';
                         } else {
                            echo '<span class="text-muted">Aucune action disponible</span>';
            }
            
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo '<tr><td colspan="6" class="text-center text-danger">Aucune réservation disponible.</td></tr>';
    }
    ?>
</tbody>

        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
