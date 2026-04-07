<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des réservations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        .admin-shell {
            background:
                radial-gradient(circle at top left, rgba(255, 56, 92, 0.14), transparent 30%),
                radial-gradient(circle at top right, rgba(17, 24, 39, 0.08), transparent 28%),
                linear-gradient(180deg, #f9fafb 0%, #ffffff 100%);
        }
    </style>
</head>
<body class="admin-shell text-gray-900 min-h-screen">
<?php
$isAdmin = strtolower(trim((string) session()->get('role'))) === 'admin';
$bannerMessage = session()->getFlashdata('banner_message');
$bannerType = session()->getFlashdata('banner_type') ?? 'success';
?>
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-[#ff385c] text-white flex items-center justify-center shadow-lg shadow-pink-200">
                <i class="fa-solid fa-hotel"></i>
            </div>
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-gray-400 font-semibold">CVVEN</p>
                <h1 class="text-lg font-bold text-gray-900">Gestion des réservations</h1>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-sm font-semibold">
            <?= anchor($isAdmin ? 'PageAdmin' : '/', '🏠 Accueil', 'class="rounded-full px-4 py-2 hover:bg-gray-100 text-gray-700 transition"'); ?>
            <?php if ($isAdmin): ?>
                <?= anchor('PageAdmin', '🛠 Admin', 'class="rounded-full px-4 py-2 bg-gray-900 text-white hover:bg-black transition"'); ?>
            <?php endif; ?>
            <?= anchor('BookForm', '🔍 Rechercher', 'class="rounded-full px-4 py-2 hover:bg-gray-100 text-gray-700 transition"'); ?>
            <?= anchor('PageUser', '📌 Mes Réservations', 'class="rounded-full px-4 py-2 hover:bg-gray-100 text-gray-700 transition"'); ?>
            <?= anchor('ModifyPassword', '⚙️ Paramètres', 'class="rounded-full px-4 py-2 hover:bg-gray-100 text-gray-700 transition"'); ?>
            <?= anchor('logout', '🚪 Déconnexion', 'class="rounded-full border border-gray-300 px-5 py-2 hover:bg-gray-50 text-gray-700 transition"'); ?>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 py-10 lg:py-14">
    <section class="rounded-[2rem] bg-gradient-to-r from-gray-900 via-gray-800 to-[#ff385c] text-white shadow-2xl overflow-hidden">
        <div class="p-8 lg:p-12">
            <p class="text-sm uppercase tracking-[0.35em] text-white/70 font-semibold mb-4">Espace administrateur</p>
            <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-4">Pilotez les demandes de réservation avec une interface claire et cohérente.</h2>
            <p class="text-white/80 max-w-2xl">Validez, refusez ou suivez les demandes en gardant une lecture rapide du statut de chaque séjour.</p>
        </div>
    </section>

    <?php if ($bannerMessage): ?>
        <?php
        $bannerClasses = $bannerType === 'success'
            ? 'border-emerald-200 bg-emerald-50 text-emerald-800'
            : 'border-rose-200 bg-rose-50 text-rose-800';
        ?>
        <div class="mt-6 rounded-2xl border px-5 py-4 text-sm font-semibold <?= esc($bannerClasses) ?>" role="alert">
            <?= esc($bannerMessage) ?>
        </div>
    <?php endif; ?>

    <section class="mt-8 rounded-[2rem] bg-white shadow-xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Tableau des réservations</h3>
                <p class="text-sm text-gray-500">Le style reprend la même identité visuelle que l’accueil.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50 text-left text-xs uppercase tracking-[0.25em] text-gray-500">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nom</th>
                        <th class="px-6 py-4 font-semibold">Date début</th>
                        <th class="px-6 py-4 font-semibold">Personnes</th>
                        <th class="px-6 py-4 font-semibold">Pension</th>
                        <th class="px-6 py-4 font-semibold">État</th>
                        <th class="px-6 py-4 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                <?php if (isset($tabReservation) && !empty($tabReservation)): ?>
                    <?php foreach ($tabReservation as $LesReservations): ?>
                        <?php
                        $state = $LesReservations['valide'] ?? '';
                        $stateLabel = $state;
                        $stateClasses = 'bg-gray-100 text-gray-700';

                        if ($state === 'En attente de validation') {
                            $stateClasses = 'bg-amber-50 text-amber-700';
                        } elseif ($state === 'Modifiee' || $state === 'Modifiée') {
                            $stateClasses = 'bg-sky-50 text-sky-700';
                        } elseif ($state === 'Validée' || $state === 'Validee' || $state === 'Validé' || $state === 'Valide') {
                            $stateClasses = 'bg-emerald-50 text-emerald-700';
                        } elseif ($state === 'Annulee' || $state === 'Annulée') {
                            $stateClasses = 'bg-rose-50 text-rose-700';
                        }
                        ?>
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="px-6 py-5 font-semibold text-gray-900"><?= esc($LesReservations['nom'] ?? '') ?></td>
                            <td class="px-6 py-5 text-gray-600"><?= esc($LesReservations['datedebut'] ?? '') ?></td>
                            <td class="px-6 py-5 text-gray-600"><?= esc((string) ($LesReservations['nbpersonne'] ?? '')) ?></td>
                            <td class="px-6 py-5 text-gray-600"><?= esc($LesReservations['pension'] ?? '') ?></td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold <?= esc($stateClasses) ?>">
                                    <?= esc($stateLabel) ?>
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                <?php if ($state === 'En attente de validation' || $state === 'Modifiee' || $state === 'Modifiée'): ?>
                                    <form method="post" action="<?= site_url('PageAdmin') ?>" class="flex flex-wrap gap-3">
                                        <input type="hidden" name="idReservation" value="<?= esc((string) ($LesReservations['id_reservation'] ?? '')) ?>">
                                        <button type="submit" name="action" value="valider" class="inline-flex items-center gap-2 rounded-full bg-emerald-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-600 transition">
                                            <i class="fa-solid fa-circle-check"></i>
                                            Valider
                                        </button>
                                        <button type="submit" name="action" value="annuler" class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-600 transition">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                            Annuler
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-sm text-gray-400">Aucune action disponible</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="mx-auto max-w-md">
                                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-gray-100 text-[#ff385c]">
                                    <i class="fa-regular fa-calendar-xmark text-2xl"></i>
                                </div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Aucune réservation disponible</h4>
                                <p class="text-sm text-gray-500">Dès qu’une demande arrive, elle s’affichera ici avec les actions de validation.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
