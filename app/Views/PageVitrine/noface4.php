<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Villa Corleane | CVVEN</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
.notification { transition: opacity 0.3s ease; }
.image-grid { display: grid; grid-template-columns: 2fr 1fr; grid-template-rows: 1fr 1fr; gap: 12px; height: 480px; }
@media (max-width: 768px) { .image-grid { grid-template-columns: 1fr; height: auto; } }
</style>
</head>
<body class="bg-white text-gray-900 font-sans">
<div id="notification" class="hidden fixed top-5 right-5 z-50 bg-green-600 text-white px-6 py-3 rounded-lg shadow-xl font-semibold">✅ Réservation réussie !</div>
<div id="errorNotification" class="hidden fixed top-5 right-5 z-50 bg-red-600 text-white px-6 py-3 rounded-lg shadow-xl font-semibold">❌ Dates manquantes ou incorrectes</div>
<nav class="border-b px-6 py-4 mb-8 bg-white/80 backdrop-blur-md sticky top-0 z-40"><div class="max-w-6xl mx-auto flex justify-between items-center"><a href="/" class="text-[#ff385c] font-bold text-2xl tracking-tighter italic">🏨 CVVEN</a><a href="/" class="text-sm font-medium border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-50 transition">Retour à l'accueil</a></div></nav>
<main class="max-w-6xl mx-auto px-4">
<header class="mb-6"><h1 class="text-3xl font-bold tracking-tight">Villa Corleane</h1><div class="flex items-center space-x-2 text-sm mt-2 font-medium"><span class="underline">⭐ 4,89 · 71 commentaires</span><span class="text-gray-400">·</span><span class="underline">Barcelone, Espagne</span></div></header>
<section class="image-grid rounded-3xl overflow-hidden mb-12 shadow-md"><div class="grid-span-1 row-span-2 overflow-hidden"><img src="<?= base_url('img/Small_Villa.jpg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-700 cursor-pointer" alt="Villa Corleane Main"></div><div class="hidden md:block overflow-hidden"><img src="<?= base_url('img/villafortnite.jpeg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-700 cursor-pointer" alt="Vue 2"></div><div class="hidden md:block overflow-hidden"><img src="<?= base_url('img/villadespi.jpg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-700 cursor-pointer" alt="Vue 3"></div></section>
<div class="flex flex-col lg:flex-row gap-16">
<div class="lg:w-2/3"><div class="border-b pb-8"><h2 class="text-2xl font-semibold">Propriété entière · Hôte : Compagnie Des Bains</h2><p class="text-gray-500 mt-2">4 voyageurs · 1 chambre · 2 lits · 1 salle de bain privée</p></div><div class="py-8 border-b space-y-8"><div class="flex items-start gap-4"><span class="text-2xl">✨</span><div><p class="font-bold">Design d'exception</p><p class="text-gray-500 text-sm">Une villa alliant architecture moderne et confort méditerranéen.</p></div></div><div class="flex items-start gap-4"><span class="text-2xl">📍</span><div><p class="font-bold">Emplacement idéal</p><p class="text-gray-500 text-sm">À seulement 4 minutes à pied des plages de Barcelone.</p></div></div></div><div class="py-8"><h2 class="text-xl font-bold mb-6">Équipements et services</h2><div class="grid grid-cols-1 md:grid-cols-2 gap-y-5"><div class="flex items-center gap-4"><span>🌊</span> <span class="font-light">Vue panoramique sur la mer</span></div><div class="flex items-center gap-4"><span>📶</span> <span class="font-light">Wifi ultra-rapide</span></div><div class="flex items-center gap-4"><span>🍽️</span> <span class="font-light">Cuisine gastronomique</span></div><div class="flex items-center gap-4"><span>🔑</span> <span class="font-light">Arrivée autonome 24h/24</span></div><div class="flex items-center gap-4 text-gray-300 line-through"><span>🚫</span> <span class="font-light">Détecteur de monoxyde</span></div></div></div></div>
<div class="lg:w-1/3"><div class="sticky top-24 border border-gray-200 rounded-3xl p-8 shadow-2xl bg-white"><div class="flex justify-between items-baseline mb-6"><div><span class="text-2xl font-extrabold text-gray-900">240€</span><span class="text-gray-500 text-sm"> / nuit</span></div><span class="text-sm font-bold">⭐ 4,89</span></div><div class="border border-gray-400 rounded-xl mb-6 overflow-hidden focus-within:ring-2 focus-within:ring-black"><div class="grid grid-cols-2 border-b border-gray-400"><div class="p-3 border-r border-gray-400"><label class="block text-[10px] font-black uppercase text-gray-600">Arrivée</label><input type="date" id="debut" class="w-full text-sm outline-none font-medium mt-1"></div><div class="p-3"><label class="block text-[10px] font-black uppercase text-gray-600">Départ</label><input type="date" id="fin" class="w-full text-sm outline-none font-medium mt-1"></div></div><div class="p-3"><label class="block text-[10px] font-black uppercase text-gray-600">Voyageurs</label><select class="w-full text-sm outline-none mt-1 font-medium bg-white"><option>4 voyageurs</option><option>2 voyageurs</option></select></div></div><button onclick="reserver()" class="w-full bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-4 rounded-xl transition-all active:scale-95 shadow-lg text-lg">Réserver</button><p class="text-center text-xs text-gray-400 mt-4 italic">Vous ne serez pas débité immédiatement</p></div></div>
</div>
</main>
<script>
async function reserver() {
const date1 = document.getElementById('debut').value;
const date2 = document.getElementById('fin').value;
const err = document.getElementById('errorNotification');
const notif = document.getElementById('notification');
const selectVoyageurs = document.querySelector('select');
const labelVoyageurs = selectVoyageurs ? (selectVoyageurs.value || '') : '';
const matchVoyageurs = labelVoyageurs.match(/\d+/);
const nbpersonne = matchVoyageurs ? parseInt(matchVoyageurs[0], 10) : 1;

if (!date1 || !date2) {
err.textContent = '❌ Dates manquantes ou incorrectes';
err.classList.remove('hidden');
setTimeout(() => err.classList.add('hidden'), 3000);
return;
}

try {
const response = await fetch('<?= site_url('reservation/create') ?>', {
method: 'POST',
headers: {
'Content-Type': 'application/json',
'X-Requested-With': 'XMLHttpRequest'
},
body: JSON.stringify({
datedebut: date1,
datefin: date2,
nbpersonne: nbpersonne,
pension: 'N',
typelogement: 'noface4'
})
});

const data = await response.json().catch(() => ({}));

if (response.status === 401) {
window.location.href = '<?= site_url('Connexion') ?>';
return;
}

if (!response.ok || !data.success) {
err.textContent = `❌ ${data.message || 'Impossible d\'enregistrer la réservation.'}`;
err.classList.remove('hidden');
setTimeout(() => err.classList.add('hidden'), 3000);
return;
}

notif.textContent = '✅ Réservation enregistrée !';
notif.classList.remove('hidden');
setTimeout(() => {
notif.classList.add('hidden');
window.location.href = '<?= base_url('confirmation') ?>';
}, 600);
} catch (error) {
err.textContent = '❌ Erreur réseau, réessayez.';
err.classList.remove('hidden');
setTimeout(() => err.classList.add('hidden'), 3000);
}
}
</script>
</body>
</html>
