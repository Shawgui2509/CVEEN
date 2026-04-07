<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chambre Double - Appt 06 | Mers-les-Bains</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
.notification { transition: opacity 0.3s ease; }
.image-grid { display: grid; grid-template-columns: 2fr 1fr; grid-template-rows: 1fr 1fr; gap: 8px; height: 400px; }
@media (max-width: 768px) { .image-grid { grid-template-columns: 1fr; height: auto; } }
</style>
</head>
<body class="bg-white text-gray-900 font-sans">
<div id="notification" class="hidden fixed top-5 right-5 z-50 bg-green-600 text-white px-6 py-3 rounded-lg shadow-xl">✅ Réservation réussie !</div>
<main class="max-w-6xl mx-auto px-4 py-8">
<header class="mb-6">
<h1 class="text-3xl font-semibold">Chambre double, - Appt 06</h1>
<div class="flex justify-between items-center mt-2">
<div class="flex items-center space-x-2 text-sm underline font-medium"><span>⭐ 4,89 · 71 commentaires</span><span>·</span><span>Barcelone, Espagne</span></div>
</div>
</header>
<section class="image-grid rounded-xl overflow-hidden mb-8">
<div class="grid-span-1 row-span-2"><img src="<?= base_url('img/offre1p.jpg'); ?>" class="w-full h-full object-cover hover:opacity-90 transition cursor-pointer" alt="Main Photo"></div>
<div class="hidden md:block"><img src="<?= base_url('img/offre2p.jpg'); ?>" class="w-full h-full object-cover hover:opacity-90 transition cursor-pointer" alt="Photo 2"></div>
<div class="hidden md:block"><img src="<?= base_url('img/offre3p.png'); ?>" class="w-full h-full object-cover hover:opacity-90 transition cursor-pointer" alt="Photo 3"></div>
</section>
<div class="flex flex-col lg:flex-row gap-12">
<div class="lg:w-2/3">
<div class="border-b pb-6"><h2 class="text-2xl font-semibold">Logement entier proposé par Compagnie Des Bains</h2><p class="text-gray-600">4 voyageurs · 1 chambre · 2 lits · 1 salle de bain</p></div>
<div class="py-6 border-b space-y-4">
<div class="flex items-start space-x-4"><span class="text-2xl">🏖️</span><div><p class="font-semibold">Emplacement exceptionnel</p><p class="text-gray-500 text-sm">À 4 minutes à pied de la plage.</p></div></div>
<div class="flex items-start space-x-4"><span class="text-2xl">🔑</span><div><p class="font-semibold">Arrivée autonome</p><p class="text-gray-500 text-sm">Vous pouvez entrer dans les lieux avec une boîte à clé sécurisée.</p></div></div>
</div>
<div class="py-8">
<h2 class="text-xl font-semibold mb-4">Ce que propose ce logement</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-y-3">
<div class="flex items-center space-x-3"><span>🌊</span> <span>Vue sur l'océan</span></div>
<div class="flex items-center space-x-3"><span>📶</span> <span>Wifi rapide</span></div>
<div class="flex items-center space-x-3"><span>🍽️</span> <span>Cuisine équipée</span></div>
<div class="flex items-center space-x-3 text-gray-400 line-through"><span>🚫</span> <span>Détecteur de monoxyde</span></div>
</div>
<button class="mt-6 border-2 border-black px-6 py-2 rounded-lg font-semibold hover:bg-gray-50 transition">Afficher les 48 équipements</button>
</div>
</div>
<div class="lg:w-1/3">
<div class="sticky top-8 border rounded-xl p-6 shadow-xl bg-white">
<div class="flex justify-between items-center mb-4"><div><span class="text-2xl font-bold">120€</span> <span class="text-gray-600">/ nuit</span></div><div class="text-sm font-semibold">⭐ 4,89</div></div>
<div class="border rounded-lg mb-4">
<div class="grid grid-cols-2 border-b">
<div class="p-3 border-r"><label class="block text-[10px] font-bold uppercase">Arrivée</label><input type="date" class="w-full text-sm outline-none"></div>
<div class="p-3"><label class="block text-[10px] font-bold uppercase">Départ</label><input type="date" class="w-full text-sm outline-none"></div>
</div>
<div class="p-3"><label class="block text-[10px] font-bold uppercase">Voyageurs</label><select class="w-full text-sm outline-none bg-transparent"><option>1 voyageur</option><option selected>4 voyageurs</option></select></div>
</div>
<button onclick="reserver()" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 rounded-lg transition duration-200">Réserver</button>
<p class="text-center text-gray-500 text-sm mt-4">Aucun montant ne vous sera débité pour le moment</p>
</div>
</div>
</div>
</main>
<script>
function reserver() {
const notif = document.getElementById('notification');
notif.classList.remove('hidden');
setTimeout(() => { notif.classList.add('hidden'); }, 3000);
}
</script>
</body>
</html>
